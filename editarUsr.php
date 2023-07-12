<?php
include("conexion.php");
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$contrasena = $_POST['contrasena'];
$correo = $_POST['correo'];
$nacimiento = $_POST['nacimiento'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

$sql = mysqli_query($con, "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', contrasena='$contrasena',
correo='$correo', telefono='$telefono', direccion='$direccion', WHERE id='$id'");
header("Location: ./eUsuarios.php");
?>