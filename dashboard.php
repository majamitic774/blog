<?php
session_start();
require_once 'core/blog.php';
require_once 'core/user.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];
$blog = new Blog();
$user = new User();

$userBlogs = $blog->getUserBlogs($userId);
$userDetails = $user->getUserById($userId);
var_dump($userBlogs);
echo "<br>";
var_dump($userDetails);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_blog'])) {
        $blogId = $_POST['blog_id'];
        $blog->deleteBlog($blogId);
        header("Location: dashboard.php");
        exit();
    } elseif (isset($_POST['edit_user'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $user->updateUser($userId, $username, $email);
        header("Location: dashboard.php");
        exit();
    } elseif (isset($_POST['delete_user'])) {
        $user->deleteUser($userId);
        session_unset();
        session_destroy();
        header("Location: register.php");
        exit();
    }
}
?>

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
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($userDetails->username);
                                                                ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userDetails->email);
                                                            ?>" required><br><br>
        <input type="submit" name="edit_user" value="Update Account">
    </form>
    <form action="dashboard.php" method="post">
        <input type="submit" name="delete_user" value="Delete Account" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
    </form>
</body>

</html>