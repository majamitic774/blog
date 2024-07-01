<?php include 'includes/header.php'; ?>
<h1 class="mb-4">Simple Blog</h1>
<div class="row">
    <?php foreach ($blogs as $blog) : ?>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="single_blog.php?id=<?php echo $blog->id; ?>" class="text-decoration-none">
                            <?php echo htmlspecialchars($blog->title); ?>
                        </a>
                    </h5>
                    <p class="card-text">Posted by <?php echo htmlspecialchars($blog->username); ?> on <?php echo $blog->created_at; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php include 'includes/footer.php'; ?>