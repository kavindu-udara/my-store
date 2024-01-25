<?php

class LoginController{
    public function __construct(){
        $db = new DatabaseConnection;
        $this -> conn = $db -> conn;
    }

    public function login($email, $password){
        $check = "SELECT * FROM users WHERE email='$email' LIMIT 1;";
        $result = $this->conn->query($check);
        if($result->num_rows == 1){
            $user_data = $result->fetch_assoc();
            if(password_verify($password, $user_data['password']) == true){
                $this -> userAuthentication($user_data);
                return 1;
            }else{
                return 0;
            }
        }else{
            return 'wrong email';
        }
    }

    private function userAuthentication($data){
        $_SESSION['authenticated'] = true;
        $_SESSION['auth_role'] = $data['admin_role'];
        $_SESSION['auth_user'] = [
            'user_id' => $data['user_id'],
            'user_fname' => $data['firstname'],
            'user_lname' => $data['lastname'],
            'user_email' => $data['email'],
            'user_mobile' => $data['phone']
        ];
    }

    public function checkLoggedIn(){
        if(isset($_SESSION['authenticated']) == TRUE){
            redirect('you are already logged in', 'index.php');
        }else{
            return false;
        }
    }

    public function isUserLoggedIn(){
        if(isset($_SESSION['authenticated']) == TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function saveChanges($fname, $lname, $email, $mobile){
        $userId = $_SESSION['auth_user']['user_id'];
        $editQuery = "UPDATE users SET firstname='$fname', lastname='$lname', email='$email', mobile='$mobile' WHERE user_id='$userId' ";
        $result = $this->conn->query($editQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function logout(){
        if(isset($_SESSION['authenticated']) == TRUE){
            unset($_SESSION['authenticated']);
            unset($_SESSION['auth_role']);
            unset($_SESSION['auth_user']);
            session_destroy();
            return true;
        }else{
            return false;
        }
    }

    public function changePassword($pwd, $cpwd){
        $userId = $_SESSION['auth_user']['user_id'];
        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $changePwdQuery = "UPDATE users SET password='$hashed_pwd' WHERE user_id='$userId' ";
        $result = $this->conn->query($changePwdQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}