<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/signin.css">
    <title>LOGIN</title>
  </head>

  <body>
      <main class="form-signin">
        <form method="POST">
          <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

          <div class="form-floating">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">

            <label for="floatingInput">Email address</label>
          </div>

          <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">

            <label for="floatingPassword">Password</label>
          </div>

          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>

          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

          <p class="mt-5 mb-3 text-muted"></p>
        </form>
      </main>
  </body>
</html>

<?php
include 'header.php';

print("<br/>email = '" . $_POST['email'] . "'");
?>