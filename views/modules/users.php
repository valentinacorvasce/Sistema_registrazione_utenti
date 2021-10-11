<?php

session_start();

if(!$_SESSION['validation']){
    header('location:index.php?action=login');
}

?>

<h2>Utenti</h2>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Gestisci</th>
        <th></th>

    </tr>
    </thead>

    <tbody>

    <?php

        $showUsers = new MvcTemplate();
        $showUsers -> showUserController();

    ?>


    </tbody>
</table>