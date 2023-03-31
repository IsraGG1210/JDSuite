<?php
date_default_timezone_set("America/Mexico_City");

require '../vendor/autoload.php';
require_once("../stripe/init.php");
require 'Conexion/funciones.php';
require_once('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('../vendor/phpmailer/phpmailer/src/SMTP.php');


\Stripe\Stripe::setApiKey("sk_test_51MmJTOGuTfIl032Majf4NM807znGxSAzFysiDxy7ke9HDgtha6enG8jYzQU4lobgTE3x4OpWkXBWsEmqT0YZSk2m007pZd6sF2");

$jsonStr = file_get_contents('php://input');
  $jsonObj = json_decode($jsonStr);
  /* if($jsonObj->request_type == 'create_payment'){ */
  header('Contetn-Type: application/json');
  $total = !empty($jsonObj->pago) ? $jsonObj->pago : '';
  $name = !empty($jsonObj->name) ? $jsonObj->name : '';
  $email = !empty($jsonObj->email) ? $jsonObj->email : '';
//echo "BIEN". $jsonObj->pago;
  $intent  =  \Stripe\PaymentIntent::create([
    "amount" => ($total*100),
    "currency" => "mxn",
    "description" => "Pago Oxxo",
    "payment_method_options" => [
        "oxxo" => [
            "expires_after_days" => 2
        ]
        ],
    'payment_method_types' => ['oxxo'],
    'receipt_email' => $email,
  ]);

  //$oxxoVoucherUrl = $paymentIntent->charges->data[0]->payment_method_details->oxxo_voucher->url; 
  if($total<5000){
    $envio = 150;
    $subtotal = $total - $envio;
    $sql = 'INSERT INTO pedidoscl SET
        p_cliente = "'.$email.'",
        p_estatus = "0",
        p_factura = "'.$intent['id'].'",
        p_fechagen = "'.date('Y-m-d H:i:s').'",
        p_subtotal = "'.$subtotal.'",
        p_envio = "'.$envio.'",
        p_total = "'.$total.'"';
    setq($sql);
  }else{
    $envio = 0;
    $subtotal = $envio;
    $sql = 'INSERT INTO pedidoscl SET
        p_cliente = "'.$email.'",
        p_estatus = "0",
        p_factura = "'.$intent['id'].'",
        p_fechagen = "'.date('Y-m-d H:i:s').'",
        p_subtotal = "'.$subtotal.'",
        p_envio = "'.$envio.'",
        p_total = "'.$total.'"';
    setq($sql);
  }
  $output = [
    'id' => $intent->id,
    'clientSecret' => $intent->client_secret
  ];
  echo json_encode($output);

?>


