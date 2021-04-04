<?php
include "security.php";

if(!isset($_SESSION))
{
    session_start();
}


include "database.php";

if (isset($_POST['send_data'])) {
    $name = $_POST['name'];
    $phone = $_POST['telefon'];
    $country= $_POST['country'];


    $_SESSION['message_client'] = "Murojaatingiz Yuborildi! Tez orada konsultantlarimiz siz bilan bog'lanishadi";
    $_SESSION['msg_type_client'] = "success";
    $_SESSION['formSubmitted'] = true;
    $formSubmitted = true;

    echo $_SESSION['formSubmitted'];


    $mysqli->query("insert into clients (client_name,client_phone, client_target, date)
    values ('$name','$phone', '$country',  CURRENT_TIMESTAMP)") or
    die($mysqli->error);

    header("location: index.php");
}
