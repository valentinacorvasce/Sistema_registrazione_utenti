<?php

session_start();

if(!$_SESSION['validation']){
    header('location:login');

    exit();
}

?>

<h2>Aggiorna Utenti</h2>

<form method="POST">
    
<?php

$update = new MvcTemplate();
$update -> updateUserController();
$update -> updateUserController_2();

?>

</form>