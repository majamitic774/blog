<?php
session_start();
require_once 'core/blog.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $userId = $_SESSION['user_id'];

    $blog = new Blog();
    if ($blog->createBlog($userId, $title, $content)) {
        $message = "Blog post created successfully.";
    } else {
        $message = "Failed to create blog post. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Blog Post</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <h1>Create Blog Post</h1>
    <?php if ($message) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="create_blog.php" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea><br><br>
        <input type="submit" value="Create Post">
    </form>
</body>

</html>