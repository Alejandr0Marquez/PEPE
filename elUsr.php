<?php
include ("conexion.php");

        $id = $_POST['id'];
        $sql = mysqli_query($con,"DELETE FROM usuarios WHERE id='$id'");     
?>