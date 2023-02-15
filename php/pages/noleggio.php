<?php
$host = "dbServer";
$user = "root";
$pass = "ciao";
$db = "es12";
session_start();
$_SESSION["tabella"] = 0;
// connessione al DBMS
$connessione = mysqli_connect($host, $user, $pass, $db)

  or die("Connessione non riuscita " . mysqli_connect_error());


if (isset($_POST['film'])) {
  $IDVideo = $_POST['film'];
  $_POST["film"] = null;
  $film = "SELECT ID FROM video WHERE titolo = '$IDVideo'";
  $resFilm = mysqli_query($connessione, $film)
    or die("<br>Query fallita " . $mysqli->error . " " . $mysqli->errno);
  $row = $resFilm->fetch_assoc();

  $IDVideo = $row['ID'];
  $IDSocio = $_SESSION['user'];

  $sql = "INSERT INTO noleggio (IDsocio, IDvideo)
  VALUES ('$IDSocio', '$IDVideo')";
  $resInsert = mysqli_query($connessione, $sql)
    or die("<br>Query fallita " . $mysqli->error . " " . $mysqli->errno);

}
if (isset($_POST['rest'])) {
  $idvideo = $_POST['rest'];
  $delete = "DELETE FROM noleggio WHERE IDvideo = '$idvideo'";
  $resultDelete = $connessione->query($delete);
  $_POST['rest'] = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <title>NOLEGGIO</title>
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
      <?php
          if($_SESSION['user'] == 0){
            echo '<div class="div">
            <a href="./Inserimento.php" class="a">Inserisci Film
                <hr class="hr" />
            </a>
        </div>
        <br /><br />';
          }
        ?>
      <div class="div">
        <a href="./Visualizza.php" class="a">Visualizza Film
          <hr class="hr" />
        </a>
      </div>
      <br /><br />
      <div class="div">
        <a href="./noleggio.php" class="a">Noleggio Film
          <hr class="hrActive hr" />
        </a>
      </div>
      <br /><br />
    </nav>
    <form action="../index.php" method="GET">
      <input type="submit" name="logout" value="Log Out" />
    </form>
  </div>

  <div class="main-content">
    <h2>NOLEGGIO FILM</h2>
    <h4>Cerca il nome del film e noleggialo o restituisci i film che hai gia!</h4>
    <form action="./noleggio.php" method="post" class="searchBar">
      <input type="text" id="film" name="film" placeholder="Search..." required>
      <input type="submit" value="Noleggia" class="searchbtn">
    </form><br>
    <form action='./noleggio.php' method='POST' class="searchBar">
      <input type="text" id="rest" name="rest" placeholder="Inserisci l'id del film per restituirlo...">
      <input type='submit' name='restituisci' id='restituisci' value='Restituisci' class="searchbtn">
    </form><br><br>
    <table class="tableVis tabellaSotto">
      <thead>
        <tr class="titTab">
          <th>ID Film</th>
          <th>Titolo</th>
          <th>Data Noleggio</th>
        </tr>

      </thead>
      <tbody>
        <?php
        $user = $_SESSION['user'];
        $query = "SELECT * FROM noleggio WHERE IDsocio = '$user'";
        $result = $connessione->query($query);
        while ($row = $result->fetch_assoc()) {
          $temp = $row['IDvideo'];
          $query1 = "SELECT titolo FROM video WHERE ID = '$temp'";
          $result1 = $connessione->query($query1);
          $row1 = $result1->fetch_assoc();
          if ($_SESSION["tabella"] == 0) {
            echo '<tr class="tabellaRow">' .
              "<td>" . $row['IDvideo'] . "</td>" .
              "<td>" . $row1['titolo'] . "</td>" .
              "<td>" . $row['dataNoleggio'] . "</td>" .
              "</tr>";
            $_SESSION["tabella"] = 1;
          } else {
            echo '<tr>' .
              "<td>" . $row['IDvideo'] . "</td>" .
              "<td>" . $row1['titolo'] . "</td>" .
              "<td>" . $row['dataNoleggio'] . "</td>" .
              "</tr>";
            $_SESSION["tabella"] = 0;
          }
        }

        ?>
      </tbody>
    </table>
  </div>
</body>

</html>