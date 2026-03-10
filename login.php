<head>
    <link rel="stylesheet" href="estilos.css">
</head>
<?php
session_start();
// Si ya estás logueado, ve directo al panel
if (isset($_SESSION['usuario_autenticado'])) {
    header("Location: lista-clientes.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso Administrador</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; background: #222;">
    <form action="verificar-login.php" method="POST" style="background: white; padding: 30px; border-radius: 8px;">
        <h2>Acceso Privado</h2>
        <input type="text" name="usuario" placeholder="Usuario" required style="margin-bottom: 10px; width: 100%;"><br>
        <input type="password" name="password" placeholder="Contraseña" required style="margin-bottom: 10px; width: 100%;"><br>
        <button type="submit" style="width: 100%; padding: 10px; background: #e67e22; border:none; color: white;">ENTRAR</button>
    </form>
</body>
</html>