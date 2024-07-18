<!-- Author: Lucjan Jaroszewski
@mail: lucjanjaroszewski@gmail.com -->
<?php
session_start();
require_once 'php/db.php';
$db = new Database();
$database = $db->getConnection(); 
if (isset($_SESSION['user_id'])) {
    $stmt = $database->prepare("SELECT email FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="loginuser__container">
            <p>Witaj,</p>
            <p>Twój email to: <?= htmlspecialchars($user['email']) ?></p>
            <p>Twoje ID to: <?= $_SESSION['user_id'] ?></p>
            <button onclick="window.location.href='php/logout.php'">Wyloguj się</button>
        </div>
    <?php else: ?>
        <div class="home__buttons">
            <button onclick="window.location.href='login.php'">Login</button>
            <button onclick="window.location.href='register.php'">Register</button>
        </div>
    <?php endif; ?>
</body>
</html>
