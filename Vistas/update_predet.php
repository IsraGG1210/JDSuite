<?php
include 'Conexion/funciones.php';
$id_dir = $_POST['direcc'];
$idusu = $_REQUEST['idu'];
$calle = $_REQUEST['calle1'];
$colonia = $_REQUEST['colonia1'];
$numeroe = $_REQUEST['numeroe1'];
$numeroi = $_REQUEST['numeroi1'];
$cp = $_REQUEST['codigop1'];
$municipio = $_REQUEST['municipio1'];
$estado = $_REQUEST['estado1'];
$pais = $_REQUEST['pais1'];
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
            
            if($_SERVER['REQUEST_URI'] == '/JDSuite/Vistas/verperfil'){
                header("Location: verperfil");
            }else {
                header("Location: datosenvio");
            }
            
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
        if($_SERVER['REQUEST_URI'] == '/JDSuite/Vistas/verperfil'){
            header("Location: verperfil");
        }else {
            header("Location: datosenvio");
        }
     } else{
        ?>
        <script>
            alert("Ocurrio un error");
        </script>
        <?php
     }
}


?>
