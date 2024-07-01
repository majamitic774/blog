<?php include 'includes/header.php'; ?>
<h1 class="mb-4">Register</h1>
<?php if ($message) : ?>
    <div class="alert alert-info"><?php echo $message; ?></div>
<?php endif; ?>
<form action="register.php" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
<?php include 'includes/footer.php'; ?>