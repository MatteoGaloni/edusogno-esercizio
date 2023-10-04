<?php
define("DB_SERVERNAME", "localhost:8889");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "edu_sogno");

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Get Data
$email = $_POST["email"];
$password = $_POST["password"];

// Check if data exist in database
$sql = "SELECT * FROM utenti WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $utente = $result->fetch_assoc();
    session_start();
    $_SESSION['utente'] = $utente;

    header("Location: dashboard.php");
    exit();
} else {
    echo "L'utente non esiste nel database.";
}

$conn->close();
