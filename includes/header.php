<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Simple Blog'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg container">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="index.php">Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php">Home</a>
                        </li>
                        <?php if (isset($_SESSION['user_id'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="create_blog.php">Create Post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="logout.php">Logout</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="register.php">Register</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>