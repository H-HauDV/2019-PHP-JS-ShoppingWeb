<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <!-- menu section start -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Admin</a></li>
                    <li><a href="categories.php">Categories</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="orders.php">Orders</a></li>
                </ul>
            </div>
        </div>
        <!-- menu section end -->

        <!-- main content section start -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Edit Admin</h1>
                <br><br>

                <?php
                    require_once("./resources/process/dbhelper.php");
                    $id=$_GET['id'];
                    $sql="select * from admins where adminID='$id'";

                    $result=executeResult($sql);

                    foreach($result as $std)
                    {
                        $userName=$std['adminUserName'];
                        $email=$std['adminEmail'];
                    };
                ?>
                <form action="" method="POST"></form>

                    <table class="tbl-30">
                        <tr>
                            <td>User Name</td>
                            <td>
                                <input type="text" name="userName" value="<?php echo $userName?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="email" name="email" value="<?php echo $email?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input hidden name="ID" value="<?php echo $ID?>">
                                <input class="btn-secondary" type="submit" name="submit" value="Update Admin">
                            </td>
                        </tr>
                    
                    </table>




        <!-- main content section end -->

        <!-- footer section start -->
        <div class="footer">
            <div class="wrapper">
                <p class="text-center">a</p>
            </div>
        </div>
        <!-- footer section end -->
    </body>
</html>

<?php
    require_once("./resources/process/dbhelper.php");
    if(isset($_POST['submit'])){
        echo $userName=$_POST['userName'];
        echo $email=$_POST['email'];
        echo $ID=$_POST['ID'];
        $sql="update admins set 
        adminUserName='$userName',
        adminEmail='$email'
        where adminID='$ID'  
        ";
        execute($sql);
    }
?>