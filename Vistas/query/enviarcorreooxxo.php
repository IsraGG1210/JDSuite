<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

$jsonStr = file_get_contents('php://input');
  $jsonObj = json_decode($jsonStr);
  header('Contetn-Type: application/json');
  $url = !empty($jsonObj->url) ? $jsonObj->url : '';
  $name = !empty($jsonObj->name) ? $jsonObj->name : '';
  $email = !empty($jsonObj->email) ? $jsonObj->email : '';

  try {
    $mail = new PHPMailer(true);
      //Server settings
    
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'prueba1_789@outlook.com';  /* prueba1_789@outlook.com  */        //SMTP username
      $mail->Password   = 'prueba1.123';  /*Outlook: prueba1.123 */                             //SMTP password
      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('prueba1_789@outlook.com');
      $mail->addAddress($email);              //Name is optional
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Pago Oxxo JD Suite';
      $mail->Body    = '¡Gracias por tu compra! Puedes descargar tu comprobante de pago de OXXO en el siguiente enlace: ' . $url;

     
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients' ;
  
      $mail->send();
      die();
      header("Location: ../login.php");
      /* echo 'Message has been sent'; */
} catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
?>