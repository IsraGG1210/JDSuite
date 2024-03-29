<?php
date_default_timezone_set("America/Mexico_City");

require '../vendor/autoload.php';
require_once("../stripe/init.php");
require 'Conexion/funciones.php';
require_once('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('../vendor/phpmailer/phpmailer/src/SMTP.php');

$jsonStr = file_get_contents('php://input');
$jsonObj = json_decode($jsonStr);
header('Content-Type: application/json');
$total = !empty($jsonObj->pago) ? $jsonObj->pago : '';
$name = !empty($jsonObj->name) ? $jsonObj->name : '';
$email = !empty($jsonObj->email) ? $jsonObj->email : '';

\Stripe\Stripe::setApiKey("sk_test_51MmJTOGuTfIl032Majf4NM807znGxSAzFysiDxy7ke9HDgtha6enG8jYzQU4lobgTE3x4OpWkXBWsEmqT0YZSk2m007pZd6sF2");

$intent = \Stripe\PaymentIntent::create([
    "amount" => ($total*100),
    "currency" => "mxn",
    "description" => "Pago Card",
    'payment_method_types' => ['card'],
    'receipt_email' => $email
]); 

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
        WHERE p_id ='$pedido' AND p_estatus ='N'";
    setq($sql );
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
    WHERE p_id ='$pedido' AND p_estatus ='N'";
    setq($sql);
    
}
$output = [
    'id' => $intent->id,
    'clientSecret' => $intent->client_secret
];
echo json_encode($output);
?>
