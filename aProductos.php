<?php
include ("conexion.php");
        $marca = $_POST['Marca'];
        $modelo = $_POST['Modelo'];
        $descripcion = $_POST['Descripcion'];
        $precio = $_POST['Precio'];
        $imagen = $_POST['URL'];

        $sql = mysqli_query($con,"INSERT INTO productos(id, marca, modelo, precio, descripcion, imagen) VALUES  (0,'$marca','$modelo','$precio','$descripcion','$imagen')");
        header("Location: ./Administrador.php");
?>
