<?php

class University extends Db_object{


    protected static $db_table = "university";
    public $db_table_fields = array("id","name", "link", "image" , "university  ");

    public $id;
    public $name;
    public $link;
    public $image;
    public $university;
    public $upload_directory = "uploads";



    public function picture_path()
    {
        return $this->upload_directory."/".$this->image;
    }

    public static function resizeImage($resourceType, $image_width,$image_height){
        $resizeWidth = 500;
        $resizeHeight = 500;
        $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
        imagecopyresampled($imageLayer, $resourceType,0,0,0,0, $resizeHeight,$resizeWidth,$image_width,$image_height);
        return $imageLayer;
    }

    public function upload_file($file)
    {
        if(is_array($file)) {
            $fileName = $file['tmp_name'];
            $sourceProperties = getimagesize($fileName);
            $resizeFileName = $file['name'];
            $uploadPath = "./uploads/";
            $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);
            $uploadImageType = $sourceProperties[2];
            $sourceImageWidth = $sourceProperties[0];
            $sourceImageHeight = $sourceProperties[1];
            switch ($uploadImageType) {
                case IMAGETYPE_JPEG:
                    $resourceType = imagecreatefromjpeg($fileName);
                    $imageLayer = static::resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                    imagejpeg($imageLayer, $uploadPath . $resizeFileName);
                    break;
            }
            $file = $resizeFileName;
        }
        $this->image = $file;
    }



}







?>
