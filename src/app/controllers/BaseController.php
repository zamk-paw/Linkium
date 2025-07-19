<?php
session_start();

class BaseController {
    protected function requireLogin(): void {
        // On calcule le controller actuel comme dans Router
        $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        if (str_starts_with($path, 'index.php')) {
            $path = substr($path, strlen('index.php'));
            $path = trim($path, '/');
        }
        $parts = explode('/', $path);
        $currentController = strtolower($parts[0] ?: 'dashboard');

        // On laisse passer si c'est auth
        if ($currentController === 'auth') {
            return;
        }

        // Sinon on bloque si pas connecté
        if (!isset($_SESSION['user_id'])) {
            header('Location: /auth/login');
            exit;
        }
    }
}
