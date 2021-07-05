<!DOCTYPE html>
<html>
    <head>
        <title>Orders Page</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
        .small{
            max-width: 100px;
        }
    </style>
    
    </head>
    <body>
        <!-- menu section start -->
        <?php include_once("resources/assets/header.php")?>
        <!-- menu section end -->
        
        <?php 
            require_once("config/configPath.php");
            if(!isset($_SESSION['userName'])){
                $_SESSION['alert']="NotLogin";
                header("location:".SITEURL."loginPage.php");
            }else{}
        ?>

        <!-- main content section start -->
        <div class="container">
            <div class="wrapper">
            <h1 class="text-center">Current Order</h1>
            <br>
                <table id="orderTable" class="table table-striped table-bordered table-hover">
                    <tr class="table-dark">
                        <th>S.N</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                        <th></th>

                    <?php
                    $sum=0;
                    if (isset($_SESSION['pIndex'])){
                    $conn       = new  mysqli('localhost','root','','shopping3');
                    $sn=1;
                    for ($i = 0; $i <= $_SESSION['pIndex']; $i++) {
                        if(isset($_SESSION['order'][$i])){
                            
                        $productID=$_SESSION['order'][$i][0];
                        $sql1="select name,price from products where ID=$productID";
                        $result1=mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_array($result1);
                        $sum+=$row1[1]*$_SESSION['order'][$i][1];
                                ?>
                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    
                                    <td><?php echo $row1[0];?></td>
                                    <td><?php echo $row1[1];?></td>
                                    <form action="proccess/updateOrder.php" method="POST">
                                        <td>
                                            <input type="text" class="form-control small" value="<?php echo $_SESSION['order'][$i][1]?>" name="quantity">
                                            <input type="text" hidden value="<?php echo $i?>" name="pIndex">
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" type="submit" name=submit>Update</button>
                                        </td>
                                    </form>
                                    
                                    <td>
                                        <a href="deleteOrder.php?id=<?php echo $i?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php
                    }
                        }
                }else{
                    echo "<h3 class='text-warning'>Nothing Yet</h3>";
                }
                    ?>
                </table>
                <form action="proccess/purchase.php" method="POST">
                    <button class="btn btn-primary">Purchase</button>
                    <a href="orderHistory.php" class="btn btn-info">View History</a>
                    <h2 class="float-end">Total:
                        <?php
                            echo number_format($sum, 2);
                        ?>
                        đ
                    </h2>
                </form>
                
                </div>
        </div>

        <!-- main content section end -->

        <!-- footer section start -->
        <?php include_once("resources/assets/footer.php") ?>
        <!-- footer section end -->
    </body>
</html>

<?php
