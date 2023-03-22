<?php 
session_start();
require '../Conexion/funciones.php';
$id = $_POST["producto"]; // ID del producto
$cantidad = $_POST["cantidad"]; // Nueva cantidad del producto

if(isset($_SESSION['username'])){
    $sesion = $_SESSION['username'];
    $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$sesion'";
$resultado = setq($sql1);
$idusuario = mysqli_fetch_array($resultado);
$idusu = $idusuario['c_id'];
    $sql1 = 'UPDATE pedidoscld SET pd_cantidad = "'.$cantidad.'" 
            WHERE pd_producto = "'.$id.'" AND pd_pedido = "'.$idusu.'" AND pd_conf = 0';
    setq($sql1);

}else{
    if(isset($_COOKIE["cart"])){
        foreach($_COOKIE["cart"] as $clave=>$item){
            if($item[0] == $id){
                setcookie("cart[$clave][1]", $cantidad, time()+24*60*60, "/");
                break;
            }
        }
    }
}
?>





