<?php 
class Post{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    //GET ALL POST FROM DATABASE
    public function getAllPost(){
        $query = "SELECT * FROM post ORDER BY id DESC";

        $result = $this->db->select($query);
        return $result;
    }
}