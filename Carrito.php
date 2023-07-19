<?php
include("conexion.php");
$sql = mysqli_query($con, "SELECT * FROM carrito");
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
        <?php error_reporting(0);
        $buscar = $_REQUEST['buscar'];
        ?>
        <table id="theTable" class="display"
            style=" width: 90%; background-color:azure; margin:auto; margin-top:3%; text-align:center;">
            <thead style="font-size: xx-large;">
                <th>Marca</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Opciones</th>
            </thead>
            <a href="Detalles.php">Historial</a>
            <form action="mail.php" method="post">
                <tbody style="font-size: x-large;">
                    <?php while ($row = $sql->fetch_assoc()) { ?>
                        <tr>
                            <td>
                                <?php echo $row['Marca_C']; ?>
                                <input type="hidden" name="Marca_C" value="<?php echo $row['Marca_C']; ?>">
                            </td>
                            <td>
                                <?php echo $row['Modelo_C']; ?>
                                <input type="hidden" name="Modelo_C" value="<?php echo $row['Modelo_C']; ?>">
                            </td>
                            <td>
                                <?php echo $row['Precio_C']; ?>
                                <input type="hidden" name="Precio_C" value="<?php echo $row['Precio_C']; ?>">
                            </td>
                            <td><a href="eliminarCarrito.php?id=<?php echo $row["id_C"]; ?>"><img title="Eliminar"
                                        src="./img/del.png"></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <td>
                        <button type="submit" name="registrar" id="registrar">
                        Pagar
                    </button>
                    </td>
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