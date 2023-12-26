<?php
include '../conexion.php';

//consultar proxy
$sentencia = $conexion->prepare("SELECT * FROM proxy");
$sentencia->execute();
$proxys = $sentencia->get_result()->fetch_all(MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="styles.css"/>
=======
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../css/secciones.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

>>>>>>> features/fondoanimado

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
        .admin-icon {
            font-size: 30px;
            color: #fd660b;
            cursor: pointer;
            position: fixed;
            top: 20px;
            right: 20px;
        }
        /* Añadido para el botón de verificación */
        .admin-login-form {
            display: none;
            position: fixed;
            top: 70px;
            right: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }

        /* Agregado para centrar y ajustar tamaños en dispositivos pequeños */
        @media (max-width: 768px) {
            .navbar-nav {
                text-align: center;
            }
            .nav-link {
                font-size: 18px;
            }
        }

        /* Estilo para hacer los enlaces más grandes y centrados */
        .navbar-nav.nav-left {
            text-align: center;
        }

        .navbar-nav.nav-left .nav-link {
            font-size: 24px; /* Puedes ajustar el tamaño según tus preferencias */
            margin: 0 15px; /* Ajusta el espacio entre los enlaces si es necesario */
        }

        /* Alineación y tamaño de los elementos Streaming, Proxys y Checkers */
        .navbar-nav.nav-left .nav-link.special {
            font-size: 28px;
            margin: 0 20px;
        }

        /* Estilo para ajustar el tamaño de la imagen en dispositivos pequeños */
        @media (max-width: 576px) {
            img.img-fluid {
                max-width: 80%; /* Ajusta según tus preferencias */
                height: auto;
            }
        }
    </style>
</head>
<body>
<header class="container-fuild animate__animated animate__fadeInDown">
    <nav class="navbar navbar-expand-lg nav-tabs bg-body-tertiary">
        <div class="container">
<<<<<<< HEAD
            <div class="navbar-nav nav-left mx-auto">
=======
            <div class="navbar-nav mx-auto  ">
>>>>>>> features/fondoanimado
                <a class="nav-link special" href="streaming.php">Streaming</a>
                <a class="nav-link special" href="#">Proxys</a>
                <a class="nav-link special" href="#">Checkers</a>
            </div>

            <!-- Icono de administrador -->
            <a href="../admin/login.php" class="admin-icon  ">
                <i class="fas fa-user-cog"></i>
            </a>
        </div>
    </nav>

<<<<<<< HEAD
    <!-- Formulario de inicio de sesión de administrador -->
    <div class="admin-login-form">
        <h2 class="text-center mb-4">Verificación de Administrador</h2>
        <form id="adminLoginForm" onsubmit="validateAdmin(); return false;">
            <div class="form-group">
                <label for="adminPassword">Contraseña:</label>
                <input
                        type="password"
                        class="form-control"
                        id="adminPassword"
                        required
                />
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
    </div>
=======
>>>>>>> features/fondoanimado
</header>

<body>

    <section>
    <h1 class="text-center text-white">STREAMING</h1>




    <div class="container d-flex flex-wrap justify-content-around">
        <?php foreach ($proxys as $registro) { ?>
            <div class="card mb-3" style="width: 18rem;">
                <img src="<?php echo $registro['image'] ?>" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $registro['name'] ?></h5>
                    <p class="card-text"><?php echo $registro['description'] ?></p>
                    <a href="#" class="btn btn-primary"><?php echo $registro['price'] ?></a>
                </div>
            </div>
        <?php } ?>
    </div>

</section>



</body>