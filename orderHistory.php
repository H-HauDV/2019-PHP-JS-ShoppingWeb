<!DOCTYPE html>
<html>

<head>
    <title>Orders Page</title>
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
        <div class="wrapper">
        <h1 class="text-center">Order History</h1>
            <br>
            <?php
            $conn = new  mysqli('localhost', 'root', '', 'shopping3');
            $sql = "select distinct(o.orderID) from orders o,users u
                            where u.ID=o.userID and u.userName='$userName'";
            $result = mysqli_query($conn, $sql);
            if ($result == False) {
                echo "Failed";
            } else {
                $arr = array();
                while ($row = mysqli_fetch_array($result)) {
                    $arr[] = $row['orderID'];
                }
            }
            $orderNum = 1;
            foreach ($arr as $value) {
                //echo $value;
            ?>
                <table class="table table-striped table-bordered table-hover">
                    <tr class="table-dark">
                        <th class="">Order #<?php echo $orderNum++; ?></th>
                        <th>S.N</th>
                        <th class="">Product Name</th>
                        <th class="">Quantity</th>
                        <th class="">Price</th>
                    </tr>
                    <?php
                    $sum = 0;
                    $conn       = new  mysqli('localhost', 'root', '', 'shopping3');
                    $sql = "select o.orderID,p.name,od.quantity,p.price from order_detail od,orders o,users u,products p
                              where od.orderID=o.orderID and u.ID=o.userID 
                              and p.ID=od.productID
                              and u.userName='$userName' and o.orderID='$value'";
                    $result = mysqli_query($conn, $sql);
                    //get status of order
                    $sql1 = "select max(status) from orders where orderID='$value'";
                    $result1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_array($result1);
                    $status = $row1[0];

                    if ($result == False) {
                        echo "Failed";
                    } else {
                        $sn = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['orderID'];
                            $productName = $row['name'];
                            $quantity = $row['quantity'];
                            $price = $row['price'];
                            $sum += $quantity * $price;
                    ?>
                            <tr>
                                <td ><?php echo ""; ?></td>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $productName; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td><?php echo $price; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total:
                                <?php echo  number_format($sum, 2); ?>
                                đ
                            </td>
                            <td>
                                <?php
                                if ($status == 0) echo "<font color='red'>Not delivered";
                                else echo "<font color='green'>Delivered";
                                ?>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </table>
            <?php
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

}