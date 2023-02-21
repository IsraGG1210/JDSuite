<?php
include('header.php');
require 'Conexion/config.php';
require 'Conexion/Database.php';

  $db = new Database();
  $con = $db->conectar();

  $sql = $con->prepare("SELECT a_cb,a_nmb, concat(i_nmb,'.',i_ext)as rutaimagen , ap_precio
      from articulosw 
      inner join imagenes on aw_cb = i_idproducto
      inner join articulos_precios on aw_id = ap_articulo and ap_esquema = 1
      inner join articulos on a_cb = aw_cb
      where a_lineaneg = 6
      limit 30");
  $sql->execute();
  $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!--CONTENT VIDEO-->
<div class="col-12 imgbgst">
  <div class="row mb-2">
    <div class="col-md-8 ">
      <img src="../public/imagenes/jd-store.png" style="width:200px; heidht=150px;" alt="" />
    </div>
    <div class="col-md-4">
      <div class=" form-servicioslS" style="background-color: #2B4B6B;">
        <div class="text-servicioslp">
          <i>Facturación Electrónica</i>
          <p style="color:white;">Con la nueva version 3.3 de CFDI</p>
        </div>
      </div>
    </div>
  </div>
</div>


<!--OPCIONES DE TARJETAS-->
<div class="bloques padingbottom">
  <div class="row align-items-md-stretch">
    <div class="col-md-4">
      <div class="color h-80 p-5 rounded-3">
        <h4>¿Cómo vender en JD Store?</h4>
        <p>JD Store es una herramienta muy potente que te da la oportunidad de administrar toda la información que tu
          empresa genera, si tu internet llega a fallar, no te preocupes, tu sistema JD Store sigue funcionando y
          puedes continuar con tus cobros.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="yout rounded-3">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/6cODf3b8tEA" title="YouTube video player"
          frameborder="0" allowfullscreen
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share">
        </iframe>
      </div>
    </div>
    <div class="col-md-4">
      <div class="color h-80 p-5 rounded-3">
        <h4>Funciona para cualquier giro</h4>
        <p>Es aplicable para una gran gama de giros, controla tus inventarios, ventas, compras y gestiona tus clientes
          y te apoya a detectar áreas de oportunidad para tu negocio, es fácil de usar y ofrece herramientas avanzadas
          de administración y operación, brinda información que simplifica la administración de tu negocio.

          Descarga las características de tu Punto de Venta.</p>
      </div>
    </div>
    <div class="col-md-4 blo">
      <div class="">
        <img src="../public/imagenes/rstore.png" class="d-block " width="90%" height="90%" alt="...">
      </div>
    </div>
    <div class="col-md-4 blo">
      <div class="color h-80 p-5 rounded-3">
        <h4>Requisitos del sistema</h4>
        <p>Dependiendo de tu negocio y crecimiento tu equipo de cómputo debe ir mejorando, sin embargo, JD Store es
          ligero y se puede instalar en la mayoría de los equipos, por ello te mencionamos los requisitos mínimos que
          debe tener tu equipo, ya sea PC de escritorio o una laptop.</p>
      </div>
    </div>
    <div class="col-md-4 blo">
      <div class="w-100">
        <img src="../public/imagenes/store2.gif" width="100%" alt="">
      </div>
    </div>
    <div class="col-md-6 ">
      <div class="">
        <img src="../public/imagenes/cloud.png" class="d-block " height="250" alt="...">
      </div>
    </div>
    <br>
    <div class="col-md-6 ">
      <div class="color h-80 p-5 rounded-3">
        <h4>JD Cloud</h4>
        <p>Actualiza y víncula todas tus sucursales sin importar la distancia ni cantidad, JD Cloud te permitirá
          revisar los reportes de tus ventas desde tu smartphone mientras disfrutas de tu tiempo libre o en viajes de
          placer.

          * Se requiere una poliza de soporte para contar con este servicio.</p>
      </div>
    </div>
  </div>
</div><br>

<!--Carousel OWL-->
<div class="owl-carousel owl-theme">
  <?php foreach ($resultado as $row) { ?>
  <div class="item">
    <div class="py-4 text-center justify-content-center card"><a href=""><img
          src="https://www.jdshop.mx/productos/<?php echo $row['rutaimagen'];?>" alt=""></a>
      <div class="card-body">
        <span id="descpro">
          <?php echo $row['a_nmb']; ?> &nbsp &nbsp &nbsp &nbsp
        </span>
        <h2>
          <?php echo MONEDA. number_format($row['ap_precio'],2,'.',','); ?>
        </h2>
        <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<br>


<!--Carrusel de prductos-->



<!--TIPOS DE LICENCIA-->

<!--TIPOS DE LICENCIA-->
<div class="row">

  <!-- Column -->
  <div class="col-md-6 mb-6 d-flex align-items-stretch">

    <div class="tab-content" id="nav-tabContent">
      <h3>Tipos de licencia</h3>
      <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-servidor-tab" data-toggle="tab" href="#nav-servidor" role="tab"
            aria-controls="nav-servidor" aria-selected="true">Store Servidor</a>
          <a class="nav-item nav-link" id="nav-terminal-tab" data-toggle="tab" href="#nav-terminal" role="tab"
            aria-controls="nav-terminal" aria-selected="false">Store Terminal</a>
          <a class="nav-item nav-link" id="nav-farmacia-tab" data-toggle="tab" href="#nav-farmacia" role="tab"
            aria-controls="nav-farmacia" aria-selected="false">Servidor Farmacia</a>
          <a class="nav-item nav-link" id="nav-citas-tab" data-toggle="tab" href="#nav-citas" role="tab"
            aria-controls="nav-citas" aria-selected="false">Servidor Citas</a>
          <a class="nav-item nav-link" id="nav-reparto-tab" data-toggle="tab" href="#nav-reparto" role="tab"
            aria-controls="nav-reparto" aria-selected="false">Servidor Rutas de Reparto</a>
        </div>
      </nav>
       <!--Card Primary-->
       <div class="card indigo text-center z-depth-2">
        <div class="card-body">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active flex-1" id="nav-servidor" role="tabpanel"
              aria-labelledby="nav-servidor-tab">
              La licencia ideal para tu negocio. JD Store tipo Servidor contiene todos los módulos de tu sistema de
              Punto de Venta, podrás llevar el control y registro total de tu negocio, de los artículos, clientes,
              proveedores y demás, al mismo tiempo que tendrás a tu disposición los Reportes adecuados para tomar las
              decisiones que harán crecer tu negocio.
            </div>

            <div class="tab-pane fade flex-1" id="nav-terminal" role="tabpanel" aria-labelledby="nav-terminal-tab">
              Esta licencia es el complemento ideal para la tipo Servidor, ya que nos apoya a crecer nuestro negocio.
              Si cobrar en una caja ya no es suficiente es hora de que evoluciones y hagas crecer tu punto de venta.
              Al adquirir esta licencia podrás conectar otro equipo a tu JD Store, podrás tener dos cajeros operando
              de manera simultánea y controlar en su totalidad el sistema.
              *Requieres una licencia tipo Servidor para adquirir esta licencia
            </div>

            <div class="tab-pane fade flex-1" id="nav-farmacia" role="tabpanel" aria-labelledby="nav-farmacia-tab">
              Si tu giro es una farmacia entonces esta es la solución, JD Store tiene un modulo de farmacia que te
              permitirá gestionar tu venta de antibióticos.
              Si tienes un consultorio para potenciar tus ventas, JD Store tiene su modulo para registrar expedientes
              electrónicos de tus pacientes y emitir recetas desde el mismo sistema.
              Rota tu inventario con ayuda de tu doctor y registra los servicios prestados para que cumplas con los
              requerimientos de la secretaría de salud solicita.
            </div>
            <div class="tab-pane fade flex-1" id="nav-citas" role="tabpanel" aria-labelledby="nav-citas-tab">
              Tu propio calendario de ventas en el sistema es posible.
              Gestiona tus citas y clientes desde JD Store y dale seguimiento a una venta desde que se aparta y hasta
              que se vende.
              Da de alta cabinas de atención y responsables de atender, para que el sistema asigne actividades a tu
              personal.
              Gestiona anticipos de servicios y liquidaciones al realizarlos, esto te ayudará a asegurar la prestación
              del servicio.
            </div>
            <div class="tab-pane fade flex-1" id="nav-reparto" role="tabpanel" aria-labelledby="nav-reparto-tab">
              Si en tu empresa repartes a domicilio o generas rutas de entrega JD te ayuda a generar tus repartos de
              manera segura y sencilla.
              Maneja los estados de cuenta por cada cliente y administra cada productos que vendes sencillamente.
            </div>
            <!--/.Card Primary-->
          </div>
        </div>
      </div>
    </div>
  </div> <!-- Column -->

  <!-- Column -->
  <div class="col-md-6 mb-6 d-flex align-items-stretch">

    <!--Card Primary-->
    <div class="col-12 card info-color text-center z-depth-2">
      <div class="card-body">
        <h3>¡Ya estamos ahí!</h3>
        <div class="container" id="store">
          <div class="row">
            <div class="main-store main-center" style="height:100%;">
              <h4 class="text-center"><i class="far fa-edit fa-sm"> &nbsp </i>Completa el formulario</h4>
              <form class="" method="post" action="#">

                <div class="form-group">
                  <label for="name" class="cols-sm-2 control-label"><b>Nombre*</b></label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Ingresa tu nombre"
                        required />
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="cols-sm-2 control-label"><b>Correo*</b></label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="email" id="email" placeholder="Ingresa tu correo"
                        required />
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="pwd" class="cols-sm-2 control-label"><b>Celular*</b></label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-key" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="pwd" id="pwd" placeholder="Ingresa tu contraseña"
                        required />
                    </div>
                  </div>
                </div>

                <div class="form-group btnregistro">
                  <a href="#" target="_blank" type="button" id="button"
                    class="btn btn-primary btn-lg btn-block store-button">Registrate</a>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<br>
<br>
<!--PARTE DE PREGUNTAS-->
<div class="container-fluid col-12 padingbottom">
  <div class="row">
    <div class="col-12 col-md-6 tac2 blb">
      <h2 class="titjd2 tac">Tutoriales</h2>
      <p class="dsuite3">
        Generamos una serie de videos para facilitarte el uso de tu Punto de Venta “JD Store”. Conoce lo sencillo y
        rápido que es.
      </p>
      <center>
        <a href="https://www.youtube.com/watch?v=q1NM5De1JIM&list=PLCHufcZLZMIwcksYnpPP5zEN2TswT9JKz" target="_blank">
          <button class="btn btn-primary" style="background-color:#29A8B0;">Videotutoriales</button>
        </a>
      </center>
    </div>
    <div class="col-12 col-md-6  tac2 blb">
      <h2 class="titjd2 tac">FAQ's</h2>
      <div class="dsuitefaq">
        <!-- FAQs Acordein-->
        <div class="panel-group" id="accordion">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#">
                  ¿Cómo entregarán mi paquete?
                </a>
              </h4>
            </div>
            <div id="faq1" class="panel-collapse collapse">
              <div class="panel-body">
                Recibirás un correo por parte de nuestros especialistas para concretar una cita, de este modo ellos se
                encargarán de instalar tu sistema JD y configurarlo para tu primero uso.<br />
                Es importante que te mantengas atento a sus indicaciones. </div>
            </div>
          </div>
          <!-- /.panel -->
        </div>
        <div class="panel-group" id="accordion">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#">
                  ¿Puedo pagar con tarjeta de crédito a meses sin intereses?
                </a>
              </h4>
            </div>
            <div id="faq2" class="panel-collapse collapse">
              <div class="panel-body">
                Claro que si, en tu carrito de compra elije la opción Pago con tarjeta de crédito y con la seguridad
                de <b>Mercado Pago</b> podrás procesar tu pago diferido </div>
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
    <img src="../public/imagenes/whatsapp.png" alt="" style="width: 100%;" />
  </a>
</div>



<?php
include ('footer.php');
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
        items: 1
      },
      600: {
        items: 5
      },
      1000: {
        items: 6
      }
    }
  })
</script>