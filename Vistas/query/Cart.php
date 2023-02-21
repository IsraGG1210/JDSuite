<?php
require_once '../Conexion/funciones.php';
session_start();
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = uniqid();
}
$sesion = $_SESSION['id'];
//echo $sesion;
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];
$talla = $_POST['talla'];
$color = $_POST['colorsel'];
$cantidad = $_POST['cantidad'];
$producto = $_POST['p'];


               $sql = 'SELECT * FROM pedidoscld WHERE pd_pedido="63f4e63b33e" AND pd_producto="'.$producto.'"';
               $result = setq($sql);
            
            if ($result->num_rows > 0) {
                //$row = mysqli_fetch_assoc($result);
                $row = $result->fetch_array();
                $nueva_cantidad = $cantidad+$row['pd_cantidad'];
                //$nueva_cantidad = $cantidad_actual + $cantidad;
                /* $sql1 = "UPDATE pedidoscld SET pd_cantidad = $nueva_cantidad 
                    WHERE pd_producto = $producto";
                mysqli_query($conn, $sql1); */
                $sql1 = 'UPDATE pedidoscld SET 
                        pd_cantidad = "'.$nueva_cantidad.'" 
                        WHERE pd_producto = "'.$producto.'"';
                setq($sql1);

            }else{
                $sql = 'INSERT INTO pedidoscld SET
                    pd_pedido = "'.$sesion.'",
                    pd_producto = "'.$producto.'",
                    pd_cantidad = "'.$cantidad.'",
                    pd_talla = "'.$talla.'",
                    pd_color = "'.$color.'",
                    pd_precio = "'.$precio.'",
                    pd_descuento = "'.$descuento.'"';
                    //mysqli_query($conn, $sql);
                    setq($sql);  
              }   

              //mysqli_close($conn);
?>