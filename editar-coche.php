
<?php
session_start();
if (!isset($_SESSION['usuario_autenticado'])) {
    header("Location: login.php");
    exit();
}
include('conexion.php');

// 1. Si enviamos el formulario, actualizamos la base de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];

    $sql = "UPDATE coches SET marca='$marca', modelo='$modelo', precio='$precio' WHERE id=$id";
    if ($conexion->query($sql) === TRUE) {
        header("Location: gestion-coches.php?mensaje=actualizado");
    }
}

// 2. Si entramos por GET (clic en 'Editar'), cargamos los datos para rellenar el formulario
$id = $_GET['id'];
$resultado = $conexion->query("SELECT * FROM coches WHERE id=$id");
$coche = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head><link rel="stylesheet" href="estilos.css"></head>
<body>
    <?php include('menu.php'); ?>
    <form method="POST" style="max-width: 400px; margin: auto; padding: 20px;">
        <h2>Editar Coche</h2>
        <input type="hidden" name="id" value="<?php echo $coche['id']; ?>">
        Marca: <input type="text" name="marca" value="<?php echo $coche['marca']; ?>"><br>
        Modelo: <input type="text" name="modelo" value="<?php echo $coche['modelo']; ?>"><br>
        Precio: <input type="number" name="precio" value="<?php echo $coche['precio']; ?>"><br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>