<?php

session_start();
session_destroy();

if(!isset($_SESSION['validation'])){     
	header("Location:../../index.php"); 
   }

?>

<h1>Hai eseguito correttamente il Logout!</h1>
