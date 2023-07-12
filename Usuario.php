<?php
include ("conexion.php");
        $correo = $_POST['correo'];
        $contra = $_POST['contrasena'];

        $sql = mysqli_query($con,"SELECT * FROM usuarios WHERE correo='".$correo."' and contrasena ='".$contra."'");
        $usuario = mysqli_fetch_assoc($sql);

        if ($usuario) {
            $tipoUsuario = $usuario['Tipo_usuario'];
        
            if ($tipoUsuario == "1") {
                header("Location: ./Productos.php");
            } elseif ($tipoUsuario == "2") {
                header("Location: ./PEPE/Administrador.php");
            } else {
                header("Location: ./PEPE/Productos.php");
                echo "Tipo de usuario desconocido";
            }
        } else {
            header("Location: ./PEPE/Login.html");
            echo "Inicio incorrecto";
        }
?>
