<!DOCTYPE html>
<html>

<head>
    <title>Product Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendors/css/grid.css">
    <link rel="stylesheet" href="./resources/css/index.css"> -->
</head>

<body>
    <!-- navbar section start -->
    <?php include_once("resources/assets/header.php") ?>
    <!-- navbar section end -->
    <br><br>
    <h3 class="text-center">About Us</h3>
    <br>
    <div class="container">
        <div class="bg-light p-5 rounded-lg m-3">
            <!-- author start-->
            <h4 class="text-center text-primary text-uppercase">
                This page created by
            </h4>
            <br>
            <br>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="card  " style="width: 20rem;">
                        <img src="./resources/img/IMG_20180325_165528.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Đoàn Văn Hậu</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="https://github.com/DoanVanHau20184093" class="btn btn-primary">My Github</a>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 20rem;">
                        <img src="./resources/img/IMG_20180325_165528.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="https://github.com/DoanVanHau20184093" class="btn btn-primary">My Github</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- author end-->
            <br><br><br>
            <!-- information start -->
            <div class="container text-center">
                <h4 class="text-center text-primary text-uppercase">
                    This page' purpose
                </h4>
                <p class="lead">
                    This page is only for study purpose, any information is copy from ...
                </p>
            </div>
            <!-- information end -->
        </div>
    </div>

    <!-- footer section start -->
    <div class="clearfix"></div>
    <?php include_once("resources/assets/footer.php") ?>
    <!-- footer section end -->

</body>

</html>