<?php

class UploadSellerPic{
    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function moveUploadedFile($seller_id, $file_name){
        $move_file = "INSERT INTO seller_details(profile_picture, seller_id) VALUES ('$file_name', '$seller_id') ;";
        $result = $this -> conn -> query($move_file);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function checkExtention($extention){
        $extention_list = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        if(in_array($extention, $extention_list)){
            return true;
        }else{
            return false;
        }
    }

    public function select_img_extention($imgExtention){
        if ($imgExtention == "image/jpg") {
            return ".jpg";
        } else if ($imgExtention == "image/jpeg") {
            return ".jpeg";
        } else if ($imgExtention == "image/png") {
            return ".png";
        } else if ($imgExtention == "image/svg+xml") {
            return ".svg";
        }else{
            return false;
        }
    }

    public function uploadSellerDetails($fullName, $NIC, $brd, $seller_pic_name, $NIC_front_name, $NIC_back_name, $seller_id){
        $insert_query = "INSERT INTO seller_details(full_name, NIC, birth_date, profile_picture, NIC_front_pic, NIC_back_pic, seller_id) VALUES ('$fullName', '$NIC', '$brd', '$seller_pic_name', '$NIC_front_name', '$NIC_back_name', '$seller_id');";
        $result = $this->conn->query($insert_query);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}