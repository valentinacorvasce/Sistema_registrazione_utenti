<?php

require_once "../../controllers/controller.php";
require_once "../../models/crud.php";

class Ajax{

    public $validUser;

    public function validUserAjax(){
        $data = $this -> validUser;

        $response = MvcTemplate::userValidationController($data);
        // echo $data; 
        echo $response;
    }
}

$validationUser = new Ajax();
$validationUser -> validUser = $_POST['userValidation'];
$validationUser -> validUserAjax();