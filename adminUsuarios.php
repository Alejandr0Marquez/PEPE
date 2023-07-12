<?php
include("conexion.php");
$sql = mysqli_query($con, "SELECT * FROM usuarios");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilo.css">
    <title>Tenki Digital - Usuarios Admin</title>
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
    <div class="form" >
        <form action="Registro.php" method = "POST">
            <div class="User">
                <h1 style="color: #cc9d02; margin: 5%;">Registrar Usuario</h1>
                <div class="in-Registro">
                    <input class="Reg" type="email" placeholder="Correo electronico" name="correo" id="correo">
                </div>
                <div class="in-Registro">
                    <input class="Reg" placeholder="Nombre(s)" name="nombre" id="nombre">
                </div>
                <div class="in-Registro">
                    <input class="Reg" placeholder="Apellido(s)" name="apellido" id="apellido">
                </div>
                <div class="in-Registro">
                    <input class="Reg" type="date" placeholder="Fecha Nacimiento" name="nacimiento" id="nacimiento">
                </div>
                <div class="in-Registro">
                    <input class="Reg" type="number" placeholder="Numero telefonico" name="telefono" id="telefono">
                </div>
                <div class="in-Registro">
                    <input class="Reg" placeholder="Direccion" name="direccion" id="direccion">
                </div>
                <div class="in-Registro">
                    <input class="Reg" type="password" placeholder="Contraseña" name="contrasena" id="contrasena">
                </div>
                <button type="submit"  class="BRegistro" name="registrar" id="registrar">
                    Registrar
                </button>
            </div>
        </form>
    </div>
    <div>
        <table id="theTable" class="display"
            style=" width: 90%; background-color:azure; margin:auto; margin-top:3%; text-align:center;">
            <thead style="font-size: xx-large;">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Contrasena</th>
                <th>direccion</th>
                <th>nacimiento</th>
                <th>Tipo de usuario</th>
                <th>1 Usuario- 2 Admin</th>
            </thead>
            <tbody style="font-size: x-large;">
                <?php while ($row = $sql->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <?php echo $row['nombre']; ?>
                        </td>
                        <td>
                            <?php echo $row['apellido']; ?>
                        </td>
                        <td>
                            <?php echo $row['correo']; ?>
                        </td>
                        <td>
                            <?php echo $row['contrasena']; ?>
                        </td>
                        <td>
                            <?php echo $row['direccion']; ?>
                        </td>
                        <td>
                            <?php echo $row['nacimiento']; ?>
                        </td>
                        <td>
                            <?php echo $row['Tipo_usuario']; ?>
                        </td>
                        <td><a href="eUsuarios.php?id=<?php echo $row["id"]; ?>"><img title="Editar" src="http://localhost/PEPE/img/edit.png"></a> <a
                                href="eliminarUsr.php?id=<?php echo $row["id"]; ?>"><img title="Eliminar" src="http://localhost/PEPE/img/del.png"></a></td>
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