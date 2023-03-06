<?php
require 'Conexion/config.php';
require 'Conexion/Database.php';
include('header.php');


if(!isset($_SESSION)) 
{ 
    session_start(); 
    $correo = $_SESSION['username'];
} 
if (!isset($_SESSION['id'])) {
  $_SESSION['id'] = uniqid();
}
$sesion = $_SESSION['id'];

  $db = new Database();
  $con = $db->conectar();

  $sql = $con->prepare("SELECT a_cb,a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio
      from articulosw 
      inner join imagenes on aw_cb = i_idproducto
      inner join articulos_precios on aw_id = ap_articulo and ap_esquema = 1
      inner join articulos on a_cb = aw_cb GROUP BY a_cb
      limit 30");
  $sql->execute();
  $row = $sql->fetch(PDO::FETCH_ASSOC);

                $idpcarousel = $row['a_cb'];
                $nombrecarousel = $row['a_nmb'];
                $imagen = $row['rutaimagen'];
                $precio = $row['ap_precio'];

  $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>




  <div class="col-12 card" id="videoi">
    <div class="ratio ratio-16x9">
      <iframe src="https://www.youtube.com/embed/LXg1Y7qGsiY?autoplay=1&mute=1"
        allowfullscreen></iframe>
    </div>
  </div>


  <!--Seccion de los logos de  los producto-->
  <section id="productos" class="productos section-bg">
    <div>
      <h2>NUESTROS PRODUCTOS</h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-4 col-6  align-items-center justify-content-center">
          <a href="JD_Store.php"><img src="https://www.jdsuite.mx/images/store.png" class="img-fluid" alt=""></a>
          <div>
            <h5>JD Store</h5>
          </div>
        </div>


        <div class="col-lg-2 col-md-4 col-6  align-items-center justify-content-center">
          <a href="JDRest.php"><img src="https://www.jdsuite.mx/images/rest.png" class="img-fluid" alt=""></a>
          <div>
            <h5>JD Rest</h5>
          </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6  align-items-center justify-content-center">
          <a href="JD_Invoice.php"> <img src="https://www.jdsuite.mx/images/invoice.png" class="img-fluid" alt=""></a>
          <div>
            <h5>JD Invoice</h5>
          </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6 align-items-center justify-content-center">
          <a href="JDEcomm.php"> <img src="https://www.jdsuite.mx/images/ecomm.png" class="img-fluid" alt=""></a>
          <div>
            <h5>JD Ecomm</h5>
          </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6 align-items-center justify-content-center">
          <a href="JD_tae.php"> <img src="https://www.jdsuite.mx/images/tae.png" class="img-fluid" alt=""></a>
          <div>
            <h5>JD TAE</h5>
          </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6  align-items-center justify-content-center">
          <img src="https://www.jdsuite.mx/images/ceo.png" class="img-fluid" alt="">
          <div>
            <h5>JD CEO</h5>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!--logos de los productos-->

  <!--CONTENT INFO DE BLOQUES-->
  <div class="bloques">
    <div class="col-12">
      <div class="row mb-2">
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">JD Store</strong>
              <h6 class="mb-0">¡Con JD Store obtienes lo que tú negocio necesita para crecer!</h6>
              <p class="card-text mb-auto">¡Tú Punto de Venta! Administra tus Ventas, inventarios y mucho más de manera
                rápida, fácil y segura.</p>
              <a href="JD_Store.php" class="stretched-link">
                <center>
                  <button class="btn btn-primary" style="background-color:#29A8B0;">Conocer más</button>
                </center>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <Img src="../public/imagenes/storei.jpg"></Img>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">JD Rest</strong>
              <h6 class="mb-0">¡Con JD Store obtienes lo que tú negocio necesita para crecer!</h6>
              <p class="card-text mb-auto">¡Con JD Rest agiliza y mejora la atención de tus clientes! Y no solo eso.</p>
              <a href="JDRest.php" class="stretched-link">
                <center>
                  <button class="btn btn-primary" style="background-color:#29A8B0;">Conocer más</button>
                </center>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <Img src="../public/imagenes/resti.jpg"></Img>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">JD Invoice</strong>
              <h6 class="mb-0">¡Con JD Invoice gana clientes al emitir Facturas!</h6>
              <p class="card-text mb-auto">¡Tú facturador electrónico! Comienza a facturar con nuestros paquetes de
                folios digitales.</p>
              <a href="JD_Invoice.php" class="stretched-link">
                <center>
                  <button class="btn btn-primary" style="background-color:#29A8B0;">Conocer más</button>
                </center>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <Img src="../public/imagenes/invoicei.jpg"></Img>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">JD Ecomm</strong>
              <h6 class="mb-0">¡JD Ecomm es tu propia tienda virtual!</h6>
              <p class="card-text mb-auto">¡Tú Punto de venta virtual! Entra al mundo digital y vende por internet
                mientras tu disfrutas de tu tiempo libre.</p>
              <a href="JDEcomm.php" class="stretched-link">
                <center>
                  <button class="btn btn-primary" style="background-color:#29A8B0;">Conocer más</button>
                </center>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <Img src="../public/imagenes/ecommi.jpg"></Img>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">JD TAE</strong>
              <h6 class="mb-0">¡JD TAE venta de tiempo aire y pago de servicios!</h6>
              <p class="card-text mb-auto">Gana dinero sin esfuerzo, vende recargas de tiempo aire y pago de servicios
                desde tu celular, no importa donde te encuentres..</p>
              <a href="JD_tae.php" class="stretched-link">
                <center>
                  <button class="btn btn-primary" style="background-color:#29A8B0;">Conocer más</button>
                </center>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <Img src="../public/imagenes/taei.jpg"></Img>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">JD CEO</strong>
              <h6 class="mb-0">¡Con JD CEO administra cada área y proceso que se lleva a cabo en tu empresa!</h6>
              <p class="card-text mb-auto">Es un poderoso ERP Vertical, escalable y adaptable que permite gestionar las
                operaciones de tu empresa.</p>
              <a href="JDCeo.php" class="stretched-link">
                <center>
                  <button class="btn btn-primary" style="background-color:#29A8B0;">Conocer más</button>
                </center>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <Img src="../public/imagenes/ceoi.png"></Img>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


  <br>
  <br>


  <!--Carousel  owl-carousel owl-theme-->
  <div class="owl-carousel owl-theme">
    <?php
    /* require_once 'Conexion/funciones.php';
    $sql = 'SELECT * from articulosw 
    inner join imagenes on aw_cb = i_idproducto
    inner join articulos_precios on aw_id = ap_articulo and ap_esquema = 1
    inner join articulos on a_cb = aw_cb
    limit 30';
     $result = setq($sql);
     while($row = $result->fetch_Array()){ */

    
    foreach ($resultado as $row) {
    ?>
    <div class="item">
      <div class="py-4 text-center justify-content-center card"><a href="descrpro.php?p=<?php echo $row['a_cb']; ?>&token=<?php echo hash_hmac('sha1',$row['a_cb'],KEY_TOKEN); ?>"><img
            src="https://www.jdshop.mx/productos/<?php echo $row['rutaimagen'];?>" alt=""></a>
        <div class="card-body">
          <span id="descpro">
            <?php echo $row['a_nmb']; ?> &nbsp &nbsp &nbsp &nbsp
          </span>
          <input type="hidden" id="nombre" value="<?php echo $row['a_nmb']; ?>" />
          
          <input type="hidden" id="idp" value="<?php echo $row['a_cb']; ?>" />
          <h4>
            <?php echo MONEDA. number_format($row['ap_precio'],2,'.',','); ?>
          </h4>
          <input type="hidden" id="precio<?php echo $row['a_cb']; ?>" value="<?php echo $row['ap_precio']; ?>" />
          <a id="cart" class="btn btn-primary" onclick="addToCartCarousel('<?php echo $row['a_cb'];?>')"><i class="fas fa-shopping-cart"></i>Agregar</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>

  <!--Carrusel de prductos-->
<br>
<script>
    function addToCartCarousel(idp){
    document.getElementById("cart").disabled = true;
    precio = $("#precio").val();
    descuento =0;
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
  </script>

  
  


  <!--PARTE DE WHATS-->
  <div class="msgwh">
    <a href="https://wa.me/5215539488047?text=Hola, necesito información sobre " target="_blank">
      <img src="../public/imagenes/whatsapp.png" alt="" style="width: 100%;" />
    </a>
  </div>


<?php
include('footer.php');
?>
 <script>
    $('.owl-carousel').owlCarousel({
      stagePadding: 50,
      loop: true,
      autoplay: true,
      autoplayTimeout: 2000,
      margin: 10,
      nav: false,
      dots: true,
      navText: [
        '<br><i class="fas fa-chevron-circle-left fa-2xl" style="font-size:32px;" aria-hidden="true"></i>',
        '<br><i class="fas fa-chevron-circle-right fa-2xl" style="font-size:32px;" aria-hidden="true"></i>'
      ],
      responsive: {
        0: {
          items: 1,
          dots: false
        },
        600: {
          items: 4
        },
        1000: {
          items: 6
        }
      }
    })
  </script>