<?php

// include('../config/app.php');
include_once('controllers/RegisterController.php');
include_once('controllers/LoginController.php');


$auth = new LoginController;

if (isset($_POST['register_btn'])) {
    $fname = validateInput($db->conn, $_POST['fname']);
    $lname = validateInput($db->conn, $_POST['lname']);
    $email = validateInput($db->conn, $_POST['email']);
    $mobile = validateInput($db->conn, $_POST['mobile']);
    $password = validateInput($db->conn, $_POST['password']);
    $cpassword = validateInput($db->conn, $_POST['cpassword']);

    $register = new RegisterController;

    $mobile_length = $register->checkMobile($mobile);

    if ($mobile_length) {
        $result_password = $register->confirmPassword($password, $cpassword);
        if ($result_password) {
            $userExists = $register->isUserExist($email);
            if ($userExists) {
                redirect('Email is already exists', 'register.php');
            } else {
                $user_register = $register->registerUser($fname, $lname, $email, $mobile, $password);
                if ($user_register) {
                    redirect('User register Success', 'login.php');
                } else {
                    redirect('User register not success', 'register.php');
                }
            }
        } else {
            redirect('Passwords does not match', 'register.php');
        }
    } else {
        redirect('mobile length must be 10 characters', 'register.php');
    }
}

if (isset($_POST['login_btn'])) {
    $email = validateInput($db->conn, $_POST['email']);
    $password = validateInput($db->conn, $_POST['password']);

    // $login = new LoginController;

    // $checkLoggedIn = $login -> checkLoggedIn();


    $login_user = $auth->login($email, $password);

    if ($login_user == 1) {

        if ($_SESSION['auth_role'] == 1) {
            redirect('success', 'admin/index.php');
        } else {
            redirect('success', 'index.php');
        }

    } else if ($login_user == 'wrong email') {
        redirect('wrong email', 'login.php');
    } else if ($login_user == 0) {
        redirect('wrong password', 'login.php');
    } else {
        redirect('something went wrong', 'login.php');
    }
}

if (isset($_POST['user_profile_btn'])) {
    $isUserLoggedIn = $auth->isUserLoggedIn();
    if ($isUserLoggedIn) {
        redirect('profile', 'my-profile.php');
    } else {
        redirect('please login first', 'login.php');
    }
}

if (isset($_POST['edit_profile'])) {
    $fname = validateInput($db->conn, $_POST['fname']);
    $lname = validateInput($db->conn, $_POST['lname']);
    $email = validateInput($db->conn, $_POST['email']);
    $mobile = validateInput($db->conn, $_POST['mobile']);

    $editProfile = $auth->saveChanges($fname, $lname, $email, $mobile);
    if ($editProfile) {
        redirect('changes saved success', 'my-profile.php');
    } else {
        redirect('something wrong', 'my-profile.php');
    }
}

if (isset($_POST['user_logout_btn'])) {
    $checkLoggedOut = $auth->logout();
    if ($checkLoggedOut) {
        redirect('logged out success', 'index.php');
    } else {
        redirect('something wrong', 'login.php');
    }
}

if (isset($_POST['change_passwrd'])) {
    $pwd = validateInput($db->conn, $_POST['password']);
    $cpwd = validateInput($db->conn, $_POST['cpassword']);
    $register = new RegisterController;
    $result_password = $register->confirmPassword($pwd, $cpwd);
    $isUserLoggedIn = $auth->isUserLoggedIn();
    if ($isUserLoggedIn) {
        if ($result_password) {
            $changepwd_result = $auth->changePassword($pwd, $cpwd);
            if ($changepwd_result) {
                redirect('password changed success!', 'change-password.php');
            } else {
                redirect('password changed failed', 'change-password.php');
            }
        } else {
            redirect('passwords does not match', 'change-password.php');
        }
    } else {
        redirect('please login first', 'login.php');
    }
}

