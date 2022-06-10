<?php 
include("./includes/header.php") ;
$blogs = getBlogs($page, $search);
?>;

<body>
    <!-- product-detail content -->
    <div class="bg-main">
        <div class="container">
            <div class="box">
                <div class="breadcumb">
                    <a href="./index.php">home</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="./blog.php">all blog</a>
                </div>
            </div>
            
            <div class="box">
                <div class="box-header">
                    Blog for you
                </div>
                <?php
                    foreach($blogs as $blog) { 
                ?>
                    <div class="blog-page">
                        <div class="blog-img-page">
                            <img src="./images/<?= $blog['img'] ?>" alt="">
                        </div>
                        <div class="blog-info-page">
                            <div class="blog-title-page">
                                <?= $blog['title'] ?>
                            </div>
                            <div class="blog-preview-page">
                                <?= $blog['small_content'] ?>
                            </div>
                            <button class="btn-flat btn-hover btn-read-page">read more</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="box">
                <ul class="pagination">
                    <li><a href="#"><i class='bx bxs-chevron-left'></i></a></li>
                    <li><a href="?search=&page=1" class="active">1</a></li>
                    <li><a href="?search=&page=2">2</a></li>
                    <li><a href="?search=&page=3">3</a></li>
                    <li><a href="?search=&page=4">4</a></li>
                    <li><a href="?search=&page=5">5</a></li>
                    <li><a href="#"><i class='bx bxs-chevron-right'></i></a></li>
                </ul>
            </div>
            <div class="box">
                <div class="box-header">
                    related blog
                </div>
                <div class="row" id="related-products"></div>
            </div>
        </div>
    </div>
    <!-- end product-detail content -->
    <?php include("./includes/footer.php") ?>
    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/index.js"></script>
</body>

</html>