<?php
include("conexion.php");
$sql = mysqli_query($con, "SELECT * FROM productos");
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
            <li><a href="./adminUsuarios.php">Usuarios</a></li>
        </div>
    </header>
    <div class="Admin"
        style="width: 90%; margin:auto; align-items:center; text-align:center; background-color: rgb(255, 255, 255);">
        <form action="aProductos.php" method="POST">
            <div class="in-Prod">
                <h1 style="display:grid">Registrar</h1>
            </div>
            <div class="in-Prod">
                <input class="Regp" placeholder="Marca" name="Marca" id="Marca">
            </div>
            <div class="in-Prod">
                <input class="Regp" placeholder="Modelo" name="Modelo" id="Modelo">
            </div>
            <div class="in-Prod">
                <input class="Regp" type="number" placeholder="Precio" name="Precio" id="Precio">
            </div>
            <div class="in-Prod">
                <textarea class="Regp" name="Descripcion" rows="4" cols="40">Escribe la descripcion</textarea>
            </div>
            <div class="in-Prod">
                <input class="Regp" placeholder="URL" name="URL" id="URL">
            </div>
            <div>
                <button type="submit" name="registrar" id="registrar">
                    Registrar
                </button>
            </div>
            <div>
                <label for=""></label>
            </div>
        </form>
    </div>
    <div>
        <?php error_reporting(0);
        $buscar = $_REQUEST['buscar'];
        ?>
        <div style="margin:auto; align-items:center; text-align:center; margin-top:5%;">
            <form action="buscar.php" method="get">
                <input type="text" name="buscar" id="buscar" placeholder="Buscar" value="<?php echo $buscar; ?>">
                <input type="submit" value="Buscar">
            </form>
        </div>
        <table id="theTable" class="display"
            style=" width: 90%; background-color:azure; margin:auto; margin-top:3%; text-align:center;">
            <thead style="font-size: xx-large;">
                <th>Imagen</th>
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
                           <img title="producto" src="<?php echo $row['imagen'];?>" style="height: 200px;"> 
                        </td>
                        <td>
                            <?php echo $row['marca']; ?>
                        </td>
                        <td>
                            <?php echo $row['modelo']; ?>
                        </td>
                        <td>
                            <?php echo $row['precio']; ?>
                        </td>
                        <td>
                            <?php echo $row['descripcion']; ?>
                        </td>
                        <td><a href="editarAdmin.php?id=<?php echo $row["id"]; ?>"><img title="Editar" src="./img/edit.png"></a> <a
                                href="eliminarAdmin.php?id=<?php echo $row["id"]; ?>"><img title="Eliminar" src="./img/del.png"></a></td>
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