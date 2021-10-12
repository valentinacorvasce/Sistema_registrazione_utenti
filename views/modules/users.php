<?php

session_start();

if(!$_SESSION['validation']){
    header('location:index.php?action=login');

    exit();
}

?>

<h2>Utenti</h2>

<?php

if(isset($_GET['action'])){

    if($_GET['action'] == 'edit'){

        echo '<div class="alert alert-success">L\'utente è stato correttamente aggiornato!</div>';

    }

}

?>



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
        $showUsers -> deleteUserController();

    ?>


    </tbody>
</table>


