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

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = md5(mysqli_real_escape_string($conn, $_POST['password']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);


$username_check = "SELECT * FROM users WHERE username = '". $username."';";
$email_check = "SELECT * FROM users WHERE email = '". $email."';";
$signup_sql = "INSERT INTO users (email, username, name, password) VALUES ('" . $email . "','" . $username . "','" . $fullname . "','" . $password . "');";
$image_sql = "INSERT INTO images ( username) VALUES ('" . $username .  "');";
$social_sql = "INSERT INTO social ( username) VALUES ('" . $username .  "');";



if(($result = $conn->query($username_check)) && $result->num_rows > 0){
    echo "Username already exists";
}

else if(($result = $conn->query($email_check)) && $result->num_rows > 0){
    echo "Email already exists";
}
else if($conn->query($signup_sql) == TRUE && $conn->query($image_sql) == TRUE && $conn->query($social_sql) == TRUE){
    $_SESSION['user']=$username;
    echo "success";
}
else{
    echo "Something went wrong";
}