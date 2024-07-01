<?php include 'includes/header.php'; ?>
<h1 class="mb-4">Dashboard</h1>
<h2>Welcome, <?php echo htmlspecialchars($userDetails->username); ?></h2>

<h3>Your Blogs</h3>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($userBlogs as $blog) : ?>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($blog->title); ?></h5>
                    <form action="edit_blog.php" method="get" class="d-inline">
                        <input type="hidden" name="blog_id" value="<?php echo $blog->id; ?>">
                        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                    </form>
                    <form action="dashboard.php" method="post" class="d-inline">
                        <input type="hidden" name="blog_id" value="<?php echo $blog->id; ?>">
                        <button type="submit" name="delete_blog" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<hr class="my-4">

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
    <button type="submit" name="edit_user" class="btn btn-primary">Update Account</button>
</form>
<form action="dashboard.php" method="post">
    <button type="submit" name="delete_user" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">Delete Account</button>
</form>
<?php include 'includes/footer.php'; ?>