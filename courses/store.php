<?php 

require_once "../APP.php";
require_once '../classes/Course.php';
use Classes\Course;
// handle  ???????
//check  ??
if($request->check($request->post('submit'))){

    //ctach 
    $title = $request->filter($request->post('title'));
    $description  = $request->filter($request->post('description'));
    $price= $request->filter($request->post('price'));


    // vaild
    //
    //errors 

    //insert 
    $CourseObj = new Course();
    $CourseObj->insert($title , $description ,$price);
    
    //redirect 
    $request->redirect("index.php");

}
