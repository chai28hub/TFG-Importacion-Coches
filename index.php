<?php 
// 1. Incluimos la conexión
include 'conexion.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Importación de Coches: Dubái y Alemania</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <h1>Especialistas en Importación: <span>Dubái y Alemania</span></h1>

    <div class="catalogo">
        <?php
        // 3. Consultamos los coches de la base de datos
        $consulta = $conexion->query("SELECT * FROM coches");
        
        if ($consulta->num_rows > 0) {
            while($coche = $consulta->fetch_assoc()){
                
                // Determinamos si es Dubái o Alemania para el color de la etiqueta
                $clase_pais = (strtolower($coche['origen']) == 'dubai') ? 'dubai' : 'alemania';
                
                // Mostramos la tarjeta del coche
                echo "<div class='tarjeta'>";
                    
                    // Mostramos la imagen (usamos mustang1.jpg si no hay otra definida)
                    $foto = (!empty($coche['imagen'])) ? $coche['imagen'] : 'mustang1.jpg';
                    echo "<img src='imagenes/" . $foto . "' class='foto-coche' alt='Imagen del coche'>";
                    
                    echo "<h2 class='marca-modelo'>" . $coche['marca'] . " " . $coche['modelo'] . "</h2>";
                    
                    echo "<p class='datos'>Año: " . $coche['anyo'] . " | " . number_format($coche['km'], 0, ',', '.') . " km</p>";
                    
                    echo "<p class='precio'>" . number_format($coche['precio'], 0, ',', '.') . " €</p>";
                    
                    echo "<span class='etiqueta $clase_pais'>Coche de " . $coche['origen'] . "</span>";
                    
                echo "</div>";
            }
        } else {
            echo "<p style='grid-column: 1 / -1; text-align: center;'>No hay coches disponibles en este momento.</p>";
        }
        ?>
    </div>

</div> <hr>
    <section class="contacto-seccion">
        <h2 style="text-align:center;">¿Te interesa algún coche? Déjanos tus datos</h2>
        <form action="guardar-cliente.php" method="POST" class="formulario-tfg" style="max-width:500px; margin:auto; display:flex; flex-direction:column; gap:10px;">
            <input type="text" name="nombre" placeholder="Tu Nombre" required>
            <input type="email" name="email" placeholder="Tu Email" required>
            <input type="text" name="telefono" placeholder="Tu Teléfono">
            <input type="text" name="coche_interes" placeholder="Modelo de interés">
            <textarea name="mensaje" placeholder="¿Qué dudas tienes?"></textarea>
            <button type="submit" style="background:#e67e22; color:white; padding:10px; cursor:pointer; border:none;">Enviar Consulta</button>
        </form>
    </section>

</body>
</html>
