<?php

include('security.php');
include ('database.php');


$country_name = "";
$description = "";
$carusel_image = "image.svg";
$update_carusel = false;
$carusel_id = 0;

if(isset($_POST['save_carusel'])){
    $country_name = $mysqli ->  real_escape_string( $_POST['country_name']);
    $description = $mysqli ->  real_escape_string( $_POST['description']);


    function resizeImage($resourceType, $image_width,$image_height){
        $resizeWidth = 1500;
        $resizeHeight = 540;
        $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
        imagecopyresampled($imageLayer, $resourceType,0,0,0,0, $resizeWidth,$resizeHeight,$image_width,$image_height);
        return $imageLayer;
    }

    $_SESSION['message_carusel'] = "Record has been saved!";
    $_SESSION['msg_type_carusel'] = "success";
    $file = "image";

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

    $carusel_image = $file;

    $mysqli->query("insert into carusel (carusel_image, country_name,description) 
    values ('$carusel_image', '$country_name','$description')") or
    die($mysqli->error);
    header('location: dashboard.php#carouselExampleIndicators');
}

if (isset($_GET['edit_carusel']))
{
    $carusel_id = $_GET['edit_carusel'];

    $result = $mysqli->query("select * from carusel where carusel_id=$carusel_id") or die($mysqli->error);
    $update_carusel = true;

    $row = $result->fetch_assoc();
    $country_name = $row['country_name'];
    $description = $row['description'];
    $carusel_image = $row['carusel_image'];
}

if (isset($_POST['update_carusel']))
{
    $carusel_id = $_POST['carusel_id'];
    $country_name =$mysqli ->  real_escape_string( $_POST['country_name']);
    $description = $mysqli ->  real_escape_string($_POST['description']);

    $_SESSION['message_carusel'] = "Record has been updated!";
    $_SESSION['msg_type_carusel'] = "warning";


    function resizeImage($resourceType, $image_width,$image_height){
        $resizeWidth = 1500;
        $resizeHeight = 540;
        $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
        imagecopyresampled($imageLayer, $resourceType,0,0,0,0, $resizeWidth,$resizeHeight,$image_width,$image_height);
        return $imageLayer;
    }


    $_SESSION['message_carusel'] = "Record has been updated!";
    $_SESSION['msg_type_carusel'] = "warning";

    $query = $mysqli->query("SELECT * FROM carusel where carusel_id=$carusel_id") or die($mysqli->error);
    $after = mysqli_fetch_assoc($query);
    unlink("./uploads/".$after['carusel_image']);

    $file = "image";

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
    $carusel_image = $file;
    $mysqli->query("update carusel set country_name='$country_name', description='$description', carusel_image='$carusel_image' where carusel_id='$carusel_id'") or
    die($mysqli->error);
    header('location: dashboard.php##carouselExampleIndicators');
}
if (isset($_GET['delete_carusel']))   {
    $carusel_id = $_GET['delete_carusel'];

    $query = $mysqli->query("SELECT * FROM carusel where carusel_id=$carusel_id") or die($mysqli->error);
    $after = mysqli_fetch_assoc($query);
    unlink("./uploads/".$after['carusel_image']);
    $mysqli->query("delete from carusel where carusel_id=$carusel_id") or die($mysqli->error);
    $_SESSION['message_carusel'] = "Record has been deleted!";
    $_SESSION['msg_type_carusel'] = "danger";

    header('location: dashboard.php#carouselExampleIndicators');
}



?>
0