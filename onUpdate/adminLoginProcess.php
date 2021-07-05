<?php
    $conn       = new  mysqli('localhost','root','','shopping3');
    //querry
    // $result=mysqli_query($conn, $sql);

    if(isset($_POST['login'])){
        $userName=$_POST['userName'];
        $password=$_POST['password'];
        $sql="select * from admins where userName='$userName' and password= '$password'";

        $result=mysqli_query($conn, $sql);
        
        // $row  =   mysqli_fetch_array($result));
        $rowNum=mysqli_num_rows($result);
        if($rowNum==1){
            //success
            session_start();
            $_SESSION['userName']=$userName;
            $_SESSION['vID']=0;
            header("location:adminPage.php");
        }
        else{
            //failed
            echo "Email or Password is Invalid.<br> click here to <a href='loginPage.php'>try again</a>";
        }
        
    }
    else{
        header("location: login.php");
    }
?>