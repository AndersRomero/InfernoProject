<?php

include '../conexion.php';

// Consultar usuario
$sentencia = $conexion->prepare("SELECT * FROM user");
$sentencia->execute();
$user = $sentencia->get_result()->fetch_all(MYSQLI_ASSOC);

$users = $user[0];

$username = $users['username'];
$hashed_password = $users["password"]; // La contraseña almacenada ya está cifrada con SHA-256

session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí deberías validar los datos del formulario (por ejemplo, verificar en una base de datos)

    // Verificar si las credenciales son correctas
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    // Cifrar la contraseña ingresada con SHA-256 para compararla con la almacenada
    $hashed_input_password = hash('sha256', $input_password);

    if ($input_username === $username && $hashed_input_password === $hashed_password) {
        // Credenciales válidas, iniciar sesión
        $_SESSION["user_id"] = 1; // Puedes establecer el ID del usuario o cualquier otro identificador único
        header("Location: proxys/index.php"); // Redirigir al panel de administración
        exit();
    } else {
        // Credenciales incorrectas, mostrar mensaje de error
        $error_message = "Credenciales incorrectas. Intenta de nuevo.";
    }
}

?>

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
    <link rel="stylesheet" href=../css/loogin.css />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


    <title>INFERNO PROJECT</title>

</head>

<body>

<header class="container-fluid animate__animated animate__fadeInDown">
    <nav class="navbar navbar-expand-lg nav-tabs bg-body-tertiary flex-column">
        <div class="container">
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
                        <a class="nav-link special" href="../secciones/streaming.php">Streaming</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link special" href="#">Proxys</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link special" href="#">Checkers</a>
                    </li>
                </ul>
            </div>

            <a href="../admin/login.php" class="admin-icon  ">
                <i class="fas fa-user-cog"></i>

            </a>

        </div>
    </nav>
</header>

    <div class="container animate__animated animate__fadeInDown">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Inicio de Sesión</h3>
                    </div>
                </br>
                    <?php if (isset($error_message)) : ?>
                        <p class="text-center" style=" font-size: 20px; color: red;"><?php echo $error_message; ?></p>
                    <?php endif; ?>
                    <div class="card-body">
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="username">Usuario:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-outline-danger btn-block">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
