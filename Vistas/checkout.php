<?php
include 'header.php';
require './Conexion/config.php';

require_once './Conexion/funciones.php';

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
                        <h2 class="accordion-header" id="headingTwoY" >
                            <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" style="color:black"
                                data-mdb-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                <i class="fa-brands fa-stripe-s fa-lg me-2 opacity-70"></i>
                                <h3 >Stripe</h3>
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
                            <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" style="color:black"
                                data-mdb-target="#collapseTwoY" aria-expanded="false" aria-controls="collapseTwoY">
                                <i class="fa-brands fa-paypal fa-lg me-2 opacity-70"></i>
                                <h3>Paypal</h3>
                            </button>
                        </h2>
                        <div id="collapseTwoY" class="accordion-collapse collapse" aria-labelledby="headingTwoY"
                            data-mdb-parent="#accordionExampleY">
                            <br>
                           
                           <center>
                           <a href="checkoutpaypal.php"><button class="btn btn-primary rounded-pill">
                           <i class="fa-brands fa-paypal fa-lg me-2 opacity-70"></i>Pagar Con PayPal
                            </button>
                            </a>
                            </center>
                            <br>
                        </div>
                    </div>
                <div class="accordion-item">
                <h2 class="accordion-header" id="headingThreeY">
                    <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" style="color:black"
                    data-mdb-target="#collapseThreep" aria-expanded="false" aria-controls="collapseThreep">
                    <i class="fa-sharp fa-solid fa-list fa-lg me-2 opacity-70"></i>
                    <h3>Transferencias</h3>
                    </button>
                </h2>
                <div id="collapseThreep" class="accordion-collapse collapse" aria-labelledby="headingThreeY"
                    data-mdb-parent="#accordionExampleY">
                    <div class="accordion-body text-justify">
                    <br>
                           
                           <center>
                           <a href="checkoutstripe.php"><button class="btn btn-primary rounded-pill">
                           <i class="fa-solid fa-money-bill-transfer fa-lg me-2 opacity-70"></i>Pagar Con Transferencia
                            </button>
                            </a>
                            </center>
                            <br>
                    </div>
                </div>
                </div>
                <div class="accordion-item">
                <h2 class="accordion-header" id="headingThreeY">
                    <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" style="color:black"
                    data-mdb-target="#collapseThreeY" aria-expanded="false" aria-controls="collapseThreeY">
                    <i class="fa-sharp fa-solid fa-list fa-lg me-2 opacity-70"></i>
                    <h3>Efectivo</h3>
                    </button>
                </h2>
                <div id="collapseThreeY" class="accordion-collapse collapse" aria-labelledby="headingThreeY"
                    data-mdb-parent="#accordionExampleY">
                    <div class="accordion-body text-justify">
                    <br>
                           
                           <center>
                           <a href="checkoutstripe.php"><button class="btn btn-primary rounded-pill">
                           <i class="fa-solid fa-money-bill-transfer fa-lg me-2 opacity-70"></i>Pagar Con Transferencia
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
            <div class=" lip row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <h1>RESUMEN</h1>
            <?php 
                    $total=0;
                  if(isset($_COOKIE['cart'])){
                  
                      foreach($_COOKIE['cart'] as $clave=>$item) {
                          $id = $item[0];
                          $cantidad = $item[1];
                          $talla = $item[2];
                          $color = $item[3];
                          $precio = $item[4];
                          $descuento = $item[5];
                          
                          //imagen
                          $sql ="SELECT CONCAT(i_nmb,'.',i_ext) AS rutaimagen, a_nmb
                                  from articulos
                                  INNER JOIN imagenes ON i_idproducto = '$id'
                                  WHERE a_cb = '$id'";
                                 
                      $result = setq($sql);
                          if ($result) {
                            $producto = mysqli_fetch_assoc($result);
                            $ruta = $producto['rutaimagen'];
                            $nombre = $producto['a_nmb'];
                          } else {
                              echo "Error al hacer la consulta a MySQL";
                          }
                          
                          $subtotal = $cantidad * $precio;
                          $total += $subtotal;
            ?> 
              <div class="sep">
              </div>
              <div class="flex justify-between mb-3 text-sm">
                <div class="row">
                  <div class="col-9">
                    <span >Subtotal</span>
                    <span id="cantcart">(
                      <?php
                          
                          $newitem = 0;
                          $cantidad_total = 0;

                          if(isset($_SESSION['username'])){ 
                              $sesion = $_SESSION['username'];
                              //echo $sesion;
                              $sql = 'SELECT COUNT(pd_cantidad) AS cantidad FROM pedidoscld WHERE pd_pedido="'.$sesion.'"AND pd_conf = 0';
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
                    <span >productos</span>
                  </div>
                  <div class="col-3">
                    <h5><?php  echo MONEDA. number_format($total,2,'.',',');?></h5>
                  </div>
                </div>
                <div class="flex justify-between mb-3 text-sm">
                <div class="row">
                  <div class="col-9">
                    <span >Envio</span>
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
                <div class="flex justify-between font-bold pt-4  border-t border-gray-500"id="totaldespues">
                <div class="row">
                  <div class="col-9">
                    <span ><h4 id="totalf"><b>Total a pagar por el momento</b></h4></span>
                  </div>
                  <div class="col-3">
                  <?php $totalen = $total+$envio;?>
                    <span>
                      <h5 id="idtotalFinal" data-total=""><b>
                      <?php 
                      echo MONEDA. number_format($totalen,2,'.',',');?>
                    </b></h5></span>
                  </div>
                  <?php }}?>
                </div>
          </div>
        </div>
            </div>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary me-md-2" type="button" href="datosenvio.php"
            style="background-color:#29A8B0;" id="siguiente" data-user="<?php echo $sesion;?>" 
            data-subtotal="<?php echo $total;?>" data-envio="<?php echo $envio;?>" data-total="<?php echo $totalen?>">
            Atrás   
            </a>
            <a class="btn btn-primary me-md-2" type="button"
            style="background-color:#29A8B0;" id="siguiente" data-user="<?php echo $sesion;?>" 
            data-subtotal="<?php echo $total;?>" data-envio="<?php echo $envio;?>" data-total="<?php echo $totalen?>">
            Siguiente   
            </a>
            </div>
</div>

<?php
include 'footer.php'
?>