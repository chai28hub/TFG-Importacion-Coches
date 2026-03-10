<?php
session_start();
if (!isset($_SESSION['usuario_autenticado'])) {
    header("Location: login.php");
    exit();
}
include('conexion.php');
?>
<?php 
include 'conexion.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración - Clientes</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        /* Estilos rápidos para la tabla si no los tienes en tu CSS */
        .tabla-clientes { width: 90%; margin: 20px auto; border-collapse: collapse; background: white; }
        .tabla-clientes th, .tabla-clientes td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        .tabla-clientes th { background-color: #333; color: white; }
        .tabla-clientes tr:nth-child(even) { background-color: #f2f2f2; }
        h1 { text-align: center; color: #333; margin-top: 20px; }
    </style>
</head>
<body>
    <?php include('menu.php'); ?>

    <h1>Gestión de Clientes Interesados</h1>

    <table class="tabla-clientes">
        <thead>
       <tr>
    <th>Nombre</th>
    <th>Email</th>
    <th>Teléfono</th>
    <th>Coche de Interés</th>
    <th>Mensaje</th>
    <th>Fecha</th>
    <th>Acciones</th> </tr>
</thead>
        <tbody>
            <?php
            // Consultamos la tabla de clientes que creamos antes
            $resultado = $conexion->query("SELECT * FROM clientes ORDER BY fecha_registro DESC");

            if ($resultado->num_rows > 0) {
                while($cliente = $resultado->fetch_assoc()) {
                    echo "<tr>";
                        echo "<td>" . $cliente['nombre'] . "</td>";
                        echo "<td>" . $cliente['email'] . "</td>";
                        echo "<td>" . $cliente['telefono'] . "</td>";
                        echo "<td>" . $cliente['modelo_interes'] . "</td>";
                        echo "<td>" . $cliente['mensaje'] . "</td>";
                        echo "<td>" . $cliente['fecha_registro'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>No hay clientes registrados todavía.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div style="text-align: center;">
        <a href="index.php" style="text-decoration: none; color: blue;">← Volver al Catálogo</a>
    </div>

</body>
</html>