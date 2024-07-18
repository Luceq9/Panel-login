<?php
require_once 'db.php';

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($email, $password) {
        try {
            $stmt = $this->db->prepare('SELECT id FROM users WHERE email = :email');
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            if ($stmt->fetch()) {
                return ['success' => false, 'message' => 'Email jest już zajęty.'];
            }
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertStmt = $this->db->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
            $insertStmt->execute([$email, $hashedPassword]);

            return ['success' => true, 'message' => 'Rejestracja zakończona pomyślnie.'];
        } catch(PDOException $e) {
            return ['success' => false, 'message' => 'Błąd podczas rejestracji: ' . $e->getMessage()];
        }
    }

    public function userExists($email) {
        $stmt = $this->db->prepare('SELECT id FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }
}

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $database = $db->getConnection();

    $user = new User($database);

    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Nieprawidłowy format email.']);
        exit;
    }

    if (strlen($password) < 8) {
        echo json_encode(['success' => false, 'message' => 'Hasło musi mieć minimum 8 znaków.']);
        exit;
    }

    if ($password !== $confirmPassword) {
        echo json_encode(['success' => false, 'message' => 'Hasło i potwierdzenie hasła nie są identyczne.']);
        exit;
    }

    if ($user->userExists($email)) {
        echo json_encode(['success' => false, 'message' => 'Email jest już zajęty.']);
        exit;
    }

    $result = $user->register($email, $password);
    echo json_encode($result);
}
?>
