<?php
include 'header.php';
require './Conexion/config.php';
require_once './Conexion/funciones.php';
?>
<br>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div id="paypal-button-container">

            </div>
        </div>
        <div class="col-md-4">
            <div class=" lip row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
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
                        <div class="row">
                            <div class="col-9">
                                <span>Comision PayPal</span>
                            </div>
                            <div class="col-3">
                                <h5>
                                   <?php
                                   echo MONEDA. number_format($comision = $total * .0366+3.65,2,'.',',');
                                   ?>
                                </h5>
                            </div>
                        </div>
                        <div class="flex justify-between font-bold pt-4  border-t border-gray-500" id="totaldespues">
                            <div class="row">
                                <div class="col-9">
                                    <span>
                                        <h4 id="totalf"><b>Total a pagar</b></h4>
                                    </span>
                                </div>
                                <div class="col-3">
                                    <?php $totalen = $total+$envio+ $comision;?>
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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary me-md-2" type="button" href="veriCompra.php"
            style="background-color:#29A8B0;" id="siguiente" data-user="<?php echo $sesion;?>" 
            data-subtotal="<?php echo $total;?>" data-envio="<?php echo $envio;?>" data-total="<?php echo $totalen?>">
            Atrás   
            </a>
            
        </div>
</div>


<br>
<script>
    paypal.Buttons({
        style: {
            color: 'blue',
            shape: 'pill',
            label: 'pay'
        },
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: <?php echo $totalen; ?>
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            /* let URL = 'config/captura.php'
            actions.order.capture().then(function (detalles) {
                console.log(detalles)
                return fetch(URL,{
                    method: 'post',
                    headers:{
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        detalles: detalles
                    })
                })
                Swal.fire({
                    title: 'Pago procesado, gracias por su compra',
                    timer: 1500,
                    timerProgressBar: true,
                    icon: 'success'
                });
                window.location.href= "index.php";
            }); */
            window.location.href ="query/verificapagopp.php";
        },
        onCancel: function (data) {
            alert("Pago Cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');
</script>
<?php
include 'footer.php';
?>