<?php
require_once 'app/controllers/BaseController.php';
require_once 'app/models/Contact.php';
require_once 'core/Database.php';

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

    // Display the form to add a new contact
    public function addContact(): void {
        $this->requireLogin();
        include 'app/views/dashboard/add_contact.php';
    }

    // Handle the form submission to store a new contact
    public function storeContact(): void {
        $this->requireLogin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = trim($_POST['first_name'] ?? '');
            $lastName = trim($_POST['last_name'] ?? '');

            // First name and last name are required
            if ($firstName && $lastName) {
                // Use the model to insert the new contact
                Contact::create($_POST, $_SESSION['user_id']);

                // Redirect to the contacts page after insertion
                header('Location: /dashboard/contacts');
                exit;
            } else {
                // Show error and reload the form if required fields are missing
                $error = "First name and last name are required.";
                include 'app/views/dashboard/add_contact.php';
            }
        } else {
            // Redirect to the add contact form if the request is not POST
            header('Location: /dashboard/addContact');
            exit;
        }
    }
}
