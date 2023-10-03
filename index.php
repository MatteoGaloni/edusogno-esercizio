<?php
define("DB_SERVERNAME", "localhost:8889");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "edu_sogno");

// Connect
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD);

// Check connection
if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}

// Create or select Database
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if ($conn->query($sqlCreateDB) === TRUE) {
    echo "Database creato o già esistente";
} else {
    echo ("Errore durante la creazione del database: " . $conn->error);
}
// Chiudi la connessione
$conn->close();

// Connect to DB
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
}

// Get Migrations.sql content
$sqlFile = file_get_contents("./assets/db/Migrations.sql");

// Make Migrations
if ($conn->multi_query($sqlFile)) {
    echo "Migrazioni eseguite con successo";
} else {
    echo "Errore durante l'esecuzione delle migrazioni: " . $conn->error . "\n";
}

// Chiudi la connessione
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edusogno</title>
</head>

<body>

</body>

</html>