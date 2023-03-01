<?php 
require_once '../Conexion/funciones.php';
session_start();
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = uniqid();
}
$sesion = $_SESSION['id'];

$cantidad = $_POST['cantidad'];
$producto = $_POST['producto'];

    $sql = 'SELECT * FROM pedidoscld WHERE pd_pedido="'.$sesion.'" AND pd_producto="'.$producto.'"';
    $result = setq($sql);
    $row = $result->fetch_array();
    //$nueva_cantidad = $cantidad+$row['pd_cantidad'];
                
    if($cantidad>0 ||$cantidad>null){
        $sql1 = 'UPDATE pedidoscld SET pd_cantidad = "'.$cantidad.'" WHERE pd_producto = "'.$producto.'"';
        setq($sql1);
    }else{
        echo "INGRESE UNA CANTIDAD ACEPTABLE";
    }
?>
