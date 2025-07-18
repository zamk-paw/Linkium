<?php
session_start();
require_once 'app/models/User.php';

class AuthController {
    public function login(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if ($email && $password) {
                $user = User::findByEmail($email);
                if ($user && password_verify($password, $user['password_hash'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    header('Location: /index.php?controller=dashboard&action=index');
                    exit;
                } else {
                    $error = "Invalid email or password.";
                }
            } else {
                $error = "All fields are required.";
            }
        }
        include 'app/views/auth/login.php';
    }

    public function register(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if ($username && $email && $password) {
                if (User::findByEmail($email)) {
                    $error = "Email already in use.";
                } else {
                    if (User::create($username, $email, $password)) {
                        header('Location: /index.php?controller=auth&action=login');
                        exit;
                    } else {
                        $error = "Registration failed.";
                    }
                }
            } else {
                $error = "All fields are required.";
            }
        }
        include 'app/views/auth/register.php';
    }

    public function logout(): void {
        session_destroy();
        header('Location: /index.php?controller=auth&action=login');
        exit;
    }
}

