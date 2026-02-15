<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Configuración de la conexión
$servidor = "localhost";
$usuario  = "root";
$password = "";
$base_de_datos = "importacion_coches";

// Creamos la conexión
$conexion = new mysqli($servidor, $usuario, $password, $base_de_datos);

// Si hay un error, lo mostramos
if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}

// Configuramos para que las tildes y eñes se vean bien
$conexion->set_charset("utf8");
?>