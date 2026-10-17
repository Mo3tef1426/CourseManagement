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

  // count total courses for dashboard cards
public function countCourses(){

    $result = $this->db->query(
        "select count(*) as total from courses"
    );

    return $result->fetch(PDO::FETCH_ASSOC);

}
//sow one course 
public function getById($id){

    $result = $this->db->prepare(
        "select * from courses where id = :id"
    );

    $result->bindParam(
        ":id",
        $id,
        PDO::PARAM_INT
    );

    $result->execute();

    return $result->fetch(PDO::FETCH_ASSOC);

}
// count students enrolled in course
public function countStudents($courseId){

    $result = $this->db->prepare(
        "select count(*) as total
         from enrollments
         where course_id = :course_id"
    );

    $result->bindParam(":course_id", $courseId, PDO::PARAM_INT);

    $result->execute();

    return $result->fetch(PDO::FETCH_ASSOC);

}


// get students in course

public function getStudentsInCourse($courseId){

    $result = $this->db->prepare( "SELECT s.id, s.name, s.email, s.phone, e.enrolled_at FROM enrollments e JOIN students s
         ON e.student_id = s.id WHERE e.course_id = :course_id" );

    $result->bindParam( ":course_id", $courseId,  PDO::PARAM_INT );

    $result->execute();

    return $result->fetchAll(PDO::FETCH_ASSOC);

}
}