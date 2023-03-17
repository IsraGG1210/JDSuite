<?php
require '../vendor/autoload.php';
require 'Conexion/funciones.php';


$subtotal = $_REQUEST['subtotal'];
$envio = $_REQUEST['envio'];
$total = $_REQUEST['total'];
echo $subtotal;
echo $envio;
echo $total;
//echo "TOTAL",$total;
  \Stripe\Stripe::setApiKey("sk_test_51MmJTOGuTfIl032Majf4NM807znGxSAzFysiDxy7ke9HDgtha6enG8jYzQU4lobgTE3x4OpWkXBWsEmqT0YZSk2m007pZd6sF2");

  $token = $_POST["stripeToken"];

  $charge = \Stripe\Charge::create([
    "amount" => ($total*100),
    "currency" => "mxn",
    "description" => "Pago en mi tienda...",
    "source" => $token
  ]);

  //echo "<pre>", print_r($charge), "</pre>";
  if($charge['captured']){
    session_start();
    $sesion = $_SESSION['username'];
    $sql = 'INSERT INTO pedidoscl SET
          p_cliente = "'.$sesion.'",
          p_factura = "'.$charge['id'].'",
          p_fechagen = "'.date('Y-m-d H:i:s').'",
          p_subtotal = "'.$subtotal.'",
          p_envio = "'.$envio.'",
          p_total = "'.$total.'"';
    setq($sql); 
    echo "SU PAGO DE LA COMPRA ",$charge['id'] ," RESULTO EXITOSO";
  }
  /* session_start();
$sesion = $_SESSION['username'];
$sql = 'INSERT INTO pedidoscl SET
       p_cliente= "'.$user.'",
       p_subtotal = "'.$subtotal.'",
       p_envio = "'.$envio.'",
       p_total = "'.$total.'"';
setq($sql); 
$sql1= 'UPDATE pedidoscld SET pd_conf = 1 WHERE pd_pedido = "'.$user.'"';
setq($sql1);  */
?>