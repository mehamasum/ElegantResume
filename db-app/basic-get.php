<?php
/**
 * Created by PhpStorm.
 * User: rifat
 * Date: 4/24/17
 * Time: 1:56 PM
 */
session_start();

//require_once('dbconnect_u.php');
require_once('db_local.php');

$username= $_SESSION['user'];

$sql= "select * FROM users WHERE username='".$username."';";


if(($result=$conn->query($sql))==TRUE){

    $jsonData = array();

    while ($array = mysqli_fetch_row($result)) {
        $jsonData[] = $array;
    }

    echo json_encode($jsonData);
}
else{
    //echo mysqli_error($connection);
}