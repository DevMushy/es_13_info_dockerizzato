<?php   session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="../css/accesspage.css" type="text/css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <title>LOGIN § REGISTER</title>
</head>

<body>
  <?php
  if (isset($_SESSION["controllo"])) {
    echo '<div class="alert alert-danger" role="alert">
            Assicurati di essere registrato prima di fare il login!
            </div>';
  }
  ?>

  <br>
  <center>
    <h4 class="text-white"><button value="1" onclick="x(1)" id="z" style="color:black;">Register</button> / <button
        value="2" onclick="x(2)" id="y" class="">Login</button></h4>
  </center><br>

  <div id="register">
    <form action="LogRegBack.php" method="post" class="form">
      <label>Nome</label><br />
      <input type="text" id="nome" name="nome" required /><br />

      <label>Cognome</label><br />
      <input type="text" id="cognome" name="cognome" required /><br />

      <label>Email</label><br />
      <input type="email" id="email" name="email" required /><br />

      <label>Indirizzo</label><br />
      <input type="text" id="indirizzo" name="indirizzo" required /><br />

      <label>Telefono</label><br />
      <input type="text" id="telefono" name="telefono" required /><br />

      <label>Password</label><br />
      <input type="password" id="password" name="password" required /><br /><br />

      <input type="submit" value="Registrati" class="btn text-white" />
    </form>
  </div>
  <div class="hidden" id="login">
    <form action="LogRegBack.php" method="post" class="form">

      <label>Email</label><br />
      <input type="email" id="email" name="email" required /><br />

      <label>Password</label><br />
      <input type="password" id="password" name="password" required /><br /><br />

      <input type="submit" value="Accedi" class="btn text-white" />
    </form>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="../js/accessPage.js"></script>

</html>