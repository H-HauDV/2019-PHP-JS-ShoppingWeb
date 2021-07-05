<?php
    require_once("../config/configPath.php");
    session_start();
    if(isset($_SESSION['order'][0])){//have atleast 1 product in cart
        $userName=$_SESSION['userName'];
        $conn       = new  mysqli('localhost','root','','shopping3');
        //get userID
        $sql0="select ID from users where userName='$userName';";
        $result0=mysqli_query($conn, $sql0);
        $row0 = mysqli_fetch_array($result0);
        $userID=$row0[0];
       
        
        //get max of orderID
        $sql1="select max(orderID) from orders";
        $result1=mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($result1);
        $currID=$row1[0]+1;
        //insert into orders first
        $sql2="insert into orders (userID,orderID) value ($userID, $currID);";
        $result2=mysqli_query($conn,$sql2);
        for ($i = 0; $i <= $_SESSION['pIndex']; $i++) {
           if(isset($_SESSION['order'][$i])){
            $productID=$_SESSION['order'][$i][0];
            $quantity=$_SESSION['order'][$i][1];
            $date=$_SESSION['order'][$i][2];
            $sql="insert into order_detail (orderID,productID,pIndex,quantity,date) values( $currID,$productID,$i,$quantity,$date)";
            $result=mysqli_query($conn, $sql);
            unset($_SESSION['order'][$i]);//free array
           }
        }
        mysqli_close($conn);
    }

    
    header("location:".SITEURL."orders.php");


?>