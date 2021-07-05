<?php
    $conn       = new  mysqli('localhost','root','','shopping3');
    //querry
    // $result=mysqli_query($conn, $sql);
    define('SITEURL','http://localhost/web3/');

    if(isset($_POST['signUp'])){
        $userName=$_POST['userName'];
        $password=$_POST['password'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $sql1="select * from users where userName='$userName'";

        $result1=mysqli_query($conn, $sql1);
        
        // $row  =   mysqli_fetch_array($result));
        $rowNum1=mysqli_num_rows($result1);
        if($rowNum1==1){
            //failed
            echo "Duplicated";
        }
        else{
            //add data to database
            $sql2="insert into users(userName,password,address,email) values ('$userName','$password','$address','$email')";
            //echo $sql2;
            $result2=mysqli_query($conn, $sql2);
            mysqli_close($conn);
            //echo "success";
            header("location: ".SITEURL."loginPage.php");
        }
        
    }
    else{//nothing inputed
        header("location: ".SITEURL."signUp.php");
    }
?>