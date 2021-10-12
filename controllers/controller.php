<?php

ob_start();

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
                <td><a href="index.php?action=update&id='.$data["id"].'"><button class="btn btn-success">Modifica</button></a></td>
                <td><a href="index.php?action=users&delete='.$data["id"].'"><button class="btn btn-danger">Cancella</button></a></td>
            </tr>
            ';
        }
    }

    // UPDATE = modifica e aggiornamento degli utenti e del database;
    public function updateUserController(){

        $dataController = $_GET['id'];
        $responseDb = Data::updateUserModel($dataController, 'users');

        $id = $responseDb['id'];
        $name = $responseDb['name'];
        $email = $responseDb['email'];
        $pass = $responseDb['pass'];

        echo '

        <input value="'.$id.'" name="idUtente" hidden>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Il tuo Nome" aria-label="First name" name="nome" value="'.$name.'" required>
                </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="La tua Mail" name="mail" value="'.$email.'" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="La tua Password" name="password" value="'.$pass.'" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        
        
        ';
    }


    // Aggiornamento dei dati nel database;
    public function updateUserController_2(){

        if(isset($_POST['nome'])){
            $dataController = array(
                'id' => $_POST['idUtente'],
                'nome' => $_POST['nome'],
                'mail' => $_POST['mail'],
                'password' => $_POST['password']
            );

            $responseDb = Data::updateUserModel_2($dataController, 'users');

            if($responseDb == 'success'){

                header('location:index.php?action=edit');

            }else{
                echo 'error';
            }

        }
    }


    // DELETE = Cancellare gli utenti;
    public function deleteUserController(){

        if(isset($_GET['delete'])){

            $dataController = $_GET['delete'];

            $responseDb = Data::deleteUserModel($dataController, 'users');

            if($responseDb == 'success'){

                header('location:index.php?action=users');

            }

        }
    }
}