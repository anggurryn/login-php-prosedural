<?php
define('BASE_URL', 'http://localhost/pwpb/newBstrap/');
define('PROCESS_URL', 'http://localhost/pwpb/newBstrap/source/process/');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
    <title><?php if (isset($title)) {
                echo $title;
            } else {
                echo "Auryn";
            } ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Auryn</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= BASE_URL; ?>">Home</a>
                    </li>
                    <a class="nav-link" href="<?= PROCESS_URL; ?>view.php">View all Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= PROCESS_URL; ?>logout.php">Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>