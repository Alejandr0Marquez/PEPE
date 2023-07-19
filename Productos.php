<?php
include("conexion.php");
$sql = mysqli_query($con, "SELECT id, marca, modelo, precio, descripcion, imagen FROM productos WHERE 1");
$resultado = mysqli_fetch_all($sql, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilo.css">
    <title>Tenki Digital - Productos</title>
</head>

<body>
    <header>
        <div class="Navbar">
            <ul class="BarraP">
                <li><a id="Log" href="./Descripcion.html"><img src="./img/Tenki.png" alt="Tenki-Logo"></a></li>
                <li><a href="./Productos.php">Productos</a></li>
                <li><a href="./Ubicacion.html">Ubicacion</a></li>
                <li><a href="./Carrito.php"><img src="img/car.png" alt=""></a></li>
            </ul>
        </div>
    </header>
    <div class="Columnas-prod" style="text-align: center;">
        <?php
        foreach ($resultado as $row) {
            ?>
            <form method="post" action="aCarrito.php" class="prod"
                style="width: 90%; height: 30%; border: 0; float: left; background-color: rgb(255, 255, 255);">
                <div class="Product">
                    <?php
                    $id = $row['id'];
                    $imagen = $row['imagen'];
                    if (empty($imagen)) {
                        $imagen = "./img/productos/no-img.jpg";
                    }
                    ?>
                    <div class="Image">
                        <a href="#"><img src="<?php echo $imagen; ?>" alt="Modelo" style="height: 200px;"></a>
                    </div>
                    <h3 class="descP">
                        <a href="#">
                            <?php echo $row["marca"]; ?>
                            <?php echo $row["modelo"]; ?>
                        </a>
                        <input type="hidden" name="Modelo" value="<?php echo $row['modelo']; ?>">
                        <input type="hidden" name="Marca" value="<?php echo $row['marca']; ?>">
                    </h3>
                    <div class="PrecioP">
                        <span class="precio">$
                            <?php echo $row["precio"]; ?>
                        </span>
                        <input type="hidden" name="Precio" value="<?php echo $row['precio']; ?>">
                    </div>
                    <div class="Comprar">
                        <button type="submit" class="cesta">Anadir</button>
                    </div>
                </div>
            </form>
            <?php
        }
        ?>
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