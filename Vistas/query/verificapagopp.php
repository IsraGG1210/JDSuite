<?php
require '../Conexion/funciones.php';
session_start();
$usuario = $_SESSION['username'];

$idusuario= busca($usuario,'clientes','c_mail','c_id');

$pedido = busca($idusuario,'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
$sql1="UPDATE pedidoscl SET p_estatus ='A', p_fpago ='4'WHERE p_id = '$pedido' AND p_estatus='N' ";
    
    if(setq($sql1)){
        $sql2= "UPDATE pedidoscld SET pd_conf = 1, pd_conf= 1 WHERE pd_pedido = '".$pedido."' AND pd_conf=0 ";
        if(setq($sql2)){
            echo '<script> 
            alert("pedido confirmado");
            window.location.href ="../index"
            
            </script>';
           
        } 
    }

?>