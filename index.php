<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheet/index.css">
    <link rel="stylesheet" href="./stylesheet/loader.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Ambica Fashion</title>

</head>

<body>
    
<?php
    include './components/loader.php';
    include './components/navbar.php';
?>




    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <!-- The slideshow -->


        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/26.jpg" alt="Los Angeles" width="100%" height="100%">
                <div class="carousel-caption d-none d-md-block bgindex.php-dark .text-light">
                    <h2>Ambica Fashion</h2>
                    <p>Here you can choose your favorite <i>Sports cloth</i> as well as <i>Regular cloths</i> were.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="images/29.jpg" alt="Chicago" width="100%" height="100%">
            </div>
            <div class="carousel-item">
                <img src="images/32.jpg" alt="New York" width="100%" height="100%">
            </div>cont_index
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <!--carousel end -->

    <!--category start -->
    <section class="my-5">
        <div class="py-5">
            <h2 class="text-center">Select Categories</h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                    <div class="card">
                        <a href="page.php?pid=shop&g=male">
                            <img class="card-img-top" src="images/25.jpg" alt="Product image">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">Male</h4>

                            <a href="page.php?pid=shop&g=male" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                    <div class="card">
                        <a href="page.php?pid=shop&g=female">
                            <img class="card-img-top" src="images/22.jpg" alt="Product image">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">Female</h4>

                            <a href="page.php?pid=shop&g=female" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                    <div class="card">
                        <a href="page.php?pid=shop&g=kid">
                            <img class="card-img-top" src="images/24.jpg" alt="Product image">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">Kids</h4>

                            <a href="#" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--category start end -->

    <!--image section start-->

    <!--image section end-->
    <?php
    include './components/footer.php';
    ?>

    



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
</body>

</html>