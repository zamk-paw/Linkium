<?php
require_once 'app/controllers/BaseController.php';

class DashboardController extends BaseController {
    public function index(): void {
        $this->requireLogin(); // check session
        include 'app/views/dashboard/index.php';
    }
}
