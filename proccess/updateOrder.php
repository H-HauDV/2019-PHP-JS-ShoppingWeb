<?php
    require_once("../resources/process/dbhelper.php");
  
    if(isset($_POST['submit'])){
        session_start();
        $quantity=$_POST['quantity'];
        $pIndex=$_POST['pIndex'];
        $_SESSION['order'][$pIndex][1]=$quantity;
        
        header("location:".SITEURL."orders.php");
    }
    
?>