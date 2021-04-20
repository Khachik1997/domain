<?php
namespace Helpers;
use Models\User;
class UploadImage {

    public $options=[
        'allowedTypes' => ['jpg','png','jpeg','jfif','gif'],
        'allowedSize'=> 8,
        'changeName' => false
    ];
    public  $error;

    public function execute ($file , $location){

        $upload = true;
        $imageFileType = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $getImageSize = getimagesize($file["tmp_name"]);
        if($getImageSize == false){
            $this->error = "File is not an image";
            $upload = false;
        }
        if($imageFileType != $this->options["allowedTypes"][0] && $imageFileType != $this->options["allowedTypes"][1] && $imageFileType != $this->options["allowedTypes"][2] && $imageFileType != $this->options["allowedTypes"][3] && $imageFileType != $this->options["allowedTypes"][4]){
            $this->error = "Only jpg, png, jpeg, gif are allowed";
            $upload = false;
        }
        if($file['size'] > $this->options['allowedSize'] * 1000000){
            $this->error = "file size  too large to upload";
            $upload = false;

        }
        if($upload){
            if(!(move_uploaded_file($file["tmp_name"],  $location))){
                $this->error = "Upload error";
            }
        }

        return ["success" => $upload, "message" =>$this->error];
    }


}


