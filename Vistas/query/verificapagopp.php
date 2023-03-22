<?php
require '../Conexion/funciones.php';
session_start();
$usuario = $_SESSION['username'];

$sql = "SELECT c_id FROM clientes WHERE c_mail ='$usuario'";
$idusuario=setq($sql);
$resultado = mysqli_fetch_array($idusuario);
$result = $resultado['c_id'];

$sql1="UPDATE pedidoscl SET p_estatus ='A', p_fpago ='5'WHERE p_cliente = '$result' AND p_estatus='N' ";
    
    if(setq($sql1)){
        
        $sql2= 'UPDATE pedidoscld SET pd_conf = 1 WHERE pd_pedido = "'.$result.'"';
    
        if(setq($sql2)){
            echo '<script> 
            window.location.href ="../index.php"
            alert("pedido confirmado");
            </script>';
            /* $sql3 ="UPDATE pedidoscl SET p_fpago ='5' WHERE p_cliente ='$result'";
            setq($sql3); */
        } 
    }

?>