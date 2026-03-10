<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto - Importación de Coches</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include('menu.php'); ?>

    <h1 style="text-align: center;">¿Interesado en un vehículo?</h1>
    <p style="text-align: center;">Déjanos tus datos y un asesor se pondrá en contacto contigo.</p>

    <section class="contacto-seccion" style="margin-top: 30px;">
        <form action="guardar-cliente.php" method="POST" class="formulario-tfg" 
              style="max-width:500px; margin:auto; display:flex; flex-direction:column; gap:15px; padding: 20px; background: #222; border-radius: 8px;">
            
            <input type="text" name="nombre" placeholder="Tu Nombre" required style="padding: 10px;">
            <input type="email" name="email" placeholder="Tu Email" required style="padding: 10px;">
            <input type="text" name="telefono" placeholder="Tu Teléfono" style="padding: 10px;">
            <input type="text" name="coche_interes" placeholder="¿Qué modelo buscas?" style="padding: 10px;">
            <textarea name="mensaje" placeholder="¿Tienes alguna duda específica?" style="padding: 10px; height: 100px;"></textarea>
            
            <button type="submit" style="background:#e67e22; color:white; padding:12px; cursor:pointer; border:none; font-weight: bold;">ENVIAR SOLICITUD</button>
        </form>
    </section>

</body>
</html>