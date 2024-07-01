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