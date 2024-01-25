<?php

if (isset($_POST['auth'])) {
    $imageFile = $_FILES['file'];

    $img_file_extention = $imageFile["type"];

    $allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

    if (in_array($img_file_extention, $allowed_img_extentions)) {
        $new_img_extention;
        if ($file_extention == "image/jpg") {
            $new_img_extention = ".jpg";
        } else if ($file_extention == "image/jpeg") {
            $new_img_extention = ".jpeg";
        } else if ($file_extention == "image/png") {
            $new_img_extention = ".png";
        } else if ($file_extention == "image/svg+xml") {
            $new_img_extention = ".svg";
        }

        $file_name = "../assets//images//sellers_pic//" . $title . "_" . $x . "_" . uniqid() . $new_img_extention;
        move_uploaded_file($img_file["tmp_name"], $file_name);


    }

}