<?php 

// requests ????

namespace Classes;

// get post 
class Request {
//1- get 
    public function get($key){
        if(isset($_GET[$key])) {
            return $_GET[$key];
        }else{
            return "Key Not Found";

        }
    }

//2- post 
    public function post($key){
        if(isset($_POST[$key])) {
            return $_POST[$key];
        }else{
            return "Key Not Found";

        }
    }

//3-  filter  trim ?

    public function filter($key){
        return trim(htmlspecialchars($key));
    }


    //4- check 

    public function check($key){
        return isset($key);
    }

    //5- redirect 

    public function redirect($path){
        header("location:$path");
    }

}


//form -> db ??  class conniction  , method crud ??  class  ???
// / db ?   =>  curd ?
