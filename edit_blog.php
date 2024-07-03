<?php
session_start();
require_once 'core/autoload.php';

redirectIfNotLoggedIn();

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

$template = new Template('views/edit_blog.php');
$template->set('blogDetails', $blogDetails);
echo $template->render();
