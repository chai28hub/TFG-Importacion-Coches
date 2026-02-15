<?php
// 1. Incluimos la conexión
include 'conexion.php';

// 2. Comprobamos que llegan datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recogemos los datos del formulario
    $nombre   = $_POST['nombre'];
    $email    = $_POST['email'];
    $telefono = $_POST['telefono'];
    $modelo   = $_POST['coche_interes'];
    $mensaje  = $_POST['mensaje'];

    // 3. La consulta SQL con los nombres EXACTOS de tu phpMyAdmin
    $sql = "INSERT INTO clientes (nombre, email, telefono, coche_interes, mensaje) 
            VALUES ('$nombre', '$email', '$telefono', '$modelo', '$mensaje')";

    // 4. Ejecutamos y redirigimos
    if ($conexion->query($sql) === TRUE) {
        // Si funciona, vuelve al catálogo
        header("Location: index.php?enviado=1");
        exit();
    } else {
        // Si hay error, nos lo dirá en vez de quedarse en blanco
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

$conexion->close();
?>