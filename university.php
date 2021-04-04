<?php

//include('security.php');


$university_name = "";
$university_link = "";
$university_image = "image.svg";
$update_university = false;
$university_id = 0;
include ('database.php');


function resizeImage($resourceType, $image_width,$image_height){
    $resizeWidth = 500;
    $resizeHeight = 500;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer, $resourceType,0,0,0,0, $resizeHeight,$resizeWidth,$image_width,$image_height);
    return $imageLayer;
}

if(isset($_POST['save_university'])){
    $university_name = $mysqli ->  real_escape_string($_POST['university_name']);
    $university_link = $mysqli ->  real_escape_string($_POST['university_link']);

    $_SESSION['message_university'] = "Record has been saved!";
    $_SESSION['msg_type_university'] = "success";
    $file = "university_image";

    if(is_array($_FILES)) {
        $fileName = $_FILES[$file]['tmp_name'];
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = $_FILES[$file]['name'];
        $uploadPath = "./uploads/";
        $fileExt = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                imagejpeg($imageLayer, $uploadPath . $resizeFileName);
                break;
        }
        $file = $resizeFileName;
    }

    $university_image = $file;

//    echo $tutor_avatar;

    $mysqli->query("insert into university (university_image, university_name,university_link) 
    values ('$university_image', '$university_name','$university_link')") or
    die($mysqli->error);
    header('location: dashboard.php#university');
}

if (isset($_GET['edit_university']))
{
    $university_id = $_GET['edit_university'];

    $result = $mysqli->query("select * from university where university_id=$university_id") or die($mysqli->error);
    $update_university = true;

    $row = $result->fetch_assoc();
    $university_name = $row['university_name'];
    $university_link = $row['university_link'];
    $university_image = $row['university_image'];
}

if (isset($_POST['update_university']))
{
    $university_id =$_POST['university_id'];
    $university_name = $mysqli ->  real_escape_string($_POST['university_name']);
    $university_link = $mysqli ->  real_escape_string($_POST['university_link']);

    $_SESSION['message_university'] = "record has been updated!";
    $_SESSION['msg_type_university'] = "warning";

    $query = $mysqli->query("SELECT * FROM university where university_id=$university_id") or die($mysqli->error);
    $after = mysqli_fetch_assoc($query);
    unlink("./uploads/".$after['university_image']);

    $file = "university_image";

    if(is_array($_FILES)) {
        $fileName = $_FILES[$file]['tmp_name'];
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = $_FILES[$file]['name'];
        $uploadPath = "./uploads/";
        $fileExt = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                imagejpeg($imageLayer, $uploadPath . $resizeFileName);
                break;
        }
        $file = $resizeFileName;
    }
    $university_image = $file;
    $mysqli->query("update university set university_name='$university_name',  university_link='$university_link', university_image='$university_image' where university_id='$university_id'") or
    die($mysqli->error);
    header('location: dashboard.php#university');
}
if (isset($_GET['delete_university']))   {
    $university_id = $_GET['delete_university'];

    $query = $mysqli->query("SELECT * FROM university where university_id=$university_id") or die($mysqli->error);
    $after = mysqli_fetch_assoc($query);
    unlink("./uploads/".$after['university_image']);
    $mysqli->query("delete from university where university_id=$university_id") or die($mysqli->error);
    $_SESSION['message_university'] = "Record has been deleted!";
    $_SESSION['msg_type_university'] = "danger";

    header('location: dashboard.php#university');
}

