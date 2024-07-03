<?php
session_start();
require_once 'core/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

redirectIfNotLoggedIn();

$userId = $_SESSION['user_id'];
$blog = new Blog();
$user = new User();

$userBlogs = $blog->getUserBlogs($userId);
$userDetails = $user->getUserById($userId);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_blog'])) {
        $blogId = $_POST['blog_id'];
        $blog->deleteBlog($blogId);
        header("Location: dashboard.php");
        exit();
    } elseif (isset($_POST['edit_user'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $user->updateUser($userId, $username, $email);
        header("Location: dashboard.php");
        exit();
    } elseif (isset($_POST['delete_user'])) {
        $user->deleteUser($userId);
        session_unset();
        session_destroy();
        header("Location: register.php");
        exit();
    }
}

$template = new Template('views/dashboard.php');
$template->set('userBlogs', $userBlogs);
$template->set('userDetails', $userDetails);
echo $template->render();
