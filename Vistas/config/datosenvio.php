<?php
include '../Conexion/funciones.php';
session_start();
$usuario=$_SESSION['username'];



$calle = $_POST['calle'];
$numeroe = $_POST['numeroe'];
$numeroi = $_POST['numeroi'];
$colonia = $_POST['colonia'];
$municipio = $_POST['municipio'];
$cp = $_POST['codigop'];
$estado = $_POST['estado'];
$pais = $_POST['pais'];


$domicilioc = $calle.','.$numeroe.',interior: '.$numeroi.','.$colonia.','.$municipio.','.$cp.','.$estado.','.$pais;



$sql = "UPDATE pedidoscl SET p_direccion = '$domicilioc' WHERE p_id = p_id";

if(setq($sql)){
    header('location: ../checkout');
}else{
    header('location: datosenvio');
}

?>