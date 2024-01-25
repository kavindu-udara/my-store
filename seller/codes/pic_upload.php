<?php
include('../../config/app.php');
include_once('../controllers/UploadSellerPic.php');
include_once('../controllers/setSession.php');

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

    $upload_seller_picture = new UploadSellerPic;

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
            $setSession = new SetSession;
            $setSession->setFillSellerInfoStatus();
            // redirect('', 'seller/index.php');
            $_SESSION['message'] = "upload success";
            echo "upload success";
        } else {
            $_SESSION['message'] = "upload failed";
            echo "upload failed";
        }
    } else {
        $_SESSION['message'] = "unsupported file type";
        echo "unsupported file type";
        die('unsupported file type');
    }
} else {
    redirect('', 'seller/index.php');
}
