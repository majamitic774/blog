<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'core/autoload.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$blog = new Blog();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blogId = $_POST['blog_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $blog->updateBlog($blogId, $title, $content);
    header("Location: dashboard.php");
    exit();
} elseif (isset($_GET['blog_id'])) {
    $blogId = $_GET['blog_id'];
    $blogDetails = $blog->getBlogById($blogId);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Blog Post</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <h1>Edit Blog Post</h1>
    <form action="edit_blog.php" method="post">
        <input type="hidden" name="blog_id" value="<?php echo $blogDetails->id; ?>">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($blogDetails->title); ?>" required><br><br>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required><?php echo htmlspecialchars($blogDetails->content); ?></textarea><br><br>
        <input type="submit" value="Update Post">
    </form>
</body>

</html>