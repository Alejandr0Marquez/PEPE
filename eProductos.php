<?php
include ("conexion.php");

        $id = $_POST['id'];
        $marca = $_POST['Marca'];
        $modelo = $_POST['Modelo'];
        $descripcion = $_POST['Descripcion'];
        $precio = $_POST['Precio'];

        $sql = mysqli_query($con,"UPDATE productos SET Marca='$marca', Modelo='$modelo', Precio='$precio', Descripcion='$descripcion' WHERE id='$id'");
        header("Location: http://localhost/PEPE/Administrador.php");
?>