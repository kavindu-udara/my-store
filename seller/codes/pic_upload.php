<?php
include('../../config/app.php');
include_once('../controllers/UploadSellerPic.php');
include_once('../controllers/setSession.php');

$upload_seller_picture = new UploadSellerPic;

if (isset($_POST['auth'])) {

    $seller_id = $_SESSION['auth_seller']['seller_id'];
    $seller_fname = $_SESSION['auth_seller']['seller_fname'];
    $seller_lname = $_SESSION['auth_seller']['seller_lname'];

    $fullName = validateInput($db->conn, $_POST['fullName']);
    $NIC = validateInput($db->conn, $_POST['NIC']);
    $brd = validateInput($db->conn, $_POST['brd']);
    $adders = validateInput($db->conn, $_POST['adders']);

    $shopName = validateInput($db->conn, $_POST['shopName']);
    $shopEmail = validateInput($db->conn, $_POST['shopEmail']);
    $shopMobile = validateInput($db->conn, $_POST['shopMobile']);

    $ppic = $_FILES['ppic'];
    $NICfpic = $_FILES['NICfpic'];
    $NICbpic = $_FILES['NICbpic'];

    $imgs_file_types = array($ppic['type'], $NICfpic['type'], $NICbpic['type']);

    $new_img_extention = array();

    for ($i = 0; $i < count($imgs_file_types); $i++) {
        $currentFileType = $imgs_file_types[$i];
        $check_file_extention = $upload_seller_picture->checkExtention($currentFileType);
        if (!$check_file_extention) {
            redirect('img extention is wrong', 'fillSellerInfo.php');
            die('unsupported file type');
        } else {
            $new_img_extention_result = $upload_seller_picture->select_img_extention($imgs_file_types[$i]);
            $new_img_extention[] = $new_img_extention_result;
        }
    }

    if (count($new_img_extention) == 3) {
        $seller_pic_name = "../assets//images//sellers//sellers_pic//" . $seller_id . "_" . $seller_fname . "_" . $seller_lname . "_" . "seller_pic_" . uniqid() . $new_img_extention[0];
        move_uploaded_file($ppic["tmp_name"], $seller_pic_name);

        $NIC_front_name = "../assets//images//sellers//sellers_nic_pic//" . $seller_id . "_" . $seller_fname . "_" . $seller_lname . "_" . uniqid() . "_NICFront_" . $new_img_extention[1];
        move_uploaded_file($NICfpic["tmp_name"], $NIC_front_name);

        $NIC_back_name = "../assets//images//sellers//sellers_nic_pic//" . $seller_id . "_" . $seller_fname . "_" . $seller_lname . "_" . uniqid() . "_NICback_" . $new_img_extention[2];
        move_uploaded_file($NICbpic["tmp_name"], $NIC_back_name);

        $upload_seller_details_result = $upload_seller_picture->uploadSellerDetails($fullName, $NIC, $brd, $seller_pic_name, $NIC_front_name, $NIC_back_name, $seller_id);

        if ($upload_seller_details_result) {

            $upload_seller_shop_details_result = $upload_seller_picture->uploadShopDetails($seller_id, $shopName, $shopEmail, $shopMobile);

            if ($upload_seller_shop_details_result) {
                $setSession = new SetSession;
                $setSession->setFillSellerInfoStatus();
                $_SESSION['message'] = "upload success";
                echo "upload success";

            } else {

                $_SESSION['message'] = "upload failed";
                echo "upload failed";
            }

            // redirect('', 'seller/index.php');
        } else {
            $_SESSION['message'] = "upload failed";
            echo "upload failed";
        }
    } else {
        $_SESSION['message'] = "unsupported file type";
        echo "unsupported file type";
        die('unsupported file type');
    }
}


if (isset($_POST['shop-edit'])) {
    $seller_id = $_SESSION['auth_seller']['seller_id'];
    $seller_fname = $_SESSION['auth_seller']['seller_fname'];
    $seller_lname = $_SESSION['auth_seller']['seller_lname'];

    $shop_name = validateInput($db->conn, $_POST['shop-name']);
    $shop_email = validateInput($db->conn, $_POST['shop-email']);
    $shop_mobile = validateInput($db->conn, $_POST['shop-mobile']);

    $shop_picture = $_FILES['shop-image'];

    if (empty($shop_name) || empty($shop_email) || empty($shop_mobile)) {

        echo "empty input";

    } else {

        $check_file_extention = $upload_seller_picture->checkExtention($shop_picture['type']);

        if ($check_file_extention) {
            $new_img_extention_result = $upload_seller_picture->select_img_extention($shop_picture['type']);

            $shop_pic_name = "../assets//images//shops//shop_images//" . $seller_id . "_" . $seller_fname . "_" . $seller_lname . "_" . "seller_shop_pic_" . uniqid() . $new_img_extention_result;
            move_uploaded_file($shop_picture["tmp_name"], $shop_pic_name);

            $edit_shop_details_result = $upload_seller_picture -> editSellerShop($seller_id, $shop_name, $shop_email, $shop_mobile, $shop_pic_name);
            if($edit_shop_details_result){
                echo "success";
            }else{
                echo "edit failed";
            }

        } else {
            echo "wrong file extention";
        }
    }
}