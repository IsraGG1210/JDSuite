<?php
require_once '../Conexion/funciones.php';
session_start();
$usuario = $_SESSION['username'];
$precio = $_POST["precio"];
$descuento = $_POST["descuento"];
$talla = $_POST["talla"];
$color = $_POST["colorsel"];
$cantidad = $_POST["cantidad"];
$id = $_POST["p"];

$cart = array();

$sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$usuario'";
$resultado = setq($sql1);
$idusuario = mysqli_fetch_array($resultado);
$idusu = $idusuario['c_id'];
if(isset($_SESSION['username'])){
$sesion = $_SESSION['username'];
$existepedido = busca($idusu,'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
if($existepedido){
  $sql = 'SELECT * FROM pedidoscld WHERE pd_pedido="'.$existepedido.'" AND pd_producto="'.$id.'" AND pd_conf = 0';
  $result = setq($sql);
  
}else{

  $getpedido = getmax('p_id','pedidoscl',false,true);
  
  $sql = 'INSERT INTO pedidoscl SET
          p_web = "2",
          p_id = "'.$getpedido.'",
          p_cliente = "'.$idusu.'",
          p_estatus = "N",
          p_empresa = "1",
          p_fechagen = "'.date('Y-m-d H:i:s').'",
          p_ugen = "E-COMMERCE"';
  setq($sql);

  //$existepedido = busca($idusu,'pedidoscl','p_estatus = "N" AND p_cliente','p_id');

  $sql = 'INSERT INTO pedidoscld SET
        pd_pedido = "'.$getpedido.'",
        pd_producto = "'.$id.'",
        pd_cantidad = "'.$cantidad.'",
        pd_talla = "'.$talla.'",
        pd_color = "'.$color.'",
        pd_precio = "'.$precio.'",
        pd_descuento = "'.$descuento.'"';
        setq($sql);
}


if ($result->num_rows > 0) {
   $row = $result->fetch_array();
   $nueva_cantidad = $cantidad+$row['pd_cantidad'];
   $sql1 = 'UPDATE pedidoscld SET 
           pd_cantidad = "'.$nueva_cantidad.'" 
           WHERE pd_producto = "'.$id.'" AND pd_conf = 0';
   setq($sql1);

}else{
  $sesion = $_SESSION['username'];
   $sql = 'INSERT INTO pedidoscld SET
       pd_pedido = "'.$existepedido.'",
       pd_producto = "'.$id.'",
       pd_cantidad = "'.$cantidad.'",
       pd_talla = "'.$talla.'",
       pd_color = "'.$color.'",
       pd_precio = "'.$precio.'",
       pd_descuento = "'.$descuento.'"';
       setq($sql);  
 } 
}
else{
  if(!isset($_COOKIE["cart"])){
    setcookie('cart[0][0]',$id,time()+24*60*60,"/");
    setcookie('cart[0][1]',$cantidad,time()+24*60*60,"/");
    setcookie('cart[0][2]',$talla,time()+24*60*60,"/");
    setcookie('cart[0][3]',$color,time()+24*60*60,"/");
    setcookie('cart[0][4]',$precio,time()+24*60*60,"/");
    setcookie('cart[0][5]',$descuento,time()+24*60*60,"/");
}else {
    $newitem = 0;
    $existe = 0;
    if(isset($_COOKIE['cart'])){
        foreach($_COOKIE['cart'] as $clave=>$item){
          $newitem = $clave;
          if($item[0] == $id AND $item[2] == $talla AND $item[3] == $color){
            setcookie('cart['.$clave.'][1]',($_COOKIE['cart'][$clave][1]+$cantidad),time()+2*24*60*60,"/");
            setcookie('cart['.$clave.'][4]',$precio,time()+24*60*60,"/");
            setcookie('cart['.$clave.'][5]',$descuento,time()+24*60*60,"/");
            $existe = 1;
            $ce = $clave;
          }
        }
    }
    if($existe == 0){
        $newitem++;
        setcookie('cart['.$newitem.'][0]',$id,time()+24*60*60,"/");
        setcookie('cart['.$newitem.'][1]',$cantidad,time()+24*60*60,"/");
        setcookie('cart['.$newitem.'][2]',$talla,time()+24*60*60,"/");
        setcookie('cart['.$newitem.'][3]',$color,time()+24*60*60,"/");
        setcookie('cart['.$newitem.'][4]',$precio,time()+24*60*60,"/");
        setcookie('cart['.$newitem.'][5]',$descuento,time()+24*60*60,"/");
        $ce = $newitem;
      }
}
}

echo "PRODUCTO AGREGADO";
?>
