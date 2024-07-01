<?php
session_start();
require_once 'core/autoload.php';

redirectIfNotSet('id', 'index.php');

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

$template = new Template('views/create_blog.php');
$template->set('message', $message);
echo $template->render();
