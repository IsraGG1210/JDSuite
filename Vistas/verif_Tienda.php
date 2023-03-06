<?php
include ('header.php');
require('query/mostrarcart.php');
require './Conexion/config.php';
?>

<!--FORMULARIO/VERIFICACION-->
<div class="bloques">
    <div class="col-12 container-fluid">
      <div class="row mb-2">
        <div class="col-md-8">
          <div class="lip row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <form method="post" action="updatecarrito">
              <h1>CARRITO DE COMPRAS</h1>
              <p class="text-muted">Tienes 
                <span id="cantcart">
                <?php
                   $sql = 'SELECT SUM(pd_cantidad) FROM pedidoscld WHERE pd_pedido = "'.$sesion.'"';
                   $result = setq($sql);
                   list($total) = $result->fetch_array();
                ?>
                <?php echo number_format($total); ?>
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
                    <?php if($datos == null){
                      echo '<tr>
                      <td colspan=6 class="text-center">
                        <b>Lista vacía</b>
                      </td>
                    </tr>';                    
                    }else{
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
                          <!-- <div class="input-group-prepend">
                            <a class="btn btn-default btnincrementar" >&minus;</a>
                          </div> -->
                          <input type="number" min="1" value="<?php echo number_format($cantidad) ?>" 
                            class="for-control text-center txtCantidad" data-precio="<?php echo $precio; ?>" data-id="<?php echo $id; ?>"
                            style="width:100px;">
                          <!-- <div class="input-group-prepend">
                            <a class="btn btn-default btnincrementar" >&plus;</a>
                          </div> -->
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
                  </tbody>
                  <?php } ?>
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
                        $sql = 'SELECT SUM(pd_cantidad) FROM pedidoscld WHERE pd_pedido = "'.$sesion.'"';
                        $result = setq($sql);
                        list($totalcantidad) = $result->fetch_array();
                        echo number_format($totalcantidad); ?>)
                    </span>
                    <span >productos</span>
                  </div>
                  <div class="col-3">
                    <h5><?php echo MONEDA. number_format($total,2,'.',',');?></h5>
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
              <button data-testid="button-component" class=" centrado paddbot2  w-100 h-12 border font-bold transition py-3 rounded" style="background-color:#29A8B0;" >
                <i class="fa fa-shopping-bag"></i>Comprar
              </button>
                  
                  </div>
                  <div class="centrado" id="div1" style="display:">
                  <button class="paddbot2" onclick="ver()" style="background-color:#29A8B0;">
                    <i class="fa fa-plus-circle"> Agregar cupon de descuento </i>
                  </button>
                  </div>
                    <div class="col-md-12 centrado" id="div2" style="display:none">
                        <div class="relative flex items-center estrellas" id="formControl">
                        <p>Cupón de descuento</p><br>
                          <input id="c_code" nombre="c_code" type="text" class="form-control" placeholder="Inserta tu código" aria-label="Inserta tu código" aria-describedby="button-addon2" style="width:70%;">
                          <button  onclick="aplicar()" id="button-addon2" type="button" data-testid="button-component" class=" centrado paddbot2  w-30 h-12 border font-bold transition py-3 rounded" style="background-color:#29A8B0;" >
                            Aplicar
                          </button>
                        </div>
                      <!--</form>-->
                    </div>
                    <h2 id="error" class="centrado" name="error" style="display:none" class="text-danger">Cupon no valido</h2>
                  <script>
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
                        if(respuesta.trim() === "Error" || respuesta.trim() === "Codigo no valido"){
                          $("#error").show();
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
        ¿Desea eliminar el producto del carrito de compras?
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
    <a href="https://wa.me/5215539488047?text=Hola, necesito información sobre " target="_blank">
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
        url: "query/actualizarcart.php",
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
    /* $(".btnincrementar").click(function(){
      var precio =$(this).parent('div').parent('div').find('input').data('precio');
      var producto =$(this).parent('div').parent('div').find('input').data('id');
      var cantidad =$(this).parent('div').parent('div').find('input').val();
      incrementar(cantidad, precio, producto);
    }); */
    function incrementar(cantidad, producto){
      /* var mult = parseFloat(cantidad)*parseFloat(precio);
      $(".cant" + id).text("$"+mult); */
      $.ajax({
        url: "query/cantidad.php",
        method: 'POST',
        data:{
        cantidad:cantidad,
        producto:producto
        } 
      }).done(function(resc){
        //alert(resc);
        location.reload();
      })
    }
  });
</script>
<!--<script type="text/javascript" src="query/mostrar.js"></script>-->