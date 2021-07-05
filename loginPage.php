<!DOCTYPE html>
<html>

<head>
  <title>Home Page</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<body>
  <!-- menu section start -->
  <?php include_once("resources/assets/header.php")?>
  <!-- menu section end -->
  <!------ Include the above in your HEAD tag ---------->
  <div class="container">
    <?php include_once("resources/assets/alert.php")?>
  </div>
    <div class="bg-light p-5 rounded-lg m-3">
    <form class="form-group" method="POST" action="proccess/loginProcess.php">
        <h1 class="text-center">Login</h1>
        <br>
        <input class="form-control" type="text"  id="userName" name="userName" placeholder="UserName">
        <br>
        <input class="form-control" type="password"  id="password" name="password" placeholder="Password">
        <br>
        <input class="btn btn-primary" type="submit" name="login" value="LOGIN">
        <a class="btn btn-link" href="signUpPage.php">Sign Up?</a>
      </form>
      <br>
    </div>
  
    <div class="clearfix"></div>
    <!-- footer section start -->
    <?php include_once("resources/assets/footer.php") ?>
        <!-- footer section end -->
</body>
</html>