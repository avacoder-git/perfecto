<?php
include ('security2.php');

include('database.php');


if (isset($_POST['enter']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];


    if ($username == "ava_coder" && $password == "a1v2a3z4")
    {
        $_SESSION['username2'] = $username;
        header('Location: users.php');
    }
    else{
        $_SESSION['status'] = "Username or password is invalid";
        header('Location: dashboard.php');

    }
}
