<?php
include 'includes/header.php';
?>

<div class="container">
    <div class="card mb-4 mt-5">
        <div class="card-body">
            <h1 class="card-title"><?php echo htmlspecialchars($blogDetails->title); ?></h1>
            <p class="card-text"><?php echo htmlspecialchars($blogDetails->content); ?></p>
            <p class="card-text"><small class="text-muted">Posted by <?php echo htmlspecialchars($username); ?> on <?php echo $blogDetails->created_at; ?></small></p>
        </div>
    </div>

    <h6 class="mb-3">COMMENTS:</h6>
    <?php foreach ($comments as $comment) : ?>
        <div class="card mb-3 w-25">
            <div class="card-body">
                <p class="card-text"><?php echo htmlspecialchars($comment->content); ?></p>
                <p class="card-text text-muted">Posted by <?php echo htmlspecialchars($comment->username); ?> on <?php echo $comment->created_at; ?></p>
                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $comment->user_id) : ?>
                    <form action="edit_comment.php" method="get" class="d-inline">
                        <input type="hidden" name="comment_id" value="<?php echo $comment->id; ?>">
                        <input type="hidden" name="blog_id" value="<?php echo $blogId; ?>">
                        <button type="submit" class="btn read-more-btn">Edit</button>
                    </form>
                    <form action="delete_comment.php" method="post" class="d-inline">
                        <input type="hidden" name="comment_id" value="<?php echo $comment->id; ?>">
                        <input type="hidden" name="blog_id" value="<?php echo $blogId; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <?php if (isset($_SESSION['user_id'])) : ?>
        <h3 class="mb-3">Leave a Comment</h3>
        <form action="single_blog.php?id=<?php echo $blogId; ?>" method="post">
            <div class="mb-3 w-25">
                <textarea class="form-control" name="content" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn read-more-btn">Submit Comment</button>
        </form>
    <?php else : ?>
        <p>You must be logged in to leave a comment.</p>
    <?php endif; ?>
</div>

<?php
include 'includes/footer.php';
?>