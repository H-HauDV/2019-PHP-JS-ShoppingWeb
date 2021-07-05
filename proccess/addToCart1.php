

<?php
    require_once("../resources/process/dbhelper.php");
    $conn       = new  mysqli('localhost','root','','shopping3');
    session_start();
    if(isset($_SESSION['userName'])){
        if(!isset($_SESSION['pIndex'])){
            $_SESSION['pIndex']=0;
        }
        else{
            $_SESSION['pIndex']++;
        }
        if(isset($_POST) && $_POST['quantity']!=null)
        {
            $sql1   =   "select max(orderID) from orders";
            $result1=mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($result1);
            $currOrder=$row1[0]+1;
            //$row1[0] is max ID of order of each user

            $date=date("Ymd");
            $productID=$_POST['hiddenID'];
            $quantity=$_POST['quantity'];
            array_push($_SESSION['order'], array($productID,$quantity,$date,$_SESSION['pIndex'],$currOrder));   
            $_SESSION['alert']="AddProductSuccess";
        }else{
            $_SESSION['alert']="AddProductFailed";
        }
        header("location:".SITEURL."products.php?searchText=");
    }else{
        $_SESSION['alert']="NotLogin";
        header("location:".SITEURL."loginPage.php");
    }
    // $order=array();
    // array_push($order, array("Volvo",22,18,33),array("BMW",15,13),);   
    // echo $order[1][2];

// 
?>