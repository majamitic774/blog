<?php
session_start();
require_once 'core/autoload.php';

$blog = new Blog();
$blogs = $blog->getAllBlogs();

$template = new Template('views/index.php');
$template->set('blogs', $blogs);
$template->set('username', $_SESSION['username'] ?? "");
echo $template->render();
