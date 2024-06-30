<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'core/autoload.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

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

?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Comment</title>
</head>

<body>
    <h1>Edit Comment</h1>
    <form action="edit_comment.php" method="post">
        <input type="hidden" name="comment_id" value="<?php echo $commentDetails->id; ?>">
        <input type="hidden" name="blog_id" value="<?php echo $blogId; ?>">
        <textarea name="content" required><?php echo htmlspecialchars($commentDetails->content); ?></textarea><br><br>
        <input type="submit" value="Update Comment">
    </form>
</body>

</html>