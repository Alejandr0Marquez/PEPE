<?php
include("conexion.php");
$id = $_GET["id"];
$sql = mysqli_query($con, "SELECT * FROM productos WHERE id='$id'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilo.css">
    <title>Tenki Digital - Productos Admin</title>
</head>

<body>
    <?php $row = mysqli_fetch_assoc($sql) ?>
    <form action="elProductos.php" method="POST">
        <div>
            <h1 style="color: #cc9d02;">Desea eliminar al usario:</h1>
        </div>
        <div class="in-Prod">
            <input type="hidden" class="Regp" placeholder="id" id="id" name="id" value="<?php echo $row["id"];?>">
        </div>
        <div class="in-Prod">
            <input class="Regp" placeholder="Marca" id="Marca" name="Marca" value="<?php echo $row["Marca"];?>">
        </div>
        <div class="in-Prod">
            <input class="Regp" placeholder="Modelo" id="Modelo" name="Modelo" value="<?php echo $row["Modelo"];?>">
        </div>
        <div class="in-Prod">
            <input class="Regp" placeholder="Precio" id="Precio" name="Precio" value="<?php echo $row["Precio"];?>">
        </div>
        <div class="in-Prod">
            <textarea class="Regp" name="Descripcion" rows="4" cols="40"><?php echo $row["Descripcion"];?></textarea>
        </div>
        </div class="">
        <button class="BLogin" type="submit">
            Eliminar definitivamente
        </button>
        </div>
    </form>
    <footer class="Pie">
        <h1 id="Contacto">
            Contacto
        </h1>
        <p id="Datos">
            México, 44600 Guadalajara, Jal., Santa Teresita, 44600<br>33-14-65-02-09<br>atencionaclientes@tenki.mx<br>
        </p>
    </footer>
</body>

</html>