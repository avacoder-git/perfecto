<?php
include("includes/init.php");

if (!$session->is_signed_in()){redirect("login.php");}


if (empty($_GET['id']))
{
    redirect('universities.php') ;
}

$university = University::find_by_id($_GET['id']);



if ($university)
{
    $session->message("{$university->name} muvaffaqiyatli o'chirildi");


    $university->delete_photo();


    redirect("universities.php");

}else{

    redirect("universities.php");

}





?>