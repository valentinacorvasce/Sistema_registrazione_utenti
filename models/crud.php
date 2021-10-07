<?php

require_once 'connection.php';

class Data extends Connection{

    public static function registerUserModel($dataModel, $table){

        $stmt = Connection::connect() -> prepare('INSERT INTO $table(name, email, pass) VALUES(:n, :em, :ps)');
    }
}