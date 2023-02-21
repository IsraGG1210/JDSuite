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
        where a_lineaneg = 5
        limit 30");
  $sql->execute();
  $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>



 <!--CONTENT VIDEO-->
 <div class="col-12 imgbgst">
    <div class="row mb-2">
      <div class="col-md-8 ">
      <img src="../public/imagenes/jd-invoice.png" height="150px"width="200px" alt=""/>
      </div>
      <div class="col-md-4">
        <div class=" form-servicioslS">
            <div class="text-servicioslp">
              <i>La navaja suiza de los puntos de venta</i>
              <p>¡Adquierelo ahora mismo!</p>
                <p style="color:white;">Desde $ 3,999.00</p>
            </div>
          </div>
      </div>
    </div>
  </div>

 <br>
<!--INFORMACION DE TARJETAS-->
<div class="container-fluid">
        <div class="col-12">
            <div class="row mb-2">
            <div class="col-md-6 wid">
                <div class="vid">
                    <iframe  width="100%" height="315"  src="https://www.youtube.com/embed/OMiGNTdC1y4" title="YouTube video player" 
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="lip border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <h5>¿Que es JD Invoice?</h5>
                    <p>
                     JD Invoice es un software que cubre con todas las necesidades de Facturación Electrónica de manera fácil, rápida y segura.
                     JD Invoice cuenta con el servicio de Impuestos locales y Addendas. Complementos para Notarios, INE, Coordinados, Comercio Exterior.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="righ w-100">
                <div class="">
                    <img src="../public/imagenes/invoice2.gif" width="65%"  alt="">
                </div> 
                </div>
                <div class="center">
                    <h3 style="font-size: x-large; color:white;">Funciona para cualquier giro</h3>
                    <p style="font-size: x-large; color:white;">
                    Podrás emitir facturas, notas de crédito, cartas porte, recibos de honorarios y ahora también con un mismo paquete emite tus complementos de pago.
                    Almacena tus facturas sin costo extra sin importar el tiempo, nuestra potente nube te ayuda a resguardar tu información de forma segura.
                    Descarga las características.
                    </p>
                    <button class="btn btn-primary">Características</button>
                </div>
            </div>
        </div>
    </div>
</div>


  <div class="text-center">
    <h1>Paquetes JD Invoice</h1>
</div>
<br>
<br>
<br>
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



  <!--Carrusel de prductos-->

  


  <!--TUTORIALES--> 
  <div class="lip">
    <div class="fondoInvoice border rounded overflow-hidden p-4 flex-md-row mb-4 shadow-sm h-md-250 position-relative">
      <div class="col-12">
        <div class="row mb-2">
          <div class="col">
            <div class="row mb-2">
                <div class="col-md-3" style="color: white;">
                <h4>Tutoriales</h4>
                <p style="font-size: x-large;">
                Generamos una serie de videos para facilitarte el uso de tu Facturador Electrónico “JD Invoice”. Conoce lo sencillo y rápido que es facturar.
                </p>
                <a href="https://www.youtube.com/watch?v=XzBEF-WqgyY&embeds_euri=http%3A%2F%2Flocalhost%2F&feature=emb_imp_woyt">
                <button class="btn btn-primary" >Ver mas videos</button>
                </a>
              </div>
              <div class="col-md-9">
              <center>
              <iframe width="70%" height="315" src="https://www.youtube.com/embed/XzBEF-WqgyY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </center>
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


 <!--Preguntas--> 
 <div class="centrado">
 <div class="accordion col-md-8 col-sm-12" id="accordionExamP">
    <center>
    <div class="accordion-item ">
      <h2>Preguntas frecuentes</h2>
      <div class="lip">
      <h2 class="accordion-header" id="headingOneY">
        <a  type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseOneY"
          aria-expanded="false" aria-controls="collapseOneY">
          <h3>¿Como implemento JD Invoice?</h3>
          <i class="fa fa-sort-desc" style="font-size:24px"></i>
              </a>
      </h2>
      <div id="collapseOneY" class="accordion-collapse collapse " aria-labelledby="headingOneY"
        data-mdb-parent="#accordionExampleY">
        <div class="accordion-body text-justify">
          Un potente Punto de Venta para tu negocio de alimentos, gestiona fácilmente tus ventas y sin
          importar el tamaño de tu negocio, te apoya a simplificar tus órdenes a través de una interfaz
          intuitiva y diseñada para optimizar tiempos.
        </div>
      </div>
      </div>
      <div class="lip">
      <h2 class="accordion-header" id="headingOneY">
        <a  type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseOne"
          aria-expanded="false" aria-controls="collapseOne">
          <h4>¿Que beneficios tengo con JD Invoice?</h4>
          <i class="fa fa-sort-desc" style="font-size:24px"></i>
              </a>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne"
        data-mdb-parent="#accordionExampleY">
        <div class="accordion-body text-justify">
          Un potente Punto de Venta para tu negocio de alimentos, gestiona fácilmente tus ventas y sin
          importar el tamaño de tu negocio, te apoya a simplificar tus órdenes a través de una interfaz
          intuitiva y diseñada para optimizar tiempos.
        </div>
      </div>
      </div>
    </div>
    </center>
  </div>

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
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 6
        }
      }
    })
  </script>