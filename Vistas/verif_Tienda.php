<?php
include ('header.php');
require './Conexion/config.php';
?>

<!--FORMULARIO/VERIFICACION-->
<div class="bloques">
    <div class="col-12">
      <div class="row mb-2">
        <div class="col-md-8">
          <div class="lip row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <form method="post" action="updatecarrito">
              <h1>CARRITO DE COMPRAS</h1>
              <p class="text-muted">Tienes 
                <span id="cantcart">
                <?php
                   $newitem = 0;
                   $cantidad_total = 0;
                   
                   if(isset($_COOKIE['cart'])) {
                       
                       foreach($_COOKIE['cart'] as $clave=>$item) {
                           $cantidad_total += $item[1];
                       }
                       echo $cantidad_total;
                   }
                ?>
                </span> articulo(s) en tu carrito.</p>
              <div class="table-responsive">
                <table class="table" id="tblistado">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Descuento</th>
                      <th>Subtotal</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    require_once './Conexion/funciones.php';

                    if(isset($_SESSION['username'])){
                        // Consulta para obtener los datos del pedido del usuario logueado
                        $sesion = $_SESSION['username'];
                        $sql = 'SELECT concat(i_nmb,".",i_ext)as rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
                            FROM pedidoscld
                            INNER JOIN articulos ON a_cb = pd_producto
                            INNER JOIN imagenes ON a_cb = i_idproducto
                            WHERE pd_pedido="'.$sesion.'"';
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
                      <td>
                        <?php echo $nombre;?>
                        <input type="hidden" id="producto" value="<?php echo ($id); ?>"/>
                      </td>
                      <td nowrap>
                        <div nowrap class="input-group mb-5" >
                          <input type="number" min="1" value="<?php echo number_format($cantidad) ?>" 
                            class="for-control text-center txtCantidad" data-precio="<?php echo $precio; ?>" data-id="<?php echo $id; ?>"
                            style="width:100px;">
                        </div>
                      </td>
                      <td>
                        <?php 
                        echo MONEDA. number_format($precio,2,'.',',');?>
                        <input type="hidden" id="precio<?php echo $id;?>" value="<?php echo ($precio); ?>"/>
                      </td>
                      <td>
                        <?php echo MONEDA. number_format($descuento,2,'.',',');?>
                        <input type="hidden" id="descuento" value="<?php echo ($descuento); ?>"/>
                      </td>
                      <td class="cant<?php echo $id;?>">
                        <?php 
                        $precioC = $precio * $cantidad;
                        echo MONEDA. number_format($precioC,2,'.',',');?>
                        <input type="hidden" id="precio<?php echo $id;?>" value="<?php echo ($precio); ?>"/>
                      </td>
                      <td>
                        <a class="btnEliminar" id="eliminar"  data-id="<?php echo $id;?>"
                          data-bs-toggle="modal" data-bs-target="#eliminaModal">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <?php 
                    }}else {
                       
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
                    <tr>
                      <td>
                        <img src="https://www.jdshop.mx/productos/<?php echo $ruta;?>" alt="" style="width:50px;"></img>
                      </td>
                      <td>
                        <?php echo $nombre;?>
                        <input type="hidden" id="producto" value="<?php echo ($id); ?>"/>
                      </td>
                      <td nowrap>
                        <div nowrap class="input-group mb-5" >
                          <input type="number" min="1" value="<?php echo number_format($cantidad) ?>" 
                            class="for-control text-center txtCantidad" data-precio="<?php echo $precio; ?>" data-id="<?php echo $id; ?>"
                            style="width:100px;">
                        </div>
                      </td>
                      <td>
                        <?php 
                        echo MONEDA. number_format($precio,2,'.',',');?>
                        <input type="hidden" id="precio<?php echo $id;?>" value="<?php echo ($precio); ?>"/>
                      </td>
                      <td>
                        <?php echo MONEDA. number_format($descuento,2,'.',',');?>
                        <input type="hidden" id="descuento" value="<?php echo ($descuento); ?>"/>
                      </td>
                      <td class="cant<?php echo $id;?>">
                        <?php 
                        $precioC = $precio * $cantidad;
                        echo MONEDA. number_format($precioC,2,'.',',');?>
                        <input type="hidden" id="precio<?php echo $id;?>" value="<?php echo ($precio); ?>"/>
                      </td>
                      <td>
                        <a class="btnEliminar" id="eliminar"  data-id="<?php echo $id;?>"
                          data-bs-toggle="modal" data-bs-target="#eliminaModal">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                    <?php }}?>
                  </tbody>
                </table>
              </div>
              <div class="box-footer row">
                <div class="col-12 col-md-8 tal desk">
                  <a href="./shop.php" class="btn btn-default"><i class="fas fa-chevron-left"></i> Seguir Comprando</a>
                </div>
              </div>
            </form>
          </div>        
        </div>
        <div class="col-md-4">
          <div class=" lip row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <h1>RESUMEN</h1>
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
                        
                        if(isset($_COOKIE['cart'])) {
                            
                            foreach($_COOKIE['cart'] as $clave=>$item) {
                                $cantidad_total += $item[1];
                            }
                            echo $cantidad_total;
                        } ?>)
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
              
              </div>
              <div class="relative flex items-center" id="datosControl" style="display:none">
              <div class="sep">  
              <div class="row" id="cupondescuento">
                  <div class="col-9 text-success">
                    Monto a descontar por cupon
                  </div>
                  <div class="col-3 text-success">
                    <h5 id="textocupon"  name="textocupon"  class="text-sucess"></h5>
                  </div>
                </div>
                <div class="sep"></div>
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
                      <h5 id="idtotalFinal" data-total="<?php echo $totalen;?>"><b>
                      <?php 
                      echo MONEDA. number_format($totalen,2,'.',',');?>
                    </b></h5></span>
                  </div>
                </div>
                    </div>
              </div>
              <?php
              if(isset($_SESSION['username'])){
                $accion = 'onclick="comprar()"';
              }else{
                $accion = 'href="login.php"';
              }
              ?>
              <button>
              <a data-testid="button-component" class=" centrado paddbot2  w-100 h-12 border font-bold transition py-3 rounded"
              style="background-color:#29A8B0;" <?php echo $accion; ?>>
                <i class="fa fa-shopping-bag"></i>Comprar
              </a>
              </button>
                  
                  </div>
                  <div class="centrado" id="div1" style="display:">
                  <button class="paddbot2" onclick="ver()" style="background-color:#29A8B0;">
                    <i class="fa fa-plus-circle"> Agregar cup??n de descuento </i>
                  </button>
                  </div>
                    <div class="col-md-12 centrado" id="div2" style="display:none">
                        <div class="relative flex items-center estrellas" id="formControl">
                        <p>Cup??n de descuento</p><br>
                          <input id="c_code" nombre="c_code" type="text" class="form-control" placeholder="Inserta tu c??digo" aria-label="Inserta tu c??digo" aria-describedby="button-addon2" style="width:70%;">
                          <button  onclick="aplicar()" id="button-addon2" type="button" data-testid="button-component" class=" centrado paddbot2  w-30 h-12 border font-bold transition py-3 rounded" style="background-color:#29A8B0;" >
                            Aplicar
                          </button>
                        </div>
                      <!--</form>-->
                    </div>
                    <h2 id="error" class="centrado" name="error" style="display:none" class="text-danger">Cupon no valido</h2>
                    <h2 id="errorp" class="centrado" name="error" style="display:none" class="text-danger">No puedes aplicar a??n el cupon. No tienes productos en el carrito!</h2>
                   
                  <!--MODAL COMPRAS SIN SESION PRODUCTO-->
                  <div class="modal fade" id="modalIniciarSesion" tabindex="-1" aria-labelledby="modalIniciarSesioneliminarModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalIniciarSesionModalLabel">Inicia sesion</h5><!-- 
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">
                          </button> -->
                        </div>
                        <div class="modal-body">
                          <p>Debe iniciar sesi??n para realizar la compra.</p>
                        </div>
                        <div class="modal-footer">
                        <button data-testid="button-component" class="border font-bold transition py-3 rounded"
                          style="background-color:#29A8B0;" onclick="redireccionar()">Iniciar sesi??n</button>
                        </div>
                      </div>
                    </div>
                  </div>
                 
                  <script>
                    function redireccionar() {
                    window.location.href = "login.php";
                  }
                  function comprar() {
                        $.post("query/comprar.php", {}, function(data) {
                            // Manejar la respuesta de la acci??n de compra
                        });
                    }
                    function addc() {
                      var cantidad = $("#cantidad").val();
                      cantidad++;
                      $("#cantidad").val(cantidad);
                    }

                    function subc() {
                      var cantidad = $("#cantidad").val();
                      if (cantidad > 1)
                        cantidad--;
                      $("#cantidad").val(cantidad);
                    }
                    function ver(){
                      document.getElementById('div1').style.display = 'none';
                      document.getElementById('div2').style.display = '';
                    }
                    function aplicar(){
                      document.getElementById('cupondescuento').style.display = '';
                      codigo = $("#c_code").val();
                      $.post("query/cupones.php",{
                        codigo : codigo
                      }).done(function(respuesta){
                        //alert(respuesta);
                        if(respuesta.trim() === "Error" || respuesta.trim() === "Codigo no valido" || respuesta.trim() === "No puedes aplicar aun el cupon"){
                          if(respuesta.trim() === "Error" || respuesta.trim() === "Codigo no valido"){
                            $("#error").show();
                          }else{
                            $("#errorp").show();
                          }
                        }else{
                          var arreglo = JSON.parse(respuesta);
                          $("#formControl").hide();
                          $("#datosControl").show();
                          $("#textocupon").text("$" + arreglo.monto);
                          $('#montocupon').show();
                          
                          var total = parseFloat($('#idtotalFinal').data('total'))-arreglo.monto;
                          
                          $('#idtotalFinal').text("$"+total.toFixed(2));
                          $('#totalf').text("Total final");
                        }
                      });
                      $("#c_code").keyup(function(){
                        $("#error").hide();
                        $("#errorp").hide();
                      });
                    }
                     
                  </script>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--MODAL ELIMINAR PRODUCTO-->
  <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        ??Desea eliminar el producto del carrito de compras?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="eliminaModal" type="submit" class="btn btn-danger eliminar" data-bs-dismiss="modal">Eliminar</button>
      </div>
    </div>
  </div>
</div>

  <!--PARTE DE WHATS-->
  <div class="msgwh">
    <a href="https://wa.me/5215539488047?text=Hola, necesito informaci??n sobre " target="_blank">
      <img src="../public/imagenes/whatsapp.png" alt="" style="width: 100%;"/>
    </a>
  </div>


  
<?php
include ('footer.php');
?>
<script>
$(document).ready(function(){
  var idEliminar = -1;
  var fila;
    $(".btnEliminar").click(function(){
      idEliminar = ($(this).data('id'));
      fila=($(this).parent('td').parent('tr'));
    });
    $(".eliminar").click(function(){
      $.ajax({
        url: "query/eliminarcart.php",
        method: 'POST',
        data:{
          id:idEliminar
        }
      }).done(function(res){
        location.reload();
      })
    });
    $(".txtCantidad").change(function(){
      var cantidad =$(this).val();
      var precio = $(this).data('precio');
      var producto = $(this).data('id');
      incrementar(cantidad, producto);
    });
    function incrementar(cantidad, producto){
      $.ajax({
        url: "query/cantidad.php",
        method: 'POST',
        data:{
        cantidad:cantidad,
        producto:producto
        } 
      }).done(function(resc){
        alert(resc);
        location.reload();
      })
    }
  });
</script>
<!--<script type="text/javascript" src="query/mostrar.js"></script>-->