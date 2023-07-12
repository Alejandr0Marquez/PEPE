<?php
include("conexion.php");
$marca = $_POST['Marca'];
$modelo = $_POST['Modelo'];
$precio = $_POST['Precio'];

$sql = mysqli_query($con, "INSERT INTO detalles select id_C, Marca_C, Modelo_C, CURDATE(), Precio_C from carrito");
$vaciar = mysqli_query($con, "TRUNCATE TABLE carrito");
header("Location: http://localhost/PEPE/Productos.php");