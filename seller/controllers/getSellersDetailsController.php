<?php

class GetSellersDetailsController{
    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function getShopData($id){
        $query = "SELECT * FROM seller_has_shop WHERE seller_id='$id' LIMIT 1;";
        $result = $this -> conn -> query($query);
        if($result -> num_rows == 1){
            $data = $result -> fetch_assoc();
            return $data;
        }else{
            return "no data";
        }
    }

    public function getShopImg($id){
        $query = "SELECT shop_image FROM seller_has_shop WHERE seller_id='$id' ;";
        $result = $this -> conn -> query($query);
        if($result->num_rows == 1){
            $imgUrl = $result -> fetch_assoc();
            return $imgUrl;
        }else{
            return "now rows";
        }
    }
}