<?php
include 'Conexion/funciones.php';
$id_dir = $_POST['direcc'];
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


if(isset($dirpre)){
    $sql = "UPDATE direnvio SET d_predeterminado = '0'
     WHERE d_cliente = '$idusu'";
    if(setq($sql)){
        $sql1="UPDATE direnvio SET d_predeterminado = '1',
        d_calle = '$calle',
        d_nume = '$numeroe',
        d_numi = '$numeroi',
        d_colonia = '$colonia',
        d_cp = '$cp',
        d_municipio = '$municipio',
        d_estado = '$estado'
        WHERE d_cliente = '$idusu' AND d_id = '$id_dir'";
        if(setq($sql1)){
            
            header("Location: pruebadir");
            
        }
    }
}else {
    $sql = "UPDATE direnvio SET
    d_calle = '$calle',
    d_nume = '$numeroe',
    d_numi = '$numeroi',
    d_colonia = '$colonia',
    d_cp = '$cp',
    d_municipio = '$municipio',
    d_estado = '$estado'
     WHERE d_id = '$id_dir'";
     if(setq($sql)){
        header("Location: pruebadir");
     } else{
        ?>
        <script>
            alert("Ocurrio un error");
        </script>
        <?php
     }
}


?>
