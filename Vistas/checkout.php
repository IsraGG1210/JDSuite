<?php
include 'header.php';
require './Conexion/config.php';
require_once './Conexion/funciones.php';

$usuario = $_SESSION['username'];
$sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$usuario'";
$resultado = setq($sql1);
$idusuario = mysqli_fetch_array($resultado);
$idusu = $idusuario['c_id'];

$sql = 'SELECT concat(i_nmb,".",i_ext)as rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
    FROM pedidoscld
    INNER JOIN articulos ON a_cb = pd_producto
    INNER JOIN imagenes ON a_cb = i_idproducto
    WHERE pd_pedido="'.$idusu.'" AND pd_conf = 0';
$result = setq($sql);
$datos = Array();
    while($row = mysqli_fetch_array($result)){
        $datos[]=$row;
    }
    $total=0;
    foreach($datos as $producto){
        $ruta = $producto['rutaimagen'];
        $id = $producto['a_cb'];
        $nombre = $producto['a_nmb'];
        $cantidad = $producto['pd_cantidad'];
        $precio = $producto['pd_precio'];
        $descuento = $producto['pd_descuento'];
        $subtotal = $cantidad * $precio;
        $total += $subtotal;
    }
    $envio = 0;
    if($total>5000){
      $envio;
    } elseif($total==0){
      $envio;
    }else{
      $envio = 150;
      
    }
?>
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="lip row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <h2>Verifica tu pago</h2>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-12">
        <div class="row mb-2">
            <div class="col-md-8">

                <div class="d-flex justify-content-center">
                    <div class="accordion col-md-8 col-sm-12" id="accordionExampleY">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwoY">
                                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                    style="color:black" data-mdb-target="#collapseTwo1" aria-expanded="false"
                                    aria-controls="collapseTwo1">
                                    <i class="fa-brands fa-stripe-s fa-lg me-2 opacity-70"></i>
                                    <h3>Stripe</h3>
                                </button>
                            </h2>
                            <div id="collapseTwo1" class="accordion-collapse collapse" aria-labelledby="headingTwoY"
                                data-mdb-parent="#accordionExampleY">
                                <br>

                                <center>
                                    <a href="<?php echo SERVERURL;?>checkoutstripe">
                                        <button class="btn btn-primary rounded-pill" style="background-color:#29A8B0;">
                                            <i class="fa-brands fa-stripe-s fa-lg me-2 opacity-70"></i>Pagar Con Stripe
                                        </button>
                                    </a>
                                </center>
                                <br>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwoY">
                                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                    style="color:black" data-mdb-target="#collapseTwoY" aria-expanded="false"
                                    aria-controls="collapseTwoY">
                                    <i class="fa-brands fa-paypal fa-lg me-2 opacity-70"></i>
                                    <h3>Paypal</h3>
                                </button>
                            </h2>
                            <div id="collapseTwoY" class="accordion-collapse collapse" aria-labelledby="headingTwoY"
                                data-mdb-parent="#accordionExampleY">
                                <br>
                                <?php 
                                if(isset($_SESSION['username'])){
                                    $usuario = $_SESSION['username'];
                                    $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$usuario'";
                                    $resultado = setq($sql1);
                                    $idusuario = mysqli_fetch_array($resultado);
                                    $idusu = $idusuario['c_id'];
                                    // Consulta para obtener los datos del pedido del usuario logueado
                                    $sesion = $_SESSION['username'];
                                    
                                        $pedido = busca($idusuario['c_id'],'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
                                       
                                       $sql="SELECT pd_cantidad, pd_precio, pd_descuento FROM pedidoscld WHERE pd_pedido='".$pedido."' AND pd_conf = 0";
                                        /* die($sql); */
                                    $result = setq($sql);
                                
                                    $datos = Array();
                                    while($row = mysqli_fetch_array($result)){
                                        $datos[]=$row;
                                    }
                                      $total=0;
                                      foreach($datos as $producto){
                        
                                        $cantidad = $producto['pd_cantidad'];
                                        $precio = $producto['pd_precio'];
                                        $descuento = $producto['pd_descuento'];
                                        $subtotal = $cantidad * $precio;
                                        $total += $subtotal;
                                      }}?>

                                
                                    <form action="query/comprapaypal.php" name="paypal" id="paypal" method="post">
                                    <input type="text" value="<?php echo $total?>" name="subtotal" hidden>
                                    <input type="text" value=" <?php 
                                                                $envio = 0;
                                                                if($total>5000){
                                                                    echo $envio;
                                                                } elseif($total==0){
                                                                    echo $envio;
                                                                }else{
                                                                    $envio = 150;
                                                                    echo $envio;
                                                                }
                                                                ?>" name="envio" hidden>
                                    <input type="text" value="<?php echo $totale= $envio+$total;?>" name="total" hidden >
                                    <input type="text" value="<?php echo $pedido; ?>" name="user" hidden>
                                    <center>
                                        <button class="btn btn-primary rounded-pill" type="submit">
                                            <i class="fa-brands fa-paypal fa-lg me-2 opacity-70"></i>Pagar Con PayPal
                                            (mas comisiones)
                                        </button>

                                    </center>
                                </form>
                                <br>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThreeY">
                                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                    style="color:black" data-mdb-target="#collapseThreep" aria-expanded="false"
                                    aria-controls="collapseThreep">
                                    <i class="fa-sharp fa-solid fa-list fa-lg me-2 opacity-70"></i>
                                    <h3>Transferencias</h3>
                                </button>
                            </h2>
                            <div id="collapseThreep" class="accordion-collapse collapse" aria-labelledby="headingThreeY"
                                data-mdb-parent="#accordionExampleY">
                                <div class="accordion-body text-justify">
                                    <br>

                                    <center>
                                        <a href="<?php echo SERVERURL;?>transferencia"><button class="btn btn-primary rounded-pill">
                                                <i
                                                    class="fa-solid fa-money-bill-transfer fa-lg me-2 opacity-70"></i>Pagar
                                                Con Transferencia
                                            </button>
                                        </a>
                                    </center>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThreeY">
                                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                    style="color:black" data-mdb-target="#collapseThreeY" aria-expanded="false"
                                    aria-controls="collapseThreeY">
                                    <i class="fa-sharp fa-solid fa-list fa-lg me-2 opacity-70"></i>
                                    <h3>Efectivo</h3>
                                </button>
                            </h2>
                            <div id="collapseThreeY" class="accordion-collapse collapse" aria-labelledby="headingThreeY"
                                data-mdb-parent="#accordionExampleY">
                                <div class="accordion-body text-justify">
                                    <br>

                                    <center>
                                        <a href="<?php echo SERVERURL;?>checkoutstripe"><button class="btn btn-primary rounded-pill">
                                                <i
                                                    class="fa-solid fa-money-bill-transfer fa-lg me-2 opacity-70"></i>Pagar
                                                Con Transferencia
                                            </button>
                                        </a>
                                    </center>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Carrusel de imagenes de caracteristicas-->

                </div>
            </div>
            <div class="col-md-4">
                <div
                    class=" lip row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <h1>RESUMEN</h1>
                    <?php 

                    if(isset($_SESSION['username'])){
                        $usuario = $_SESSION['username'];
                        $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$usuario'";
                        $resultado = setq($sql1);
                        $idusuario = mysqli_fetch_array($resultado);
                        $idusu = $idusuario['c_id'];
                        // Consulta para obtener los datos del pedido del usuario logueado
                        $sesion = $_SESSION['username'];
                        
                            $pedido = busca($idusuario['c_id'],'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
                           
                           $sql="SELECT pd_cantidad, pd_precio, pd_descuento FROM pedidoscld WHERE pd_pedido='".$pedido."' AND pd_conf = 0";
                            /* die($sql); */
                        $result = setq($sql);
                    
                        $datos = Array();
                        while($row = mysqli_fetch_array($result)){
                            $datos[]=$row;
                        }
                          $total=0;
                          foreach($datos as $producto){
            
                            $cantidad = $producto['pd_cantidad'];
                            $precio = $producto['pd_precio'];
                            $descuento = $producto['pd_descuento'];
                            $subtotal = $cantidad * $precio;
                            $total += $subtotal;
                          }}
                      ?>
                    <div class="sep">
                    </div>
                    <div class="flex justify-between mb-3 text-sm">
                        <div class="row">
                            <div class="col-9">
                                <span>Subtotal</span>
                                <span id="cantcart">(
                                    <?php
                                        
                                        $newitem = 0;
                                        $cantidad_total = 0;

                                        if(isset($_SESSION['username'])){ 
                                            
                                            $usuario = $_SESSION['username'];
                                        $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$usuario'";
                                        $resultado = setq($sql1);
                                        $idusuario = mysqli_fetch_array($resultado);
                                        $idusu = $idusuario['c_id'];
                                            
                                            
                                        $pedido = busca($idusuario['c_id'],'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
                                        $sql = 'SELECT COUNT(pd_cantidad) AS cantidad FROM pedidoscld WHERE pd_pedido="'.$pedido.'" AND pd_conf = 0';
                                        $result = setq($sql);
                                        $cantidad_tota = mysqli_fetch_assoc($result);
                                        $cantidad_total = $cantidad_tota['cantidad'];
                                        

                                        }else{
                                            if(isset($_COOKIE['cart'])) {
                                            
                                                foreach($_COOKIE['cart'] as $clave=>$item) {
                                                    $cantidad_total += $item[1];
                                                }
                                                //echo $cantidad_total;
                                            }
                                        } 
                                        echo $cantidad_total;
                                        ?>)
                                </span>
                                <span>productos</span>
                            </div>
                            <div class="col-3">
                                <h5><?php  echo MONEDA. number_format($total,2,'.',',');?></h5>
                            </div>
                        </div>
                        <div class="flex justify-between mb-3 text-sm">
                            <div class="row">
                                <div class="col-9">
                                    <span>Envio</span>
                                </div>
                                <div class="col-3">
                                    <h5>
                                        <?php 
                                        $envio = 0;
                                        if($total>5000){
                                            echo MONEDA.$envio;
                                        } elseif($total==0){
                                            echo MONEDA.$envio;
                                        }else{
                                            $envio = 150;
                                            echo MONEDA.$envio;
                                        }
                                        ?>
                                    </h5>
                                </div>
                            </div>

                            <?php
                                $pedido = busca($idusuario['c_id'],'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
                                $sql = 'SELECT pd_descuento FROM pedidoscld WHERE pd_pedido="'.$pedido.'" AND pd_conf = 0';
                                $result = setq($sql);
                                if (mysqli_num_rows($result) > 0) {

                                        $pedido = busca($idusuario['c_id'],'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
                                        $sql = 'SELECT pd_descuento FROM pedidoscld WHERE pd_pedido="'.$pedido.'" AND pd_conf = 0';
                                        $result = setq($sql);
                                        $idusuario = mysqli_fetch_array($result);
                                        $descuento = $idusuario['pd_descuento'];
                                        if ($descuento != '0.00') {
                                        
                                        ?>
                                        <div class="sep"> </div>
                                <div class="row" id="descuentoP">
                                    <div class="col-9 text-success">
                                        Monto a descontar por cupon
                                    </div>
                                    <div class="col-3">
                                        
                                        <h5><?php echo MONEDA. $descuento ?></h5>
                                    </div>
                                    </div>
                                    <div class="sep"></div>
                                <?php
                                    }}   
                                    ?>
                            <div class="flex justify-between font-bold pt-4  border-t border-gray-500"
                                id="totaldespues">
                                <div class="row">
                                    <div class="col-9">
                                        <span>
                                            <h4 id="totalf"><b>Total a pagar</b></h4>
                                        </span>
                                    </div>
                                    <div class="col-3">
                                        <?php
                                            if (isset($descuento) && $descuento != '') {
                                            $totalen = $total-$descuento;
                                            $totalen = $totalen + $envio;
                                            } else {
                                            // No discount, use full price
                                            $totalen = $total+$envio;
                                            }
                                        ?>
                                            <span>
                                            <h5 id="idtotalFinal" data-total="<?php echo $totalen;?>"><b>
                                            <?php 
                                            echo MONEDA. number_format($totalen,2,'.',',');?>
                                            </b></h5></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
        </div>
    </div>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary me-md-2" type="button" href="<?php echo SERVERURL;?>datosenvio" style="background-color:#29A8B0;"
                id="atras" data-user="<?php echo $sesion;?>" data-subtotal="<?php echo $total;?>"
                data-envio="<?php echo $envio;?>" data-total="<?php echo $totalen?>">
                Atrás
            </a>

        </div>
        <br>    
<?php
$pdf_file = $sesion.'pago.pdf';
 if (file_exists($pdf_file)) {
     // Si el archivo existe, ejecuta este código
     ?>
     <div class="container-fluid p-4">
         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
             <a class="btn btn-primary me-md-2" type="button" href="http://localhost/jdsuite-master/Vistas/<?php echo $sesion;?>pago.pdf"
             style="background-color:#29A8B0;" id="siguiente" data-user="<?php echo $sesion;?>" 
             data-subtotal="<?php echo $total;?>" data-envio="<?php echo $envio;?>" data-total="<?php echo $totalen?>">
             Ver tu forma de pago   
             </a>
         </div>
     </div>
   <?php
   } 
include 'footer.php'
?>