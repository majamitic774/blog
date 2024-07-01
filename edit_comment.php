<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'core/autoload.php';

redirectIfNotSet('id', 'index.php');

$comment = new Comment();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $commentId = $_POST['comment_id'];
    $content = $_POST['content'];
    $blogId = $_POST['blog_id'];
    $comment->updateComment($commentId, $content);
    header("Location: single_blog.php?id=$blogId");
    exit();
} elseif (isset($_GET['comment_id'])) {
    $commentId = $_GET['comment_id'];
    $blogId = $_GET['blog_id'];
    $commentDetails = $comment->getCommentById($commentId);
}

$template = new Template('views/edit_comment.php');
$template->set('commentDetails', $commentDetails);
$template->set('blogId', $blogId);
echo $template->render();
