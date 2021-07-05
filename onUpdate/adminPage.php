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
                    <li><a href="products.php?searchText=">Products</a></li>
                    <li><a href="orders.php">Orders</a></li>
                </ul>
            </div>
        </div>
        <!-- menu section end -->

        <!-- main content section start -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br><br>
                <br><br>
                <a href="./adminAdd.php" class="btn-primary">Add Admin</a>
                <br><br><br>
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Action</th>

                    </tr>

                    <?php
                        require_once("./resources/process/dbhelper.php");
                        $sql="select * from admins";
                        $result=execute($sql);
                        $rowNum= mysqli_num_rows($result);
                        $sn=1;
                        if($rowNum>0){
                            while($row=mysqli_fetch_assoc($result)){
                                $id=$row['adminID'];
                                $userName=$row['adminUserName'];
                                $email=$row['adminEmail'];
                                ?>
                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $userName;?></td>
                                    <td><?php echo $email;?></td>
                                    <td>
                                        <a href="adminEdit.php?id=<?php echo $id?>" class="btn-secondary">Update</a>
                                        <a href="adminDelete.php?id=<?php echo $id?>" class="btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }

                        }
                    ?>
                </table>
                
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