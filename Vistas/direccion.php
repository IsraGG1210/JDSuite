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


$sql ="INSERT INTO direnvio SET
d_cliente ='$idusu',
d_calle = '$calle',
d_nume ='$numeroe',
d_numi = '$numeroi',
d_colonia = '$colonia',
d_cp = '$cp',
d_municipio = '$municipio',
d_estado = '$estado',
d_pais = '$pais'";

if(setq($sql)){
    header("Location: pruebadir");
    
}else {
    window.alert("Ocurrio un error");
}


/* echo $idusu.'<br>'.$calle .'<br>'. $colonia .'<br>'. $numeroe .'<br>'. $numeroi.'<br>' . $cp.'<br>' . $municipio.'<br>' . $estado.'<br>' . $pais;
 */

?>