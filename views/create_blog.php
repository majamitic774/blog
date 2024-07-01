<?php include 'includes/header.php'; ?>
<h1 class="mb-4">Create Blog Post</h1>
<?php if ($message) : ?>
    <div class="alert alert-info"><?php echo $message; ?></div>
<?php endif; ?>
<form action="create_blog.php" method="post">
    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content:</label>
        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create Post</button>
</form>
<?php include 'includes/footer.php'; ?>