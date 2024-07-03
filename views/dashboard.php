<?php
include 'includes/header.php';
?>

<div class="jumbotron jumbotron-fluid mt-5">
    <div class="container text-center">
        <h1 class="display-4">Your Blogs</h1>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">
                <?php foreach ($userBlogs as $blog) : ?>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm rounded">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="single_blog.php?id=<?php echo $blog->id; ?>" class="text-decoration-none text-dark">
                                        <?php echo htmlspecialchars($blog->title); ?>
                                    </a>
                                </h5>
                                <p class="card-text">Posted by <?php echo htmlspecialchars($userDetails->username); ?> on <?php echo $blog->created_at; ?></p>
                                <p class="card-text"><?php echo htmlspecialchars(substr($blog->content, 0, 100)); ?>...</p>
                            </div>
                            <div class="card-footer bg-white text-right">
                                <form action="edit_blog.php" method="get" class="d-inline">
                                    <input type="hidden" name="blog_id" value="<?php echo $blog->id; ?>">
                                    <button type="submit" class="btn read-more-btn">Edit</button>
                                </form>
                                <form action="dashboard.php" method="post" class="d-inline">
                                    <input type="hidden" name="blog_id" value="<?php echo $blog->id; ?>">
                                    <button type="submit" name="delete_blog" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <hr class="my-4">

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3>Edit Your Account</h3>
                    <form action="dashboard.php" method="post" class="mb-4">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($userDetails->username); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($userDetails->email); ?>" required>
                        </div>
                        <div>
                            <button type="submit" name="edit_user" class="btn read-more-btn">Update Account</button>
                            <button type="submit" name="delete_user" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">Delete Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>