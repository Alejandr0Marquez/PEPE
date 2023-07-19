<?php
include("conexion.php");
$sql = mysqli_query($con, "SELECT * FROM detalles");
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
    <header>
        <div class="Navbar">
            <ul class="BarraP">
                <li><img src="./img/Tenki.png" alt="Tenki-Logo">/li>
                <li><a href="./Productos.php">Productos</a></li>
                <li><a href="./Ubicacion.html">Ubicacion</a></li>
            </ul>
        </div>
    </header>
    <div>
        <table id="theTable" class="display"
            style=" width: 90%; background-color:azure; margin:auto; margin-top:3%; text-align:center;">
            <thead style="font-size: xx-large;">
                <th>Marca</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Fecha</th>
            </thead>
            <form action="aDetalles.php" method="post">
                <tbody style="font-size: x-large;">
                    <?php while ($row = $sql->fetch_assoc()) { ?>
                        <tr>
                            <td>
                                <?php echo $row['Marca_D']; ?>
                            </td>
                            <td>
                                <?php echo $row['Modelo_D']; ?>
                            </td>
                            <td>
                                <?php echo $row['Precio_D']; ?>
                            </td>
                            <td>
                                <?php echo $row['Fecha_D']; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </form>
        </table>
    </div>
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