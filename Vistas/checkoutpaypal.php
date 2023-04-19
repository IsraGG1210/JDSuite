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
                        
                           /*  $sql ="SELECT concat(i_nmb,'.',i_ext) AS rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
                            FROM pedidoscld
                            INNER JOIN articulos ON a_cb = pd_producto
                            INNER JOIN imagenes ON a_cb = i_idproducto
                            WHERE pd_pedido='$pedi' AND pd_conf = '0' GROUP BY a_cb "; */
                            $pedido = busca($idusuario['c_id'],'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
                            $sql ="SELECT concat(i_nmb,'.',i_ext) AS rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
                            FROM pedidoscld
                            INNER JOIN articulos ON a_cb = pd_producto
                            INNER JOIN imagenes ON a_cb = i_idproducto
                            WHERE pd_pedido='$pedido' AND pd_conf = '0' GROUP BY a_cb ";
                        $result = setq($sql);
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
                                    echo MONEDA. number_format($envio,2,'.',',');
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
                                            $totalen = $totalen + $envio + $comision;
                                            } else {
                                            // No discount, use full price
                                            $totalen = $total+$envio+$comision;
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


<br>

<?php
include 'footer.php';
?>
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
                        value: <?php echo  bcdiv($totalen, '1', 2); ?>
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
            window.location.href ="query/verificapagopp";
        },
        onCancel: function (data) {
            alert("Pago Cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');
</script>