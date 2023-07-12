<?php
include ("conexion.php");
        $correo = $_POST['correo'];
        $contra = $_POST['contrasena'];

        $sql = mysqli_query($con,"SELECT * FROM usuarios WHERE correo='".$correo."' and contrasena ='".$contra."'");
        $usuario = mysqli_fetch_assoc($sql);

        if ($usuario) {
            $tipoUsuario = $usuario['Tipo_usuario'];
        
            if ($tipoUsuario == "1") {
                header("Location: http://localhost/PEPE/Productos.php");
            } elseif ($tipoUsuario == "2") {
                header("Location: http://localhost/PEPE/Administrador.php");
            } else {
                header("Location: http://localhost/PEPE/Productos.php");
                echo "Tipo de usuario desconocido";
            }
        } else {
            header("Location: http://localhost/PEPE/Login.html");
            echo "Inicio incorrecto";
        }
?>
