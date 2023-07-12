<?php
include("conexion.php");
$buscar = $_GET['buscar'];
$sql = mysqli_query($con, "SELECT id, Marca, Modelo, Precio, Descripcion FROM productos WHERE Marca like '$buscar' '%' or Modelo like '$buscar' '%' or Precio like '$buscar' '%' order by id");
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
                <li><a id="Log" href="./Descripcion.html"><img src="./img/Tenki.png" alt="Tenki-Logo"></a></li>
                <li><a href="./Productos.php">Productos</a></li>
                <li><a href="./Ubicacion.html">Ubicacion</a></li>
                <li><a href="./Login.html">Login</a></li>
            </ul>
        </div>
    </header>
    <?php $buscar = strtolower($_REQUEST['buscar']); ?>
        <div style="margin:auto; align-items:center; text-align:center;">
            <form action="buscar.php" method="get">
                <input type="text" name="buscar" id="buscar" placeholder="Buscar" value="<?php echo $buscar; ?>">
                <input type="submit" value="Buscar">
            </form>
        </div>
    <div class="Admin" style="width: 90%; margin:auto; align-items:center; text-align:center; background-color: rgb(255, 255, 255);">
        <table id="theTable" class="display" style=" width: 90%; background-color:azure; margin:auto; margin-top:3%; text-align:center;">
            <thead style="font-size: xx-large;">
                <th>id</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>Opciones</th>
            </thead>
            <tbody style="font-size: x-large;">
                <?php while ($row = $sql->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo $row['Marca']; ?>
                        </td>
                        <td>
                            <?php echo $row['Modelo']; ?>
                        </td>
                        <td>
                            <?php echo $row['Precio']; ?>
                        </td>
                        <td>
                            <?php echo $row['Descripcion']; ?>
                        </td>
                        <td><a href="editarAdmin.php?id=<?php echo $row["id"]; ?>">Editar</a> - <a
                                href="eliminarAdmin.php?id=<?php echo $row["id"]; ?>">Eliminar</a></td>
                    </tr>
                <?php } ?>
            </tbody>
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