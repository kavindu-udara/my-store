<?php

include_once('controllers/SellerLoginController.php');
include_once('controllers/SellerRegisterController.php');
include_once('controllers/setSession.php');


$seller_register = new SellerRegisterController;
$set_seller_session = new setSession;
$seller_login = new SellerLoginController;

if (isset($_POST['seller_register_btn'])) {

    $fname = validateInput($db->conn, $_POST['fname']);
    $lname = validateInput($db->conn, $_POST['lname']);
    $email = validateInput($db->conn, $_POST['email']);
    $mobile = validateInput($db->conn, $_POST['mobile']);
    $password = validateInput($db->conn, $_POST['password']);
    $cpassword = validateInput($db->conn, $_POST['cpassword']);

    $mobile_length = $seller_register->checkMobile($mobile);

    if ($mobile_length) {
        $pwd_check = $seller_register->confirmPassword($password, $cpassword);
        if ($pwd_check) {
            $check_seller_exists = $seller_register->isSellerExists($email, $mobile);
            if ($check_seller_exists) {
                $result_seller_register = $seller_register->registerSeller($fname, $lname, $email, $mobile, $password);
                if ($result_seller_register) {
                    $set_seller_session->setSellerDataToSession($email);
                    redirect('registered success', 'seller/index.php');
                } else {
                    redirect('something wento wrong', 'seller/register.php');
                }
            } else {
                redirect('this seller is already registered please login', 'seller/login.php');
            }
        }
    } else {
        redirect('check your mobile no again', 'seller/register.php');
    }
}

if (isset($_POST['seller_login_btn'])) {
    $email = validateInput($db->conn, $_POST['email']);
    $password = validateInput($db->conn, $_POST['password']);

    $is_seller_exists = $seller_register->isSellerExists($email, '');
    if (!$is_seller_exists) {
        $result_seller_login = $seller_login->login_seller($email, $password);
        if ($result_seller_login == "query failed") {
            redirect('something went wrong', 'seller/login.php');
        } else if ($result_seller_login == "wrong pwd") {
            redirect('wrong password', 'seller/login.php');
        } else if ($result_seller_login == "right pwd") {
            $set_seller_session->setSellerDataToSession($email);
            $is_seller_verified_result = $seller_login->isSellerVerified($_SESSION['auth_seller']['seller_id']);

            if ($is_seller_verified_result==0 || $is_seller_verified_result==1 || $is_seller_verified_result==2) {
                $set_seller_session->setSellerVerifySession($is_seller_verified_result);
                redirect('loged in success', 'seller/index.php');
                // redirect($_SESSION['seller_verify'], 'seller/login.php');
            }else{
                redirect('can not find seller status. please contact customer support', 'seller/login.php');
            }
            

        } else {
            redirect('something went wrong', 'seller/login.php');
        }
    } else {
        redirect('check your email and try again', 'seller/login.php');
    }
}

if (isset($_POST['seller_logout_btn'])) {
    $check_logout = $seller_login->logout();
    if ($check_logout) {
        redirect('logout success', 'seller/index.php');
    }
}
