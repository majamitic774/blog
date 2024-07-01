<?php include 'includes/header.php'; ?>
<h1 class="mb-4">Login</h1>
<?php if ($message) : ?>
    <div class="alert alert-danger"><?php echo $message; ?></div>
<?php endif; ?>
<form action="login.php" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<?php include 'includes/footer.php'; ?>