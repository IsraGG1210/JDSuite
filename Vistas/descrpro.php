<?php
require 'Conexion/config.php';
require 'Conexion/Database.php';
include('header.php');

$db = new Database();
$con = $db->conectar();

$idp= isset($_GET['p']) ? $_GET['p'] : NULL;
$token= isset($_GET['token']) ? $_GET['token'] :NULL;


if($idp == '' || $token ==''){
    echo ' Error al procesar la peticion';
    exit;
}else{
    $token_tmp = hash_hmac('sha1',$idp, KEY_TOKEN);

    if($token == $token_tmp){
            $sql = $con->prepare("SELECT COUNT(a_cb)
              FROM articulosw
              INNER JOIN imagenes on  aw_cb = i_idproducto
              INNER JOIN articulos_precios on aw_id = ap_articulo and ap_esquema = 1 and ap_activo=1
              INNER JOIN articulos on a_cb = aw_cb WHERE a_cb=?");
            $sql->execute([$idp]);

            if($sql->fetchColumn()>0){
                $sql = $con->prepare("SELECT COUNT(a_cb),a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio, aw_detallesp, aw_detallesmc
                    FROM articulosw
                    INNER JOIN imagenes on  aw_cb = i_idproducto
                    INNER JOIN articulos_precios on aw_id = ap_articulo and ap_esquema = 1 and ap_activo=1
                    INNER JOIN articulos on a_cb = aw_cb WHERE a_cb=?");
                $sql->execute([$idp]);
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
        $sqlpr = $con->prepare('SELECT a_cb,a_nmb, concat(i_nmb,".",i_ext)as rutaimagen , ap_precio
                FROM articulosw 
                INNER JOIN imagenes on aw_cb = aw_cb and aw_cb = i_idproducto
                INNER JOIN articulos_precios on aw_id = ap_articulo and ap_esquema = 1
                INNER JOIN articulos on a_cb = aw_cb
                WHERE a_cb != "'.$idp.'"
                limit 10');
        $sqlpr->execute();
        $prod = $sqlpr->fetchAll(PDO::FETCH_ASSOC);
        
?>


<!--FORMULARIO/VERIFICACION-->
<div class="bloques" style="background: white; border-radius: 5px;">
  <div class="col-12">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              
              <div class="carousel-item active">
                <img src="https://www.jdshop.mx/productos/<?php echo $row['rutaimagen'] ?>" class="d-block w-100"
                  alt="<?php echo $row['a_nmb']?>">
              </div>
              <div class="carousel-item">
                <img src="https://www.jdshop.mx/productos/<?php echo $imagen ?>" class="d-block w-100" alt="<?php echo $row['a_nmb']?>">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <a href="" class="centrado">
          <i class="fa fa-bookmark" style="color: #a6d0fc; font-size:24px;"> </i> <span>Se encuentra en: </span> <span>
            JD REST</span>
        </a>
      </div>
      <div class="col-md-7">
        <div class=" lip row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <h5><?php echo $nombre; ?></h5>
          <input type="hidden" id="nombre" value="<?php echo ($nombre);?>">

          <div class="logo">
            <div class="estrellas">
              <i class="fa fa-star estrellasdis"></i>
              <i class="fa fa-star estrellasdis"></i>
              <i class="fa fa-star estrellasdis"></i>
              <i class="fa fa-star estrellasdis"></i>
              <i class="fa fa-star-half-full estrellasdis"></i>
            </div>
          </div>
          <div class="centradoprecio flex justify-between mb-3 text-sm">
            <span>
              <h5 class="precio"> <?php echo MONEDA. number_format($precio,2,'.',','); ?><h5>
            </span>
            <input type="hidden" id="precio" value="<?php echo ($precio); ?>" />
            <input type="hidden" id="descuento" value="0" />
            <p>Modelo:<?php echo ($idp);?> </p>
            <input type="hidden" id="id" value="<?php echo ($idp);?>">

          </div>
          <div class="flex justify-between font-bold pt-2 mt-2 mb-2 border-t border-gray-500">
            <span">INCLUYE:</span>
              <ul>
                <li><?php echo $detallesmc ?></li>
              </ul>
          </div>
          <div class="centrado">
            <p>CANTIDAD:<br>
              <a class="btn btn-default" onclick="subc();"><i class="fa fa-minus compra"></i></a>
              <input type="number" name="cantidad" id="cantidad" min="1" value="1" class="btn btn-default"
                onchange="changecant();" style="width: 25%;">
              <a class="btn btn-default" onclick="addc();"><i class="fa fa-plus compra"></i></a>

            </p>
          </div>
          <div class="centrado">
            <p class="text-center buttons ">
              <a class="btn btn-success" style="color:white;"><i class="fa fa-shopping-cart"></i> Comprar</a>
              <a id="cart" class="btn btn-primary" style="color:white;" onclick="addToCart('<?php echo ($idp);?>')"><i class="fa fa-shopping-cart"></i> Añadir a
                carrito</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
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
                      <a
                        href="descrpro.php?p=<?php echo $row['a_cb']; ?>&token=<?php echo hash_hmac('sha1',$row['a_cb'],KEY_TOKEN); ?>">
                        <img src="https://www.jdshop.mx/productos/<?php echo $row['rutaimagen'];?>" class="w-100" alt="<?php echo $row['a_nmb']?>" />
                        <div class="mask">
                        </div>
                        <div class="hover-overlay">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </div>
                        <div class="card-body">
                          <h5 id="descpro" class="card-title mb-2"><?php echo $row['a_nmb']; ?></h5>
                        </div>
                      </a>
                      <h4><?php echo MONEDA.  number_format($row['ap_precio'],2,'.',','); ?></h4>
                      <a id="cart" class="btn btn-primary" onclick="addToCartCarousel('<?php echo $row['a_cb'];?>')"><i class="fas fa-shopping-cart"></i>Agregar</a>
                    </div>
                  </div>
                </div>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--PRODUDCTOS RELACIONADOS -->
      <div class="col-md-4">
        <div class="row mb-2">
          <div class="col-mb-3">
            <span>
              <h4>Opiniones</h4>
            </span>
            <div class="box p-4">
              <form action="">
                <div class="parse text-pform mb-2">
                  <input class="form-control entradatexto" type="text" name="nombre" id="nombre" onblur="checkf();"
                    placeholder="Nombre" required />
                </div>
                <div class="parse text-pform mb-2">
                  <textarea class="form-control" name="" id="" cols="30" rows="2" placeholder="Mensaje"
                    required></textarea>
                </div>
                <div class="col-12 centrado">
                  <button style="background-color: #a6d0fc;border-color: #a6d0fc;" class="btn btn-primary text-dark"
                    id="enviarc" type="submit">Enviar</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-mb-2 p-2">
            <div class="row mb-2">
              <div class="col-mb-3 centrado ">
                <img src="#" width="15%" height="40%" alt="">
              </div>
              <div class="col-mb-4">
                <h6>Ana Karen</h6>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem dolores suscipit hic non nobis
                  necessitatibus doloribus veniam nihil maxime numquam quisquam eligendi aliquid saepe atque
                  exercitationem totam esse, vel ipsa.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
function addToCart(idp){
  document.getElementById("cart").disabled = true;
  precio = $("#precio").val();
  descuento = $("#descuento").val();
  talla = 0;
  color = 0;
  cantidad = $("#cantidad").val();
  p = idp;
  $.post("query/cookieadd.php",{
  precio: precio,
  descuento: descuento,
  talla: talla,
  colorsel: color,
  cantidad: cantidad,
  p: p
  },function(htmle){
  $.post("query/cantidadCart.php",{},
  function(htmlec){
  $("#carrito-cantidad").html('<i class="fas fa-shopping-cart"></i> '+htmlec);
  //alert ("Cantidad" + htmlec);
  });
  }); 
}
function addToCartCarousel(idp){
      document.getElementById("cart").disabled = true;
      precio = $("#precio"+idp).val();
      descuento = 0;
      talla = 0;
      color = 0;
      cantidad = 1;
      p = idp;
      $.post("query/cookieadd.php",{
      precio: precio,
      descuento: descuento,
      talla: talla,
      colorsel: color,
      cantidad: cantidad,
      p: p
      },function(htmle){
      $.post("query/cantidadCart.php",{},
      function(htmlec){
      $("#carrito-cantidad").html('<i class="fas fa-shopping-cart"></i> '+htmlec);
      //alert ("Cantidad" + htmlec);
      });
      }); 
      }
</Script>





<?php
require 'footer.php';
?>