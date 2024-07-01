<?php
require_once 'core/autoload.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $user = new User();
    if ($user->register($username, $password, $email)) {
        $message = "Registration successful. You can now <a href='login.php'>login</a>.";
    } else {
        $message = "Registration failed. Please try again.";
    }
}

$template = new Template('views/register.php');
$template->set('message', $message);
echo $template->render();
