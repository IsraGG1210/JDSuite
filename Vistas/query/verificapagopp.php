<?php
require '../Conexion/funciones.php';
session_start();
$usuario = $_SESSION['username'];


$pedido = busca($idusuario['c_id'],'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
$sql1="UPDATE pedidoscl SET p_estatus =1, p_fpago ='4'WHERE p_cliente = '$pedido' AND p_estatus='N' ";
    
    if(setq($sql1)){
        $sql2= "UPDATE pedidoscld SET pd_conf = 1, pd_confirm='".$idped."', pd_fechaconf= NOW() WHERE pd_pedido = '".$pedido."' AND pd_conf=0     ";
        if(setq($sql2)){
            echo '<script> 
            alert("pedido confirmado");
            window.location.href ="../index"
            
            </script>';
           
        } 
    }

?>