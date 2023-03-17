<?php
require '../Conexion/config.php';
require '../Conexion/funciones.php';

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

print_r($datos);

if(is_array($datos)){

    $id_transaccion = $datos['detalles']['id'];
    $monto = $datos['detalles']['purcharse_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']['payer']['email_address'];
    $id_cliente = $datos['detalles']['payer']['payer_id'];
    

    $sql="";

}
?>