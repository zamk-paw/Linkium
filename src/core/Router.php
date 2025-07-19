<?php
class Router {
    public function dispatch(): void {
        $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        if (str_starts_with($path, 'index.php')) {
            $path = substr($path, strlen('index.php'));
            $path = trim($path, '/');
        }

        $parts = explode('/', $path);

        $controller = $parts[0] ?: 'dashboard';
        $action = $parts[1] ?? 'home';

        $controllerName = ucfirst($controller) . 'Controller';
        $controllerFile = __DIR__ . '/../app/controllers/' . $controllerName . '.php';

        if (!file_exists($controllerFile)) {
            http_response_code(404);
            echo "Controller not found: $controllerName";
            exit;
        }

        require_once $controllerFile;

        if (!class_exists($controllerName)) {
            http_response_code(500);
            echo "Class $controllerName not defined in $controllerFile";
            exit;
        }

        $controllerObj = new $controllerName();

        if (!method_exists($controllerObj, $action)) {
            http_response_code(404);
            echo "Action not found: $action in $controllerName";
            exit;
        }

        $controllerObj->$action();
    }
}

