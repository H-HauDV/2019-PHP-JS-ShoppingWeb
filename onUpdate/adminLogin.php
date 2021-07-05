<!DOCTYPE html>
<html>

<head>
  <title>Home Page</title>

  <link rel="stylesheet" href="index.css">
  <style>
    .loginBox{
    text-align: center;
    width: 300px;
    padding: 40px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    text-align: center;
    background-color: #ecf0f1;
  }
  .loginBox h1{
    text-transform:uppercase;
    font-weight: 500;
  }
  .loginBox input[type="text"],.loginBox input[type="password"]{
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid black;
    padding: 14px 10px;
    width: 200px;
    outline: none;
    color: black;
    border-radius: 24px;
    transition: 0.25s;
  }
  .loginBox input[type="text"]:focus,.loginBox input[type="password"]:focus{
    width: 280px;
    border-color:  #27ae60  ;
  }
  .loginBox input[type="submit"]{
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid black;
    padding: 14px 40px;
    outline: none;
    color: black;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer;
  }
  .loginBox input[type="submit"]:hover{
    background: #27ae60;
  }
  .footer{
    position:absolute;
   bottom:0;
   width:100%;
   height:49px;   /* Height of the footer */

  }
  </style>
</head>

<body>
  <!-- menu section start -->
  <div class="menu text-center">
    <ul class="col-8" style="float: right;">
      <?php
      session_start();
      if (isset($_SESSION['userName'])) {
        $userName = $_SESSION['userName'];
      } else {
        $userName = "Guest";
      }
      ?>
      <li class="uName"><a href="#"><?php echo $userName ?></a></li>
      <li class="uLogout"><a href="logout.php">Logout</a></li>
    </ul>
    <div class="wrapper">

      <ul class="col-8">
        <li><a href="index.php">Home</a></li>
        <li><a href="loginPage.php">Login</a></li>
        <li><a href="categories.php">Categories</a></li>
        <li><a href="products.php?searchText=">Products</a></li>
        <li><a href="orders.php">Orders</a></li>
      </ul>
    </div>
  </div>
  <!-- menu section end -->
  <!------ Include the above in your HEAD tag ---------->

    <div class="wrapper">
    <form class="loginBox" method="POST" action="adminLoginProccess.php">
        <h1>Login</h1>
        <input type="text"  id="userName" name="userName" placeholder="UserName">
        <input type="password"  id="password" name="password" placeholder="Password">
        <input type="submit" name="login" value="LOGIN">
      </form>
    </div>
    <div class="clearfix"></div>
    <!-- footer section start -->
    <div class="footer">
            <div class="wrapper">
                <p class="text-center">a</p>
            </div>
        </div>
        <!-- footer section end -->
</body>
</html>