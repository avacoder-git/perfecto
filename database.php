<?php
//include('security.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perfecto";
$mysqli = new mysqli($servername, $username, $password, $dbname) or die(mysqli_error($mysqli));
?>