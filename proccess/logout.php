<?php
    require_once("../config/configPath.php");
    session_start();
    session_destroy();
    unset($_SESSION['userName']);
    header("location:".SITEURL."index.php");


?>