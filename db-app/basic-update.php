<?php
session_start();
/**
 * Created by PhpStorm.
 * User: rifat
 * Date: 4/25/17
 * Time: 8:05 PM
 */

//require_once('dbconnect_u.php');
require_once('db_local.php');

$username = $_SESSION['user'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$name = $_POST['name'];
$objective= $_POST['objective'];
$con = $_POST['country'];


$sql = "UPDATE users SET email= '".$email."', phone='".$phone."', name='".$name."', objective='".$objective."', country='".$con."' WHERE username='".$username."';";
echo $sql;


if($conn->query($sql) == TRUE){

    echo "success";
}
else{
    echo "Something went wrong";
}