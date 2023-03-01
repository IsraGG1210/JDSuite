<?php
require './Conexion/config.php';
require './Conexion/Database.php';
require_once './Conexion/funciones.php';
include ('nav_shop.php');

      $items_per_page = 24; 
      $current_page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1; // Página actual
      
      
      $offset = ($current_page - 1) * $items_per_page; // Cálculo del desplazamiento (offset)
      
    $sql = "SELECT a_cb AS p,a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio, aw_detallesp, aw_detallesmc
      FROM articulosw
      INNER JOIN imagenes on  aw_cb = i_idproducto
      INNER JOIN articulos_precios on aw_id = ap_articulo and ap_esquema = 1 and ap_activo=1
      INNER JOIN articulos on a_cb = aw_cb  GROUP BY p 
      LIMIT $items_per_page OFFSET $offset";
    $total_items = 100;
    $total_pages = ceil($total_items / $items_per_page);

    
    $resultado = setq($sql);   
    if(isset($_GET['con'])){
      $concepto = $_GET['con'];
      $sql = "SELECT a_cb AS p,a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio, aw_detallesp, aw_detallesmc
      FROM articulosw
      INNER JOIN imagenes on  aw_cb = i_idproducto
      INNER JOIN articulos_precios on aw_id = ap_articulo and ap_esquema = 1 and ap_activo=1
      INNER JOIN articulos on a_cb = aw_cb  
      WHERE aw_concepto = $concepto GROUP BY p
      LIMIT $items_per_page OFFSET $offset";
      $sql2 = "SELECT a_cb AS p,a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio, aw_detallesp, aw_detallesmc
      FROM articulosw
      INNER JOIN imagenes on  aw_cb = i_idproducto
      INNER JOIN articulos_precios on aw_id = ap_articulo and ap_esquema = 1 and ap_activo=1
      INNER JOIN articulos on a_cb = aw_cb  
      WHERE aw_concepto = $concepto GROUP BY p";
    $total_items = mysqli_num_rows(setq($sql2));
    $total_pages = ceil($total_items / $items_per_page);
    $resultado = setq($sql);   
    }else if(isset($_GET['dep'])){
      $concepto = $_GET['dep'];
      $sql = "SELECT a_cb AS p ,a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio, aw_detallesp, aw_detallesmc
      FROM articulosw
      INNER JOIN imagenes on  aw_cb = i_idproducto
      INNER JOIN articulos_precios on aw_id = ap_articulo and ap_esquema = 1 and ap_activo=1
      INNER JOIN articulos on a_cb = aw_cb 
      WHERE aw_departamento = $concepto GROUP BY p
      LIMIT $items_per_page OFFSET $offset";
      $sql2 = "SELECT a_cb AS p ,a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio, aw_detallesp, aw_detallesmc
      FROM articulosw
      INNER JOIN imagenes on  aw_cb = i_idproducto
      INNER JOIN articulos_precios on aw_id = ap_articulo and ap_esquema = 1 and ap_activo=1
      INNER JOIN articulos on a_cb = aw_cb 
      WHERE aw_departamento = $concepto GROUP BY p";
    $total_items = mysqli_num_rows(setq($sql2));
    $total_pages = ceil($total_items / $items_per_page);
    $resultado = setq($sql); 
    } 
    if(!empty($_GET['busqueda'])){
      $buscar = $_GET['busqueda'];
      //$page = $_REQUEST['page'];
      $sql = "SELECT a_cb AS p,a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio, aw_detallesp, aw_detallesmc
      FROM articulosw
      INNER JOIN imagenes on  aw_cb = i_idproducto
      INNER JOIN articulos_precios on aw_id = ap_articulo and ap_esquema = 1 and ap_activo=1
      INNER JOIN articulos on a_cb = aw_cb  
      WHERE a_nmb LIKE '%$buscar%' GROUP BY p
      LIMIT $items_per_page OFFSET $offset";
      $sql2 = "SELECT a_cb AS p,a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio, aw_detallesp, aw_detallesmc
      FROM articulosw
      INNER JOIN imagenes on  aw_cb = i_idproducto
      INNER JOIN articulos_precios on aw_id = ap_articulo and ap_esquema = 1 and ap_activo=1
      INNER JOIN articulos on a_cb = aw_cb  
      WHERE a_nmb LIKE '%$buscar%' GROUP BY p";
    $total_items = mysqli_num_rows(setq($sql2));
    $total_pages = ceil($total_items / $items_per_page);
    $resultado = setq($sql);
    $array = mysqli_num_rows($resultado);
    if($array == "0" || $array == null){
      ?>
<script>
  
  window.alert("No se encontraron articulos relacionados a su busqueda");
  window.location.href = "shop.php?page=1";
</script>
<?php
    }
    }
?>


<!--SHOP-->
<div class="col-12">
  <section class="container" id="tienda">
    <div class="text-center">
      <div class="row">
        <?php while($row = $resultado->fetch_array()){?>
        <div class="col-lg-2 col-md-6 mb-4">
          <div class="card">
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" -mdb-ripple-color="light">
              <a href="descrpro.php?p=<?php echo $row['p']; ?>&token=<?php echo hash_hmac('sha1',$row['p'],KEY_TOKEN); ?>">
                <img src="https://www.jdshop.mx/productos/<?php echo $row['rutaimagen'];?>" class="w-100" />
                <div class="mask">
                </div>
                <div class="hover-overlay">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </div>
                <div class="card-body">
                  <h6 id="descpro" class="card-title mb-2" style="color:grey;"><?php echo $row['a_nmb']; ?></h6>
                  <input type="hidden" id="idp" value="<?php echo $row['p']; ?>" />
                  <h6 id="descpro" class="card-title mb-2" style="color:grey;"><?php echo MONEDA.number_format($row['ap_precio'],2,'.',','); ?></h6>
                </div>
              </a>
            </div>
              <input type="hidden" id="precio<?php echo $row['p']; ?>" value="<?php echo $row['ap_precio']; ?>" />
              <div class="centrado p-4">
              <a id="cart" class="btn btn-primary" onclick="addToCartCarousel('<?php echo $row['p'];?>')"><i class="fas fa-shopping-cart"></i>Agregar</a>
              </div>
          </div>
        </div>
        <?php }?>
      </div>
    </div>
  </section>
</div>
<script>
    function addToCartCarousel(idp){
      document.getElementById("cart").disabled = true;
      precio = $("#precio"+idp).val();
      descuento = 0;
      talla = 0;
      color = 0;
      cantidad = 1;
      producto = idp;
      alert(precio+" "+talla+" "+color+" "+cantidad+" "+producto);
      $.post("query/Cart.php",{
      precio: precio,
      descuento: descuento,
      talla: talla,
      colorsel: color,
      cantidad: cantidad,
      p: producto
      },function(htmle){
      //$("#cart").html(htmle);
      document.getElementById('cart');
      //$("#cantcart").load();
      //$('#cantcart').load('header.php');
      $.post("query/infocart.php",{},function(htmlec){
      $("#cantcart").html('<i class="fas fa-shopping-cart"></i> '+htmlec);
      //alert ("Cantidad" + htmlec);
      });
      });
    }
  </script>
<!-- Pagination -->
<nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
  <div class="pagination">
    <?php for ($i = 1; $i <= $total_pages; $i++) {?>
    <ul>
      <?php 
      if(!empty($_REQUEST['busqueda'])){?>
       <a  href="?busqueda=<?php echo $_REQUEST['busqueda']?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
      <?php
      }else if(!empty($_REQUEST['con'])){?>
       <a  href="?con=<?php echo $_REQUEST['con']?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
      <?php } else if(!empty($_REQUEST['dep'])){?>
        <a  href="?dep=<?php echo $_REQUEST['dep']?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php }else {?>
          <a  href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
          <?php }?>
    </ul>
    <?php } ?>

  </div>
</nav>


<!--PARTE DE WHATS-->
<div class="msgwh">
  <a href="https://wa.me/5215539488047?text=Hola, necesito información sobre " target="_blank">
    <img src="../public/imagenes/whatsapp.png" alt="" style="width: 100%;" />
  </a>
</div>



<?php
  include ('footer.php');
  ?>