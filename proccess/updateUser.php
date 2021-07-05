<?php
    session_start();    
    require_once("../resources/process/dbhelper.php");  
    if(isset($_POST['submit'])){
        $ID=$_POST['userID'];
        $newAddress=$_POST['address'];
        $newEmail=$_POST['email'];
        $newAge=$_POST['age'];
        $newPassword=$_POST['newPassword1'];

        $sql="update users
        SET address = '$newAddress', email = '$newEmail', age = '$newAge',password= '$newPassword'
        WHERE ID='$ID'; ";
        echo $sql;
        execute($sql);
        header("location:".SITEURL."profile.php");
    }
    
?>