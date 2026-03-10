<head>
    <link rel="stylesheet" href="estilos.css">
</head>
<?php
session_start();
// 1. Verificamos que seas el administrador
if (!isset($_SESSION['usuario_autenticado'])) {
    header("Location: login.php");
    exit();
}

include('conexion.php');

// 2. Comprobamos si recibimos un ID válido por la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 3. Ejecutamos la consulta de borrado
    $sql = "DELETE FROM coches WHERE id = $id";
    
    if ($conexion->query($sql) === TRUE) {
        // Si sale bien, volvemos al panel
        header("Location: gestion-coches.php?mensaje=eliminado");
    } else {
        echo "Error al eliminar: " . $conexion->error;
    }
} else {
    // Si alguien intenta entrar sin ID, lo enviamos de vuelta
    header("Location: gestion-coches.php");
}
?>