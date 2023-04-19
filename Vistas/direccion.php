<?php
include 'Conexion/funciones.php';

$idusu = $_REQUEST['idu'];
$calle = $_REQUEST['calle'];
$colonia = $_REQUEST['colonia'];
$numeroe = $_REQUEST['numeroe'];
$numeroi = $_REQUEST['numeroi'];
$cp = $_REQUEST['codigop'];
$municipio = $_REQUEST['municipio'];
$estado = $_REQUEST['estado'];
$pais = $_REQUEST['pais'];
$dirpre = $_REQUEST['predet'];


$id_dir = getmax('d_id', 'direnvio',false,true);


if(isset($dirpre)){
    $sql1="UPDATE direnvio SET d_predeterminado ='0' WHERE d_cliente ='$idusu'";
    if(setq($sql1)){
        $sql ="INSERT INTO direnvio SET
        d_id = '$id_dir',
        d_cliente ='$idusu',
        d_calle = '$calle',
        d_nume ='$numeroe',
        d_numi = '$numeroi',
        d_colonia = '$colonia',
        d_cp = '$cp',
        d_municipio = '$municipio',
        d_estado = '$estado',
        d_pais = '$pais',
        d_predeterminado = '1'";
    
    if(setq($sql)){
        header("Location: pruebadir");
        
    }else {
        alert("Ocurrio un error");
    }
    } else {
        alert("Ocurrio un error");
    }
   
}else {
    $sql ="INSERT INTO direnvio SET
    d_id = '$id_dir',
    d_cliente ='$idusu',
    d_calle = '$calle',
    d_nume ='$numeroe',
    d_numi = '$numeroi',
    d_colonia = '$colonia',
    d_cp = '$cp',
    d_municipio = '$municipio',
    d_estado = '$estado',
    d_pais = '$pais',
    d_predeterminado = '0'";

if(setq($sql)){
    header("Location: pruebadir");
    
}else {
    window.alert("Ocurrio un error");
}
}



?>