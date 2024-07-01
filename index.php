<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'core/autoload.php';

$blog = new Blog();
$blogs = $blog->getAllBlogs();

$template = new Template('views/index.php');
$template->set('blogs', $blogs);
$template->set('username', $_SESSION['username'] ?? "");
echo $template->render();
?>
















<!-- <?php
        // session_start();
        // error_reporting(E_ALL);
        // ini_set('display_errors', 1);
        // require_once 'core/autoload.php';

        // $blog = new Blog();
        // $blogs = $blog->getAllBlogs();

        // echo $_SESSION['username'];
        // 
        ?>

<!DOCTYPE html>
<html>

<head>
    <title>Simple Blog</title>
</head>

<body>
    <h1>Simple Blog</h1>
    <?php // foreach ($blogs as $blog) : 
    ?> 
        <div class='blog'>
            <a href="single_blog.php?id=<?php //echo $blog->id; 
                                        ?>"><?php //echo htmlspecialchars($blog->title); 
                                            ?></a>
            <p>Posted by <?php //echo htmlspecialchars($blog->username); 
                            ?> on <?php //echo $blog->created_at; 
                                    ?></p>
        </div>
    <?php // endforeach; 
    ?>
</body>

</html> -->