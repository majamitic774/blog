<?php include 'includes/header.php'; ?>
<h1 class="mb-4">Edit Blog Post</h1>
<form action="edit_blog.php" method="post">
    <input type="hidden" name="blog_id" value="<?php echo $blogDetails->id; ?>">
    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($blogDetails->title); ?>" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content:</label>
        <textarea class="form-control" id="content" name="content" rows="5" required><?php echo htmlspecialchars($blogDetails->content); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Post</button>
</form>
<?php include 'includes/footer.php'; ?>