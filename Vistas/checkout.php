<?php
include 'header.php';
require './Conexion/config.php';

require_once './Conexion/funciones.php';

$sesion = $_SESSION['username'];

$sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$sesion'";
$resultado = setq($sql1);
$idusuario = mysqli_fetch_array($resultado);

/* $sql = 'SELECT concat(i_nmb,".",i_ext)as rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
    FROM pedidoscld
    INNER JOIN articulos ON a_cb = pd_producto
    INNER JOIN imagenes ON a_cb = i_idproducto
    WHERE pd_pedido="'.$sesion.'" AND pd_conf = 0';
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
      
    } */
?>
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="lip row g-0 border rounded overflow- flex-md-row mb-4 shadow-sm h-md-250 position-relative">
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
                                    <a href="checkoutstripe.php">
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
                                    // Consulta para obtener los datos del pedido del usuario logueado
                                    $sesion = $_SESSION['username'];
                                    $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$sesion'";
                                    $resultado = setq($sql1);
                                    $idusuario = mysqli_fetch_array($resultado);
                                    $idusu = $idusuario['c_id'];
                                    /* $sql = 'SELECT concat(i_nmb,".",i_ext)as rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
                                        FROM pedidoscld
                                        INNER JOIN articulos ON a_cb = pd_producto
                                        INNER JOIN imagenes ON a_cb = i_idproducto
                                        WHERE pd_pedido="'.$idusuario['c_id'].'" AND pd_conf = 0'; */
                                        $sql ="SELECT concat(i_nmb,'.',i_ext) AS rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
                                        FROM pedidoscld
                                        INNER JOIN articulos ON a_cb = pd_producto
                                        INNER JOIN imagenes ON a_cb = i_idproducto
                                        WHERE pd_pedido='$idusu' AND pd_conf = '0' GROUP BY a_cb ";
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
                                    <input type="text" value="<?php echo $totale= $envio+$total;?>" name="total" hidden>
                                    <input type="text" value="<?php echo $idusuario['c_id']?>" name="user" hidden>
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
                                    <i class="fa-sharp fa-solid fa-building-columns fa-lg me-2 opacity-70"></i>
                                    <h3>Transferencias</h3>
                                </button>
                            </h2>
                            <div id="collapseThreep" class="accordion-collapse collapse" aria-labelledby="headingThreeY"
                                data-mdb-parent="#accordionExampleY">
                                <div class="accordion-body text-justify">
                                    <br>
                                    <form action="query/compratranfer.php" name="paypal" id="paypal" method="post">
                                        <?php
                                 if(isset($_SESSION['username'])){
                                    // Consulta para obtener los datos del pedido del usuario logueado
                                    $sesion = $_SESSION['username'];
                                    $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$sesion'";
                                    $resultado = setq($sql1);
                                    $idusuario = mysqli_fetch_array($resultado);
                                    $idusu = $idusuario['c_id'];
                                    /* $sql = 'SELECT concat(i_nmb,".",i_ext)as rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
                                        FROM pedidoscld
                                        INNER JOIN articulos ON a_cb = pd_producto
                                        INNER JOIN imagenes ON a_cb = i_idproducto
                                        WHERE pd_pedido="'.$idusuario['c_id'].'" AND pd_conf = 0'; */
                                        $sql ="SELECT concat(i_nmb,'.',i_ext) AS rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
                                        FROM pedidoscld
                                        INNER JOIN articulos ON a_cb = pd_producto
                                        INNER JOIN imagenes ON a_cb = i_idproducto
                                        WHERE pd_pedido='$idusu' AND pd_conf = '0' GROUP BY a_cb ";
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
                                            <input type="text" value="<?php echo $totale= $envio+$total;?>" name="total"
                                                hidden>
                                            <input type="text" value="<?php echo $idusuario['c_id']?>" name="user"
                                                hidden>
                                            <center>
                                                <button class="btn btn-primary rounded-pill" type="submit">
                                                    <i
                                                        class="fa-sharp fa-solid fa-building-columns fa-lg me-2 opacity-70"></i>Pagar
                                                    Con Transferencia
                                                </button>

                                            </center>
                                        </form>
                                        <!-- 
                                    <center>
                                        <a href="transferencia.php"><button class="btn btn-primary rounded-pill">
                                            <i class="fa-sharp fa-solid fa-building-columns fa-lg me-2 opacity-70"></i>Pagar
                                                Con Transferencia
                                            </button>
                                        </a>
                                    </center> -->
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
                    class=" lip row g-0 border rounded overflow- flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <h1>RESUMEN</h1>
                    <?php 

                    if(isset($_SESSION['username'])){
                        // Consulta para obtener los datos del pedido del usuario logueado
                        $sesion = $_SESSION['username'];
                        $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$sesion'";
                        $resultado = setq($sql1);
                        $idusuario = mysqli_fetch_array($resultado);
                        $idusu = $idusuario['c_id'];
                        /* $sql = 'SELECT concat(i_nmb,".",i_ext)as rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
                            FROM pedidoscld
                            INNER JOIN articulos ON a_cb = pd_producto
                            INNER JOIN imagenes ON a_cb = i_idproducto
                            WHERE pd_pedido="'.$idusuario['c_id'].'" AND pd_conf = 0'; */
                            $sql ="SELECT concat(i_nmb,'.',i_ext) AS rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
                            FROM pedidoscld
                            INNER JOIN articulos ON a_cb = pd_producto
                            INNER JOIN imagenes ON a_cb = i_idproducto
                            WHERE pd_pedido='$idusu' AND pd_conf = '0' GROUP BY a_cb ";
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
                              $sesion = $_SESSION['username'];
                              //echo $sesion;
                              $sql = 'SELECT COUNT(pd_cantidad) AS cantidad FROM pedidoscld WHERE pd_pedido="'.$idusuario['c_id'].'"AND pd_conf = 0';
                              $result = setq($sql);
                              $cantidad_tota = mysqli_fetch_assoc($result);
                              $cantidad_total = $cantidad_tota['cantidad'];
                          //echo $cantidad_total;
                          

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
                        echo MONEDA. number_format($envio,2,'.',',');
                      }
                      ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="flex justify-between font-bold pt-4  border-t border-gray-500"
                                id="totaldespues">
                                <div class="row">
                                    <div class="col-9">
                                        <span>
                                            <h4 id="totalf"><b>Total a pagar por el momento</b></h4>
                                        </span>
                                    </div>
                                    <div class="col-3">
                                        <?php $totalen = $total+$envio;?>
                                        <span>
                                            <h5 id="idtotalFinal" data-total=""><b>
                                                    <?php 
                                                echo MONEDA. number_format($totalen,2,'.',',');?>
                                                </b></h5>
                                        </span>
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
        <a class="btn btn-primary me-md-2" type="button" href="datosenvio.php" style="background-color:#29A8B0;"
            id="siguiente" data-user="<?php echo $sesion;?>" data-subtotal="<?php echo $total;?>"
            data-envio="<?php echo $envio;?>" data-total="<?php echo $totalen?>">
            Atrás
        </a>

    </div>
</div>
<br>
<?php
include 'footer.php'
?>