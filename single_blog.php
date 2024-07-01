<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'core/autoload.php';

$blog = new Blog();
$comment = new Comment();

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$blogId = $_GET['id'];
$blogDetails = $blog->getBlogById($blogId);
$user = new User();
$username = $user->getUserById($blogDetails->user_id)->username;
$comments = $comment->getComments($blogId);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $content = $_POST['content'];
    $userId = $_SESSION['user_id'];
    $comment->createComment($userId, $blogId, $content);
    header("Location: single_blog.php?id=$blogId");
    exit();
}

$template = new Template('views/single_blog.php');
$template->set('blogDetails', $blogDetails);
$template->set('username', $username);
$template->set('comments', $comments);
$template->set('blogId', $blogId);
echo $template->render();
