<?php
define("DB_SERVERNAME", "localhost:8889");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "edu_sogno");

// Connect
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD);

// Check connection
if ($conn && $conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Database
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if ($conn->query($sqlCreateDB) === TRUE) {
    ("Database creato o già esistente");
} else {
    die("Errore durante la creazione del database: " . $conn->error);
}

$conn->close();

// Connect to DB
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if migrations exist
$eventiExists =
    $conn->query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'edu_sogno' AND TABLE_NAME = 'utenti'");
$utentiExists =
    $conn->query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'edu_sogno' AND TABLE_NAME = 'eventi'");

if ($eventiExists->num_rows === 0 && $utentiExists->num_rows === 0) {
    // Get Migrations.sql content
    $sqlFile = file_get_contents("./assets/db/Migrations.sql");

    // Make Migrations
    if ($conn->multi_query($sqlFile)) {
        ("Migrazioni eseguite con successo");
    } else {
        die("Errore durante l'esecuzione delle migrazioni: " . $conn->error . "\n");
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edusogno</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <header>
        <div id="my-navbar" class="d-flex align-items-center ps-2 ">
            <h1>ICONA</h1>
        </div>
    </header>
    <main>
        <div id="main-container" class="d-flex align-items-center justify-content-center">
            <div id="log-in-panel" class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="verify_login.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="card-footer">
                    <p class="text-muted">Non sei ancora registrato? <a href="register.php">Registrati qui</a></p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>