<?php 

namespace Classes ;

use PDO;

class Database {
    // 1- connection 
    // conn 
    public $conn;
    private $host = "localhost";
    private $db_name = "course_management";

    private $username= "root" ;
    private $pass = "";
    public function __construct()
    {
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name",$this->username,$this->pass);

    }

    public function getConnection(){
        return $this->conn;
    }

}