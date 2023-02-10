<?php
require './Conexion/config.php';
require './Conexion/Database.php';

$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT a_cb,a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio
from articulosw 
inner join imagenes on aw_cb = i_idproducto
inner join articulos_precios on aw_id = ap_articulo and ap_esquema = 1
inner join articulos on a_cb = aw_cb
limit 30");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
require'header.php';
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
                        <h5 class="card-title mb-2"><?php echo $row['a_nmb']; ?></h5>   
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
<nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
    <li class="page-item"><a class="page-link" href="#">5</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>  
<!-- Pagination -->  



    

  <!--PARTE DE WHATS-->
  <div class="msgwh">
    <a href="https://wa.me/5215539488047?text=Hola, necesito información sobre " target="_blank">
      <img src="../public/imagenes/whatsapp.png" alt="" style="width: 100%;"/>
    </a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
    
  <?php
  require 'footer.php'
  ?>
