<!DOCTYPE html>
<html>

<head>
    <title>Simple Blog</title>
</head>

<body>
    <h1>Simple Blog</h1>
    <?php foreach ($blogs as $blog) : ?>
        <div class='blog'>
            <a href="single_blog.php?id=<?php echo $blog->id; ?>"><?php echo htmlspecialchars($blog->title); ?></a>
            <p>Posted by <?php echo htmlspecialchars($blog->username); ?> on <?php echo $blog->created_at; ?></p>
        </div>
    <?php endforeach; ?>
</body>

</html>