<?php
require '../Conexion/funciones.php';
session_start();
$usuario = $_SESSION['username'];

$sql = "SELECT c_id FROM clientes WHERE c_mail ='$usuario'";
$idusuario=setq($sql);
$resultado = mysqli_fetch_array($idusuario);
$result = $resultado['c_id'];

$sql1="UPDATE pedidoscl SET p_estatus =1, p_fpago ='5'WHERE p_cliente = '$result' AND p_estatus='N' ";
    
    if(setq($sql1)){
        $sql = 'SELECT p_id FROM pedidoscl
        WHERE p_cliente = "'.$result.'" 
        ORDER BY p_id DESC
        LIMIT 1';

        $ID_PEDIDOSCL= setq($sql);
        $ID = mysqli_fetch_array($ID_PEDIDOSCL);
        $idped = $ID['p_id'];
        

        $sql2= "UPDATE pedidoscld SET pd_conf = 1, pd_confirm='".$idped."', pd_fechaconf= NOW() WHERE pd_pedido = '".$result."' AND pd_conf=0     ";
        if(setq($sql2)){
            echo '<script> 
            alert("pedido confirmado");
            window.location.href ="../index"
            
            </script>';
            /* $sql3 ="UPDATE pedidoscl SET p_fpago ='5' WHERE p_cliente ='$result'";
            setq($sql3); */
        } 
    }

?>