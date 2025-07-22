<?php
require_once 'app/controllers/BaseController.php';
require_once 'core/Database.php';

class DashboardController extends BaseController {

    // Display the dashboard home page
    public function home(): void {
        $this->requireLogin();
        include 'app/views/dashboard/home.php';
    }

    // Display the contacts page (only rendering, no logic)
    public function contacts(): void {
        $this->requireLogin();
        // Fetch contacts directly here or delegate to ContactController
        require_once 'app/models/Contacts.php';
        $contacts = Contacts::allByUser($_SESSION['user_id']);
        include 'app/views/dashboard/contacts.php';
    }

    // Display the "add Contacts" form page
    public function addContacts(): void {
        $this->requireLogin();
        include 'app/views/dashboard/add_contacts.php';
    }

}
