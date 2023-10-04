<?php

define("DB_SERVERNAME", "localhost:8889");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "edu_sogno");

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["name"];
    $cognome = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    // $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO utenti (nome, cognome, email, password) VALUES ('$nome', '$cognome', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registrazione avvenuta con successo!";
        header("Location: index.php");
        exit();
    } else {
        echo "Errore durante la registrazione: " . $conn->error;
    }
}
