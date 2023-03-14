<?php

require '../Conexion/funciones.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}

$correo= $_POST['email'];
$sql ="SELECT * FROM clientes WHERE c_mail = '$correo'";
$resultado = setq($sql);
$array = mysqli_num_rows($resultado);
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
    $mail->addAddress($correo);              //Name is optional

    
    $contrasenan =  generate_string($permitted_chars,10);
    $sql="UPDATE clientes SET c_rstpass = PASSWORD('$contrasenan') WHERE c_mail = '$correo'";
        setq($sql); 
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recuperacion de Contraseña';
    $mail->Body    = 'Tu nueva contraseña es: '.$contrasenan;

   
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients' ;

    $mail->send();
    header("Location: ../login.php");
    /* echo 'Message has been sent'; */
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
} else {
   ?>
   <script>

    window.location.href = "../recuperarcontra.php";
    window.alert("correo no encontrado");
   </script>
   
   <?php
}
?>