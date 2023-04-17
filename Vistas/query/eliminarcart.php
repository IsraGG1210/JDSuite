<?php
require_once '../Conexion/funciones.php';
session_start();
$id = $_POST['id'];
if(isset($_SESSION['username'])){
    $sesion = $_SESSION['username'];
    $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$sesion'";
    $resultado = setq($sql1);
    $idusuario = mysqli_fetch_array($resultado);
    $idusu = $idusuario['c_id'];

    $pedido = busca($idusuario['c_id'],'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
    $sql = 'DELETE FROM pedidoscld WHERE pd_pedido="'.$pedido.'" AND pd_producto="'.$id.'" AND pd_conf = 0';
    $result = setq($sql);

}else{
    if(isset($_COOKIE['cart'])){
        foreach($_COOKIE['cart'] as $clave=>$item){
            if($item[0] == $id){
                setcookie('cart['.$clave.'][0]', '', time()-24*60*60, '/');
                setcookie('cart['.$clave.'][1]', '', time()-24*60*60, '/');
                setcookie('cart['.$clave.'][2]', '', time()-24*60*60, '/');
                setcookie('cart['.$clave.'][3]', '', time()-24*60*60, '/');
                setcookie('cart['.$clave.'][4]', '', time()-24*60*60, '/');
                setcookie('cart['.$clave.'][5]', '', time()-24*60*60, '/');
            }
        }
    }
}

?>
                          