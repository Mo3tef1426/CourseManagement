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
}