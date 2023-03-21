<?php
require_once '../Conexion/funciones.php';
session_start();
$newitem = 0;
$cantidad_total = 0;

if(isset($_SESSION['username'])){ 
    $sesion = $_SESSION['username'];
    $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$sesion'";
$resultado = setq($sql1);
$idusuario = mysqli_fetch_array($resultado);
$idusu = $idusuario['c_id'];
    //echo $sesion;
   /*  $sql = 'SELECT COUNT(pd_cantidad) AS cantidad FROM pedidoscld WHERE pd_pedido="'.$sesion.'" AND pd_conf = 0'; */
    $sql = "SELECT COUNT(pd_cantidad) AS cantidad FROM pedidoscld WHERE pd_pedido='$idusu' AND pd_conf = 0";
    $result = setq($sql);
    $cantidad_tota = mysqli_fetch_assoc($result);
    $cantidad_total = $cantidad_tota['cantidad'];
//echo $cantidad_total;
 

}else{
    if(isset($_COOKIE['cart'])) {
    
        foreach($_COOKIE['cart'] as $clave=>$item) {
            $cantidad_total += $item[1];
        }
        //echo $cantidad_total;
    }
} 
echo $cantidad_total;
?>