
<?php
require 'header.php'?>
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



</head>
<body>

<!--Seccino video inicio-->
<!--<div class="col-12 imgindex">
    <div class="row">
      <div class="col-12 col-md-8 ">
        <figure>
          <a href="#" class="video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/LXg1Y7qGsiY">
            <img class="videoind" src="../public/imagenes/playv.png" width="300px"/>
          </a>
          </figure>
      </div>
     <div class="col-12 col-md-4 pad">
        <div class="col-12 inicio">
          <div class="col-12">
            <h1 class="inicio-text">Toda innovación nos lleva a un crecimiento y esté nos apoya a disfrutar.</h1>
            <center>
              <button  class="btnmasinfo paddbot" >Iniciar Sesion</button>
            </center>
          </div>
          <div class=" col-12">
            
          </div>
      </div>
      </div>
    </div>
  </div> -->
<!--Seccion video inicio-->


 
<div class="col-12 card" id="videoi">
  <div class="embed-responsive embed-responsive-16by9 mx-auto">
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/LXg1Y7qGsiY?autoplay=1&mute=1" allowfullscreen></iframe>
  </div>
</div> 





  <!--Seccion de los logos de  los producto-->
<section id="productos" class="productos section-bg">
 <div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <a href="JD_Store.php"><img src="https://www.jdsuite.mx/images/store.png" class="img-fluid"alt=""></a>
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
              <p class="card-text mb-auto">¡Tú Punto de Venta! Administra tus Ventas, inventarios y mucho más de manera rápida, fácil y segura.</p>
              <a href="JDStore.php" class="stretched-link">
                <center>
                 <button  class="btnmasinfo paddbot2" >Conocer más</button>
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
                  <button  class="btnmasinfo paddbot2" >Conocer más</button>
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
              <p class="card-text mb-auto">¡Tú facturador electrónico! Comienza a facturar con nuestros paquetes de folios digitales.</p>
              <a href="JDInvoice.php" class="stretched-link">
                <center>
                  <button  class="btnmasinfo paddbot2" >Conocer más</button>
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
              <p class="card-text mb-auto">¡Tú Punto de venta virtual! Entra al mundo digital y vende por internet mientras tu disfrutas de tu tiempo libre.</p>
              <a href="JDEcomm.php" class="stretched-link">
                <center>
                  <button  class="btnmasinfo paddbot2" >Conocer más</button>
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
              <p class="card-text mb-auto">Gana dinero sin esfuerzo, vende recargas de tiempo aire y pago de servicios desde tu celular, no importa donde te encuentres..</p>
              <a href="JDTae.php" class="stretched-link">
                <center>
                  <button  class="btnmasinfo paddbot2" >Conocer más</button>
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
              <p class="card-text mb-auto">Es un poderoso ERP Vertical, escalable y adaptable que permite gestionar las operaciones de tu empresa.</p>
              <a href="JDCeo.php" class="stretched-link">
                <center>
                  <button  class="btnmasinfo paddbot2" >Conocer más</button>
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

  
<!--Carrusel de produtos-->
<div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="d-grid gap-2 d-md-block text-center">
              <a class="btn text-white" style="background-color: #3b5998;" href="#carousel" data-slide="prev" role="button"><i class="fas fa-chevron-circle-left"></i></a>
              <a class="btn text-white" style="background-color: #3b5998;" href="#carousel" data-slide="next" role="button"><i class="fas fa-chevron-circle-right"></i></a>
            </div>
            <br>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row">
        <div class="col">
          <div class="py-4 text-center card"><a href="#"><img src="https://www.jdsuite.mx/productos/CB0000000158.jpg" alt=""></a>
              <div class="card-body">
                <h3 color-text="blue">Productos 1</h3>
                <h2>$5,999.00</h2>
                <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
              </div>
          </div>

        </div>
        <div class="col">
          <div class="py-4 text-center card"><a href="#"><img src="https://www.jdsuite.mx/productos/CB000000042.jpg" alt=""></a>
                <div class="card-body">
                  <h3 color-text="blue">Productos 2</h3>
                  <h2>$5,999.00</h2>
                <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
              </div>
          </div>
        </div>
        <div class="col">
          <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB000000068.jpg" alt=""></a>
                <div class="card-body">
                  <h3 color-text="blue">Productos 3</h3>
                  <h2>$5,999.00</h2>
                <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
              </div>
          </div>
        </div>
        <div class="col">
          <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB000000106.jpg" alt=""></a>
                <div class="card-body">
                  <h3 color-text="blue">Productos 4</h3>
                  <h2>$5,999.00</h2>
                <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
              </div>
          </div>
        </div>
        <div class="col">
          <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB0000001412.jpg" alt=""></a> 
                <div class="card-body">
                  <h3 color-text="blue">Productos 5</h3>
                  <h2>$5,999.00</h2>
                <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row">
        <div class="col">
          <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB0000001513.jpg" alt=""></a>
                <div class="card-body">
                  <h3 color-text="blue">Productos 6</h3>
                  <h2>$5,999.00</h2>
                  <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
                </div>
          </div>
        </div>
        <div class="col">
          <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB0000001715.jpg" alt=""></a>
                  <div class="card-body">
                    <h3 color-text="blue">Productos 7</h3>
                    <h2>$5,999.00</h2>
                    <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
                  </div>
          </div>
        </div>
        <div class="col">
          <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB0000001614.jpg" alt=""></a>
                <div class="card-body">
                  <h3 color-text="blue">Productos 8</h3>
                  <h2>$5,999.00</h2>
                  <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
                </div>
          </div>
        </div>
        <div class="col">
          <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB0000001816.jpg" alt=""></a>
                <div class="card-body">
                  <h3 color-text="blue">Productos 9</h3>
                  <h2>$5,999.00</h2>
                  <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
                </div>
          </div>
        </div>
        <div class="col">
          <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB0000002119.jpg" alt=""></a>
                <div class="card-body">
                  <h3 color-text="blue">Productos 10</h3>
                  <h2>$5,999.00</h2>
                  <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
                </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row">
        <div class="col">
          <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB0000004237.jpg" alt=""></a>
                <div class="card-body">
                  <h3 color-text="blue">Productos 11</h3>
                  <h2>$5,999.00</h2>
                  <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
                </div>
          </div>
        </div>
        <div class="col">
          <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB0000004540.jpg" alt=""></a>
                <div class="card-body">
                  <h3 color-text="blue">Productos 12</h3>
                  <h2>$5,999.00</h2>
                  <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
                </div>
          </div>
        </div>
        <div class="col">
          <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB0000004850.jpg" alt=""></a>
                <div class="card-body">
                  <h3 color-text="blue">Productos 13</h3>
                  <h2>$5,999.00</h2>
                  <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
                </div>
          </div>
        </div>
        <div class="col">
          <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB000013642452.webp" alt=""></a>
                <div class="card-body">
                  <h3 color-text="blue">Productos 14</h3>
                  <h2>$5,999.00</h2>
                  <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
                </div>
          </div>
        </div>
        <div class="col">
          <div class="py-4 text-center card"><a href=""><img src="https://www.jdsuite.mx/productos/CB000014732599.webp" alt=""></a>
                <div class="card-body">
                  <h3 color-text="blue">Productos 15</h3>
                  <h2>$5,999.00</h2>
                  <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Agregar</a>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>
<br>
<br>
<!--Carrusel de prductos-->

<!--PARTE DE WHATS-->
<div class="msgwh">
    <a href="https://wa.me/5215539488047?text=Hola, necesito información sobre " target="_blank">
      <img src="../public/imagenes/whatsapp.png" alt="" style="width: 100%;"/>
    </a>
  </div>
  


  
</body>
</html>
<?php
require 'footer.php';
?>