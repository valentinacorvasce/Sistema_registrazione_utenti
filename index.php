<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "controllers/controller.php";
require_once "models/links.php";
require_once "models/crud.php";

$show = new MvcTemplate();
$show -> showTemplate();


?>
