<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inferno_project";

$conexion = mysqli_connect($servername, $username, $password, $dbname);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}