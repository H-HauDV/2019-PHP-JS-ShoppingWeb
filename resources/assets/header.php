
<!-- menu section start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">My shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="nav nav-pills nav-fill">
                <?php
                session_start();
                if (isset($_SESSION['userName'])) {
                    $userName = $_SESSION['userName'];
                } else {
                    $userName = "";
                }
                ?>
                <a class="nav-link active" id="userName" href="profile.php" type="button"><?php echo $userName ?></a>
                <a class="nav-link" style="color:black" href="categories.php">Categories</a>
                <a class="nav-link" style="color:black" href="products.php">Products</a>
                <a class="nav-link" style="color:black" href="orders.php">Orders</a>
                <a class="nav-link" style="color:black" id="login" href="loginPage.php">Login</a>
                <a class="nav-link" style="color:black" id="logOut" href="proccess/logout.php">Logout</a>
                <script >
                    show_hide_userButton("<?php echo $userName;?>");
                    function show_hide_userButton(userName)
                    {
                        if (userName == "") {
                            
                            document.getElementById("userName").style.display = "none";
                            document.getElementById("logOut").style.display = "none";
                        }
                        else {
                            document.getElementById("userName").style.display = "block";
                            document.getElementById("logOut").style.display = "block";
                            document.getElementById("login").style.display = "none";
                        }
                    } 
                </script>
            </div>
        </div>
    </div>
</nav>

<!-- menu section end -->
