<?php include 'includes/header.php'; ?>

<div class="jumbotron jumbotron-fluid" style="background-color: #1a5aaa; color: white; margin-bottom: 0;">
    <div class="container text-center">
        <h1 class="display-4 w-100">Welcome to Maja's Blog</h1>
        <p class="lead">Explore and share your thoughts with the world</p>


    </div>
</div>

<!-- Search Bar -->
<div class="input-group mb-3 w-75 mx-auto">
    <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-search" id="search-input">
    <div class="input-group-append">
        <button class="btn btn-outline-dark" type="button" id="button-search" style="border-color: blue;">Search</button>
    </div>
</div>
<!-- End of Search Bar -->
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
                        <a href="single_blog.php?id=<?php echo $blog->id; ?>" class="btn btn-primary" style="background-color: #1a5aaa; border-color: #1a5aaa;">Read More</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

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