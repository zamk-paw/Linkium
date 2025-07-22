<?php
require_once 'app/controllers/BaseController.php';
require_once 'app/models/Contacts.php';
require_once 'core/Database.php';

class ContactsController extends BaseController {

    public function storeContacts(): void {
        $this->requireLogin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = trim($_POST['first_name'] ?? '');
            $lastName = trim($_POST['last_name'] ?? '');

            if ($firstName && $lastName) {
                Contacts::create($_POST, $_SESSION['user_id']);
                header('Location: /dashboard/contacts');
                exit;
            } else {
                $error = "First name and last name are required.";
                include 'app/views/dashboard/add_contacts.php';
            }
        } else {
            header('Location: /dashboard/addContact');
            exit;
        }
    }

    public function delete(): void {
        $this->requireLogin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contactId = intval($_POST['contact_id'] ?? 0);

            if ($contactId > 0) {
                if (Contacts::delete($contactId, $_SESSION['user_id'])) {
                    header('Location: /dashboard/contacts?deleted=1');
                    exit;
                } else {
                    header('Location: /dashboard/contacts?error=delete');
                    exit;
                }
            }
        }

        header('Location: /dashboard/contacts');
        exit;
    }
}
