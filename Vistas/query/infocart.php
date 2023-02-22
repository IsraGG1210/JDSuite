<?php 
require_once '../Conexion/funciones.php';
session_start();
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = uniqid();
}
$sesion = $_SESSION['id'];

    $sql = 'SELECT SUM(pd_cantidad) FROM pedidoscld WHERE pd_pedido = "'.$sesion.'"';
    $result = setq($sql);
    list($total) = $result->fetch_array();
if ($result->num_rows > 0) {
    echo number_format($total);
} else {
    echo "No se encontraron resultados";
}
//$mysqli->close();

?>