<?php
require 'header.php';
require 'Conexion/Database.php';

$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT a_nmb,a_unidad FROM articulos limit 25");
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
<!--=======================-->
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
  <div class="text-center">
    <h1>Paquetes JD Invoice</h1>
</div>
<br>
<br>
<br>
  <!--Carousel OWL-->
  <div class="carousel-wrapper">
  <div class="owl-carousel owl-theme">
    <?php foreach ($resultado as $row) { ?>
      <div class="item">
        <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB000014732599.webp"
              alt=""></a>
          <div class="card-body">
            <h5 color-text="blue">
              <?php echo $row['a_nmb']; ?>
            </h5>
            <h2>$
              <?php echo $row['a_unidad']; ?>
            </h2>
            <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
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
        navText:[
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
require 'footer.php';
?> 