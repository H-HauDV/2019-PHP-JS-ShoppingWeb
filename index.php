<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
        .carousel {
            width: 420px;
        }
    </style>

</head>

<body>
    <!-- menu section start -->
    <?php include_once("resources/assets/header.php") ?>
    <!-- menu section end -->
    <!-- main content section start -->
    <div class="container">
        <?php include_once("resources/assets/alert.php")?>
        <!-- promoted product start -->
        <h3 class="text-center">Promoted Product</h3>
        <br>
        <div class="row">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class=" col-sm carousel-item active" data-bs-interval="2000">
                        <img src="https://cdn.tgdd.vn/Products/Images/7622/85489/bhx/banh-choco-p-n-nhan-kem-dau-264g-12-cai-201903151056599678.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="https://cdn.tgdd.vn/Products/Images/7622/85402/bhx/banh-bong-lan-choco-p-n-2-org.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="https://cdn.tgdd.vn/Products/Images/2491/145933/bhx/bcdr-p-s-muoi-da-himalaya-3-org.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class=" col-sm carousel-inner">
                    <div class="carousel-item active" data-bs-interval="2000">
                        <img src="https://cdn.tgdd.vn/Products/Images/3027/233293/bhx/ban-chai-cho-be-tu-4-tuoi-splat-202101091705136241.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="https://cdn.tgdd.vn/Products/Images/4085/194045/bhx/thung-18-goi-banh-da-cua-rieu-cua-vifon-hoang-gia-120g-201911261618001464.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="https://cdn.tgdd.vn/Products/Images/2516/185799/bhx/bang-ve-sinh-elis-fairy-wings-sieu-tham-chong-tran-co-canh-16-mieng-2019120" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
            <div id="col-sm carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="2000">
                        <img src="https://cdn.tgdd.vn/Products/Images/2402/89315/bhx/noi-inox-201-5-day-sunhouse-shg24220-20cm-202007200926480975.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="https://cdn.tgdd.vn/Products/Images/2808/210398/bhx/bot-canh-bo-sung-i-ot-sosalco-goi-200g-201909071440200736.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="https://cdn.tgdd.vn/Products/Images/2963/174711/bhx/bun-hang-nga-bun-bo-hue-75g-thung-30-3-org.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <!-- promoted product end -->
        <!-- comment section start -->
        <ul class="list-group">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">A fourth item</li>
            <li class="list-group-item">And a fifth one</li>
        </ul>
        <!-- comment section end -->
    </div>
    <!-- main content section end -->

    <!-- footer section start -->
    <?php include_once("resources/assets/footer.php") ?>
    <!-- footer section end -->
</body>

</html>