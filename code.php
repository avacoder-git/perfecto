<?php

include ('security.php');
include ('database.php');
//require_once 'database.php';



if (isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $result = $mysqli->query("select * from users where username='$username' and password='$password'") or
    die($mysqli->error);


    if (mysqli_fetch_array($result))
    {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('Location: dashboard.php');
}
    else{
        $_SESSION['status'] = "Username or password is invalid";
        header('Location: login.php');

    }
}


