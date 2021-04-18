<?php
namespace Helpers;
use Models\User;
class UploadImage {

    public $options=[
        'allowedTypes' => ['jpg','png','jpeg','jfif','gif'],
        'allowedSize'=> 8,
    ];
    public  $error;

    public function execute ($file , $location){

        $upload = true;
        $imageFileType = strtolower(pathinfo($file['avatar']['name'],PATHINFO_EXTENSION));
        $getImageSize = getimagesize($file['avatar']["tmp_name"]);
        if($getImageSize == false){
            $this->error = "File is not an image";
            $upload = false;
        }
        if($imageFileType != $this->options["allowedTypes"][0] && $imageFileType != $this->options["allowedTypes"][1] && $imageFileType != $this->options["allowedTypes"][2] && $imageFileType != $this->options["allowedTypes"][3] && $imageFileType != $this->options["allowedTypes"][4]){
            $this->error = "Only jpg, png, jpeg, gif are allowed";
            $upload = false;
        }
        if($file['avatar']['size'] > $this->options['allowedSize'] * 1000000){
            $this->error = "file size  too large to upload";
            $upload = false;

        }
        if($upload){
            if(move_uploaded_file($file["avatar"]["tmp_name"],  $location)){
                $userObj = new User;
                $id = $userObj->getSession("userId");
                $userObj->db->where("id",$id)->update("user",["avatar"=>$_FILES['avatar']['name']]);
            }
        }

        return ["success" => $upload, "message" =>$this->error];
    }


}


