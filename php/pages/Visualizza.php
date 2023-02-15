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

if (isset($_POST["elimina"])) {
  $_POST['genere'] = null;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Visualizza</title>
  </head>
  <body>
<div class="sidebar">
    <a href="../index.php" class="a">
        <h3 class="h3">VideoTeca</h3>
    </a>
    <nav>
        <div class="div">
            <a href="../index.php" class="a">Home
                <hr class="hr" />
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
                <hr class="hrActive hr" />
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
<form action="./Visualizza.php" method="post" class="filtro">

      <label for="filtro">Filtro:</label>
      <select id="genere" name="genere" <?php
      $query = "SELECT Descrizione FROM genere";
      $result = $connessione->query($query);
      while ($row = $result->fetch_assoc()) {
        echo "<option>" . $row['Descrizione'] . "</option>";
      }

      ?> </select>
        <input type="submit" value="Filtra" class="btn">
        <input type="submit" name="elimina" id="elimina" value="Elimina filtro" class="btn">

    </form><br><br>
    <table class="tableVis tabellaSotto">
      <thead>
        <tr class="titTab">
          <th>Titolo</th>
          <th>Regista</th>
          <th>Anno</th>
          <th>Tipo</th>
          <th>Genere</th>
        </tr>

      </thead>
      <tbody>
        <?php

        if (!isset($_POST['genere'])) {
          $query = "SELECT * FROM video AS V INNER JOIN genere AS G ON V.idGenere = G.ID";
          $result = $connessione->query($query);
          while ($row = $result->fetch_assoc()) {
            if ($_SESSION["tabella"] == 0) {
              echo '<tr class="tabellaRow">' .
                "<td>" . $row['titolo'] . "</td>" .
                "<td>" . $row['regista'] . "</td>" .
                "<td>" . $row['anno'] . "</td>" .
                "<td>" . $row['tipo'] . "</td>" .
                "<td>" . $row['Descrizione'] .
                "</tr>";
              $_SESSION["tabella"] = 1;
            } else {
              echo '<tr>' .
                "<td>" . $row['titolo'] . "</td>" .
                "<td>" . $row['regista'] . "</td>" .
                "<td>" . $row['anno'] . "</td>" .
                "<td>" . $row['tipo'] . "</td>" .
                "<td>" . $row['Descrizione'] .
                "</tr>";
              $_SESSION["tabella"] = 0;
            }
          }
        } else {
          $idGenere = $_POST['genere'];

          $query1 = "SELECT ID FROM `genere` WHERE Descrizione = '$idGenere'";

          $res2 = mysqli_query($connessione, $query1);
          $row3 = $res2->fetch_assoc();

          $idGenere = $row3['ID'];

          $query1 = "SELECT * FROM video AS V INNER JOIN genere AS G ON V.idGenere = G.ID WHERE V.idGenere = '$idGenere' ";
          $result1 = $connessione->query($query1);
          while ($row1 = $result1->fetch_assoc()) {
            echo "<tr>" .
              "<td>" . $row1['titolo'] . "</td>" .
              "<td>" . $row1['regista'] . "</td>" .
              "<td>" . $row1['anno'] . "</td>" .
              "<td>" . $row1['tipo'] . "</td>" .
              "<td>" . $row1['Descrizione'] .
              "</tr>";
          }
        }
        ?>
      </tbody>
    </table>
</div>
</body>

</html>