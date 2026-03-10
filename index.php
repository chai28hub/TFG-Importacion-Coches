<?php 
// 1. Incluimos la conexión
include 'conexion.php'; 

// --- LÓGICA DEL BUSCADOR ---
$busqueda = isset($_GET['buscar']) ? $_GET['buscar'] : '';
$filtro = !empty($busqueda) ? "WHERE marca LIKE '%$busqueda%' OR modelo LIKE '%$busqueda%'" : "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Importación de Coches: Dubái y Alemania</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include('menu.php'); ?>

    <h1>Especialistas en Importación: <span>Dubái y Alemania</span></h1>

    <section class="contenedor-buscador">
        <form action="index.php" method="GET" class="formulario-busqueda">
            <input type="text" name="buscar" placeholder="Busca por marca o modelo..." 
                   value="<?php echo htmlspecialchars($busqueda); ?>">
            <button type="submit">🔍 Buscar</button>
            <?php if(!empty($busqueda)): ?>
                <a href="index.php" class="boton-limpiar">Limpiar filtro</a>
            <?php endif; ?>
        </form>
    </section>

    <section class="seccion-stock-espana">
        <h2 style="text-align:center; margin-top:50px;">Stock disponible en España</h2>
        <div class="catalogo">
            <?php
            $sql_espana = "SELECT * FROM coches $filtro " . (empty($filtro) ? "WHERE origen = 'España'" : "AND origen = 'España'");
            $consulta_espana = $conexion->query($sql_espana);

            if ($consulta_espana->num_rows > 0) {
                while($coche = $consulta_espana->fetch_assoc()){
                    imprimirTarjeta($coche);
                }
            } else {
                echo "<p style='grid-column: 1 / -1; text-align: center;'>No hay stock disponible en España actualmente.</p>";
            }
            ?>
        </div>
    </section>

    <section class="seccion-importacion">
        <h2 style="text-align:center; margin-top:50px;">Importación bajo demanda</h2>
        <div class="catalogo">
            <?php
            $sql_import = "SELECT * FROM coches $filtro " . (empty($filtro) ? "WHERE origen != 'España'" : "AND origen != 'España'");
            $consulta_import = $conexion->query($sql_import);

            if ($consulta_import->num_rows > 0) {
                while($coche = $consulta_import->fetch_assoc()){
                    imprimirTarjeta($coche);
                }
            } else {
                echo "<p style='grid-column: 1 / -1; text-align: center;'>No hay coches de importación disponibles.</p>";
            }
            ?>
        </div>
    </section>

    <hr>
    
    <?php
    // Función auxiliar para no repetir código de la tarjeta
    function imprimirTarjeta($coche) {
        $origen = strtolower($coche['origen']);
        $clase_etiqueta = ($origen == 'españa') ? 'etiqueta-verde' : (($origen == 'alemania') ? 'etiqueta-azul' : 'etiqueta-naranja');
        
        echo "<div class='tarjeta'>";
            $foto = (!empty($coche['imagen'])) ? $coche['imagen'] : 'mustang1.jpg';
            echo "<img src='imagenes/" . $foto . "' class='foto-coche' alt='Imagen del coche'>";
            echo "<h2 class='marca-modelo'>" . $coche['marca'] . " " . $coche['modelo'] . "</h2>";
            echo "<p class='datos'>" . $coche['anyo'] . " | " . number_format($coche['km'], 0, ',', '.') . " km<br>";
            echo $coche['combustible'] . " | " . $coche['transmision'] . "</p>";
            echo "<p class='precio'>" . number_format($coche['precio'], 0, ',', '.') . " €</p>";
            echo "<span class='etiqueta " . $clase_etiqueta . "'>" . strtoupper("Coche de " . $coche['origen']) . "</span>";
        echo "</div>";
    }
    ?>
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