<?php

require_once ("../admin/includes/init.php");


if (isset($_POST['send_data'])) {



    $_SESSION['message_client'] = "Murojaatingiz Yuborildi! Tez orada konsultantlarimiz siz bilan bog'lanishadi";
    $_SESSION['msg_type_client'] = "success";
    $_SESSION['formSubmitted'] = true;
    $formSubmitted = true;

    echo $_SESSION['formSubmitted'];

    $reference = new Reference();
    $reference->name = $_POST['name'];
    $reference->phone = $_POST['telefon'];
    $reference->target= $_POST['country'];
    $reference->date= date("Y-m-d H:i");

    $reference->save();

    redirect("../index.php");
}
else{
    redirect("../index.php");

}
