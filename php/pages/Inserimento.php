<?php
$host = "dbServer";
$user = "root";
$pass = "ciao";
$db = "es12";
// connessione al DBMS
$connessione = mysqli_connect($host, $user, $pass, $db)

  or die("Connessione non riuscita " . mysqli_connect_error());

if (isset($_POST['titolo']) and $_POST['titolo'] != 0) {

  $idGenere = $_POST['genere'];

  $query1 = "SELECT ID FROM `genere` WHERE Descrizione = '$idGenere'";

  $res2 = mysqli_query($connessione, $query1);

  $row = $res2->fetch_assoc();

  $titolo = $_POST['titolo'];
  $regista = $_POST['regista'];
  $anno = $_POST['anno'];
  $tipo = $_POST['tipo'];
  $idGenere = $row['ID'];

  $sql1 = "INSERT INTO video (titolo, regista, anno, tipo, IDgenere)
    VALUES ('$titolo', '$regista', '$anno', '$tipo', '$idGenere')";
  $res1 = mysqli_query($connessione, $sql1);

  $_POST['titolo'] = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <title>INSERIMENTO</title>
</head>

<body>
  <div class="sidebar">
    <a href="../index.php" class="a">
      <h3 class="h3">VideoTeca</h3>
    </a>
    <nav>
      <div class="div">
        <a href="../index.php" class="a">Home
          <hr class=" hr" />
        </a>
      </div>
      <br /><br />
      <div class="div">
        <a href="./inserimento.php" class="a">Inserisci Film
          <hr class="hrActive hr" />
        </a>
      </div>
      <br /><br />
      <div class="div">
        <a href="./Visualizza.php" class="a">Visualizza Film
          <hr class="hr" />
        </a>
      </div>
      <br /><br />
      <div class="div">
        <a href="./noleggio.php" class="a">Noleggio Film
          <hr class="hr" />
        </a>
      </div>
      <br /><br />
    </nav>
    <form action="../index.php" method="GET">
      <input type="submit" name="logout" value="Log Out" />
    </form>
  </div>

  <div class="main-content">
    <h2>INSERIMENTO FILM</h2>
    <h4>Compila il form qui sotto per inserire un nuovo elemento nella videoTeca!</h4>
    <form action="./Inserimento.php" method="post">
      <div class="form">
        <label for="titolo">Titolo:</label><br>
        <input type="text" id="titolo" name="titolo" placeholder="Inserisci il titolo del film" required><br><br>
        <label for="regista">Regista:</label><br>
        <input type="text" id="regista" name="regista" placeholder="Inserisci il nome del regista" required><br><br>
        <label for="anno">Anno:</label><br>
        <input type="text" id="anno" name="anno" placeholder="Inserisci l'anno d'uscita" required><br><br>
        <label for="tipo">Tipo:</label><br>
        <select id="tipo" name="tipo" required><br><br>
          <option value="VHS">VHS</option>
          <option value="DVD">DVD</option>
        </select><br><br>
        <label for="genere">Genere:</label><br>
        <select id="genere" name="genere" required>
          <?php
          $query = "SELECT Descrizione FROM genere";
          $result = $connessione->query($query);
          while ($row = $result->fetch_assoc()) {
            echo "<option>" . $row['Descrizione'] . "</option>";
          }

          ?>
        </select><br><br>
        <input type="submit" value="Inserisci" class="btn">
      </div>
    </form>
  </div>
</body>

</html>