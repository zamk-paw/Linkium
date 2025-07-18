<?php
require_once __DIR__ . '/../../core/Database.php';

class Contact {
    private int $id;
    private string $firstName;
    private string $lastName;
    private ?string $emailPersonal;
    private ?string $emailProfessional;

    public function __construct(
        int $id,
        string $firstName,
        string $lastName,
        ?string $emailPersonal = null,
        ?string $emailProfessional = null
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->emailPersonal = $emailPersonal;
        $this->emailProfessional = $emailProfessional;
    }

    public function getId(): int { return $this->id; }
    public function getFullName(): string { return $this->firstName . ' ' . $this->lastName; }
    public function getEmailPersonal(): ?string { return $this->emailPersonal; }
    public function getEmailProfessional(): ?string { return $this->emailProfessional; }

    public static function all(): array {
        $pdo = Database::getInstance();
        $stmt = $pdo->query("SELECT id, first_name, last_name, email_personal, email_professional FROM contacts");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $contacts = [];
        foreach ($rows as $row) {
            $contacts[] = new Contact(
                $row['id'],
                $row['first_name'],
                $row['last_name'],
                $row['email_personal'],
                $row['email_professional']
            );
        }
        return $contacts;
    }
}
