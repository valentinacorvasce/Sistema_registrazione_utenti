<?php

class MvcTemplate{

    public function showTemplate(){
        include 'views/template.php';
    }

    public function linksController(){

        if(isset($_GET['action'])){

            $links = $_GET['action'];

        }else{

            $links = 'index';
        }

        $response = Pages::showPages($links);

        include $response;

    }


    // CREATE = Inserimento nuovi dati;
    public function registerUserController(){

        $dataController = array(
            'nome' => $_POST['nome'],
            'mail' => $_POST['mail'],
            'password' => $_POST['password']
        );

        $responseDb = Data::registerUserModel($dataController, 'users');
            echo $responseDb;
        
        
        
    }
}