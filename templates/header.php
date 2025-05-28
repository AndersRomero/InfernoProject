<?php
$url_base = "http://localhost/InfernoProject/admin/";
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
            overflow: auto;
            height: auto;
            background-color: #000000;
            font-family: "Roboto", sans-serif;
        }

        .nav-tabs .nav-link {
            color: #ffffff;
            font-size: 20px;
        }

        .nav-tabs .nav-link:hover {
            color: #fd660b;
        }
        .navbar-expand-lg{
            color: white;
        }
        .navbar .navbar-toggler-icon{
            color: #fff;
            margin-top: 50%;
        }

        @keyframes example {
            from {
                transform: scale(0);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .navbar-nav {
                text-align: center;
            }

            .nav-link {
                font-size: 18px;
            }
        }

        .navbar-nav .nav-link {
            font-size: 24px;
            margin: 0 15px;
        }

        .navbar-nav .nav-link.special {
            font-size: 28px;
            margin: 0 20px;
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
    <header class="container-fluid animate__animated animate__fadeInDown">
        <nav class="navbar navbar-expand-lg nav-tabs bg-body-tertiary flex-column">
            <div class="container">
                <div class="d-flex align-items-center p-2">
                    <a href="../../index.php">
                        <img src="../../images/logo.png" alt="Logo de INFERNO PROJECT" class="img-fluid animate__animated animate__fadeInDown" style="max-height: 60px;">
                    </a>
                </div>
                <!-- Botón de hamburguesa para dispositivos móviles -->
                <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars"></i>
                </span>
                </button>

                <!-- Contenido de la barra de navegación -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link special" href="<?php echo $url_base;?>streaming">Streaming</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link special" href="<?php echo $url_base;?>proxys">Proxys</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link special" href="<?php echo $url_base;?>config">Checkers</a>
                        </li>
                    </ul>
                </div>

                <!-- Icono de administrador -->
                <a href="../../index.php" class="close-icon animate__animated animate__fadeInDown">
                    <i class="fas fa-user-cog"></i>
                </a>
            </div>
        </nav>
    </header>
</head>
<br/>
<body>
