<?php
require_once '../Conexion/funciones.php';
session_start();
$precio = $_POST["precio"];
$descuento = $_POST["descuento"];
$talla = $_POST["talla"];
$color = $_POST["colorsel"];
$cantidad = $_POST["cantidad"];
$id = $_POST["p"];

$cart = array();

if(isset($_SESSION['username'])){
$sesion = $_SESSION['username'];
  $sql = 'SELECT * FROM pedidoscld WHERE pd_pedido="'.$sesion.'" AND pd_producto="'.$id.'"';
  $result = setq($sql);

if ($result->num_rows > 0) {
   $row = $result->fetch_array();
   $nueva_cantidad = $cantidad+$row['pd_cantidad'];
   $sql1 = 'UPDATE pedidoscld SET 
           pd_cantidad = "'.$nueva_cantidad.'" 
           WHERE pd_producto = "'.$producto.'"';
   setq($sql1);

}else{
  $sesion = $_SESSION['username'];
   $sql = 'INSERT INTO pedidoscld SET
       pd_pedido = "'.$sesion.'",
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
