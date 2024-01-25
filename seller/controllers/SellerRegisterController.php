<?php
// session_start();

class SellerRegisterController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function confirmPassword($pwd, $cpwd)
    {
        if ($pwd === $cpwd) {
            return true;
        } else {
            return false;
        }
    }

    public function checkMobile($mobile)
    {
        if (strlen($mobile) == 10) {
            return true;
        } else {
            return false;
        }
    }

    public function isSellerExists($email, $mobile)
    {
        $check = "SELECT seller_id FROM seller WHERE seller_email='$email' OR seller_mobile='$mobile' LIMIT 1;";
        $result = $this->conn->query($check);
        if ($result->num_rows == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function registerSeller($fname, $lname, $email, $mobile, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $seller_register_query = "INSERT INTO seller(seller_fname, seller_lname, seller_email, seller_mobile, seller_password) VALUES ('$fname', '$lname', '$email', '$mobile', '$hashed_password');";
        $result = $this->conn->query($seller_register_query);
        if ($result) {
            // $seller_data = $result -> fetch_assoc();
            // $this->setSellerDataToSession($email);
            return true;
        } else {
            return false;
        }
    }

    // private function setSellerDataToSession($email)
    // {
    //     $query = "SELECT * FROM seller WHERE seller_email='$email';";
    //     $result = $this->conn->query($query);
    //     if ($result->num_rows > 0) {
    //         $data = $result->fetch_assoc();
    //         $_SESSION['seller_auth'] = true;
    //         $_SESSION['auth_seller'] = [
    //             'seller_id' => $data['seller_id'],
    //             'seller_fname' => $data['seller_fname'],
    //             'seller_lname' => $data['seller_lname'],
    //             'seller_email' => $data['seller_email'],
    //             'seller_mobile' => $data['seller_mobile']
    //         ];
    //     }
    // }


}