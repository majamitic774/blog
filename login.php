<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'core/autoload.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();
    $loggedInUser = $user->login($username, $password);
    if ($loggedInUser) {
        $_SESSION['user_id'] = $loggedInUser->id;
        $_SESSION['username'] = $loggedInUser->username;
        header("Location: index.php");
        exit();
    } else {
        $message = "Invalid username or password.";
    }
}

$template = new Template('views/login.php');
$template->set('message', $message);
echo $template->render();
