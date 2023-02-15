<?php
$host = "dbserver";
$user = "root";
$pass = "ciao";
$db = "es12";
session_start();
// connessione al DBMS
$connessione = mysqli_connect($host, $user, $pass, $db)

    or die("Connessione non riuscita " . mysqli_connect_error());
if (empty($_SESSION['controllo'])) {
  header("Location: pages/accessPage.php");
}

if (!empty($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>HOME</title>
  </head>
  <body>
    <div class="sidebar">
      <a href="../index.php" class="a">
        <h3 class="h3">VideoTeca</h3>
      </a>
      <nav>
        <div class="div">
          <a href="./index.php" class="a"
            >Home
            <hr class="hrActive hr" />
          </a>
        </div>
        <br /><br />
        <?php
          if($_SESSION['user'] == 0){
            echo '<div class="div">
            <a href="./pages/Inserimento.php" class="a">Inserisci Film
                <hr class="hr" />
            </a>
        </div>
        <br /><br />';
          }
        ?>
        <div class="div">
          <a href="./pages/Visualizza.php" class="a"
            >Visualizza Film
            <hr class="" />
          </a>
        </div>
        <br /><br />
        <div class="div">
          <a href="./pages/noleggio.php" class="a"
            >Noleggio Film
            <hr class="hr" />
          </a>
        </div>
        <br /><br />
      </nav>
      <form action="index.php" method="GET">
        <input type="submit" name="logout" value="Log Out" />
      </form>
    </div>

    <div class="main-content">
  <h2>VIDEOTECA ONLINE</h2>
  <h4>Benvenuto <span><?php 
          $user1 = $_SESSION['user'];
          $query = "SELECT nome,cognome FROM userdata WHERE ID = '$user1'";
          $result = $connessione->query($query);
          $row = $result->fetch_assoc();
          echo $row["nome"] . " " . $row["cognome"];
  ?></span> questa pagina è ancora in sviluppo!!!</h4>

    </div>
  </body>
</html>
