<?php
include 'Conexion/funciones.php';
session_start();

$iddie = $_REQUEST['pid'];

$usuario=$_SESSION['username'];



$idusuario= busca($usuario,'clientes','c_mail','c_id');

$sql = "UPDATE pedidoscl SET
        p_direccion = '$iddie' WHERE p_cliente = '$idusuario' AND p_estatus = 'N'";

if(setq($sql)){
    header('Location: checkout');
}else{
    ?>
    <script>
        alert("Ocurrio un error");
    </script>
    <?php
}

?>