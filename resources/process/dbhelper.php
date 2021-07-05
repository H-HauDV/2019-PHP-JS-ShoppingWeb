<?php

define('SITEURL','http://localhost/web4/');
define('HOST','localhost');
define('USERNAME','root');
define('PASSWORD','');
define('DATABASE','shopping3');

// Insert, update, delete
function execute($sql)
{
    //create conection
    $conn       = new  mysqli(HOST,USERNAME,PASSWORD,DATABASE);
    //querry
    $result=mysqli_query($conn, $sql);
    //close connection
    mysqli_close($conn);
    return $result;
}
//tra ve ket qua cho select
function executeResult($sql)
{
    //create conection
    $conn       =   mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    //querry
    $resultset  =   mysqli_query($conn, $sql);
    $list       =   [];
    while($row  =   mysqli_fetch_array($resultset, 1))
    {
        $list[] =   $row;
    }
    //close connection
    mysqli_close($conn);
    return $list;
}
?>