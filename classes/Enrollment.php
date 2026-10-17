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
            
        // get last 5 enrollments
public function getRecentEnrollments(){

    $sql = "select e.id ,
                   e.enrolled_at ,
                   s.name as student_name ,
                   s.email ,
                   c.title as course_title
            from enrollments e ,
                 students s ,
                 courses c
            where e.student_id = s.id
            and e.course_id = c.id
            order by e.id desc
            limit 5";

    $result = $this->db->query($sql);

    return $result->fetchAll(PDO::FETCH_ASSOC);

}
// add enrollment

public function insert($studentId , $courseId){  $result = $this->db->prepare("insert into enrollments(student_id , course_id)
        values (:student_id , :course_id)");
          $result->bindParam(":student_id",$studentId,PDO::PARAM_INT);
  $result->bindParam( ":course_id",$courseId,PDO::PARAM_INT
    );

    return $result->execute();

}
}