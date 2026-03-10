<?php
include 'conexion.php';

// 1. Capturamos el ID del coche que viene por la URL
$id = $_GET['id'];

// 2. Buscamos solo ese coche en la base de datos
$resultado = $conexion->query("SELECT * FROM coches WHERE id = $id");
$coche = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $coche['marca'] . " " . $coche['modelo']; ?></title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body style="background:#121212; color:white; padding:50px;">

    <a href="index.php" style="color:#ffcc00;">⬅ Volver al catálogo</a>

    <div style="display:flex; gap:50px; margin-top:30px;">
        <img src="imagenes/<?php echo $coche['imagen']; ?>" style="width:50%; border-radius:15px; border:2px solid #ffcc00;">

        <div>
            <h1 style="color:#ffcc00;"><?php echo $coche['marca'] . " " . $coche['modelo']; ?></h1>
            <p style="font-size:1.5rem;">Precio: <?php echo number_format($coche['precio'], 0, ',', '.'); ?> €</p>
            <hr>
            <p><strong>Año:</strong> <?php echo $coche['anyo']; ?></p>
            <p><strong>Kilómetros:</strong> <?php echo number_format($coche['km'], 0, ',', '.'); ?> km</p>
            <p><strong>Origen:</strong> <?php echo $coche['origen']; ?></p>
            
            <button style="background:#ffcc00; padding:20px; border:none; border-radius:10px; font-weight:bold; cursor:pointer; width:100%; margin-top:20px;">
                SOLICITAR INFORMACIÓN PERSONALIZADA
            </button>
        </div>
    </div>

</body>
</html>