<?php
require_once 'app/controllers/BaseController.php';
require_once 'app/models/Contact.php';

class DashboardController extends BaseController {

    public function home(): void {
        $this->requireLogin();
        include 'app/views/dashboard/home.php';
    }

    public function contacts(): void {
        $this->requireLogin();

	$contacts = Contact::allByUser($_SESSION['user_id']);

        include 'app/views/dashboard/contacts.php';
    }
}
