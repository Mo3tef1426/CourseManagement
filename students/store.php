<?php 

require_once "../App.php";
require_once '../classes/Student.php';
use Classes\Student;
// handle  ???????
//check  ??
if($request->check($request->post('submit'))){

    //ctach 
    $name = $request->filter($request->post('name'));
    $email = $request->filter($request->post('email'));
    $phone = $request->filter($request->post('phone'));


    // vaild
    //
    //errors 

    //insert 
    $studentObj = new Student();
    $studentObj->insert($name , $email ,$phone);
    
    //redirect 
    $request->redirect("index.php");

}
