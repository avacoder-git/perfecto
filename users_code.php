<?php

//include('security2.php');


include ('database.php');


$username2 = "";
$password2 = "";
$update = false;


if (isset($_POST['add_user'])) {
    $username2 = $_POST['username'];
    $password2 = $_POST['password'];

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    $mysqli->query("insert into users (username, password) values ('$username2', '$password2')") or
    die($mysqli->error);
    header('location: users.php');

}

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];

    $result = $mysqli->query("select * from users where user_id=$id") or die($mysqli->error);
    $update = true;

    $row = $result->fetch_assoc();
    $username2 = $row['username'];
    $password2 = $row['password'];

}

if (isset($_POST['update'])) {
    $id = $_POST['user_id'];
    $username2 = $_POST['username'];
    $password2 = $_POST['password'];

    $mysqli->query("update users set username='$username2', password='$password2'") or
    die($mysqli->error);
    header('location: users.php');
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $mysqli->query("delete from users where user_id=$id") or die($mysqli->error);
    $_SESSION['message'] = "record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header('location: users.php');
}






?>