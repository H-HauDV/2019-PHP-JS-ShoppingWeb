<?php
    require_once("./resources/process/dbhelper.php");
    session_start();
    $id1=$_GET['id'];
    unset($_SESSION['order'][$id1]);
    header("location:".SITEURL."orders.php");
?>