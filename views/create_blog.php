<?php include 'includes/header.php'; ?>
<div class="jumbotron jumbotron-fluid" style="background-color: #1a5aaa; color: white; margin-bottom: 0;">
    <div class="container text-center">
        <h1 class="display-4">Create Blog Post</h1>
    </div>
</div>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
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
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" style="background-color: #1a5aaa; border-color: #1a5aaa; width: 150px;">Create Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>