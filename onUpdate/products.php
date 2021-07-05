
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

    <?php include_once("resources/assets/header.php") ?>
    <div class="container-fluid">
    <?php include_once("resources/assets/alert.php")?>
        <!-- form section start -->
        <br>
        <div class="container-sm">
            <form class="input-group" method="POST" action="productProcess.php">
                <?php
                if (isset($_GET['cate'])) {
                    $cate = $_GET['cate'];
                ?>
                    <input name="cate" id="cate" hidden value="<?php echo $cate ?>" />
                <?php
                }
                ?>
                <input name="searchText" type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="searchText" />

                <!-- <a class="btn-search" href="productProcess.php?" type="submit" name="submit">Search</a> -->
                <input type="submit" class="btn btn-outline-success" value="Search">
            </form>
        </div>
        <!-- form section end -->
        <!-- product display -->
        <br>

        <h5 class="text-center" id="textChange">Products</h5>

        <div id="result" class="bg-light p-5 rounded-lg m-3">
            <?php
            $conn =new mysqli("localhost","root","","shopping3");
            require_once("./resources/process/dbhelper.php");
            if (isset($_GET['searchText']) and isset($_GET['cate'])) {
                $searchText = $_GET['searchText'];
                $sql = "select * from products where name like '%$searchText%' and category like '%$cate%' limit 24;";
            } else if (isset($_GET['searchText']) and !isset($_GET['cate'])) {
                $searchText = $_GET['searchText'];
                $sql = "select * from products where name like '%$searchText%' limit 24;";
            } else if (!isset($_GET['searchText']) and isset($_GET['cate'])) {
                $sql = "select * from products where category like '%$cate%' limit 24;";
            } else {
                $sql = "select * from products limit 24";
            }
            $result = $conn->query($sql);
            $rowNum = mysqli_num_rows($result);
            if ($rowNum == 0) {
                echo "None";
            } else if ($rowNum > 3) {
                $i = 0;
                $ar = array();
                while ($row = $result->fetch_assoc()) {
                    array_push($ar, $row);
                    $i++;
                    if ($i < 4) continue;
                    else {
                        $i = 0;
                    }
            ?>
                    <div class="row">
                        <?php
                        foreach ($ar as $product) {
                        ?>
                            <div class="col-sm">
                                <div class="card text-center" style="width: 18rem;">

                                    <img id="productImage" src="<?= $product['img']; ?>" class="card-img-top" onerror=standby()>
                                    <form class="card-body" action="./proccess/addToCart1.php" method="POST">
                                        <h6 class="card-title"><?= $product['name']; ?></h6>
                                        <h4 class="card-title">Price:<?= number_format($product['price']); ?></h4>
                                        <p class="card-text">
                                            Optional Describe1: <br>
                                            Optional Describe2: <br>
                                            Optional Describe3: <br>
                                        </p>
                                        <!-- <a href="addToCart.php" class="btn btn-success btn-block">Add to cart</a> -->
                                        <input type="text" hidden id="hiddenID" name="hiddenID" value="<?= $product['ID']; ?>">
                                        <input type="text" hidden id="hiddenName" name="hiddenName" value="<?= $product['name']; ?>">
                                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="How Many">
                                        <br>
                                        <input type="submit" class="btn btn-success" name="submit" value="Add to cart">
                                    </form>
                                </div>
                            </div>
                        <?php }
                        unset($ar);
                        if (!isset($ar)) {
                            $ar = array();
                        }
                        ?>
                    </div>
                    <br>
                <?php
                }
            } else {
                ?>
                <div class="row">
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="col-sm">
                            <div class="card text-center" style="width: 18rem;">
                                <img id="productImage" src="<?= $row['img']; ?>" class="card-img-top" alt="Image Error">
                                <form class="card-body" action="./proccess/addToCart1.php" method="POST">
                                    <h6 class="card-title"><?= $row['name']; ?></h6>
                                    <h4 class="card-title">Price:<?= number_format($row['price']); ?></h4>
                                    <p class="card-text">
                                        Optional Describe1: <br>
                                        Optional Describe2: <br>
                                        Optional Describe3: <br>
                                    </p>
                                    <!-- <a href="addToCart.php" class="btn btn-success btn-block">Add to cart</a> -->
                                    <input type="text" hidden id="hiddenID" name="hiddenID" value="<?= $row['ID']; ?>">
                                    <input type="text" hidden id="hiddenName" name="hiddenName" value="<?= $row['name']; ?>">
                                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="How Many">
                                    <br>
                                    <input type="submit" class="btn btn-success" name="submit" value="Add to cart">
                                </form>
                            </div>
                        </div>
                <?php }
                }
                ?>
                </div>
        </div>
    </div>
    

    <div class="clearfix"></div>
    <!-- footer section start -->
    <?php include_once("resources/assets/footer.php") ?>
    <!-- footer section end -->

</body>

</html>