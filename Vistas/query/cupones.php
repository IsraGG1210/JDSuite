<?php
require ('../Conexion/funciones.php');

if(isset($_POST['codigo'])){
   $codigo = $_POST['codigo'];
   $fechaActual = date('Y-m-d');
//echo $fechaActual;
   $sql = 'SELECT * FROM cupones WHERE c_codigo="'.$codigo.'" AND c_caducidad>="'.$fechaActual.'" 
         AND c_usados<c_limite';
   $result = setq($sql);
   if ($result->num_rows == 0) {
      echo "Codigo no valido";
   }else{
      
      $datos = $result->fetch_array();
      $arreglo = array(
         "id" => $datos['c_id'],
         "nombre" => $datos['c_nmb'],
         "codigo" => $datos['c_codigo'],
         "monto" => $datos['c_monto'],
         "porcentaje" => $datos['c_porcentaje'],
         "limite" => $datos['c_limite'],
         "usados" => $datos['c_usados'],
         "estatus" => $datos['c_estatus'],
         "caducidad" => $datos['c_caducidad']
      );
      $sqlup= 'UPDATE cupones SET c_usados=+c_usados+1 WHERE c_codigo="'.$codigo.'"';
      $resultup = setq($sqlup);
      echo json_encode($arreglo);
   }
}else{
   echo "Error";
}else{
   echo "No puedes aplicar aun el cupon";
}

?>

