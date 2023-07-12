<?php
include ("conexion.php");

        $id = $_POST['id'];
        $sql = mysqli_query($con,"DELETE FROM productos WHERE id='$id'");     
?>