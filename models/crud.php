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

    // Modifica dei dati;
    public static function updateUserModel($dataModel, $table){
        $stmt = Connection::connect() -> prepare("SELECT * FROM $table WHERE id = :id");
        $stmt -> bindParam(':id', $dataModel, PDO::PARAM_INT);
        $stmt -> execute();

        return $stmt -> fetch();
               $stmt -> close();

    }


    // Aggiornamento dei dati;
    public static function updateUserModel_2($dataModel, $table){

        $stmt = Connection::connect() -> prepare("UPDATE $table SET name = :n, email = :em, pass = :ps WHERE id = :id");
        $stmt -> bindParam(':n', $dataModel['nome'], PDO::PARAM_STR);
        $stmt -> bindParam(':em', $dataModel['mail'], PDO::PARAM_STR);
        $stmt -> bindParam(':ps', $dataModel['password'], PDO::PARAM_STR);
        $stmt -> bindParam(':id', $dataModel['id'], PDO::PARAM_INT);

        if($stmt -> execute()){
            return 'success';
        }else{
            return '<div class="alert alert-danger">Ops, si è verificato un errore.</div>';
        }

        $stmt -> close();

    }


    // Cancellare i dati dal database;
    public static function deleteUserModel($dataModel, $table){
        $stmt = Connection::connect() -> prepare("DELETE FROM $table WHERE id = :id");
        $stmt -> bindParam(':id', $dataModel, PDO::PARAM_INT);

        if($stmt -> execute()){

            return 'success';
        }else{
            return 'error';
        };

               $stmt -> close();

    }

    // Ajax: controllo input sul nome;
    public static function userValidationModel($dataModel, $table){
        $stmt = Connection::connect() -> prepare("SELECT name FROM $table WHERE name = :name");
        $stmt -> bindParam(':name', $dataModel, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetch();
               $stmt -> close();

    }

}
    