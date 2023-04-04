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
    $sql = 'INSERT INTO pedidoscl SET
        p_cliente = "'.$idusu.'",
        p_estatus = "0",
        p_factura = "'.$intent->id.'",
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
        p_factura = "'.$intent->id.'",
        p_fechagen = "'.date('Y-m-d H:i:s').'",
        p_subtotal = "'.$subtotal.'",
        p_envio = "'.$envio.'",
        p_total = "'.$total.'"';
    setq($sql);
    
}
$sql = 'SELECT p_id FROM pedidoscl
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
    setq($sql1);
    }
$output = [
    'id' => $intent->id,
    'clientSecret' => $intent->client_secret
];
echo json_encode($output);
?>
