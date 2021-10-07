<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Connection{

    public static function connect(){

        $link = new PDO('mysql:host=localhost:3307;dbname=pdo_test', 'root', 'root');
        
        return $link; 
        // var_dump($link);
    }

    
}

$test = new Connection();
$test -> connect();