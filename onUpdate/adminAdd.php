<!DOCTYPE html>
<html>
    <head>
        <title>Admin Adding</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <!-- menu section start -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="adminPage.php">Admin</a></li>
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
                <h1>Add Admin</h1>
                <br><br>
                <?php
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset ($_SESSION['add']);
                    }
                ?>
                
                <br><br><br>

                <form action="" method="POST">
                    <table class=tbl-30>
                        <tr>
                            <td>Email:</td>
                            <td><input class="input-box" type="email" name="email" placeholder="Enter your email"></td>
                        </tr>
                        <tr>
                            <td>User Name:</td>
                            <td>
                                <input class="input-box" type="text" name="userName" placeholder="Enter your User name">
                            </td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td>
                                <input class="input-box" type="password" name="password" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Add" class="btn-primary">
                            </td>
                        </tr>
            
                    </table>
                </form>
            </div>
        </div>
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
    session_start();

    require_once('./resources/process/dbhelper.php');
    //process the value
    if(isset($_POST['submit'])){

        $email=$_POST['email'];
        $userName=$_POST['userName'];
        $password=md5($_POST['password']);//Pass encript

        $check="";
        $sql="INSERT INTO `admins` (`adminUserName`, `adminPassword`, `adminEmail`) VALUES ('$userName', '$password', '$email');";
        $result=execute($sql);
        if($result){
            $_SESSION['add']="Admin Adding Failed";
            header("location:".SITEURL.'adminAdd.php');
        }
        else{
            echo "Failed!";
        }

    }
?>