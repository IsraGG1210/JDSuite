<?php
include 'Conexion/funciones.php';

$idusu = $_REQUEST['idu'];
$calle = $_REQUEST['calle1'];
$colonia = $_REQUEST['colonia1'];
$numeroe = $_REQUEST['numeroe1'];
$numeroi = $_REQUEST['numeroi1'];
$cp = $_REQUEST['codigop1'];
$municipio = $_REQUEST['municipio1'];
$estado = $_REQUEST['estado1'];
$pais = $_REQUEST['pais1'];
$telefono = $_REQUEST['telefono1'];
$referencias = $_REQUEST['referencia1'];
$dirpre = $_REQUEST['predet'];


$id_dir = getmax('d_id', 'direnvio',false,true);


if(isset($dirpre)){
    $sql1="UPDATE direnvio SET d_predeterminado ='0' WHERE d_cliente ='$idusu'";
    if(setq($sql1)){

        $sql='INSERT INTO direnvio SET
        d_id ="'.$id_dir.'",
        d_cliente ="'.$idusu.'",
        d_calle = "'.clearvmayus($calle).'",
        d_nume = "'.clearvmayus($numeroe).'",
        d_numi = "'.clearvmayus($numeroi).'",
        d_colonia = "'.clearvmayus($colonia).'",
        d_cp = "'.$cp.'",
        d_municipio = "'.clearvmayus($municipio).'",
        d_estado = "'.clearvmayus($estado).'",
        d_pais ="'.clearvmayus($pais).'",
        d_telefono ="'.$telefono.'",
        d_referencia ="'.$referencias.'",
        d_predeterminado = "1" ';
        
    
    if(setq($sql)){
        if($_SERVER['REQUEST_URI'] == '/JDSuite/Vistas/verperfil'){
            header("Location: verperfil");
        }else {
            header("Location: datosenvio");
        }
        
        
    }else {
        alert("Ocurrio un error");
    }
    } else {
        alert("Ocurrio un error");
    }
   
}else {
    $sql='INSERT INTO direnvio SET
        d_id ="'.$id_dir.'",
        d_cliente ="'.$idusu.'",
        d_calle = "'.clearvmayus($calle).'",
        d_nume = "'.clearvmayus($numeroe).'",
        d_numi = "'.clearvmayus($numeroi).'",
        d_colonia = "'.clearvmayus($colonia).'",
        d_cp = "'.$cp.'",
        d_municipio = "'.clearvmayus($municipio).'",
        d_estado = "'.clearvmayus($estado).'",
        d_pais ="'.clearvmayus($pais).'",
        d_telefono ="'.$telefono.'",
        d_referencia ="'.$referencias.'",
        d_predeterminado = "0" ';

if(setq($sql)){
    if($_SERVER['REQUEST_URI'] == '/JDSuite/Vistas/verperfil'){
        header("Location: verperfil");
    }else {
        header("Location: datosenvio");
    }
    
}else {
    window.alert("Ocurrio un error");
}
}



?>