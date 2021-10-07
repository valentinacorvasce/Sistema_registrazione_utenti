<?php

require_once 'connection.php';

class Data extends Connection{

    public static function registerUserModel($dataModel, $table){

        $stmt = Connection::connect() -> prepare('INSERT INTO $table(name, email, pass) VALUES(:n, :em, :ps)');
        $stmt -> bindParam(':n', $dataModel['nome'], PDO::PARAM_STR);
        $stmt -> bindParam(':em', $dataModel['mail'], PDO::PARAM_STR);
        $stmt -> bindParam(':ps', $dataModel['password'], PDO::PARAM_STR);

        if($stmt -> execute()){
            return '<div class="alert alert-success">Dati inseriti correttamente!</div>';
        }else{
            return '<div class="alert alert-danger">Ops, si è verificato un errore.</div>';
        }
    }
    }
    