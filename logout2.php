<?php
session_start();

if (isset($_POST['logout']))
{
    unset($_SESSION['username2']);
    header('location: dashboard.php');
}


?>