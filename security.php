<?php

    if(!isset($_SESSION))
    {
        session_start();
    }


if(!$_SESSION['username'])
{
    header('Location: login.php');
}



?>