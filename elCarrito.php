<?php
include ("conexion.php");

        $id = $_POST['id'];
        $sql = mysqli_query($con,"DELETE FROM carrito WHERE id_C='$id'");
        header("Location: ./Carrito.php");
?>
