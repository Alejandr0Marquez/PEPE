<?php
include ("conexion.php");
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $contrasena = $_POST['contrasena'];
        $correo = $_POST['correo'];
        $nacimiento = $_POST['nacimiento'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];

        $sql = mysqli_query($con,"INSERT INTO usuarios(id, nombre, contrasena, correo, nacimiento, telefono, direccion, apellido, Tipo_usuario) VALUES (0, '$nombre', '$contrasena', '$correo', '$nacimiento', '$telefono', '$direccion', '$apellido', 0)");
        header("Location: ./Descripcion.html");

?>
