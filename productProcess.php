<?php
    require_once("./resources/process/dbhelper.php");
    if(isset($_POST['searchText']) and isset($_POST['cate'])){
        $searchText=$_POST['searchText'];
        $cate=$_POST['cate'];
        header("location:".SITEURL."products.php?searchText=$searchText&&cate=$cate");
    }else if(!isset($_POST['searchText']) and isset($_POST['cate'])){
        $cate=$_POST['cate'];
        header("location:".SITEURL."products.php?cate=$cate");
    }else if(isset($_POST['searchText']) and !isset($_POST['cate'])){
        $searchText=$_POST['searchText'];
        header("location:".SITEURL."products.php?searchText=$searchText");
    }else{
        header("location:".SITEURL."products.php");
    }

?>