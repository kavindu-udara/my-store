<?php

class SellerLoginController{
    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function login_seller($email, $password){
        $query = "SELECT seller_password FROM seller WHERE seller_email='$email';";
        $pwd_result = $this -> conn -> query($query);
        if($pwd_result->num_rows == 1){
            $pwd = $pwd_result -> fetch_assoc();
            $check_pwd = password_verify($password, $pwd['seller_password']);
            if($check_pwd){
                return 'right pwd';
            }else{
                return 'wrong pwd';
            }
        }else{
            return 'query failed';
        }
    }

    public function logout(){
        if(isset($_SESSION['seller_auth']) == TRUE){
            unset($_SESSION['seller_auth']);
            unset($_SESSION['auth_seller']);
            session_destroy();
            return true;
        }else{
            return false;
        }
    }

    public function isSellerVerified($id){
        $query = "SELECT verified FROM seller_details WHERE seller_id='$id';";
        $query_result = $this -> conn -> query($query);
        if($query_result->num_rows == 1){
            $verified_no = $query_result -> fetch_assoc();
            return $verified_no['verified'];
        }else{
            return false;
        }
    }
}