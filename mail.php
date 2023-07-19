<?php
include("conexion.php");
$sql = mysqli_query($con, "SELECT * FROM carrito");

$marca = $_POST['Marca_C'];
$modelo = $_POST['Modelo_C'];
$precio = $_POST['Precio_C'];
require('../PEPE/fpdf/fpdf.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFillColor(255, 215, 0); // Establecer el color de relleno dorado

// Margen dorado para el contenido
$pdf->SetXY(10, 10);
$pdf->Cell(190, 265, '', 1, 0, 'C', true);

// Establecer el color de texto en blanco para que se vea en el fondo dorado
$pdf->SetTextColor(255, 255, 255);

// Obtener la fecha actual
$fechaEnvio = date('Y-m-d');

// Variable para almacenar el contenido del carrito
$carritoContent = '';

// Agregar los datos del carrito al contenido
while ($row = $sql->fetch_assoc()) {
    $totalCompra += $row['Precio_C']; // Sumar el precio de cada elemento al total
    $carritoContent .= 'Marca: ' . $row['Marca_C'] . '   ' . 'Modelo: ' . $row['Modelo_C'] . '   ' . 'Precio: $ ' . $row['Precio_C'] . "\n";
}

// Agregar la fecha y el total al contenido del carrito
$carritoContent .= "\nFecha de envío: " . $fechaEnvio . "\n";
$carritoContent .= "Total de la compra: $ " . number_format($totalCompra, 2);

// Agregar el contenido del carrito en la posición deseada
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(15, 15); // Posicionamiento para el contenido del carrito
$pdf->MultiCell(180, 10, $carritoContent, 0, 'C'); // Ajustar el ancho de la celda para dar más espacio al texto

// Agregar la imagen debajo del contenido del carrito
$imagePath = './img/Tenki.png';
$pdf->Image($imagePath, 10, $pdf->GetY() + 20, 50, 50); // Ajustar los valores de X, Y, ancho y alto según tu preferencia

$pdfdoc = $pdf->Output("Doc", "S");
$pdflisto = chunk_split(base64_encode($pdfdoc));
try {
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'a21310355@ceti.mx';
    $mail->Password = '00Camila';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('a21310355@ceti.mx', 'Alejandro Marquez');
    $mail->addAddress('marquez1alejandro@gmail.com', 'Receptor');
    $mail->addCC('a21310355@ceti.mx');

    $mail->addStringAttachment($pdfdoc, 'Doc.pdf');

    $mail->isHTML(true);
    $mail->Subject = 'Prueba desde GMAIL - Fecha de envío: ' . $fechaEnvio;
    $mail->Body = 'Hola, <br/>Esta es una prueba desde <b>Gmail</b>. Fecha de envío: ' . $fechaEnvio;
    $mail->send();

    echo 'Correo enviado';
} catch (Exception $e) {
    echo 'Mensaje ' . $mail->ErrorInfo;
}

$sql = mysqli_query($con, "INSERT INTO detalles SELECT 0, Marca_C, Modelo_C, CURDATE(), Precio_C FROM carrito");
$vaciar = mysqli_query($con, "TRUNCATE TABLE carrito");
header("Location: ./Productos.php");
?>



