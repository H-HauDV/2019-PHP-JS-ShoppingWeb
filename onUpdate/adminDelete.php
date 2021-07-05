<?php
    require_once("./resources/process/dbhelper.php");
    $id=$_GET['id'];
    $sql="Delete from admins where adminID='$id'";

    $res=execute($sql);
    if($res){
        $_SESSION['delete']="Admin Delete success";
        header("location:".SITEURL."adminPage.php");
    }
    else{
        $_SESSION['delete']="Admin Delete Failed";
        header("location:".SITEURL."adminPage.php");
    }


?>