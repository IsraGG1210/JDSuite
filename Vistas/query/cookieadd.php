<?php
$precio = $_POST["precio"];
$descuento = $_POST["descuento"];
$talla = $_POST["talla"];
$color = $_POST["colorsel"];
$cantidad = $_POST["cantidad"];
$id = $_POST["p"];

$cart = array();

if(!isset($_COOKIE["cart"])){
    setcookie('cart[0][0]',$id,time()+2*24*60*60,"/");
    setcookie('cart[0][1]',$cantidad,time()+2*24*60*60,"/");
    setcookie('cart[0][2]',$talla,time()+2*24*60*60,"/");
    setcookie('cart[0][3]',$color,time()+2*24*60*60,"/");
    setcookie('cart[0][4]',$precio,time()+2*24*60*60,"/");
    setcookie('cart[0][5]',$descuento,time()+2*24*60*60,"/");
}else {
    $newitem = 0;
    $existe = 0;
    if(isset($_COOKIE['cart'])){
        foreach($_COOKIE['cart'] as $clave=>$item){
          $newitem = $clave;
          if($item[0] == $id AND $item[2] == $talla AND $item[3] == $color){
            setcookie('cart['.$clave.'][1]',($_COOKIE['cart'][$clave][1]+$cantidad),time()+2*24*60*60,"/");
            setcookie('cart['.$clave.'][4]',$precio,time()+2*24*60*60,"/");
            setcookie('cart['.$clave.'][5]',$descuento,time()+2*24*60*60,"/");
            $existe = 1;
            $ce = $clave;
          }
        }
    }
    if($existe == 0){
        $newitem++;
        setcookie('cart['.$newitem.'][0]',$id,time()+2*24*60*60,"/");
        setcookie('cart['.$newitem.'][1]',$cantidad,time()+2*24*60*60,"/");
        setcookie('cart['.$newitem.'][2]',$talla,time()+2*24*60*60,"/");
        setcookie('cart['.$newitem.'][3]',$color,time()+2*24*60*60,"/");
        setcookie('cart['.$newitem.'][4]',$precio,time()+2*24*60*60,"/");
        setcookie('cart['.$newitem.'][5]',$descuento,time()+2*24*60*60,"/");
        $ce = $newitem;
      }
}

echo "PRODUCTO AGREGADO";
?>
