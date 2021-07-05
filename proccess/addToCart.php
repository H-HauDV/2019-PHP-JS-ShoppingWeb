
<?php
    require_once("../resources/process/dbhelper.php");
    $conn       = new  mysqli('localhost','root','','shopping3');
    session_start();
    $userName=$_SESSION['userName'];

    if(isset($_POST) && $_POST['quantity']!=null)
    {
        $sql0="select ID from users where userName='$userName'";

        $result0=mysqli_query($conn, $sql0);
        $row0 = mysqli_fetch_array($result0);
        $userID=$row0[0];

        if($_SESSION['vID']==0){
            $sql1   =   "select max(orderID) from orders";
            $result1=mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($result1);
        //$row1[0] is max ID of order to each user
            $_SESSION['curID']=$row1[0]+1;
        }
        $_SESSION['vID']++;
        $pIndex=$_SESSION['vID'];

        $orderID=$_SESSION['curID'];
        // $orderID=$_SESSION['curID']+1;
        $date=date("m-d-Y");
        $productID=$_POST['hiddenID'];
        $quantity=$_POST['quantity'];

        $sql2="insert into orders(orderID,userID) values($_SESSION[curID],$userID)";
        $result2=execute($sql2);
        echo $sql2;

        $sql3   ="insert into order_detail (orderID,productID,quantity,date,pIndex) values ($orderID,$productID,$quantity,$date,$pIndex)";
        $result3=execute($sql3);
        echo $sql3;
        // echo $_SESSION["curID"];
       
        
    }
    header("location:".SITEURL."products.php?searchText=");

// 
?>

