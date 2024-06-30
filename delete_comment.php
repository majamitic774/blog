<?php
session_start();
require_once 'core/comment.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$comment = new Comment();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $commentId = $_POST['comment_id'];
    $blogId = $_POST['blog_id'];
    $comment->deleteComment($commentId);
    header("Location: single_blog.php?id=$blogId");
    exit();
}
