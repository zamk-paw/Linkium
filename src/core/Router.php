<?php
class Router {
    public function dispatch(): void {
	$controllerName = ucfirst($_GET['controller'] ?? 'auth') . 'Controller';
	$action = $_GET['action'] ?? 'login';

        $controllerFile = "app/controllers/$controllerName.php";
        if (!file_exists($controllerFile)) {
            http_response_code(404);
            echo "Controller not found";
            exit;
        }

        require_once $controllerFile;
        $controller = new $controllerName();

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            http_response_code(404);
            echo "Action not found";
        }
    }
}
