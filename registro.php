<?php
// Configuración de la conexión a la base de datos
$servername = "tu_servidor_mysql";
$username = "tu_usuario_mysql";
$password = "tu_contrasena_mysql";
$dbname = "nombre_de_la_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Recibir datos del formulario
$usuario = $_POST['usuario'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Almacenar contraseñas de manera segura
$rol = 'administrador';

// Insertar usuario en la base de datos
$sql = "INSERT INTO usuarios (usuario, contrasena, rol) VALUES ('$usuario', '$contrasena', '$rol')";

if ($conn->query($sql) === TRUE) {
  echo "Usuario registrado correctamente";
} else {
  echo "Error al registrar el usuario: " . $conn->error;
}

$conn->close();
?>
