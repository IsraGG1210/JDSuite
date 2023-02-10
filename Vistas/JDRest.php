<?php
require 'header.php';
require 'Conexion/config.php';
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


<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
  integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
  integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
  integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
  integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--===================================-->


<!--===================================-->


<!--Video de presentacion-->
<div id="video-carousel-example2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!-- First slide -->
    <div class="carousel-item active">
      <!--Mask color-->
      <div class="view">
        <!--Video source-->
        <video class="video-fluid embed-responsive embed-responsive-21by9" autoplay loop muted>
          <source src="../public/videos/Video1.mp4" type="video/mp4" />
        </video>
        <div class="mask rgba-indigo-light"></div>
      </div>

      <!--Caption-->
      <div class="carousel-caption">
        <div class="animated fadeInUp">
          <h2 class="h2-responsive d-none d-sm-block">Sistema de Administración para Restaurantes y Bares</h2>
        </div>
      </div>
      <!--Caption-->
    </div>
    <!-- /.First slide -->
  </div>
  <!--/.Slides-->
</div>
<!--Video de presentacion-->

<br>


<!--Seccion del acordeon y carrusel de imagenes de presentacion-->
<div class="d-flex justify-content-center">
  <div class="accordion col-md-8 col-sm-12" id="accordionExampleY">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOneY">
        <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseOneY"
          aria-expanded="true" aria-controls="collapseOneY">
          <i class="fas fa-question-circle fa-lg me-2 opacity-70"></i>
          <h3>¿Que es JD Rest?</h3>
        </button>
      </h2>
      <div id="collapseOneY" class="accordion-collapse collapse show" aria-labelledby="headingOneY"
        data-mdb-parent="#accordionExampleY">
        <div class="accordion-body text-justify">
          Un potente Punto de Venta para tu negocio de alimentos, gestiona fácilmente tus ventas y sin
          importar el tamaño de tu negocio, te apoya a simplificar tus órdenes a través de una interfaz
          intuitiva y diseñada para optimizar tiempos.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwoY">
        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
          data-mdb-target="#collapseTwoY" aria-expanded="false" aria-controls="collapseTwoY">
          <i class="fas fa-globe fa-lg me-2 opacity-70"></i>
          <h3>Funciona para cualquier giro</h3>
        </button>
      </h2>
      <div id="collapseTwoY" class="accordion-collapse collapse" aria-labelledby="headingTwoY"
        data-mdb-parent="#accordionExampleY">
        <div class="accordion-body text-justify">
          JD Rest se adapta al tamaño y giro de tu Empresa. Controla las diferentes zonas operativas
          como: Cajas, Bar, Cocina, Comandas y más.
          <br>Nos interesa que tengas la seguridad de que el manejo de tu dinero y de tus insumos, este
          administrado de una manera segura. Para que tú solo te enfoques
          a donde abrirás tu próxima sucursal o de disfrutar tus vacaciones.<br>
          <center>
            <button class="btn btn-primary" style="background-color:<?php echo $bg ?>;">Mas Caracteristicas</button>
          </center>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThreeY">
        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
          data-mdb-target="#collapseThreeY" aria-expanded="false" aria-controls="collapseThreeY">
          <i class="fa-sharp fa-solid fa-list fa-lg me-2 opacity-70"></i>
          <h3>Requisitos del sistema</h3>
        </button>
      </h2>
      <div id="collapseThreeY" class="accordion-collapse collapse" aria-labelledby="headingThreeY"
        data-mdb-parent="#accordionExampleY">
        <div class="accordion-body text-justify">
          Dependiendo de tu negocio y crecimiento tu equipo de cómputo debe ir mejorando, sin embargo,
          JD Rest es ligero y se puede instalar en la mayoría de los equipos, por ello te mencionamos
          los requisitos mínimos que debe tener tu equipo, ya sea PC de escritorio o una laptop. <br>
          • Procesador a 2.5 GHz. <br>
          • 4 GB de RAM. <br>
          • 5 GB de espacio libre en disco duro. <br>
          • Windows 10.
        </div>
      </div>
    </div>
  </div>
  <!--Carrusel de imagenes de caracteristicas-->
  <div class="carousel slide col-md-4 d-none d-lg-block" id="carruselRest" data-bs-ride="carousel">
    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="5000">
        <img src="../public/imagenes/rest1.jpg" alt="rest1" class="d-block">
      </div>
      <div class="carousel-item" data-bs-interval="5000">
        <img src="../public/imagenes/rest2.gif" alt="rest2" class="d-block">
      </div>
      <div class="carousel-item" data-bs-interval="5000">
        <img src="../public/imagenes/rstore.png" alt="rstore" class="d-block">
      </div>
    </div>
  </div>
</div>
</div>
<br>

<!--Productos JD Rest-->
<div class="text-center">
  <h1>Paquetes JD Rest</h1>
</div>
<br>
<br>
<br>
<div class="carousel-wrapper">
  <div class="owl-carousel owl-theme">
    <?php foreach ($resultado as $row) { ?>
      <div class="item">
        <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB000014732599.webp"
              alt=""></a>
              <div class="card-body" style="-webkit-line-clamp: 4;">
                <h4 id="descpro">
                  <?php echo $row['a_nmb']; ?>
                </h4>
                <h2>
                  <?php echo MONEDA. number_format($row['ap_precio'],2,'.',','); ?>
                </h2>
                <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
              </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<script>
  $('.owl-carousel').owlCarousel({
    stagePadding: 50,
    loop: true,
    autoplay: true,
    autoplayTimeout: 2000,
    margin: 10,
    nav: true,
    navText: [
      '<br><i class="fas fa-chevron-circle-left fa-2xl" style="font-size:32px;" aria-hidden="true"></i>',
      '<br><i class="fas fa-chevron-circle-right fa-2xl" style="font-size:32px;" aria-hidden="true"></i>'],
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
<!--Licencias JD Rest-->
<div class="accordion col-md-10 col-sm-12" id="accordionExampleY">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOneY">
      <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseOneY"
        aria-expanded="true" aria-controls="collapseOneY">
        <i class="fas fa-server fa-lg me-2 opacity-70"></i></i>
        <h3>Licencia Rest Tipo Servidor</h3>
      </button>
    </h2>
    <div id="collapseOneY" class="accordion-collapse collapse show" aria-labelledby="headingOneY"
      data-mdb-parent="#accordionExampleY">
      <div class="accordion-body text-justify">
        Una licencia vitalicia para uso del sistema JD Rest, en tu servidor, permite el uso de todos los módulos
        y funciones que lo componen, en él podrás gestionar los insumos, recetas, meseros y mucho más de tu restaurant.
        Para controlar los ingresos a tus cajas, envío de comandas por los pedidos de clientes, de manera super fácil
        y rápida, controla el inventario y su rotación, un gran apoyo para tu administración y contabilidad de materia
        prima, así como ingresos y salidas de efectivo derivados de tu restaurant.
        La licencia tipo servidor de JD Rest, funciona para un equipo y puede crecer mediante licencias terminal para
        conectar un
        kiosco, tableta, algún otro equipo de computo para crecer tu negocio de alimentos, es usable para negocios de
        cocina pequeños,
        restaurantes, cocinas económicas, tiendas de comida rápida y para llevar, entre otros. <br>
        Con sus principales módulos: <br>
        • Mesas y mapa de mesas <br>
        • Cajas, ingresos y egresos <br>
        • Clientes y facturación <br>
        • Proveedores <br>
        • Compras <br>
        • Materia prima <br>
        • Recetas <br>
        • Reservaciones <br>
        • Meseros <br>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwoY">
      <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#collapseTwoY" aria-expanded="false" aria-controls="collapseTwoY">
        <i class="fa-solid fa-desktop fa-lg me-2 opacity-70"></i>
        <h3>Licencia Rest tipo Terminal</h3>
      </button>
    </h2>
    <div id="collapseTwoY" class="accordion-collapse collapse" aria-labelledby="headingTwoY"
      data-mdb-parent="#accordionExampleY">
      <div class="accordion-body text-justify">
        La licencia tipo terminal es una extensión para JD Rest, contrata una licencia tipo terminal por
        cada dispositivo que tengas en tu negocio de alimentos, accede a cada una de las funciones que
        tiene el sistema a través de otra terminal conectada a tu red interna, para que así aumentes la
        productividad de tu negocio, mejora la comodidad de tu personal a través de licencias tipo terminal,
        JD Rest crece al tamaño de tu negocio.

      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThreeY">
      <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#collapseThreeY" aria-expanded="false" aria-controls="collapseThreeY">
        <i class="fa-brands fa-youtube fa-lg me-2 opacity-70"></i>
        <h3>Tutoriales</h3>
      </button>
    </h2>
    <div id="collapseThreeY" class="accordion-collapse collapse" aria-labelledby="headingThreeY"
      data-mdb-parent="#accordionExampleY">
      <div class="accordion-body text-justify">
        Generamos una serie de videos para facilitarte el uso de tu Punto de Venta para Restaurantes “JD Rest”.
        Conoce lo sencillo y rápido que es.
        <br>
        <center>
          <a href="#"><button class="btn btn-primary" style="background-color:#29A8B0;">Videotutoriales</button></a>
        </center>

      </div>
    </div>
  </div>
</div>
<!--/Licencias JD Rest-->
<br>



<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>





<?php
require 'footer.php'
  ?>