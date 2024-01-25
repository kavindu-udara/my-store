<?php

class DatabaseConnection{
    public function __construct(){
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

        if($conn -> connect_error){
            die("<h1>Database connection failed!</h1>");
        }

        return $this->conn = $conn;
    }
}