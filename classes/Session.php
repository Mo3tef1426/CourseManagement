<?php 

// namespace 
namespace Classes;
//create class 

class Session {

    //1- start session 
    public function __construct()
    {
        session_start();
    }

    //2- set session 
    // $_SESSION[''] = $vlaue ???
    public function set($key , $value){
        // $_SESSION['errors'] = $errors ; 
        $_SESSION[$key] = $value;
    }


    //3- get session 
    public function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];

        }else{
            return "Key Not Found";
        }
    }

    //4- unset session 
    // remove ??
    public function remove($key){
        unset($_SESSION[$key]);
    }


    //5- destroy session 
    public  function delete(){
        session_destroy();
    }

}