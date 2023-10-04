<?php
session_start();

if (!isset($_SESSION['utente'])) {
    header("Location: index.php");
    exit();
}
$user = $_SESSION['utente'];

define("DB_SERVERNAME", "localhost:8889");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "edu_sogno");

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$userEmail = $user['email'];
$checkEmail = "SELECT * FROM eventi WHERE attendees LIKE '%$userEmail%'";
$result = $conn->query($checkEmail);

if ($result->num_rows > 0) {
    $eventi = $result->fetch_all();
} else {
    echo "L'utente non ha partecipato a eventi.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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
        <div id="main-container">
            <h1>Ciao <?php echo $user['nome'] ?> ecco i tuoi eventi</h1>
            <div class="container" style=" width: 18rem">
                <div class="row">
                    <div class="col">
                        <?php foreach ($eventi as $evento) {  ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $evento[2] ?></h5>
                                    <p class="card-text"><?php echo $evento[3] ?></p>
                                    <a href="#" class="btn btn-primary">Join</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>