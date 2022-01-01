<?php
require 'config.php';
require 'models/Auth.php';

$login = filter_input(INPUT_POST, 'login');
$password = filter_input(INPUT_POST, 'password');

$auth = new Auth($pdo, $base);


if ($auth->validateLogin($login, $password)) { //
    //$profile = $auth->validateProfile($login);

    if ($profile == 'admin') {
        header("Location: " . $base);
        exit;
    }
    
    if ($profile == 'comum') {
        header("Location: " . $base . "/confirmacao.php");
        exit;
    }

    header("Location: " . $base);
    exit;
}

$_SESSION['flash'] = 'Login e/ou senha incorretos.';
header("Location: " . $base . "/login.php");
exit;
