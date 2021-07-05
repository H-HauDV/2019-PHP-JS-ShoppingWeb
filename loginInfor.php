<?php
    session_start();
    echo "welcome".$_SESSION['userName'];
    echo "<a href='logout.php'>logout</a>";


?>