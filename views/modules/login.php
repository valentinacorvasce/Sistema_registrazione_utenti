<h2>Login</h2>

<?php

  $login = new MvcTemplate();
  $login -> loginUserController();

  if(isset($_GET['action'])){
    if($_GET['action'] == 'error'){
          echo '<div class="alert alert-warning">Attenzione, la mail o la password inserite non sono presenti nel nostro database!</div>';
    }

    if($_GET['action'] == 'captchafail'){
      echo '<div class="alert alert-warning">Fai attenzione al Captcha!</div>';
    }
}

?>

<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="La tua Mail" name="mail" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="La tua Password" name="password" required>
  </div>
  <div class="g-recaptcha my-5" data-sitekey="6LdJAwodAAAAALA5PrlYI9n96h5f4AmSab7SOSKC"></div>
  <div class="d-grid">
    <button type="submit" class="btn btn-primary" name="login">Entra</button>
  </div>
</form>

