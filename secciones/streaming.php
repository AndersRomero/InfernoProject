<?php
include '../conexion.php';

// Consultar proxy
$sentencia = $conexion->prepare("SELECT * FROM streaming");
$sentencia->execute();
$streaming = $sentencia->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../css/secciones.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <title>INFERNO PROJECT</title>
</head>

<body>
<header class="container-fuild animate__animated animate__fadeInDown">
    <nav class="navbar navbar-expand-lg nav-tabs bg-body-tertiary">
        <div class="container">
            <div class="navbar-nav mx-auto  ">
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

</header>
    <section>
        </br>
        <h1 class="text-center text-white animate__animated animate__bounceInLeft">STREAMING</h1>
        </br>

        <div class="container d-flex flex-wrap justify-content-around">
            <?php foreach ($streaming as $registros) { ?>
                <div class="card animate__animated animate__fadeInDown">
                    <img src="../admin/streaming/<?php echo $registros['image']; ?>" alt="Card Image" style="width: 100%; height: 200px; object-fit: cover;">
                    <div class="card-content">
                        <h3 class="title"><?php echo $registros['name']; ?></h3>
                        <p class="description"><?php echo $registros['description']; ?></p>
                        <div class="details">
                            <p class="price">USD $<?php echo $registros['price']; ?></p>
                            <?php if ($registros['agotado']) { ?>
                                <p class="estado-agotado">Estado: Agotado</p>
                            <?php } else { ?>
                                <p class="estado-disponible">Estado: Disponible</p>
                            <?php } ?>
                        </div>
                        <a href="#" class="btn">Agregar al Carrito</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- Resto del código... -->

    <script>
        function toggleAdminLogin() {
            var adminLoginForm = document.querySelector(".admin-login-form");
            adminLoginForm.style.display =
                adminLoginForm.style.display === "block" ? "none" : "block";
        }
    </script>

</body>

</html>
