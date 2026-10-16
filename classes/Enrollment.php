<?php 

//name space 
namespace Classes;

use PDO;

require_once 'Database.php';

class Enrollment {
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
        
    // course , students 
    $sql = "select e.id ,e.enrolled_at , e.student_id , e.course_id ,
    s.name As student_name  , s.email , c.title as course_title , c.price 
     from enrollments e , students s , courses c  where e.student_id = s.id and e.course_id = c.id
    ";
    $result = $this->db->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    // count total enrollments for dashboard cards


    public function countEnrollments(){

    $result = $this->db->query(
        "select count(*) as total from enrollments"
    );

    return $result->fetch(PDO::FETCH_ASSOC);

}
}