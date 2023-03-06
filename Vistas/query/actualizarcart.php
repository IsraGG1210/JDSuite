<?php
$id = $_POST['id'];
echo "si".$id;
if(isset($_COOKIE['cart'])){
    foreach($_COOKIE['cart'] as $clave=>$item){
        if($item[0] == $id){
            setcookie('cart['.$clave.'][0]', '', time()-3600, '/');
            setcookie('cart['.$clave.'][1]', '', time()-3600, '/');
            setcookie('cart['.$clave.'][2]', '', time()-3600, '/');
            setcookie('cart['.$clave.'][3]', '', time()-3600, '/');
            setcookie('cart['.$clave.'][4]', '', time()-3600, '/');
            setcookie('cart['.$clave.'][5]', '', time()-3600, '/');
        }
    }
}
?>
