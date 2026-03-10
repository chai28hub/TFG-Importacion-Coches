<?php
session_start();
if (!isset($_SESSION['usuario_autenticado'])) {
    header("Location: login.php");
    exit();
}
include('conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Inventario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include('menu.php'); ?>
    
    <h1 style="text-align:center;">Gestión de Inventario de Coches</h1>

    <table class="tabla-gestion">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = $conexion->query("SELECT * FROM coches");
            while($coche = $query->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$coche['marca']."</td>";
                echo "<td>".$coche['modelo']."</td>";
                echo "<td>".$coche['precio']."</td>";
                echo "<td>
                        <a href='editar-coche.php?id=".$coche['id']."'>Editar</a> | 
                        <a href='eliminar-coche.php?id=".$coche['id']."' onclick='return confirm(\"¿Seguro?\")'>Eliminar</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>