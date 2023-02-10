<?php
require 'Conexion/config.php';
require 'Conexion/Database.php';

$db = new Database();
$con = $db->conectar();

$id= isset($_GET['a_cb']) ? $_GET['a_cb'] : '';
$token= isset($_GET['token']) ? $_GET['token'] :'';

if($id == '' || $token ==''){
    echo ' Error al procesar la peticion';
    exit;
}else{
    $token_tmp = hash_hmac('sha1',$id, KEY_TOKEN);

    if($token == $token_tmp){
        $sql = $con->prepare("SELECT COUNT(a_cb)
        from articulosw
        inner join imagenes on  aw_cb = i_idproducto
        inner join articulos_precios on aw_id = ap_articulo and ap_esquema = 1 and ap_activo=1
        inner join articulos on a_cb = aw_cb WHERE a_cb=?");
            $sql->execute([$id]);

            if($sql->fetchColumn()>0){
                $sql = $con->prepare("SELECT COUNT(a_cb),a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio, aw_detallesp, aw_detallesmc
                from articulosw
                inner join imagenes on  aw_cb = i_idproducto
                inner join articulos_precios on aw_id = ap_articulo and ap_esquema = 1 and ap_activo=1
                inner join articulos on a_cb = aw_cb WHERE a_cb=?");
                $sql->execute([$id]);
                $row = $sql->fetch(PDO::FETCH_ASSOC);

                $nombre = $row['a_nmb'];
                $imagen = $row['rutaimagen'];
                $precio = $row['ap_precio'];
                $detalles = $row['aw_detallesp'];
                $detallesmc = $row['aw_detallesmc'];

                
            }
    }else{
        echo ' ERROR AL GENERAR LA PETICION';
    exit;
    }
}
        $sqlpr = $con->prepare("SELECT a_cb,a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio
        from articulosw 
        inner join imagenes on aw_cb = aw_cb and aw_cb = i_idproducto
        inner join articulos_precios on aw_id = ap_articulo and ap_esquema = 1
        inner join articulos on a_cb = aw_cb
        limit 10");
                $sqlpr->execute();
                $prod = $sqlpr->fetchAll(PDO::FETCH_ASSOC);

?>
<?php
require 'header.php';
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
<!--FORMULARIO/VERIFICACION-->
<div class="bloques">
    <div class="col-12">
      <div class="row mb-2">
        <div class="col-md-5">
          <div class="box">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="https://www.jdsuite.mx/productos/CB0000000158.jpg" class="d-block w-100" alt="...">
                </div>
                <!--<?php/* foreach($imagenes as $)*/?>-->
                <div class="carousel-item">
                  <img src="https://www.jdshop.mx/productos/<?php echo $row['rutaimagen'] ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="https://www.jdshop.mx/productos/<?php echo $imagen ?>" class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden" >Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden" >Next</span>
              </button>
            </div>
          </div>
              <a href="" class="centrado">
                <i class="fa fa-bookmark" style="color: #a6d0fc; font-size:24px;"> </i> <span>Se encuentra en: </span> <span> JD REST</span>
              </a> 
        </div>
        <div class="col-md-7">
          <div class=" lip row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <h3><?php echo $nombre; ?></h3>
            <br>
            <div class="logo">
            <div class="estrellas">
              <i class="fa fa-star estrellasdis"  ></i>
              <i class="fa fa-star estrellasdis"  ></i>
              <i class="fa fa-star estrellasdis"  ></i>
              <i class="fa fa-star estrellasdis"  ></i>
              <i class="fa fa-star-half-full estrellasdis"  ></i>
            </div>
            </div>
              <div class="sep">
              </div>
                <div class="centradoprecio flex justify-between mb-3 text-sm">
                  <span class="spanpr"><h3>Precio<h3><br></span>
                  <span><h3 class="precio"> <?php echo MONEDA. number_format($precio,2,'.',','); ?><h3></span>
              </div>
                <div class="flex justify-between font-bold pt-2 mt-2 mb-2 border-t border-gray-500">
                  <span">INCLUYE:</span>
                  <ul>
                    <li><?php echo $detallesmc ?></li>
                  </ul>
              </div>
                  <p>CANTIDAD:<br>
                    <a href=""  class="btn btn-default" onlcick=subc();>
                    <i class="fa fa-minus-circle compra"></i>
                    </a>
                    <input type="number" min="1" value="1"  class="btn btn-default incant w-10">
                    <a href=""  class="btn btn-default" onlcick=subc();>
                    <i class="fa fa-plus-circle compra" ></i>
                    </a>
                  </p>
                    <div class="centrado">
                      <button class="btn btn-primary" type="button">Comprar ahora</button>
                      <button class="btn btn-outline-primary" type="button" 
                      onclick="addProducto(<?php echo $id;?>,'<?php echo $token_tmp;?>')">Agregar al carrito</button>
                    </div>
                  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function addProducto(id,token){
      let url='clases/carrito.php'
      let formData = new FormData();
      formData.append('id',id)
      formData.append('token',token)

      fetch(url,{
        method: 'POST',
        body: formData,
        mode: 'cros'
      }).then(response => response.json())
      .then(data => (
        if(data.ok){
          let elemento = documento.getElement
        }
      ))
    }
  </script>

  <!--COMENTARIOS-->
  <div class="bloques">
    <div class="col-12">
      <div class="row mb-2">
        <div class="col-md-8">
          <div class="box">
            <div class="row mb-5 estrellas p-4">
              <h4>Productos relacionados</h4>
              <div class="text-center">
                <div class="row">
                    <?php foreach($prod as $row){?>
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
                                <h4><?php echo MONEDA.  number_format($row['ap_precio'],2,'.',','); ?></h4>
                               
                            </div>
                            
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="row mb-2">
            <div class="col-mb-3">
              <span><h4>Opiniones</h4></span>
              <div class="box p-4">
              <form action="">
                      <div class="parse text-pform mb-2">
                        <input class="form-control entradatexto" type="text" name="nombre" id="nombre" onblur="checkf();"  placeholder="Nombre" required/>
                      </div>
                      <div class="parse text-pform mb-2">
                        <textarea class="form-control"name="" id="" cols="30" rows="2"placeholder="Mensaje" required></textarea>
                      </div>
                      <div class="col-12 centrado">
                        <button style="background-color: #a6d0fc;border-color: #a6d0fc;" class="btn btn-primary text-dark" id="enviarc" type="submit" >Enviar</button>
                      </div>
              </form>
              </div>
            </div>
            <div class="col-mb-2 p-2">
              <div class="row mb-2">
                  <div class="col-mb-3 centrado ">
                    <img src="../public/imagenes/perfil.png" width="15%" height="40%" alt="">
                  </div>
                  <div class="col-mb-4">
                    <h6>Ana Karen</h6>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem dolores suscipit hic non nobis necessitatibus doloribus veniam nihil maxime numquam quisquam eligendi aliquid saepe atque exercitationem totam esse, vel ipsa.</p>
                  </div>
              </div>
            </div>
          </div>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
    
<?php
require 'footer.php';
?>