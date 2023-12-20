<?php
$url_base = "http://localhost/personal/infernoproject/";
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>INFERNO PROJECT</title>
    <style>
        body {
            background-color: #000000;
        }
        .nav-tabs .nav-link {
            color: #ffffff;
            font-size: 20px;
        }
        .nav-tabs .nav-link:hover {
            color: #fd660b;
        }
        .bg-body-tertiary {
            background-color: #000000;
        }
    </style>
    <header class="container-fuild">
        <nav class="navbar navbar-expand-lg nav-tabs bg-body-tertiary">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav nav-left">
                        <a class="nav-link" href="">Streaming</a>
                        <a class="nav-link" href="<?php echo $url_base;?>proxys">Proxys</a>
                        <a class="nav-link" href="#">Configs</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</head>
<br/>
<body>
