
<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
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
        <div id="result" class="bg-light p-5 rounded-lg m-3">
            <?php
            $conn =new mysqli("localhost","root","","shopping3");
            require_once("./resources/process/dbhelper.php");  
            if(isset($userName)){
                $sql = "select * from users where userName ='$userName';";
            }
            else{
                //header("location:index.php");
            }
            $result=mysqli_query($conn, $sql);
            $rowNum=mysqli_num_rows($result);
            if($rowNum==1){
                $row  =   mysqli_fetch_array($result, 1);
                $ID= $row['ID'];
                $address= $row['address'];
                $email= $row['email'];
                $age= $row['age'];

                ?>
                <form class="form-group" action="proccess/updateUser.php" method="POST">
                    <h1 class="text-center"><?= $userName; ?></h1>
                    <br>
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" class="form-control" value="<?= $address; ?>" placeholder="Enter address">
                    <br>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" value="<?= $email; ?>" placeholder="Enter email">
                    <br>
                    <label for="age">Age</label>
                    <input type="text" id="age" name="age" class="form-control" value="<?= $age; ?>" placeholder="Enter age">
                    <br>
                    <h3>Update password</h3>
                    <br>
                    <input type="text" hidden id="oldPassword" name="oldPassword" class="form-control" value="" placeholder="Enter Old password">
                    <input type="text" id="newPassword1" name="newPassword1" class="form-control" value="" placeholder="Enter New Password">
                    <br>
                    <input type="text" hidden id="newPassword2" name="newPassword2" class="form-control" value="" placeholder="Confirm New password">

                    <input type="text" hidden id="userID" name="userID" value="<?= $ID; ?>">
                    <br>
                    <input type="submit" class="btn btn-success" name="submit" value="Update">
                </form>
                <?php
            } ?>
        </div>
        <!-- main content section end -->

        <!-- footer section start -->
        <?php include_once("resources/assets/footer.php") ?>
        <!-- footer section end -->
    </body>
</html>