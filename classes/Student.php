<?php 

//name space 
namespace Classes;

use PDO;

require_once 'Database.php';

class Student {
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
        
        $result = $this->db->query("select * from students ");
        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getById($id){
        $result = $this->db->prepare("select * from students where id =:id");
        $result->bindParam(":id",$id,PDO::PARAM_INT);
        // $result->execute([$id,$age]);
        $result->execute();

        return  $result->fetch(PDO::FETCH_ASSOC);

    }

    public function insert($name , $email , $phone){
        $result = $this->db->prepare("insert into students (name , email , phone ) values(:name , :email ,:phone) ");
        $result->bindParam(":name",$name,PDO::PARAM_STR);
        $result->bindParam(":email",$email,PDO::PARAM_STR);
        $result->bindParam(":phone",$phone,PDO::PARAM_STR);
        $result->execute();
        return $this->db->lastInsertId();

    }
}