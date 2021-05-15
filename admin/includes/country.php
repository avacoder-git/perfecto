<?php

class Country extends Db_object{


    protected static $db_table = "carusel";
    public $db_table_fields = array("id","name", "description", "image");

    public $id;
    public $name;
    public $description;
    public $image;
    public $upload_directory = "uploads";



    public function picture_path()
    {
        return $this->upload_directory."/".$this->image;
    }

    public static function resizeImage($resourceType, $image_width,$image_height){
        $resizeWidth = 1500;
        $resizeHeight = 540;
        $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
        imagecopyresampled($imageLayer, $resourceType,0,0,0,0, $resizeWidth,$resizeHeight,$image_width,$image_height);
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
