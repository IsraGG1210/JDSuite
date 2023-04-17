<?php
date_default_timezone_set("America/Mexico_City");

require '../vendor/autoload.php';
require_once("../stripe/init.php");
require 'Conexion/funciones.php';
require_once('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('../vendor/phpmailer/phpmailer/src/SMTP.php');

\Stripe\Stripe::setApiKey("sk_test_51MmJTOGuTfIl032Majf4NM807znGxSAzFysiDxy7ke9HDgtha6enG8jYzQU4lobgTE3x4OpWkXBWsEmqT0YZSk2m007pZd6sF2");

/* foreach($_POST as $campo => $valor){	echo "POST->". $campo ."= ". $valor.'<br>'; }
foreach($_GET as $campo => $valor) {	echo "GET->". $campo ."= ". $valor.'<br>'; }
die(); */

$jsonStr = file_get_contents('php://input');
  $jsonObj = json_decode($jsonStr);
  header('Contetn-Type: application/json');
  $ID = !empty($jsonObj->id) ? $jsonObj->id : '';
  $email = !empty($jsonObj->email) ? $jsonObj->email : '';
  
$paymentIntentId = $ID;

    // Recupera el PaymentIntent desde Stripe
$paymentIntent = \Stripe\PaymentIntent::retrieve($paymentIntentId);

  if ($paymentIntent->status === 'succeeded') {
    $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$email'";
    $resultado = setq($sql1);
    $idusuario = mysqli_fetch_array($resultado);
    $idusu = $idusuario['c_id'];

    $pedido = busca($idusuario['c_id'],'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
    $sql = "UPDATE pedidoscl SET
          p_estatus = 'A'
          WHERE p_id ='$pedido' AND p_estatus ='N'";
      setq($sql);
/*   $output = [
    'status' => $paymentIntent->status
   ];
   echo json_encode($output); */

  } 
  ?>
