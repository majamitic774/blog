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