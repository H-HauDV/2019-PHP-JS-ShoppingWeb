<!DOCTYPE html>
<html>
    <head>
        <title>Categories Page</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- menu section start -->
        <?php include_once("resources/assets/header.php")?>
        <!-- menu section end -->

        <!-- main content section start -->
        <div class="container">
            <div id="result" class="bg-light p-5 rounded-lg m-3">
                <h1>Category</h1>
                <?php
                $conn= new  mysqli('localhost', 'root', '', 'shopping3');
                $sql = "select distinct(category) from products";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    if ($result == False) {
                        echo "Failed";
                    } else {
                        $i=0;
                        $ar=array();
                        while ($row = mysqli_fetch_array($result)) {
                            array_push($ar,$row); 
                            $i++;
                            if($i<4) continue;
                            else{
                                $i=0;
                            }
                            ?>
                            <div class="row">
                            <?php
                            foreach($ar as $product)  {
                                ?>
                                <a href="products.php?cate=<?php echo $product['category']?>" class="col">
                                <?php echo $product['category']?>
                                </a>

                                 <?php
                                 }
                            ?>
                            </div>
                            <?php
                            unset($ar);
                            if(!isset($ar)){
                                $ar=array();  
                            }
                        }
                    }
                    ?>
                
            </div>
        </div>







        <!-- main content section end -->

        <!-- footer section start -->
        <?php include_once("resources/assets/footer.php") ?>
        <!-- footer section end -->
    </body>
</html>