<?php

require_once "../../controllers/controller.php";
require_once "../../models/crud.php";

class Ajax{

    public $validUser;
    public $validMail;

    public function validUserAjax(){
        $data = $this -> validUser;

        $response = MvcTemplate::userValidationController($data);
        // echo $data; 
        echo $response;
    }

    public function validMailAjax(){
        $data = $this -> validMail;

        $response = MvcTemplate::mailValidationController($data);
        // echo $data; 
        echo $response;
    }
}

if(isset($_POST['userValidation'])){

    $validationUser = new Ajax();
    $validationUser -> validUser = $_POST['userValidation'];
    $validationUser -> validUserAjax();

}

if(isset($_POST['mailValidation'])){

    $validationMail = new Ajax();
    $validationMail -> validMail = $_POST['mailValidation'];
    $validationMail -> validMailAjax();

}