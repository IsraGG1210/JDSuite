<?php
require 'header.php';
require 'Conexion/Database.php';

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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/owl.carousel.css">
  <link rel="stylesheet" href="../public/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../public/css/owl.theme.default.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
    integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>

  <div class="col-12 card" id="videoi">
    <div class="embed-responsive embed-responsive-16by9 mx-auto">
      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/LXg1Y7qGsiY?autoplay=1&mute=1"
        allowfullscreen></iframe>
    </div>
  </div>


  <!--Seccion de los logos de  los producto-->
  <section id="productos" class="productos section-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <a href="JD_Store.php"><img src="https://www.jdsuite.mx/images/store.png" class="img-fluid" alt=""></a>
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <a href="JDRest.php"><img src="https://www.jdsuite.mx/images/rest.png" class="img-fluid" alt=""></a>
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <a href="JD_Invoice.php"> <img src="https://www.jdsuite.mx/images/invoice.png" class="img-fluid" alt=""></a>
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <a href="JDEcomm.php"> <img src="https://www.jdsuite.mx/images/ecomm.png" class="img-fluid" alt=""></a>
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <a href="JD_tae.php"> <img src="https://www.jdsuite.mx/images/tae.png" class="img-fluid" alt=""></a>
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="https://www.jdsuite.mx/images/ceo.png" class="img-fluid" alt="">
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
              <a href="JDStore.php" class="stretched-link">
                <center>
                  <button class="btnmasinfo paddbot2">Conocer más</button>
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
                  <button class="btnmasinfo paddbot2">Conocer más</button>
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
              <a href="JDInvoice.php" class="stretched-link">
                <center>
                  <button class="btnmasinfo paddbot2">Conocer más</button>
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
                  <button class="btnmasinfo paddbot2">Conocer más</button>
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
              <a href="JDTae.php" class="stretched-link">
                <center>
                  <button class="btnmasinfo paddbot2">Conocer más</button>
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
                  <button class="btnmasinfo paddbot2">Conocer más</button>
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


  <!--Carousel OWL-->
  <div class="owl-carousel owl-theme">
    <?php foreach ($resultado as $row) { ?>
    <div class="item">
      <div class="py-4 text-center justify-content-center card"><a href=""><img
            src="https://www.jdshop.mx/productos/<?php echo $row['rutaimagen'];?>" alt=""></a>
        <div class="card-body" style="-webkit-line-clamp: 4;">
          <h4 id="descpro">
            <?php echo $row['a_nmb']; ?>
          </h4>
          <h2>
            <?php echo MONEDA. $row['ap_precio']; ?>
          </h2>
          <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>



  <!--Carrusel de prductos-->

  <script>
    $('.owl-carousel').owlCarousel({
      stagePadding: 50,
      loop: true,
      autoplay: true,
      autoplayTimeout: 2000,
      margin: 10,
      nav: true,
      dots: true,
      navText: [
        '<br><i class="fas fa-chevron-circle-left fa-2xl" style="font-size:32px;" aria-hidden="true"></i>',
        '<br><i class="fas fa-chevron-circle-right fa-2xl" style="font-size:32px;" aria-hidden="true"></i>'
      ],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 5
        }
      }
    })
  </script>

  <!--PARTE DE WHATS-->
  <div class="msgwh">
    <a href="https://wa.me/5215539488047?text=Hola, necesito información sobre " target="_blank">
      <img src="../public/imagenes/whatsapp.png" alt="" style="width: 100%;" />
    </a>
  </div>




</body>

</html>
<?php
require 'footer.php';
?>