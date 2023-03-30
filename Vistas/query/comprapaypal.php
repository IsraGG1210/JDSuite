<?php
require '../Conexion/funciones.php';
session_start();
$usuario = $_SESSION['username'];
$subtotal = $_POST['subtotal'];
$envio = $_POST['envio'];
$total = $_POST['total'];
$user = $_POST['user'];

$sql1 = "SELECT c_id FROM clientes WHERE c_mail='$usuario'";
$result = mysqli_fetch_array(setq($sql1));
$id = $result['c_id'];

$sql2="SELECT * FROM pedidoscl WHERE p_cliente = '$id' AND p_estatus ='N'";
$array= mysqli_num_rows(setq($sql2));
if($array != '0'){
      
          $sql ="UPDATE pedidoscl SET
          p_fechagen =NOW(),
          p_subtotal = '$subtotal',
          p_envio = '$envio',
          p_total = '$total'
          WHERE p_cliente ='$id' AND p_estatus ='N'";
          setq($sql);   
}else {
       
       $sql ="INSERT INTO pedidoscl SET
       p_cliente ='$id',
       p_estatus ='N',
       p_fechagen =NOW(),
       p_subtotal = '$subtotal',
       p_envio = '$envio',
       p_total = '$total'";

setq($sql);
}




/* $sql1= 'UPDATE pedidoscld SET pd_conf = 1 WHERE pd_pedido = "'.$user.'"';
setq($sql1);
 */
echo '<script>
       window.location.href= "../checkoutpaypal";
</script>'; 
?>