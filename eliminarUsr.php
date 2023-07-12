<?php
include("conexion.php");
$id = $_GET["id"];
$sql = mysqli_query($con, "SELECT * FROM usuarios WHERE id='$id'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilo.css">
    <title>Tenki Digital - Admin</title>
</head>

<body>
    <?php $row = mysqli_fetch_assoc($sql) ?>
    <form action="elUsr.php" method="POST">
        <div>
            <h1 style="color: #cc9d02;">Desea eliminar al usuario:</h1>
        </div>
        <div class="in-Prod">
            <input class="Regp" placeholder="id" id="id" name="id" value="<?php echo $row["id"]; ?>">
        </div>
        <div class="in-Prod">
            <input class="Regp" placeholder="nombre" name="nombre" value="<?php echo $row["nombre"]; ?>">
        </div>
        <div class="in-Prod">
            <input class="Regp" placeholder="apellido" name="apellido" value="<?php echo $row["apellido"]; ?>">
        </div>
        <div class="in-Prod">
            <input class="Regp" placeholder="telefono" name="telefono" value="<?php echo $row["telefono"]; ?>">
        </div>
        <div class="in-Prod">
            <input class="Regp" name="Descripcion" rows="4" cols="40">
            <?php echo $row["correo"]; ?>
        </div>
        <div class="in-Prod">
            <input class="Regp" placeholder="contrasena" name="contrasena" value="<?php echo $row["contrasena"]; ?>">
        </div>
        <div class="in-Prod">
            <input class="Regp" placeholder="direccion" name="direccion" value="<?php echo $row["direccion"]; ?>">
        </div>
        <div class="in-Prod">
            <input class="Regp" name="Tipo_usuario" placeholder="usuario tipo">
            <?php echo $row["Tipo_usuario"]; ?>
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