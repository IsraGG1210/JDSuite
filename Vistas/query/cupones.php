<?php
require ('../Conexion/funciones.php');

session_start();



if(isset($_SESSION['username'])){
   $sesion = $_SESSION['username'];
   $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$sesion'";
   $resultado = setq($sql1);
   $idusuario = mysqli_fetch_array($resultado);
   $idusu = $idusuario['c_id'];

   $existepedido = busca($idusu,'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
   $sql = "SELECT*FROM pedidoscld WHERE pd_pedido = '$existepedido'";
   $result = setq($sql);

if($result->num_rows > 0){
   if(isset($_POST['codigo'])){
      $codigo = $_POST['codigo']; 
      $fechaActual = date('Y-m-d');
   //echo $fechaActual;
   //$codigo = 'promostore50';
   $sesion = $_SESSION['username'];
    $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$sesion'";
      $resultado = setq($sql1);
      $idusuario = mysqli_fetch_array($resultado);
      $idusu = $idusuario['c_id'];
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
         $monto = $arreglo['monto'];
         $existepedido = busca($idusu,'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
            $sqlu = 'UPDATE pedidoscld SET
             pd_descuento="'.$monto.'"
             WHERE pd_pedido = "'.$existepedido.'"';
             $result = setq($sqlu); 

         $query = 'UPDATE cupones SET c_usados = c_usados + 1 WHERE c_codigo = "'.$codigo.'"';
         $result = setq($query); 


         /* $sqlup= 'UPDATE cupones SET c_usados=+c_usados+1 WHERE c_codigo="'.$codigo.'"';
         $resultup = setq($sqlup); */
         echo json_encode($arreglo);
         
      }
   }else{
      echo "Error";
   }
   
}}


?>

