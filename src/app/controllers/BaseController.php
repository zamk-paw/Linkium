<?php
session_start();

class BaseController {
    protected function requireLogin(): void {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /index.php?controller=auth&action=login');
            exit;
        }
    }
}
