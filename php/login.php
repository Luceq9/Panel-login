<?php
session_start();
require_once 'db.php';

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login($email, $password) {
        try {
            $stmt = $this->db->prepare('SELECT id, password FROM users WHERE email = :email');
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                return true;
            } else {
                return false;
            }
        } catch(PDOException $e) {
            throw new Exception('Błąd podczas logowania: ' . $e->getMessage());
        }
    }
}

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $database = $db->getConnection();

    $user = new User($database);

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Nieprawidłowy format email.']);
        exit;
    }

    if (strlen($password) < 8) {
        echo json_encode(['success' => false, 'message' => 'Hasło musi mieć minimum 8 znaków.']);
        exit;
    }

    try {
        if ($user->login($email, $password)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Nieprawidłowy email lub hasło.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
?>
