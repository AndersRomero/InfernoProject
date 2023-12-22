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
    <link rel="stylesheet" href="styles.css" />

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
    </header>

    <section>
      <div class="container">
        <img src="images/inferno.jpeg" class="img-fluid" />
      </div>
    </section>

    <section>
      <div class="container">
        <h1 class="text-center">STREAMING</h1>
        <div id="catalog"></div>
      </div>
    </section>

    <!-- Bootstrap JS (Requiere jQuery y Popper.js) -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
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
