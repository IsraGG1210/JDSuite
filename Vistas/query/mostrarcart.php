<?php 
require_once './Conexion/funciones.php';

$sql = 'SELECT concat(i_nmb,".",i_ext)as rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
        FROM pedidoscld
        INNER JOIN articulos ON a_cb = pd_producto
        INNER JOIN imagenes ON a_cb = i_idproducto
        WHERE pd_pedido="'.$sesion.'"';
$result = setq($sql);

$datos = Array();
while($row = mysqli_fetch_array($result)){
    $datos[]=$row;
}
?>
