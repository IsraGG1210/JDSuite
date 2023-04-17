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
/* echo "BIEN". $jsonObj->pago;
echo "TOTAL ".$total; */
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
    $pedido = busca($idusuario['c_id'],'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
    $sql = "UPDATE pedidoscl SET
      p_fpago = 6,
      p_fechagen = NOW(),
      p_subtotal = '$subtotal',
      p_envio = '$envio',
      p_total = '$total'
      WHERE p_cliente ='$pedido' AND p_estatus ='N'";
  setq($sql);
  }else{
    $envio = 0;
    $subtotal = $envio;
    $pedido = busca($idusuario['c_id'],'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
    $sql = "UPDATE pedidoscl SET
      p_fpago = 6,
      p_fechagen = NOW(),
      p_subtotal = '$subtotal',
      p_envio = '$envio',
      p_total = '$total'
      WHERE p_cliente ='$pedido' AND p_estatus ='N'";
  setq($sql);
  }
  /* $sql = 'SELECT p_id FROM pedidoscl
        WHERE p_cliente = "'.$idusu.'" 
        ORDER BY p_id DESC
        LIMIT 1';
    $ID_PEDIDOSCL= setq($sql);
    $ID = mysqli_fetch_all($ID_PEDIDOSCL, MYSQLI_ASSOC);
                 
      foreach ($ID as $idp) {
        $idpcl = $idp['p_id'];
        //echo $idpcl;
  $sql = 'UPDATE pedidoscld SET
        pd_conf = "1",
        pd_confirm = "'.$idpcl.'",
        pd_fechaconf = "'.date('Y-m-d').'"
        WHERE pd_pedido = "'.$idusu.'" AND 
        pd_conf = "0"';
    setq($sql);} */
  $output = [
    'id' => $intent->id,
    'clientSecret' => $intent->client_secret
  ];
  echo json_encode($output);
?>


