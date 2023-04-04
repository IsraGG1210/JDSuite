<?php
include 'header.php';
require './Conexion/config.php';
?>
<div class="container-fluid p-2">
    <div class="container p-2">
        <div class="lip row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <h2>Verifica tu compra</h2>
        </div>
        <div class="lip row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="table-responsive p-0">
                <table class="table p-0" id="tblistado">
                    <thead>
                        <tr>
                        <th></th>
                        <th><h5>Producto</h5></th>
                        <th><h5>Cantidad</h5></th>
                        <th><h5>Precio</h5></th>
                        </tr>
                    </thead>
                    <tbody>
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
                        ?> 
                    <tr>
                    <td>
                        <img src="https://www.jdshop.mx/productos/<?php echo $ruta;?>" alt="" style="width:50px;"></img>
                    </td>
                    <td style="padding: 0rem">
                        <?php echo $nombre;?>
                        <input type="hidden" id="producto" value="<?php echo ($id); ?>"/>
                    </td>
                    <td nowrap>
                        <div nowrap class="input-group mb-5" >
                        <?php echo number_format($cantidad);?>
                        </div>
                    </td>
                    <td>
                        <?php 
                        echo MONEDA. number_format($precio,2,'.',',');?>
                        <input type="hidden" id="precio<?php echo $id;?>" value="<?php echo ($precio); ?>"/>
                    </td>
                    </tbody>
                    <?php 
                    }}
                    ?>
                </table>
                <div class="container">
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-3">
                        <table class="table table-borderless me-md-2" id="tblistado">
                    <thead>
                    <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>Subtotal</b></td>
                            <td>
                                <?php  echo MONEDA. number_format($total,2,'.',',');?>
                                <input type="hidden" id="subtotal<?php echo $id;?>" value="<?php echo ($total); ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>Envio</b></td>
                            <td>
                                <?php 
                                    $envio = 0;
                                    if($total>5000){
                                        $envio;
                                    }else{
                                        $envio = 150;
                                        $envio;
                                    }
                                ?>
                                <?php  echo MONEDA. number_format($envio,2,'.',',');?>
                                <input type="hidden" id="envio<?php echo $id;?>" value="<?php echo ($envio); ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>Total</b></td>
                            <td>
                                <?php $totalen = $total+$envio;?>
                                <?php  echo MONEDA. number_format($totalen,2,'.',',');?>
                                <input type="hidden" id="total<?php echo $id;?>" value="<?php echo ($totalen); ?>"/>
                            </td>
                        </tr>
                    </thead>
                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary me-md-2" type="button" href="verif_Tienda.php"
        style="background-color:#29A8B0;" id="siguiente" data-user="<?php echo $sesion;?>" 
        data-subtotal="<?php echo $total;?>" data-envio="<?php echo $envio;?>" data-total="<?php echo $totalen?>">
        Atrás   
        </a>
        <a class="btn btn-primary me-md-2" type="button" href="datosenvio.php"
        style="background-color:#29A8B0;" id="siguiente" data-user="<?php echo $sesion;?>" 
        data-subtotal="<?php echo $total;?>" data-envio="<?php echo $envio;?>" data-total="<?php echo $totalen?>">
        Siguiente   
        </a>
    </div>
    </div>
</div>
           
<?php
include 'footer.php';
?>