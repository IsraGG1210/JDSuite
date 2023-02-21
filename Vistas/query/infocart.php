<?php 
require_once '../Conexion/funciones.php';
session_start();
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = uniqid();
}
//$sesion = $_SESSION['id'];
$sesion = '63f4e63b33e';
//echo $sesion;

    $sql = 'SELECT SUM(pd_cantidad) FROM pedidoscld WHERE pd_pedido = "63f4e63b33e"';
                        $result = setq($sql);
    list($total) = $result->fetch_array();
    //$resultado_array = $resultado->fetch_assoc();
    //echo $resultado_array['pd_cantidad'];
    //echo $resultado;
if ($result->num_rows > 0) {
   echo number_format($total);
} else {
    echo "No se encontraron resultados";
}
//$mysqli->close();

?>