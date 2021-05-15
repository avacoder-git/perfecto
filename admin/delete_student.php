<?php
include("includes/init.php");

if (!$session->is_signed_in()){redirect("login.php");}


if (empty($_GET['id']))
{
    redirect('comments.php') ;
}

$student = Comment::find_by_id($_GET['id']);



if ($student)
{
    $session->message("{$student->name} muvaffaqiyatli o'chirildi");

    $student->delete_photo();
    redirect("comments.php");

}else{

    redirect("comments.php");

}





?>