<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="css/indexpgprincipal.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <title>INFERNO PROJECT</title>

    <style>
    .video-section {
        position: relative;
        overflow: hidden;
        width: 100%;
    }
    .background-video {
        position: absolute;
        top: -20%; /* Adjust the value to move the video up */
        left: 0;
        width: auto;
        height: auto;
    }
</style>


</head>

<body>

    <header class="container-fuild">
        <nav class="navbar navbar-expand-lg nav-tabs bg-body-tertiary animate__animated animate__fadeInDown">
            <div class="container">
                <div class="navbar-nav nav-left mx-auto ">
                    <a class="nav-link special" href="secciones/streaming.php">Streaming</a>
                    <a class="nav-link special" href="#">Proxys</a>
                    <a class="nav-link special" href="#">Checkers</a>
                </div>

                <!-- Icono de administrador -->
                <a href="admin/login.php" class="admin-icon animate__animated animate__fadeInDown">
                    <i class="fas fa-user-cog"></i>
                </a>

            </div>
        </nav>
    </header>

    <!-- Sección de video como fondo -->
    <section class="video-section">
        <video class="background-video" autoplay loop muted>
            <source src="images/2056726_Crackling_Fire_Firepit_1920x1080.mp4" type="video/mp4">
            Tu navegador no soporta el tag de video.
        </video>
    </section>



    <!-- Bootstrap JS (Requiere jQuery y Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="scripts.js"></script>

</body>

</html>
