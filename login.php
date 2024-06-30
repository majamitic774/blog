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
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <h1>Login</h1>
    <?php if ($message) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>