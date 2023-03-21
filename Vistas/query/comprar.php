<?php
require '../Conexion/funciones.php';

$subtotal = $_POST['subtotal'];
$envio = $_POST['envio'];
$total = $_POST['total'];
$user = $_POST['user'];

$sql = 'INSERT INTO pedidoscl SET
       p_cliente= "'.$user.'",
       p_subtotal = "'.$subtotal.'",
       p_envio = "'.$envio.'",
       p_total = "'.$total.'"';
setq($sql); 
$sql1= 'UPDATE pedidoscld SET pd_conf = 1 WHERE pd_pedido = "'.$user.'"';
setq($sql1); 

?>