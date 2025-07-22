<?php
require_once __DIR__ . '/../../core/Database.php';

class Contacts {
    private int $id;
    private string $firstName;
    private string $lastName;
    private ?string $nickname;
    private ?string $description;
    private ?string $tags;
    private ?string $emailPersonal;
    private ?string $emailProfessional;
    private ?string $phonePersonal;
    private ?string $phoneProfessional;
    private ?string $linkedinUrl;
    private ?string $githubUrl;
    private ?string $company;
    private ?string $position;
    private ?string $address;
    private ?string $birthday;
    private ?string $websiteUrl;
    private ?string $notes;
    private ?string $source;
    private ?string $relationship;

    public function __construct(array $data) {
        $this->id = (int)$data['id'];
        $this->firstName = $data['first_name'];
        $this->lastName = $data['last_name'];
        $this->nickname = $data['nickname'];
        $this->description = $data['description'];
        $this->tags = $data['tags'];
        $this->emailPersonal = $data['email_personal'];
        $this->emailProfessional = $data['email_professional'];
        $this->phonePersonal = $data['phone_personal'];
        $this->phoneProfessional = $data['phone_professional'];
        $this->linkedinUrl = $data['linkedin_url'];
        $this->githubUrl = $data['github_url'];
        $this->company = $data['company'];
        $this->position = $data['position'];
        $this->address = $data['address'];
        $this->birthday = $data['birthday'];
        $this->websiteUrl = $data['website_url'];
        $this->notes = $data['notes'];
        $this->source = $data['source'];
        $this->relationship = $data['relationship'];
    }

    // Getters
    public function getId(): int { return $this->id; }
    public function getFullName(): string { return $this->firstName . ' ' . $this->lastName; }
    public function getNickname(): ?string { return $this->nickname; }
    public function getDescription(): ?string { return $this->description; }
    public function getTags(): ?string { return $this->tags; }
    public function getEmailPersonal(): ?string { return $this->emailPersonal; }
    public function getEmailProfessional(): ?string { return $this->emailProfessional; }
    public function getPhonePersonal(): ?string { return $this->phonePersonal; }
    public function getPhoneProfessional(): ?string { return $this->phoneProfessional; }
    public function getLinkedinUrl(): ?string { return $this->linkedinUrl; }
    public function getGithubUrl(): ?string { return $this->githubUrl; }
    public function getCompany(): ?string { return $this->company; }
    public function getPosition(): ?string { return $this->position; }
    public function getAddress(): ?string { return $this->address; }
    public function getBirthday(): ?string { return $this->birthday; }
    public function getWebsiteUrl(): ?string { return $this->websiteUrl; }
    public function getNotes(): ?string { return $this->notes; }
    public function getSource(): ?string { return $this->source; }
    public function getRelationship(): ?string { return $this->relationship; }

    // Fetch all contacts for a user
    public static function allByUser(int $userId): array {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("
            SELECT id, first_name, last_name, nickname, description, tags,
                   email_personal, email_professional, phone_personal, phone_professional,
                   linkedin_url, github_url, company, position, address,
                   birthday, website_url, notes, source, relationship
            FROM contacts
            WHERE user_id = ?
        ");
        $stmt->execute([$userId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $contacts = [];
        foreach ($rows as $row) {
            $contacts[] = new Contacts($row);
        }
        return $contacts;
    }

    // Create Contacts
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

    // Delete Contacts
    public static function delete(int $contactId, int $userId): bool {
    $pdo = Database::getInstance();
    $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = ? AND user_id = ?");
    return $stmt->execute([$contactId, $userId]);
}

}