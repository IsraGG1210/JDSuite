<?php

require '../Conexion/funciones.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

session_start();
$usuario = $_SESSION['username'];

$sql = "SELECT * FROM clientes WHERE c_mail ='$usuario'";
$idusuario=setq($sql);
$resultado = mysqli_fetch_array($idusuario);
$result = $resultado['c_id'];

$array = mysqli_num_rows($idusuario);
if($array != '0'){
    $mail = new PHPMailer(true);

try {
    //Server settings
    
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'prueba1_789@outlook.com';  /* prueba1_789@outlook.com  */        //SMTP username
    $mail->Password   = 'prueba1.123';  /*Outlook: prueba1.123 */                             //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('prueba1_789@outlook.com');
    $mail->addAddress($usuario);              //Name is optional

     
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Datos Bancarios ';
    $mail->Body    = 'Los datos para poder realizar la tranferencia bancaria son : 12135464654654564';

   
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients' ;

    $mail->send();
    $sql = "UPDATE pedidoscl SET p_fpago = '3' WHERE p_cliente ='".$resultado['c_id']."' AND p_estatus='N'";
    setq($sql);
    $sql2= 'UPDATE pedidoscld SET pd_conf = 1 WHERE pd_pedido = "'.$result.'"';
    setq($sql2);
    echo '<script>
        alert("Datos bancarios enviados");
    </script>';
    header("Location: ../index.php");
    /* echo 'Message has been sent'; */
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
} else {
   ?>
   <script>

    window.location.href = "../transferencia.php";
    window.alert("ocurrio un error");
   </script>
   
   <?php
}
?>