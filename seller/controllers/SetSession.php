<?php

class SetSession{
    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function setSellerDataToSession($email)
    {
        $query = "SELECT * FROM seller WHERE seller_email='$email';";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION['seller_auth'] = true;
            $_SESSION['auth_seller'] = [
                'seller_id' => $data['seller_id'],
                'seller_fname' => $data['seller_fname'],
                'seller_lname' => $data['seller_lname'],
                'seller_email' => $data['seller_email'],
                'seller_mobile' => $data['seller_mobile']
            ];
            $_SESSION['fill-info'] = '0';
        }
    }

    public function setSellerVerifySession($id){
        $_SESSION['seller_verify'] = $id;
    }

    public function setFillSellerInfoStatus(){
        $_SESSION['fill-info'] = '1';
    }   
}