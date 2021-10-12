<h2>Login</h2>

<?php

  $login = new MvcTemplate();
  $login -> loginUserController();

  if(isset($_GET['action'])){
    if($_GET['action'] == 'error'){
          echo '<div class="alert alert-warning">Attenzione, il nome utente e la mail inseriti non sono presenti nel nostro database!</div>';
    }
}

?>

<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="La tua Mail" name="mail" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="La tua Password" name="password" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <div class="d-grid">
    <button type="submit" class="btn btn-primary" name="login">Submit</button>
  </div>
</form>

