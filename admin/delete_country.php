<?php
include("includes/init.php");

if (!$session->is_signed_in()){redirect("login.php");}


if (empty($_GET['id']))
{
    redirect('comments.php') ;
}

$country = Country::find_by_id($_GET['id']);



if ($country)
{
    $session->message("{$country->name} muvaffaqiyatli o'chirildi");

    $country->delete_photo();
    redirect("countries.php");

}else{

    redirect("countries.php");

}





?>