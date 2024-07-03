<?php
include 'includes/header.php';
?>

<div class="jumbotron jumbotron-fluid mt-5">
    <div class="container text-center">
        <h1 class="display-4">Register</h1>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
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
                <div class="text-center">
                    <button type="submit" class="btn read-more-btn">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>