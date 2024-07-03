<?php
include 'includes/header.php';
?>

<div class="hero mb-5">
    <div class="container hero-content text-center">
        <h1 class="display-4 w-100">Share your ideas with the world</h1>
        <p class="lead">Make an account and start writing your blog in just few minutes!</p>
    </div>
</div>

<div class="input-group mb-3 w-50 mx-auto">
    <input type="search" class="form-control" aria-label="Search" aria-describedby="button-search" id="search-input">
    <div class="input-group-append">
        <button class="btn btn-outline-dark" type="button" id="button-search" style="border-color: blue;">Search</button>
    </div>
</div>

<div class="container" id="blogs-container">
    <div class="row">
        <?php foreach ($blogs as $blog) : ?>
            <div class="col-md-6 mb-4 blog-entry">
                <div class="card shadow-sm rounded">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="single_blog.php?id=<?php echo $blog->id; ?>" class="text-decoration-none text-dark blog-title">
                                <?php echo htmlspecialchars($blog->title); ?>
                            </a>
                        </h5>
                        <p class="card-text">Posted by <?php echo htmlspecialchars($blog->username); ?> on <?php echo $blog->created_at; ?></p>
                        <p class="card-text"><?php echo htmlspecialchars(substr($blog->content, 0, 100)); ?>...</p>
                    </div>
                    <div class="card-footer bg-white text-right">
                        <a href="single_blog.php?id=<?php echo $blog->id; ?>" class="btn read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
include 'includes/footer.php';
?>

<script>
    document.getElementById('search-input').addEventListener('input', function(e) {
        let searchInputText = e.target.value.toLowerCase();
        let blogEntries = document.querySelectorAll('.blog-entry');

        blogEntries.forEach(function(entry) {
            let title = entry.querySelector('.blog-title').textContent.toLowerCase();
            if (title.includes(searchInputText)) {
                entry.style.display = '';
            } else {
                entry.style.display = 'none';
            }
        });
    });
</script>