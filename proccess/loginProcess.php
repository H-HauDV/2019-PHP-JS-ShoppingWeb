<?php
    $conn       = new  mysqli('localhost','root','','shopping3');
    require_once("../config/configPath.php");
    //querry
    // $result=mysqli_query($conn, $sql);

    if(isset($_POST['login'])){
        $userName=$_POST['userName'];
        $password=$_POST['password'];
        $sql="select * from users where userName='$userName' and password= '$password'";

        $result=mysqli_query($conn, $sql);
        
        // $row  =   mysqli_fetch_array($result));
        session_start();
        $rowNum=mysqli_num_rows($result);
        if($rowNum==1){
            //success
            $_SESSION['userName']=$userName;
           // $_SESSION['vID']=0;
            $_SESSION['order']=array();
            $_SESSION['alert']="LoginSuccess";
            header("location:".SITEURL."index.php");
        }
        else{
            $_SESSION['alert']="LoginFailed";
            header("location:".SITEURL."loginPage.php");
        }
    }
    else{
        header("location:".SITEURL."login.php");
    }
?>