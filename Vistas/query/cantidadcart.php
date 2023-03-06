<?php
$newitem = 0;
$cantidad_total = 0;

if(isset($_COOKIE['cart'])) {
    
    foreach($_COOKIE['cart'] as $clave=>$item) {
        $cantidad_total += $item[1];
    }
    echo $cantidad_total;
}
?>