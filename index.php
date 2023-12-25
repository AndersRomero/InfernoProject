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
    <link rel="stylesheet" href="css/indexprincipal.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


    <title>INFERNO PROJECT</title>

</head>

<body>

    <header class="container-fuild">
        <nav class="navbar navbar-expand-lg nav-tabs bg-body-tertiary">
            <div class="container">
                <div class="navbar-nav nav-left mx-auto">
                    <a class="nav-link special" href="secciones/streaming.php">Streaming</a>
                    <a class="nav-link special" href="#">Proxys</a>
                    <a class="nav-link special" href="#">Checkers</a>
                </div>

                <!-- Icono de administrador -->
                <div class="admin-icon" onclick="toggleAdminLogin()">
                    <i class="fas fa-user-cog"></i>
                </div>
            </div>
        </nav>

        <!-- Formulario de inicio de sesión de administrador -->
        <div class="admin-login-form">
            <h2 class="text-center mb-4">Verificación de Administrador</h2>
            <form id="adminLoginForm" onsubmit="validateAdmin(); return false;">
                <div class="form-group">
                    <label for="adminPassword">Contraseña:</label>
                    <input type="password" class="form-control" id="adminPassword" required />
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
        </div>
    </header>

    <!-- Sección de video como fondo -->
    <section class="video-section">
        <video class="background-video" autoplay loop muted>
            <source src="images/video.mp4" type="video/mp4">
            Tu navegador no soporta el tag de video.
        </video>
    </section>

    <section>
        <div class="container">
            <img src="images/image2.png" class="img-fluid custom-image animate__animated animate__fadeIn" alt="Imagen" />
        </div>
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

    <script>
        function toggleAdminLogin() {
            var adminLoginForm = document.querySelector(".admin-login-form");
            adminLoginForm.style.display =
                adminLoginForm.style.display === "block" ? "none" : "block";
        }

        function validateAdmin() {
            // Agrega aquí la lógica de validación del usuario administrador
            var adminPasswordInput = document.getElementById("adminPassword");
            var adminPassword = adminPasswordInput.value;

            // Verifica las credenciales (en una aplicación real, debes hacer esto en el servidor)
            if (adminPassword === "1243aaa") {
                // Credenciales válidas, redirige a proxys/index.php
                window.location.href = "proxys/index.php";
            } else {
                // Credenciales incorrectas, muestra un mensaje de error
                alert("Contraseña de administrador incorrecta. Inténtalo de nuevo.");

                // Limpia el campo de contraseña después de mostrar el mensaje de error
                adminPasswordInput.value = "";
            }

            // Oculta el formulario después de la validación
            document.querySelector(".admin-login-form").style.display = "none";
        }
    </script>
</body>

</html>
