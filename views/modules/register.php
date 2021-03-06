<h2>Registrazione</h2>

<?php 

    $register = new MvcTemplate();
    $register -> registerUserController();

    if(isset($_GET['action'])){
        if($_GET['action'] == 'ok'){
              echo '<div class="alert alert-success">Utente inserito correttamente!</div>';
        }
    }

?>

<form method="POST" onsubmit="return validRegistration()">
    <div class="mb-3">
        <label for="name" class="form-label">Nome<span></span></label>
        <input type="text" class="form-control" placeholder="Il tuo Nome" aria-label="First name" id="name" name="nome" required>
    </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email<span></span></label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="La tua Mail" name="mail" required>
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label">Password</label>
    <input type="password" class="form-control" id="pass" placeholder="La tua Password" name="password" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="check">
    <label class="form-check-label" for="check">Accetto l'<a href="#">informativa per la Privacy</a></label>
  </div>
  <div class="d-grid">
    <button type="submit" name="submit" class="btn btn-primary">Iscriviti!</button>
  </div>
</form>

