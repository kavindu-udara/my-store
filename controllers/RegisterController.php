<?php
// include('config/app.php');
class RegisterController{

    public function __construct(){
        $db = new DatabaseConnection;
        $this -> conn = $db -> conn;
    }
    public function confirmPassword($pwd, $cpwd){
        if($pwd === $cpwd){
            return true;
        }else{
            return false;
        }
    }

    public function isUserExist($email){
        $check = "SELECT email FROM users WHERE email='$email' LIMIT 1;";
        $result = $this->conn->query($check);
        if($result -> num_rows > 0){
            return true;
        }else{
            return false;
        }
    }

    public function checkMobile($mobile){
        if(strlen($mobile) == 10){
            return true;
        }else{
            return false;
        }
    }

    public function registerUser($fname, $lname, $email, $mobile, $password){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $register_query = "INSERT INTO users(firstname, lastname, email, phone, password) VALUES ('$fname', '$lname', '$email', '$mobile', '$hashed_password');";
        $result = $this->conn->query($register_query);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}