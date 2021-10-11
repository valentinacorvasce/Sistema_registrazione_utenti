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

        if(isset($_POST['submit'])){
        $dataController = array(
            'nome' => $_POST['nome'],
            'mail' => $_POST['mail'],
            'password' => $_POST['password']
        );

        $responseDb = Data::registerUserModel($dataController, 'users');
            // echo $responseDb;
        
        if($responseDb == 'success'){
            header('location:index.php?action=ok');

        }else{
            header('location:index.php');
        }
    }
    }


    // Gestione della funzione di Login;
    public function loginUserController(){

        if(isset($_POST['login'])){
            $dataController = array(
                'mail' => $_POST['mail'],
                'password' => $_POST['password']
            );

            $responseDb = Data::loginUserModel($dataController, 'users');

            if($responseDb['email'] == $_POST['mail'] && $responseDb['pass'] == $_POST['password']){

                // Inizializzo una sessione;
                session_start();

                // Creo una variabile di sessione;
                $_SESSION['validation'] = true;

                header('location:index.php?action=users');

            }else{
                header('location:index.php?action=error');
            }

        }
    }


    // READ = leggere i dati;
    public function showUserController(){

        $responseDb = Data::showUserModel('users');

        foreach($responseDb as $row => $data){
            echo '
            <tr>
                <td>' . $data['name'] .'</td>
                <td>'. $data['email'] . '</td>
                <td>' . $data['pass'] . '</td>
                <td><button class="btn btn-success">Modifica</button></td>
                <td><button class="btn btn-danger">Cancella</button></td>
            </tr>
            ';
        }
    }
}