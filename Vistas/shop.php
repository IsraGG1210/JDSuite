<?php
require './Conexion/config.php';

include_once './Conexion/funciones.php';
include ('nav_shop.php');

$page = $_GET['page'];
$dep = isset($_GET['dep']) ? $_GET['dep'] : null;
$con = isset($_GET['con']) ? $_GET['con'] : null;
$busqueda = @$_GET['busqueda'];

$url = $_SERVER['REQUEST_URI'];
$par = explode('/',$url);
      $items_per_page = 24; 
      $current_page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1; // Página actual
      
      
      $offset = ($current_page - 1) * $items_per_page; // Cálculo del desplazamiento (offset)
      
 
     
    if(isset($con)){
      $concepto = $_REQUEST['con'];
      
    
      $sql='SELECT a_cb AS p, a_nmb, concat(i_nmb,".",i_ext) AS rutaimagen, ap_precio
       FROM articulosw 
       INNER JOIN imagenes ON aw_cb = i_idproducto
        INNER JOIN articulos_precios ON aw_id = ap_articulo 
        INNER JOIN articulos ON a_cb = aw_cb 
        WHERE articulos_precios.ap_esquema = 1
         AND ap_activo = 1 
         AND a_estatus = "A" 
         AND aw_tienda IN (3,2) AND aw_concepto = '.$concepto.' GROUP BY p LIMIT 24  OFFSET '.$offset.'';
    
    $resultado = setq($sql);   
    }else if(isset($dep)){
      $concepto = $_REQUEST['dep'];
      
   

       $sql='SELECT a_cb AS p, a_nmb, concat(i_nmb,".",i_ext) AS rutaimagen, ap_precio
       FROM articulosw 
       INNER JOIN imagenes ON aw_cb = i_idproducto
        INNER JOIN articulos_precios ON aw_id = ap_articulo 
        INNER JOIN articulos ON a_cb = aw_cb 
        WHERE articulos_precios.ap_esquema = 1
         AND ap_activo = 1 
         AND a_estatus = "A" 
         AND aw_tienda IN (3,2) AND aw_departamento = '.$concepto.' GROUP BY p LIMIT 24  OFFSET '.$offset.'';
        
    $resultado = setq($sql); 
    } else if(isset($busqueda)){
      $buscar = $_REQUEST['busqueda'];
     
    
      $sql='SELECT a_cb AS p, a_nmb, concat(i_nmb,".",i_ext) AS rutaimagen, ap_precio
       FROM articulosw 
       INNER JOIN imagenes ON aw_cb = i_idproducto
        INNER JOIN articulos_precios ON aw_id = ap_articulo 
        INNER JOIN articulos ON a_cb = aw_cb 
        WHERE articulos_precios.ap_esquema = 1
         AND ap_activo = 1 
         AND a_estatus = "A" 
         AND aw_tienda IN (3,2) AND a_nmb LIKE '."'%".$buscar."%'".' GROUP BY p LIMIT 24  OFFSET '.$offset.'';
     
    $sql2="SELECT a_nmb FROM articulos WHERE a_nmb LIKE '%$buscar%' AND a_estatus = 'A'";
    $res1= setq($sql2);

    $total_items =  $res1->num_rows;
    $total_pages = ceil($total_items / $items_per_page);
    $resultado = setq($sql);
   
    
    }else{
      $sql = 'SELECT a_cb AS p,a_nmb, concat(i_nmb,".",i_ext)as rutaimagen , ap_precio
      FROM articulosw
      INNER JOIN imagenes on  aw_cb = i_idproducto
      INNER JOIN articulos_precios on aw_id = ap_articulo 
      INNER JOIN articulos on a_cb = aw_cb  
      WHERE ap_esquema= 1 AND ap_activo = 1
      AND a_estatus = "A" AND aw_tienda IN (3,2)
      GROUP BY p
      LIMIT 24 OFFSET '.$offset.'';
     
      $resultado = setq($sql);
     
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
              <a
                href="<?php echo SERVERURL?>descrpro?p=<?php echo $row['p']; ?>&token=<?php echo hash_hmac('sha1',$row['p'],KEY_TOKEN); ?>">
                <img src="https://www.jdshop.mx/productos/<?php echo $row['rutaimagen'];?>" class="w-100"
                  alt="<?php $row['a_nmb']?>" />
                <div class="mask">
                </div>
                <div class="hover-overlay">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </div>
                <div class="card-body">
                  <h6 id="descpro" class="card-title mb-2" style="color:grey;"><?php echo $row['a_nmb']; ?></h6>
                  <input type="hidden" id="idp" value="<?php echo $row['p']; ?>" />
                  <h6 id="descpro" class="card-title mb-2" style="color:grey;">
                    <?php echo MONEDA.number_format($row['ap_precio'],2,'.',','); ?></h6>
                </div>
              </a>
            </div>
            <input type="hidden" id="precio<?php echo $row['p']; ?>" value="<?php echo $row['ap_precio']; ?>" />
            <div class="centrado p-4">
              <a id="cart" class="btn btn-primary" onclick="addToCartCarousel('<?php echo $row['p'];?>')"><i
                  class="fas fa-shopping-cart"></i>Agregar</a>
            </div>
          </div>
        </div>
        <?php }?>
      </div>
    </div>
  </section>
</div>
<script>
  function addToCartCarousel(idp) {
    document.getElementById("cart").disabled = true;
    precio = $("#precio" + idp).val();
    descuento = 0;
    talla = 0;
    color = 0;
    cantidad = 1;
    p = idp;
    $.post("query/cookieadd.php", {
      precio: precio,
      descuento: descuento,
      talla: talla,
      colorsel: color,
      cantidad: cantidad,
      p: p
    }, function (htmle) {
      $.post("query/cantidadCart.php", {},
        function (htmlec) {
          $("#carrito-cantidad").html('<i class="fas fa-shopping-cart"></i> ' + htmlec);
          //alert ("Cantidad" + htmlec);
        });
    });
  }
</script>
<!-- Pagination -->



<?php 
if(!empty($_GET['busqueda'])){
  if(!isset($_REQUEST['page'])){
    $_REQUEST['page'] = 1;
  }
  if($_REQUEST['page'] == 1){
    $hidden = 'style="pointer-events: none;
    background: #70707026;
    color: black;"';
  }else $hidden = "";
  $buscar = $_REQUEST['busqueda'];
  $sql2="SELECT a_nmb FROM articulos WHERE a_nmb LIKE '%$buscar%' AND a_estatus = 'A'";
$res1= setq($sql2);

$total_items =  $res1->num_rows;
if($total_items <=0){
?>
<div class="alert alert-danger" style="text-align: center;" role="alert">
  No se encontraron productos relacionados con tu busqueda
</div>

<?php
}
$total_pages = ceil($total_items / $items_per_page);
  echo '<div class="col-md-12 text-xs-center">
    <div class="mb-3">
      <nav aria-label="Page navigation">
        <ul class="pagination" id="pagination">
          <li class="page-item">
            <a class="page-link d-none d-sm-block" onclick="mandar('.($_REQUEST['page']-1).')" aria-label="Previous" '.$hidden.'>
              <span aria-hidden="true">&laquo; Ant</span>
              <span class="sr-only">Anterior</span>
            </a>
          </li>';

          echo '
          <script>
            function mandar(id){
              window.location.href= "'.SERVERURL.'"+id+"/busqueda/'.$_REQUEST['busqueda'].'" ;
            }
          </script>';
          
   
   

if($total_pages >=10){
  if($_REQUEST['page']==1){$min = 1; $nombre="Inicio";}
  else{$min = $_REQUEST['page']; $nombre = "Inicio...";}
  if($min <= 1) $min = 1;

  if($_REQUEST['page']== ($total_pages)) $max = ($total_pages);
  else $max = $_REQUEST['page']+3;
  if($max >= ($total_pages)) $max = ($total_pages);
  if($_REQUEST['page']== 1 ) $active = "active". $hidden3 = "hidden";
  else $active ="". $hidden3 ="";
  echo '<li class="page-item '.$active.'"'.$hidden3.' ><a class="page-link" onclick="mandar(1)">'.$nombre.'</a></li>';

}else if ($total_pages <=9){
  $max = $total_pages+1;
  $min = 1;
}
for($i=$min;$i<=$max-1;$i++){
  if($_REQUEST['page'] == $i) $active = "active";
  else $active = "";
  if($i == 1) $nombre = "Inicio";
  else $nombre = $i;
  echo '<li class="page-item '.$active.'"><a class="page-link" onclick="mandar('.$i.')">'.$nombre.'</a></li>';
}
if($total_pages<=9){
  
}else{
  if($_REQUEST['page'] == ($total_pages-5)) $nombre = ($total_pages);
  else $nombre = '... '.($total_pages-1);
  if($_REQUEST['page'] == $i) $active = "active";
  else $active = "";
  if($_REQUEST['page'] >= ($total_pages-4)) echo '';
  else echo '<li class="page-item '.$active.'"><a class="page-link" onclick="mandar('.($total_pages-1).')">'.$nombre.'</a></li>';
  echo '<li class="page-item '.$active.'"><a class="page-link" onclick="mandar('.($total_pages).')">'.($total_pages).'</a></li>';
}
if($_REQUEST['page'] == ($total_pages) ||  $total_pages <= 2) $hidden2 = 'style="pointer-events: none;
background: #70707026;
color: black;"';
else $hidden2 = '';
echo '<li class="page-item">
  <a class="page-link d-none d-sm-block" onclick="mandar('.($_REQUEST['page']+1).')" aria-label="Next" '.$hidden2.'>
    <span aria-hidden="true">Sig &raquo;</span>
    <span class="sr-only">Siguiente</span>
  </a>
</li>
</ul>
</div>';
}else if (!empty($_REQUEST['con'])){
  if(!isset($_REQUEST['page'])){
    $_REQUEST['page'] = 1;
  }
  if($_REQUEST['page'] == 1){
    $hidden = 'style="pointer-events: none;
    background: #70707026;
    color: black;"';
  }else $hidden = "";
  $concepto = $_REQUEST['con'];
  $sql1="SELECT a_cb AS p, a_nmb 
FROM articulosw 
INNER JOIN articulos ON a_cb = aw_cb 
WHERE a_estatus = 'A' AND aw_tienda IN (3,2) 
AND aw_concepto = $concepto GROUP BY p ";
$res1 = setq($sql1);

$total_items = $res1->num_rows;
if($total_items <=0){
?>
<div class="alert alert-danger" style="text-align: center;" role="alert">
  No se encontraron productos relacionados con tu busqueda
</div>

<?php
}
$total_pages = ceil($total_items / $items_per_page);
  echo '<div class="col-md-12 text-xs-center">
    <div class="mb-3">
      <nav aria-label="Page navigation">
        <ul class="pagination" id="pagination">
          <li class="page-item">
            <a class="page-link d-none d-sm-block" onclick="mandar('.($_REQUEST['page']-1).')" aria-label="Previous" '.$hidden.'>
              <span aria-hidden="true">&laquo; Ant</span>
              <span class="sr-only">Anterior</span>
            </a>
          </li>';

          echo '
          <script>
            function mandar(id){
              window.location.href="'. SERVERURL.'"+id+"/con/'.$_REQUEST['con'].'";
              
            }
          </script>';
          

if($total_pages >=10){
  if($_REQUEST['page']==1){$min = 1; $nombre="Inicio";}
  else{$min = $_REQUEST['page']; $nombre = "Inicio...";}
  if($min <= 1) $min = 1;

  if($_REQUEST['page']== ($total_pages)) $max = ($total_pages);
  else $max = $_REQUEST['page']+3;
  if($max >= ($total_pages)) $max = ($total_pages);
  if($_REQUEST['page']== 1 ) $active = "active". $hidden3 = "hidden";
  else $active ="". $hidden3 ="";
  echo '<li class="page-item '.$active.'"'.$hidden3.' ><a class="page-link" onclick="mandar(1)">'.$nombre.'</a></li>';

}else if ($total_pages <=9){
  $max = $total_pages+1;
  $min = 1;
}
for($i=$min;$i<=$max-1;$i++){
  if($_REQUEST['page'] == $i) $active = "active";
  else $active = "";
  if($i == 1) $nombre = "Inicio";
  else $nombre = $i;
  echo '<li class="page-item '.$active.'"><a class="page-link" onclick="mandar('.$i.')">'.$nombre.'</a></li>';
}
if($total_pages<=9){
  
}else{
  if($_REQUEST['page'] == ($total_pages-5)) $nombre = ($total_pages);
  else $nombre = '... '.($total_pages-1);
  if($_REQUEST['page'] == $i) $active = "active";
  else $active = "";
  if($_REQUEST['page'] >= ($total_pages-4)) echo '';
  else echo '<li class="page-item '.$active.'"><a class="page-link" onclick="mandar('.($total_pages-1).')">'.$nombre.'</a></li>';
  echo '<li class="page-item '.$active.'"><a class="page-link" onclick="mandar('.($total_pages).')">'.($total_pages).'</a></li>';
}
if($_REQUEST['page'] == ($total_pages) ||  $total_pages <= 2) $hidden2 = 'style="pointer-events: none;
background: #70707026;
color: black;"';
else $hidden2 = '';
echo '<li class="page-item">
  <a class="page-link d-none d-sm-block" onclick="mandar('.($_REQUEST['page']+1).')" aria-label="Next" '.$hidden2.'>
    <span aria-hidden="true">Sig &raquo;</span>
    <span class="sr-only">Siguiente</span>
  </a>
</li>
</ul>
</div>';
}else if (!empty($_REQUEST['dep'])){
  if(!isset($_REQUEST['page'])){
    $_REQUEST['page'] = 1;
  }
  if($_REQUEST['page'] == 1){
    $hidden = 'style="pointer-events: none;
    background: #70707026;
    color: black;"';
  }else $hidden = "";
  $concepto = $_REQUEST['dep'];
  $sql1 = "SELECT a_cb AS p, a_nmb 
 FROM articulosw 
 INNER JOIN articulos ON a_cb = aw_cb 
 WHERE a_estatus = 'A'
 AND aw_tienda IN (3,2) AND aw_departamento = '$concepto' GROUP BY p";
 $res1= setq($sql1);


$total_items = $res1->num_rows;
if($total_items <=0){
?>
<div class="alert alert-danger" style="text-align: center;" role="alert">
  No se encontraron productos relacionados con tu busqueda
</div>

<?php
}
$total_pages = ceil($total_items / $items_per_page);
  echo '<div class="col-md-12 text-xs-center">
    <div class="mb-3">
      <nav aria-label="Page navigation">
        <ul class="pagination" id="pagination">
          <li class="page-item">
            <a class="page-link d-none d-sm-block" onclick="mandar('.($_REQUEST['page']-1).')" aria-label="Previous" '.$hidden.'>
              <span aria-hidden="true">&laquo; Ant</span>
              <span class="sr-only">Anterior</span>
            </a>
          </li>';

          echo '
          <script>
            function mandar(id){
              window.location.href="'. SERVERURL.'"+id+"/dep/'.$_REQUEST['dep'].'";
              
            }
          </script>';
          

if($total_pages >=10){
  if($_REQUEST['page']==1){$min = 1; $nombre="Inicio";}
  else{$min = $_REQUEST['page']; $nombre = "Inicio...";}
  if($min <= 1) $min = 1;

  if($_REQUEST['page']== ($total_pages)) $max = ($total_pages);
  else $max = $_REQUEST['page']+3;
  if($max >= ($total_pages)) $max = ($total_pages);
  if($_REQUEST['page']== 1 ) $active = "active". $hidden3 = "hidden";
  else $active ="". $hidden3 ="";
  echo '<li class="page-item '.$active.'"'.$hidden3.' ><a class="page-link" onclick="mandar(1)">'.$nombre.'</a></li>';

}else if ($total_pages <=9){
  $max = $total_pages+1;
  $min = 1;
}
for($i=$min;$i<=$max-1;$i++){
  if($_REQUEST['page'] == $i) $active = "active";
  else $active = "";
  if($i == 1) $nombre = "Inicio";
  else $nombre = $i;
  echo '<li class="page-item '.$active.'"><a class="page-link" onclick="mandar('.$i.')">'.$nombre.'</a></li>';
}
if($total_pages<=9){
  
}else{
  if($_REQUEST['page'] == ($total_pages-5)) $nombre = ($total_pages);
  else $nombre = '... '.($total_pages-1);
  if($_REQUEST['page'] == $i) $active = "active";
  else $active = "";
  if($_REQUEST['page'] >= ($total_pages-4)) echo '';
  else echo '<li class="page-item '.$active.'"><a class="page-link" onclick="mandar('.($total_pages-1).')">'.$nombre.'</a></li>';
  echo '<li class="page-item '.$active.'"><a class="page-link" onclick="mandar('.($total_pages).')">'.($total_pages).'</a></li>';
}
if($_REQUEST['page'] == ($total_pages) ||  $total_pages <= 2) $hidden2 = 'style="pointer-events: none;
background: #70707026;
color: black;"';
else $hidden2 = '';
echo '<li class="page-item">
  <a class="page-link d-none d-sm-block" onclick="mandar('.($_REQUEST['page']+1).')" aria-label="Next" '.$hidden2.'>
    <span aria-hidden="true">Sig &raquo;</span>
    <span class="sr-only">Siguiente</span>
  </a>
</li>
</ul>
</div>';
}else {
  if(!isset($_REQUEST['page'])){
    $_REQUEST['page'] = 1;
  }
  if($_REQUEST['page'] == 1){
    $hidden = 'style="pointer-events: none;
    background: #70707026;
    color: black;"';
  }else $hidden = "";
  $sql1 = 'SELECT a_cb AS p,a_nmb, concat(i_nmb,".",i_ext)as rutaimagen , ap_precio
  FROM articulosw
  INNER JOIN imagenes on  aw_cb = i_idproducto
  INNER JOIN articulos_precios on aw_id = ap_articulo 
  INNER JOIN articulos on a_cb = aw_cb  
  WHERE ap_esquema= 1 AND ap_activo = 1
  AND a_estatus = "A" AND aw_tienda IN (3,2)
  GROUP BY p';
 
 $res1 = setq($sql1);     
 
 $total_items = $res1->num_rows;
 
 if($total_items <=0){
  ?>
<div class="alert alert-danger" style="text-align: center;" role="alert">
  No se encontraron productos relacionados con tu busqueda
</div>

<?php
  }
 $total_pages = ceil($total_items / $items_per_page);
 $resultado = setq($sql);

  echo '<div class="col-md-12 text-xs-center">
    <div class="mb-3">
      <nav aria-label="Page navigation">
        <ul class="pagination" id="pagination">
          <li class="page-item">
            <a class="page-link " onclick="mandar('.($_REQUEST['page']-1).')" aria-label="Previous" '.$hidden.'>
              <span aria-hidden="true">&laquo; Ant</span>
              <span class="sr-only">Anterior</span>
            </a>
          </li>';

          echo '
          <script>
            function mandar(id){
              window.location.href= "'.SERVERURL.'" +id+"";
            }
          </script>';
          
if($total_pages >=10){
  if($_REQUEST['page']==1){$min = 1; $nombre="Inicio";}
  else{$min = $_REQUEST['page']; $nombre = "Inicio...";}
  if($min <= 1) $min = 1;

  if($_REQUEST['page']== ($total_pages)) $max = ($total_pages);
  else $max = $_REQUEST['page']+3;
  if($max >= ($total_pages)) $max = ($total_pages);
  if($_REQUEST['page']== 1 ) $active = "active". $hidden3 = "hidden";
  else $active ="". $hidden3 ="";
  echo '<li class="page-item '.$active.'"'.$hidden3.' ><a class="page-link" onclick="mandar(1)">'.$nombre.'</a></li>';

}else if ($total_pages <=9){
  $max = $total_pages+1;
  $min = 1;
}
for($i=$min;$i<=$max-1;$i++){
  if($_REQUEST['page'] == $i) $active = "active";
  else $active = "";
  if($i == 1) $nombre = "Inicio";
  else $nombre = $i;
  echo '<li class="page-item '.$active.'"><a class="page-link" onclick="mandar('.$i.')">'.$nombre.'</a></li>';
}
if($total_pages<=9){
  
}else{
  if($_REQUEST['page'] == ($total_pages-5)) $nombre = ($total_pages);
  else $nombre = '... '.($total_pages-1);
  if($_REQUEST['page'] == $i) $active = "active";
  else $active = "";
  if($_REQUEST['page'] >= ($total_pages-4)) echo '';
  else echo '<li class="page-item '.$active.'"><a class="page-link" onclick="mandar('.($total_pages-1).')">'.$nombre.'</a></li>';
  echo '<li class="page-item '.$active.'"><a class="page-link" onclick="mandar('.($total_pages).')">'.($total_pages).'</a></li>';
}
if($_REQUEST['page'] == ($total_pages) ||  $total_pages <= 2) $hidden2 = 'style="pointer-events: none;
background: #70707026;
color: black;"';
else $hidden2 = '';
echo '<li class="page-item">
  <a class="page-link d-none d-sm-block" onclick="mandar('.($_REQUEST['page']+1).')" aria-label="Next" '.$hidden2.'>
    <span aria-hidden="true">Sig &raquo;</span>
    <span class="sr-only">Siguiente</span>
  </a>
</li>
</ul>
</div>';
}

  
?>

<?php
  include ('footer.php');
  ?>