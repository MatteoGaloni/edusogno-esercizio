<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
                    Registration
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Inserisci il nome</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="surname">Inserisci il nome</label>
                            <input type="text" class="form-control" id="surname" name="surname" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Inserisci l'email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Inserisci la password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">REGISTRATI</button>
                    </form>
                </div>
                <div class="card-footer">
                    <p class="text-muted">Hai già un account? <a href="index.php">Accedi</a></p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>