<?php
include('security.php');
include('database.php');
$student_name = "";
$student_link = "";
$student_university= "";
$student_image= "image.svg";
$update_student = false;
$student_id = 0;




if (isset($_POST['save_student'])) {

$student_name = $mysqli ->  real_escape_string($_POST['student_name']);
$student_link = $mysqli ->  real_escape_string($_POST['student_link']);
$student_university= $mysqli ->  real_escape_string($_POST['student_university']);

$_SESSION['message_student'] = "Record has been saved!";
$_SESSION['msg_type_student'] = "success";
$file = "student_image";

function resizeImage($resourceType, $image_width,$image_height){
$resizeWidth = 400;
$resizeHeight = 400;
$imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
imagecopyresampled($imageLayer, $resourceType,0,0,0,0, $resizeHeight,$resizeWidth,$image_width,$image_height);
return $imageLayer;
}


if (is_array($_FILES)) {
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

$student_image = $file;

//    echo $tutor_avatar;

$mysqli->query("insert into students (student_image, student_name,student_link, student_university)
values ('$student_image','$student_name','$student_link', '$student_university')") or
die($mysqli->error);
header('location: dashboard.php#students');
}

if (isset($_GET['edit_student'])) {

    $student_id = $_GET['edit_student'];

    $result = $mysqli->query("select * from students where student_id=$student_id") or die($mysqli->error);
    $update_student = true;

    $row = $result->fetch_assoc();
    $student_name = $row['student_name'];
    $student_link = $row['student_link'];
    $student_image = $row['student_image'];
    $student_university = $row['student_university'];
}

if (isset($_POST['update_student'])) {
    $student_id = $mysqli ->  real_escape_string($_POST['student_id']);
    $student_name =$mysqli ->  real_escape_string( $_POST['student_name']);
    $student_link =$mysqli ->  real_escape_string( $_POST['student_link']);
    $student_university = $mysqli ->  real_escape_string($_POST['student_university']);

    function resizeImage($resourceType, $image_width,$image_height){
        $resizeWidth = 400;
        $resizeHeight = 400;
        $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
        imagecopyresampled($imageLayer, $resourceType,0,0,0,0, $resizeHeight,$resizeWidth,$image_width,$image_height);
        return $imageLayer;
    }

    $_SESSION['message_student'] = "Record has been updated!";
    $_SESSION['msg_type_student'] = "warning";

    $query = $mysqli->query("SELECT * FROM students where student_id=$student_id") or die($mysqli->error);
    $after = mysqli_fetch_assoc($query);
    unlink("./uploads/".$after['student_image']);

    $file = "student_image";

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
    $student_image = $file;
    $mysqli->query("update students set student_name='$student_name',  student_link='$student_link', student_image='$student_image', student_university='$student_university' where student_id='$student_id'") or
    die($mysqli->error);
    header('location: dashboard.php#students');
}
if (isset($_GET['delete_student'])) {
    $student_id = $_GET['delete_student'];

    $query = $mysqli->query("SELECT * FROM students where student_id=$student_id") or die($mysqli->error);
    $after = mysqli_fetch_assoc($query);
    unlink("./uploads/" . $after['student_image']);
    $mysqli->query("delete from students where student_id=$student_id") or die($mysqli->error);
    $_SESSION['message_student'] = "record has been deleted!";
    $_SESSION['msg_type_student'] = "danger";

    header('location: dashboard.php#students');
}


