<head>
    <link rel="stylesheet" href="estilos.css">
</head>
<?php
session_start();
// Tus credenciales (cámbialas por las que quieras)
$usuario_correcto = "admin";
$pass_correcta = "1234";

if ($_POST['usuario'] == $usuario_correcto && $_POST['password'] == $pass_correcta) {
    $_SESSION['usuario_autenticado'] = true;
    header("Location: lista-clientes.php");
} else {
    echo "Credenciales incorrectas. <a href='login.php'>Volver</a>";
}
?>