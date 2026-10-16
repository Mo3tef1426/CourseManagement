<?php 

//name space 
namespace Classes;

use PDO;

require_once 'Database.php';

class Course {
    //class db 
    //construct 
    private $db; 

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    //crud  students 
    //s elect all 

    public function getAll(){
        
        $result = $this->db->query("select * from courses ");
        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    //insert me
    
    public function insert($title , $description , $price)
{
    $result = $this->db->prepare( "INSERT INTO courses (title, description, price) VALUES (:title, :description, :price)");

    $result->bindParam(":title", $title, PDO::PARAM_STR);
    $result->bindParam(":description", $description, PDO::PARAM_STR);
    $result->bindParam(":price", $price);

    $result->execute();

    return $this->db->lastInsertId();
}
}