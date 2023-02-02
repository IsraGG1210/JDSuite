<?php
require 'header.php'

?>


<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet">
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet">
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
  rel="stylesheet">
 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  
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
          <h2 class="h2-responsive">Sistema de Administración para Restaurantes y Bares</h2>
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
      <button class="accordion-button" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#collapseOneY" aria-expanded="true" aria-controls="collapseOneY">
        <i class="fas fa-question-circle fa-lg me-2 opacity-70"></i><h3>¿Que es JD Rest?</h3>
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
        <i class="fas fa-globe fa-lg me-2 opacity-70"></i><h3>Funciona para cualquier giro</h3>
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
      <button class="btn btn-primary"style="background-color:<?php echo $bg?>;">Mas Caracteristicas</button>
      </center>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThreeY">
      <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#collapseThreeY" aria-expanded="false" aria-controls="collapseThreeY">
        <i class="fa-sharp fa-solid fa-list fa-lg me-2 opacity-70"></i><h3>Requisitos del sistema</h3>
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
<div class="carousel-inner" id="productosRest" >
    <div class="carousel-item active">
      <div class="row">
        <div class="col">
          <div class="py-4 text-center card" <?php echo 'style="box-shadow:10px 10px 7px '.$bg.' "'; ?>><a href="#"><img src="https://www.jdsuite.mx/productos/CB0000001412.jpg" alt=""></a>
              <div class="card-body" >
                <h3 color-text="blue">JD REST LICENCIA TIPO SERVIDOR</h3>
                <h2>$5,999.00</h2>
                <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
              </div>
          </div>

        </div>
        <div class="col">
          <div class="py-4 text-center card" <?php echo 'style="box-shadow:10px 10px 7px '.$bg.' "'; ?>><a href="#"><img src="https://www.jdsuite.mx/productos/CB0000001513.jpg" alt=""></a>
                <div class="card-body">
                  <h3 color-text="blue">JD REST LICENCIA TIPO TERMINAL</h3>
                  <h2>$749.00</h2>
                <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
              </div>
          </div>
        </div>
        <div class="col">
          <div class="py-4 text-center card" <?php echo 'style="box-shadow:10px 10px 7px '.$bg.' "'; ?>><a href=""><img src="https://www.jdsuite.mx/productos/CB000009921550.peg" alt=""></a>
                <div class="card-body">
                  <h3 color-text="blue">POLIZA DE SOPORTE Y ASESORIA (12 MESES)</h3>
                  <h2>$1,499.00</h2>
                <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!--/Productos JD Rest-->


<!--Licencias JD Rest-->
<div class="accordion col-md-10 col-sm-12" id="accordionExampleY">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOneY">
      <button class="accordion-button" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#collapseOneY" aria-expanded="true" aria-controls="collapseOneY">
        <i class="fas fa-server fa-lg me-2 opacity-70"></i></i><h3>Licencia Rest Tipo Servidor</h3>
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
      La licencia tipo servidor de JD Rest, funciona para un equipo y puede crecer mediante licencias terminal para conectar un
      kiosco, tableta, algún otro equipo de computo para crecer tu negocio de alimentos, es usable para negocios de cocina pequeños,
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
        <i class="fa-solid fa-desktop fa-lg me-2 opacity-70"></i><h3>Licencia Rest tipo Terminal</h3>
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
        <i class="fa-brands fa-youtube fa-lg me-2 opacity-70"></i><h3>Tutoriales</h3>
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