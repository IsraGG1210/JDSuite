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
  
  $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$email'";
  $resultado = setq($sql1);
  $idusuario = mysqli_fetch_array($resultado);
  $idusu = $idusuario['c_id'];

  if($total<5000){
    $envio = 150;
    $subtotal = $total - $envio;
    $sql = 'INSERT INTO pedidoscl SET
        p_cliente = "'.$idusu.'",
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
        p_cliente = "'.$idusu.'",
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
/* }elseif($jsonObj->request_type == 'retrieve_payment_intent'){
  $payment_id=$intent->id;

  $payment = \Stripe\PaymentIntent::retrieve($payment_id);

// Verificar el estado del pago
if ($payment->status == 'succeeded') {
  // El pago ha sido exitoso
  $sql = 'UPDATE pedidoscl SET
        p_estatus = "1"';
  setq($sql);
  $output = [
    'payment_txn_id' => base64_encode($transaction_id)
  ];
  echo json_encode($output);
} else {
  http_response_code(500);
      echo json_encode(['error' => 'La transacción ha tenido un error!']);
}
} */
?>


