<?php
include 'Conexion/funciones.php';
$id_dir = $_POST['option'];


$sql ="SELECT * FROM direnvio WHERE d_id = $id_dir";
$direcciones = setq($sql);
$result2 = mysqli_fetch_array($direcciones);

header('Content-Type: application/json');
echo json_encode($result2);

?>
