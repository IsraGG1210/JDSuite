<?php
require 'header.php';
require 'Conexion/config.php';
require 'Conexion/Database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
</head>

<?php
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

<body>

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
                <p>Desde $ 3,999.00</p>
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
 <div class="lip">
    <center>
    <div class="col-md-8 ">
      <h2>Preguntas frecuentes</h2>
      <div class="lip">
        <a class="btn btn-primary w-100" data-toggle="collapse" href="#collapseim" role="button" aria-expanded="false" aria-controls="collapseim">
        <i class="fa fa-sort-desc" style="font-size:24px"></i>¿Como implemento Invoice?
        </a>
        <div class="collapse" id="collapseim">
            <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
        </div>
      </div>
      <div class="lip">
        <a class="btn btn-primary  w-100" data-toggle="collapse" href="#collapseben" role="button" aria-expanded="false" aria-controls="collapseben">
        <i class="fa fa-sort-desc" style="font-size:24px"></i>¿Qué beneficios tengo con TAE?
        </a>
        <div class="collapse" id="collapseben">
            <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
        </div>
      </div>
    </div>
    </center>
  </div>

</body>

</html>
<?php
include('footer.php');
?> 