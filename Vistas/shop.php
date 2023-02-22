<?php
require './Conexion/config.php';
require './Conexion/Database.php';
require_once './Conexion/funciones.php';
include 'nav_shop.php';



      $items_per_page = 24; 
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Página actual
      
      
      $offset = ($current_page - 1) * $items_per_page; // Cálculo del desplazamiento (offset)
      
    $sql = "SELECT a_cb AS p,a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio, aw_detallesp, aw_detallesmc
      FROM articulosw
      INNER JOIN imagenes on  aw_cb = i_idproducto
      INNER JOIN articulos_precios on aw_id = ap_articulo and ap_esquema = 1 and ap_activo=1
      INNER JOIN articulos on a_cb = aw_cb 
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
      WHERE aw_concepto = $concepto
      LIMIT $items_per_page OFFSET $offset";
    $total_items = 100;
    $total_pages = ceil($total_items / $items_per_page);
    $resultado = setq($sql);   
    }else if(isset($_GET['dep'])){
      $concepto = $_GET['dep'];
      $sql = "SELECT DISTINCT a_cb AS p ,a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio, aw_detallesp, aw_detallesmc
      FROM articulosw
      INNER JOIN imagenes on  aw_cb = i_idproducto
      INNER JOIN articulos_precios on aw_id = ap_articulo and ap_esquema = 1 and ap_activo=1
      INNER JOIN articulos on a_cb = aw_cb 
      WHERE aw_departamento = $concepto
      LIMIT $items_per_page OFFSET $offset";
    $total_items = 100;
    $total_pages = ceil($total_items / $items_per_page);
    $resultado = setq($sql); 
    } 
?>


    <!--SHOP-->
<div class="col-12">
<section>
  <div class="text-center">
    <div class="row">
        <?php while($row = $resultado->fetch_array()){?>
        <div class="col-lg-2 col-md-6 mb-4">
            <div class="card">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                    -mdb-ripple-color="light">
                    
                    <a href="descrpro.php?p=<?php echo $row['p']; ?>&token=<?php echo hash_hmac('sha1',$row['p'],KEY_TOKEN); ?>">
                    <img src="https://www.jdshop.mx/productos/<?php echo $row['rutaimagen'];?>" class="w-100" />
                        <div class="mask">
                        </div>
                        <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </div>
                        <div class="card-body">
                        <h6 id="descpro" class="card-title mb-2" style="color:grey;"><?php echo $row['a_nmb']; ?></h6>   
                        </div>
                    </a>
                    <h6><?php echo MONEDA. number_format($row['ap_precio'],2,'.',','); ?></h6>
                    
                </div>
                
            </div>
        </div>
        <?php }?>
    </div>
 </div>
</section>
</div>
  
<!-- Pagination -->
<nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
  <div class="pagination">
    <?php for ($i = 1; $i <= $total_pages; $i++) {?>
      <ul>
      <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
      </ul>
    <?php } ?>
  
    </div>
</nav>  

  <!--PARTE DE WHATS-->
  <div class="msgwh">
    <a href="https://wa.me/5215539488047?text=Hola, necesito información sobre " target="_blank">
      <img src="../public/imagenes/whatsapp.png" alt="" style="width: 100%;"/>
    </a>
  </div>
 

    
  <?php
  include ('footer.php');
  ?>
