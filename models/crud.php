<?php

require_once 'connection.php';

class Data extends Connection{

    public static function registerUserModel($dataModel, $table){

        $stmt = Connection::connect() -> prepare("INSERT INTO $table(name, email, pass) VALUES(:n, :em, :ps)");
        $stmt -> bindParam(':n', $dataModel['nome'], PDO::PARAM_STR);
        $stmt -> bindParam(':em', $dataModel['mail'], PDO::PARAM_STR);
        $stmt -> bindParam(':ps', $dataModel['password'], PDO::PARAM_STR);

        if($stmt -> execute()){
            return 'success';
        }else{
            return '<div class="alert alert-danger">Ops, si è verificato un errore.</div>';
        }

        $stmt -> close();
    }

    // Login Utente;
    public static function loginUserModel($dataModel, $table){
        $stmt = Connection::connect() -> prepare("SELECT email, pass FROM $table WHERE email = :em");
        $stmt -> bindParam(':em', $dataModel['mail'], PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
               $stmt -> close();

    }


    // READ = leggere i dati;
    public static function showUserModel($table){
        $stmt = Connection::connect() -> prepare("SELECT * FROM $table");
        $stmt -> execute();

        return $stmt -> fetchAll();
               $stmt -> close();
    }


}
    