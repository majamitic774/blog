<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <h1>Dashboard</h1>
    <h2>Welcome, <?php echo htmlspecialchars($userDetails->username); ?></h2>

    <h3>Your Blogs</h3>
    <?php foreach ($userBlogs as $blog) : ?>
        <div class="blog">
            <h4><?php echo htmlspecialchars($blog->title); ?></h4>
            <p><?php echo htmlspecialchars($blog->content); ?></p>
            <form action="edit_blog.php" method="get" style="display:inline;">
                <input type="hidden" name="blog_id" value="<?php echo $blog->id; ?>">
                <input type="submit" value="Edit">
            </form>
            <form action="dashboard.php" method="post" style="display:inline;">
                <input type="hidden" name="blog_id" value="<?php echo $blog->id; ?>">
                <input type="submit" name="delete_blog" value="Delete">
            </form>
        </div>
    <?php endforeach; ?>

    <h3>Edit Your Account</h3>
    <form action="dashboard.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($userDetails->username); ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userDetails->email); ?>" required><br><br>
        <input type="submit" name="edit_user" value="Update Account">
    </form>
    <form action="dashboard.php" method="post">
        <input type="submit" name="delete_user" value="Delete Account" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
    </form>
</body>

</html>