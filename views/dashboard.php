<?php include 'includes/header.php'; ?>
<h1 class="mb-4">Dashboard</h1>
<h2>Welcome, <?php echo htmlspecialchars($userDetails->username); ?></h2>

<h3>Your Blogs</h3>
<?php foreach ($userBlogs as $blog) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($blog->title); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($blog->content); ?></p>
            <form action="edit_blog.php" method="get" class="d-inline">
                <input type="hidden" name="blog_id" value="<?php echo $blog->id; ?>">
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            <form action="dashboard.php" method="post" class="d-inline">
                <input type="hidden" name="blog_id" value="<?php echo $blog->id; ?>">
                <button type="submit" name="delete_blog" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
<?php endforeach; ?>

<h3>Edit Your Account</h3>
<form action="dashboard.php" method="post">
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
<form action="dashboard.php" method="post" class="mt-3">
    <button type="submit" name="delete_user" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">Delete Account</button>
</form>
<?php include 'includes/footer.php'; ?>