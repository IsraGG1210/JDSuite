<?php 
require_once '../Conexion/funciones.php';
session_start();
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = uniqid();
}
$sesion = $_SESSION['id'];
$producto = $_POST['id'];

 $sql = 'DELETE  FROM pedidoscld WHERE pd_pedido="'.$sesion.'" AND pd_producto="'.$producto.'"';
 $result = setq($sql);
?>
