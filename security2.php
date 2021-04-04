<?php


if(!isset($_SESSION))
{
    session_start();
}

if(!$_SESSION['username2'])
{
    header('Location: dashboard.php');
}


?>