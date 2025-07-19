<?php
require_once 'app/models/Contact.php';
require_once 'app/controllers/BaseController.php';

class ContactController extends BaseController {
    public function index(): void {
        $this->requireLogin();
	include 'app/views/contacts/index.php';

    }
}
