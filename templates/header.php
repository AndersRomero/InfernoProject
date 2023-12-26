<?php
$url_base = "http://localhost/personal/infernoproject/admin/";
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>INFERNO PROJECT</title>
    <style>
        body {
            background-color: #000000;
        }
        .nav-tabs .nav-link {
            color: #ffffff;
            font-size: 20px;
            font-weight: bold;
        }
        .nav-tabs .nav-link:hover {
            color: #fd660b;
        }
        .bg-body-tertiary {
            background-color: #000000;
        }
        .animate__animated.animate__fadeInDown {
            --animate-duration: 0.7s;
        }
        .close-icon {
            font-size: 30px;
            color: #faf4f4;
            cursor: pointer;
            position: fixed;
            top: 10px;
            right: 20px;
        }
        .close-icon:hover {
            color: #ff0000;
        }
    </style>
    <script>
        function confirmarRedireccion() {
            var respuesta = confirm("¿Estás seguro de que quieres salir de la zona de administración?");
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <header class="container-fuild animate__animated animate__fadeInDown">
        <nav class="navbar navbar-expand-lg nav-tabs bg-body-tertiary">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav mx-auto">
                        <a class="nav-link" href="<?php echo $url_base;?>streaming">Streaming</a>
                        <a class="nav-link" href="<?php echo $url_base;?>proxys">Proxys</a>
                        <a class="nav-link" href="<?php echo $url_base;?>config">Configs</a>
                    </div>
                    <!-- Icono de administrador -->
                    <a href="../../index.php" class="close-icon animate__animated animate__fadeInDown" onclick="return confirmarRedireccion()">
                        <i class="fas fa-user-cog"></i>
                    </a>
                </div>

            </div>
        </nav>
    </header>
</head>
<br/>
<body>
