<?php
require '../Conexion/funciones.php';
session_start();
$usuario = $_SESSION['username'];
$subtotal = $_POST['subtotal'];
$envio = $_POST['envio'];
$total = $_POST['total'];
$user = $_POST['user'];
$idusuario= busca($usuario,'clientes','c_mail','c_id');

$pedido = busca($idusuario,'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
$sql ="UPDATE pedidoscl SET
p_fechagen =NOW(),
p_subtotal = '$subtotal',
p_envio = '$envio',
p_total = '$total'
WHERE p_cliente ='$pedido' AND p_estatus ='N'";

if(setq($sql)){
       echo '<script>
       window.location.href= "../checkoutpaypal";
</script>';
} else {
       echo '<script>
       window.alert("Error");
</script>';
}

 
?>