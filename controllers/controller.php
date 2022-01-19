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
            // Cifratura della password mediante funzione "crypt";
            $securePass = crypt(htmlentities($_POST['password']), '$5$zyPltHmiO9ZqMg7JHRWktNhB_GZ0jiQWvDe0c4N7$');


        $dataController = array(
            'nome' => htmlentities($_POST['nome']),
            'mail' => htmlentities($_POST['mail']),
            'password' => $securePass
        );

        $responseDb = Data::registerUserModel($dataController, 'users');
            // echo $responseDb;
        
        if($responseDb == 'success'){
            header('location:ok');

        }else{
            header('location:index.php');
        }
      }
    }


    // Gestione della funzione di Login;
    public function loginUserController(){

        if(isset($_POST['login'])){
             // Cifratura della password mediante funzione "crypt";
             $securePass = crypt(htmlentities($_POST['password']), '$5$zyPltHmiO9ZqMg7JHRWktNhB_GZ0jiQWvDe0c4N7$');

            $dataController = array(
                'mail' => htmlentities($_POST['mail']),
                'password' => $securePass
            );

            $responseDb = Data::loginUserModel($dataController, 'users');

            // Controllo di ReCaptcha;
            $secret = '6LdJAwodAAAAAOlQKWxeJ2LCydsRpl1M9SrsXqOZ';
            $response = $_POST['g-recaptcha-response'];
            $remoteIP = $_SERVER['REMOTE_ADDR'];

            $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteIP");
                $result = json_decode($verify);

        if($result -> success){


            if($responseDb['email'] == $_POST['mail'] && $responseDb['pass'] == $securePass){

                // Inizializzo una sessione;
                session_start();

                // Creo una variabile di sessione;
                $_SESSION['validation'] = true;

                header('location:users');

            }else{
                header('location:error');
            }          
        }elseif(empty($_POST['g-recaptcha-response'])){
            header('location:captchafail');

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

        $dataController = (int) $_GET['id'];
        $responseDb = Data::updateUserModel($dataController, 'users');

        $id = $responseDb['id'];
        $name = $responseDb['name'];
        $email = $responseDb['email'];
        $pass = $responseDb['pass'];

        echo '

        <input value="'.$id.'" name="idUtente" hidden>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nome</label>
                <input type="text" class="form-control" placeholder="Il tuo Nome" aria-label="First name" name="nome" value="'.$name.'" required>
                </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="La tua Mail" name="mail" value="'.$email.'" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="La tua Password" name="password" value="'.$pass.'" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Aggiorna!</button>
            </div>
        
        
        ';
    }


    // Aggiornamento dei dati nel database;
    public function updateUserController_2(){

        if(isset($_POST['nome'])){
             // Cifratura della password mediante funzione "crypt";
             $securePass = crypt($_POST['password'], '$5$zyPltHmiO9ZqMg7JHRWktNhB_GZ0jiQWvDe0c4N7$');

            $dataController = array(
                'id' => $_POST['idUtente'],
                'nome' => $_POST['nome'],
                'mail' => $_POST['mail'],
                'password' => $securePass
            );

            $responseDb = Data::updateUserModel_2($dataController, 'users');

            if($responseDb == 'success'){

                header('location:edit');

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

                header('location:users');

            }

        }
    }


    // Ajax user validation;
    static public function userValidationController($validUser){

        $dataController = $validUser;
        $responseDb = Data::userValidationModel($dataController, 'users');

        if(!empty($responseDb['name'])){
            echo 0;

        }else{
            echo 1;
        }

    }

        // Ajax mail validation;
        static public function mailValidationController($validMail){

            $dataController = $validMail;
            $responseDb = Data::mailValidationModel($dataController, 'users');
    
            if(!empty($responseDb['email'])){
                echo 0;
    
            }else{
                echo 1;
            }
    
        }
}
