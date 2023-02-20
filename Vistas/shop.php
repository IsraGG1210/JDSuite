<?php
require './Conexion/config.php';
require './Conexion/Database.php';
include 'nav_shop.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JD_Suite</title>

    <link rel="stylesheet" href="../public/css/style.css">
    
    <link rel="shortcut icon" href="../public/imagenes/favicon.png"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<?php
    function setq($sql,$die = false){ 
        $dbuser = "root"; // El usuario
        $dbpass = "wptye2014"; // El Pass

        $dbhost = "192.168.100.240"; // El host
        $db = "tyesolutions_jdceo"; // Nombre de la base
        $mysqli = new mysqli($dbhost, $dbuser,$dbpass, $db);
        $mysqli->query("SET CHARACTER SET utf8");
        $mysqli->query("SET NAMES utf8");

        if($die) die($sql);
                    $result = $mysqli->query($sql);
                    $mysqli->close();
                  
                    return($result);
    }

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
?>
<body>

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
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
</body>

</html>
    
  <?php
  include ('footer.php');
  ?>
