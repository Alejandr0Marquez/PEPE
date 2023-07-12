<?php
include ("conexion.php");
        $marca = $_POST['Marca'];
        $modelo = $_POST['Modelo'];
        $precio = $_POST['Precio'];

        $sql = mysqli_query($con,"INSERT INTO carrito(id_C, Marca_C, Modelo_C, Precio_C) VALUES (0, '$marca', '$modelo', '$precio')");
        header("Location: ./Productos.php");

?>