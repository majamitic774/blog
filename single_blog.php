<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'core/blog.php';
require_once 'core/comment.php';
require_once 'core/user.php';


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
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo htmlspecialchars($blogDetails->title); ?></title>
</head>

<body>
    <h1><?php echo htmlspecialchars($blogDetails->title); ?></h1>
    <p><?php echo htmlspecialchars($blogDetails->content); ?></p>
    <p>Posted by <?php echo htmlspecialchars($username); ?> on <?php echo $blogDetails->created_at; ?></p>

    <h2>Comments</h2>
    <?php foreach ($comments as $comment) : ?>
        <div class="comment">
            <p><?php echo htmlspecialchars($comment->content); ?></p>
            <p>Posted by <?php echo htmlspecialchars($comment->username); ?> on <?php echo $comment->created_at; ?></p>
            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $comment->user_id) : ?>
                <form action="edit_comment.php" method="get" style="display:inline;">
                    <input type="hidden" name="comment_id" value="<?php echo $comment->id; ?>">
                    <input type="hidden" name="blog_id" value="<?php echo $blogId; ?>">
                    <input type="submit" value="Edit">
                </form>
                <form action="delete_comment.php" method="post" style="display:inline;">
                    <input type="hidden" name="comment_id" value="<?php echo $comment->id; ?>">
                    <input type="hidden" name="blog_id" value="<?php echo $blogId; ?>">
                    <input type="submit" value="Delete">
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <?php if (isset($_SESSION['user_id'])) : ?>
        <h3>Leave a Comment</h3>
        <form action="single_blog.php?id=<?php echo $blogId; ?>" method="post">
            <textarea name="content" required></textarea><br><br>
            <input type="submit" value="Submit Comment">
        </form>
    <?php else : ?>
        <p>You must be logged in to leave a comment.</p>
    <?php endif; ?>
</body>

</html>