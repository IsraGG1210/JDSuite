<?php
require './Conexion/config.php';
require './Conexion/Database.php';

$db = new Database();
$con = $db->conectar();
$concepto = $_GET['id_concepto'];
$sql = $con->prepare("SELECT a_cb,a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio, aw_concepto
from articulosw 
inner join imagenes on aw_cb = i_idproducto
inner join articulos_precios on aw_id = ap_articulo and ap_esquema = 1
inner join articulos on a_cb = aw_cb where 1 
limit 30");
if($_GET['id_comcepto'] != NULL) $sql = ' AND aw_concepto = "'.$concepto.'" ';

$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
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
<body>
<!--Navbar shop-->
<div id="nav">
    <div class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="">
        <div class="navbar-dark my-2">
          <button class="navbar-toggler w-100 " style="color:#03727d;font-size:32px;" type="button"
            data-bs-toggle="collapse" data-bs-target="#shop" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fa fa-ellipsis-v" style="font-size:24px color:#03727d;"></i> Categorías
          </button>
        </div>
      </div>
      <div class="text-center mt-3 collapse navbar-collapse p-0" id="shop">
        <ul class="navbar-nav p-0 mx-auto ">
          <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">SEGURIDAD Y
              VIGILANCIA</a>
            <ul class="dropdown-menu">
                
              <li><a class="dropdown-item" href="#">KIT DE CAMARAS DE SEGURIDAD</a></li>
              <li><a class="dropdown-item" href="#">SERVICIO</a></li>
              <li><a class="dropdown-item" href="#">CAMARAS Y VIDEOGRABADORES</a></li>
              <li><a class="dropdown-item" href="#">CÁMARAS IP</a></li>
              <li><a class="dropdown-item" href="#">CABLES Y CONECTORES</a></li>
              <li><a class="dropdown-item" href="#">VER TODO</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">REDES</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">CABLES DE RED</a></li>
              <li><a class="dropdown-item" href="#">RACKS Y GABINETES</a></li>
              <li><a class="dropdown-item" href="#">VER TODO</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">ENERGIA</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">NO BREAKS Y UPS</a></li>
              <li><a class="dropdown-item" href="#">VER TODO</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">SOFTWARE</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">PUNTOS DE VENTA</a></li>
              <li><a class="dropdown-item" href="#">SISTEMAS CONTABLES</a></li>
              <li><a class="dropdown-item" href="#">VER TODO</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">COMPUTACION</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">PERIFÉRICOS PARA POS</a></li>
              <li><a class="dropdown-item" href="#">EQUIPOS DE CÓMPUTO</a></li>
              <li><a class="dropdown-item" href="#">VER TODO</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">ELECTRONICA</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">STREAMING</a></li>
              <li><a class="dropdown-item" href="#">VER TODO</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <form role="search">
              <input class="form-control inpse" type="search" placeholder="Search" aria-label="Search">
              <button class="btn" type="">
                <i class="fa fa-search"></i>
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
    <!--SHOP-->
<div class="container">
<section>
  <div class="text-center">
    <div class="row">
        <?php foreach($resultado as $row){?>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                    -mdb-ripple-color="light">
                    
                    <a href="descrpro.php?a_cb=<?php echo $row['a_cb']; ?>&token=<?php echo hash_hmac('sha1',$row['a_cb'],KEY_TOKEN); ?>">
                    <img src="https://www.jdshop.mx/productos/<?php echo $row['rutaimagen'];?>" class="w-100" />
                        <div class="mask">
                        </div>
                        <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </div>
                        <div class="card-body">
                        <h5 id="descpro" class="card-title mb-2"><?php echo $row['a_nmb']; ?></h5>   
                        </div>
                    </a>
                    <h4><?php echo MONEDA. number_format($row['ap_precio'],2,'.',','); ?></h4>
                    
                </div>
                
            </div>
        </div>
        <?php }?>
    </div>
 </div>
</section>
</div>
  
<!-- Pagination -->

<!-- Pagination -->  



    

  <!--PARTE DE WHATS-->
 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
    

