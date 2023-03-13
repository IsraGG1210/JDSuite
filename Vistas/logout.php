<?php

session_start();
foreach($_COOKIE['cart'] as $clave=>$item){
    setcookie('cart['.$clave.'][0]', '', time()-24*60*60, '/');
    setcookie('cart['.$clave.'][1]', '', time()-24*60*60, '/');
    setcookie('cart['.$clave.'][2]', '', time()-24*60*60, '/');
    setcookie('cart['.$clave.'][3]', '', time()-24*60*60, '/');
    setcookie('cart['.$clave.'][4]', '', time()-24*60*60, '/');
    setcookie('cart['.$clave.'][5]', '', time()-24*60*60, '/');
  }
session_destroy();
header ("location: index.php");
exit();



?>