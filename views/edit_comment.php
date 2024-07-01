<?php include 'includes/header.php'; ?>
<h1 class="mb-4">Edit Comment</h1>
<form action="edit_comment.php" method="post">
    <input type="hidden" name="comment_id" value="<?php echo $commentDetails->id; ?>">
    <input type="hidden" name="blog_id" value="<?php echo $blogId; ?>">
    <div class="mb-3">
        <label for="content" class="form-label">Content:</label>
        <textarea class="form-control" id="content" name="content" rows="5" required><?php echo htmlspecialchars($commentDetails->content); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Comment</button>
</form>
<?php include 'includes/footer.php'; ?>