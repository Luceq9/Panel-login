<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
    <div class="container">
        <h1>Rejestracja</h1>
        <form id="registerForm">
            <input type="email" id="email" name="email" placeholder="E-mail" required>
            <input type="password" id="password" name="password" placeholder="Hasło" required>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Potwierdź hasło:" required>
            <button type="button" id="registerBtn">Kontynuuj</button>
        </form>
        <div id="errorMessage"></div>
        <p>Już zarejstrowany? </p>
        <div class="link-container"><a href="./login.php">Zaloguj się</a></div>
        <div class="link-container"><a href="./index.php">Przejdź do strony głównej</a></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/register.js"></script>
</body>
</html>
