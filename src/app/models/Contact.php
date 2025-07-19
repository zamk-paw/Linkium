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

    public function getId(): int {
        return $this->id;
    }

    public function getFullName(): string {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getEmailPersonal(): ?string {
        return $this->emailPersonal;
    }

    public function getEmailProfessional(): ?string {
        return $this->emailProfessional;
    }

    // Get all contacts for a specific user
    public static function allByUser(int $userId): array {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT id, first_name, last_name, email_personal, email_professional FROM contacts WHERE user_id = ?");
        $stmt->execute([$userId]);
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

public static function create(array $data, int $userId): bool {
    $pdo = Database::getInstance();

    $birthday = !empty($data['birthday']) ? $data['birthday'] : null;
    $relationship = !empty($data['relationship']) ? $data['relationship'] : null;

    $stmt = $pdo->prepare("INSERT INTO contacts (
        user_id, first_name, last_name, nickname, description, tags, email_personal, email_professional,
        phone_personal, phone_professional, linkedin_url, github_url, company, position, address,
        birthday, website_url, notes, source, relationship
    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    return $stmt->execute([
        $userId,
        $data['first_name'],
        $data['last_name'],
        $data['nickname'] ?? null,
        $data['description'] ?? null,
        $data['tags'] ?? null,
        $data['email_personal'] ?? null,
        $data['email_professional'] ?? null,
        $data['phone_personal'] ?? null,
        $data['phone_professional'] ?? null,
        $data['linkedin_url'] ?? null,
        $data['github_url'] ?? null,
        $data['company'] ?? null,
        $data['position'] ?? null,
        $data['address'] ?? null,
        $birthday,
        $data['website_url'] ?? null,
        $data['notes'] ?? null,
        $data['source'] ?? null,
        $relationship
    ]);
}
}
