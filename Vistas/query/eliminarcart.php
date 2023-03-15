<?php
require_once '../Conexion/funciones.php';
session_start();

$id = $_POST['id'];
if(isset($_SESSION['username'])){
    $sesion = $_SESSION['username'];
    $sql = 'DELETE FROM pedidoscld WHERE pd_pedido="'.$sesion.'" AND pd_producto="'.$id.'" AND pd_conf = 0';
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
