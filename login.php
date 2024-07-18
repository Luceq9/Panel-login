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
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="container">
        <h1>Logowanie</h1>
        <form id="loginForm">
            <input type="email" id="email" name="email" placeholder="E-mail" required>
            <input type="password" id="password" name="password" placeholder="Hasło" required>
            <button type="button" id="loginBtn">Zaloguj się</button>
        </form>
        <div class="forgot__password"><a href="#">Zapomniałeś hasła?</a></div>
        <div id="errorMessage"></div>
        <p class="lub__paragraph">LUB</p>
        <div class="link-container"><a href="./register.php">Zarejestruj się</a></div>
        <div class="link-container"><a href="./index.php">Przejdź do strony głównej</a></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/login.js"></script>
</body>
</html>
