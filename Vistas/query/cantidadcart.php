<?php
require_once '../Conexion/funciones.php';
session_start();
$newitem = 0;
$cantidad_total = 7;

if(isset($_SESSION['username'])){ 
    $sesion = $_SESSION['username'];
    //echo $sesion;
    $sql = 'SELECT COUNT(pd_cantidad) AS cantidad FROM pedidoscld WHERE pd_pedido="'.$sesion.'" AND pd_conf = 0';
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