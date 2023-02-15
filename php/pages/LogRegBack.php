<?php
session_start();

// info per l'accesso
$host = "dbserver";
$user = "root";
$pass = "ciao";
$db = "es12";

// connessione DBMS
$conn = mysqli_connect($host, $user, $pass, $db);

// Verifica della connessione
if (!$conn) {
  die("Connessione fallita: " . mysqli_connect_error());
}

// Dati dell'utente da registrare
$email = $_POST['email'];
$password = $_POST['password'];

// Query SQL per selezionare i dati dell'utente dal database
$query = "SELECT * FROM userdata WHERE email = '$email' AND password = '$password'";

// Esecuzione della query
$result = mysqli_query($conn, $query)
  or die("<br>Query  " . $mysqli->error . " " . $mysqli->errno);
  
if (mysqli_num_rows($result) > 0) {
  $userid = "SELECT ID FROM userdata WHERE email = '$email'";
  $resUserId = mysqli_query($conn, $userid)
    or die("<br>Query fallita " . $mysqli->error . " " . $mysqli->errno);
  $rowuser = $resUserId->fetch_assoc();
  $_SESSION['user'] = $rowuser['ID'];
  $_SESSION['controllo'] = 1;
  header("Location: ../index.php");

} else if (mysqli_num_rows($result) == 0) {

  $nome = $_POST["nome"];
  $cognome = $_POST["cognome"];
  $indirizzo = $_POST["indirizzo"];
  $telefono = $_POST["telefono"];

  if (empty($nome) == true and empty($cognome) == true and empty($indirizzo) == true and empty($telefono) == true) {
    $_SESSION["controllo"] = 0;
    header("Location: accessPage.php");
  } else {
    $sql = "INSERT INTO Userdata (nome, cognome, email, indirizzo, telefono, password)
    VALUES ('$nome', '$cognome', '$email', '$indirizzo', '$telefono', '$password')";
    $res = mysqli_query($conn, $sql);
    $_SESSION['controllo'] = 1;
    //
    $userid = "SELECT ID FROM userData WHERE email = '$email'";
    $resUserId = mysqli_query($conn, $userid)
      or die("<br>Query fallita " . $mysqli->error . " " . $mysqli->errno);
    $rowuser = $resUserId->fetch_assoc();
    $_SESSION['user'] = $rowuser['ID'];
    //
    header("Location: ../index.php");
  }
}

mysqli_close($conn);

?>