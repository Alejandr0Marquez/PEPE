<?php
include("conexion.php");

if (isset($_POST['Marca_C'], $_POST['Modelo_C'], $_POST['Precio_C'])) {
    $marca = $_POST['Marca_C'];
    $modelo = $_POST['Modelo_C'];
    $precio = $_POST['Precio_C'];

    require('../PEPE/fpdf/fpdf.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    try {
        $mail = new PHPMailer(true);

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Agregar la imagen al PDF
        $imagePath = './img/Tenki.png';
        $pdf->Image($imagePath, 10, 10, 50, 50); 

        // Agregar los datos de la consulta al PDF
        while ($row = $sql->fetch_assoc()) {
            $pdf->MultiCell(160, 10, strval('Marca: ' . $row['Marca_C'] . '   ' . 'Modelo: ' . $row['Modelo_C'] . '   ' . 'Precio: $ ' . $row['Precio_C']), 1, 'L');
        }

        // Calcular el total de la compra
        $totalCompra = 0;
        mysqli_data_seek($sql, 0); 
        while ($row = $sql->fetch_assoc()) {
            $totalCompra += $row['Precio_C'];
        }

        // Obtener la fecha actual
        $fechaEnvio = date('Y-m-d');

        // Agregar la fecha y el total al final del PDF
        $pdf->SetY(-20);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Fecha de envío: ' . $fechaEnvio, 0, 1, 'R');
        $pdf->Cell(0, 10, 'Total de la compra: $ ' . number_format($totalCompra, 2), 0, 1, 'R');

        $pdfdoc = $pdf->Output("Doc", "S");
        $pdflisto = chunk_split(base64_encode($pdfdoc));

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
} else {
    echo "Faltan datos POST.";
}
?>
