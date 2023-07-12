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
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
while ($row = $sql->fetch_assoc()) {
    $pdf->MultiCell(160,10,strval('Marca: '.$row['Marca_C'].'   '.'Modelo: '.$row['Modelo_C'].'   '.'Precio: $ '.$row['Precio_C']), 1, 'L');
 }
$pdfdoc = $pdf->Output("Doc","S");
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
    $mail->Subject = 'Prueba desde GMAIL';
    $mail->Body = 'Hola, <br/>Esta es una prueba desde <b>Gmail</b>.';
    $mail->send();

    echo 'Correo enviado';
} catch (Exception $e) {
    echo 'Mensaje ' . $mail->ErrorInfo;
}
$sql = mysqli_query($con, "INSERT INTO detalles select 0, Marca_C, Modelo_C, CURDATE(), Precio_C from carrito");
$vaciar = mysqli_query($con, "TRUNCATE TABLE carrito");
header("Location: http://localhost/PEPE/Productos.php");
