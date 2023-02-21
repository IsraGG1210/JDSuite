<?php
include('header.php');
?>

<div class="col-12 imgbgtae">
    <div class="row mb-2">
        <div class="col-md-8">
          <img src="../public/imagenes/jd-tae.png" width="200px" height="150px" alt="">
        </div>
        <div class="col-md-4 ">
            <div class=" form-servicioslT">
                <div class="text-servicioslp">
                <h2>
                Tiempo aire y pago de servicios.
                </h2>
                <h4>
                ¡Adquierelo ahora mismo!
                </h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container col-12">
  <div class="row mb-2">
    <div class="col-md-8 border rounded overflow-hidden" style="margin-bottom: 10%;">
      <div class="row">
        <div class="col-12">
          <div class="row mb-2">
            <div class="col-sm"style="margin-bottom: 10%;">
            <div class="flip-card">
              <h3>¿Que es el TAE?</h3>
                <div class="flip-card-inner">
                    <div class="flip-card-front" 
                      style="background-image: url('../public/imagenes/tae1.png');">
                    </div>
                    <div class="flip-card-back">
                    <p style="color:#ffffff;">
                    JD TAE es un sistema multiplataforma, no importa donde estés o que tecnología ocupes, podrás realizar recargas, pago de servicios y venta de tarjetas de regalo.
                    JD TAE quiere que crezcas y compitas con estas tiendas, comienza atrayendo gente a tu negocio ofertando pago de servicios, y lo mejor, con una comisión igual o menor que dichas tiendas.
                    </p>
                    </div>
                </div>
            </div>  
            </div>
            <div class="col-sm" style="margin-bottom: 10%;">
            <div class="flip-card">
              <h3>Beneficios</h3>
                <div class="flip-card-inner">
                    <div class="flip-card-front" 
                      style="background-image: url('../public/imagenes/tae2.png');">
                    </div>
                    <div class="flip-card-back">
                    <p style="color:#ffffff;">
                    ¡Obtén una comisión por cada recarga, haciendo dinero sin esforzarte!
                            Sabemos que las recargas de saldo en prepago es parte de nuestra vida cotidiana, por lo que JD TAE es una herramienta completamente portátil, lo podrás usar en tu PC, Móvil o Tablet.
                            El sistema de recargas electrónicas, obteniendo una comisión del 6% por cada recarga efectuada.
                    </p>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 border rounded overflow-hidden" style="margin-bottom: 10%;">
      
    <h3>¡Ya estamos ahí!</h3>
    <div class="container" id="store">
			<div class="row">
				<div class="main-store main-center" style="height:505px;">
				<h4 class="text-center"><i class="far fa-edit fa-sm"> &nbsp </i>Completa el formulario</h4>
					<form class="" method="post" action="#">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label"><b>Nombre*</b></label>
							<div class="cols-sm-11">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name"id="name"  placeholder="Ingresa tu nombre"required />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label"><b>Correo*</b></label>
							<div class="cols-sm-11">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Ingresa tu correo"required />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="pwd" class="cols-sm-2 control-label"><b>Celular*</b></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fas fa-key" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="pwd" id="pwd"  placeholder="Ingresa tu contraseña" required/>
								</div>
							</div>
						</div>
				
						<div class="form-group btnregistro"> 
							<a href="#" target="_blank" type="button" id="button" class="btn btn-primary btn-lg btn-block store-button">Registrate</a>
						</div>
						
					</form>
				</div>
			</div>
		</div>
    </div>
  </div>
</div>

<!--TUTORIALES/PREGUNTAS-->
<div class="lip">
<div class="col-12 lip">
      <div class="row mb-2">
        <div class="padright col-md-5 col-mb-6 border rounded overflow-hidden p-4 flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="row mb-2">
                <div class="">
                  <div class="row mb-2">
                    <h3>Tutoriales</h3>
                    <p>Generamos una serie de videos para facilitarte el uso de “JD TAE”. 
                      Conoce lo sencillo y rápido que es.</p>
                    <div class="text-md-center aos-init aos-animate" data-aos="flip-down">
                      <iframe  height="100%" src="https://www.youtube.com/embed/-3IsVznqozU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                  
                    <center>
                    <div class="col-mb-2">
                      <div class="lip">
                        <a href="https://www.youtube.com/watch?v=-3IsVznqozU&t=2s">
                        <button class="btn btn-primary paddbot">Ver más videos</button>
                        </a>
                      </div>
                    </div>  
                    </center>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 border rounded overflow-hidden p-4 flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <h3>Preguntas frecuentes</h3>
        <div class="lip">
        <h2 class="accordion-header" id="headingOneY">
          <a  type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseOneY"
            aria-expanded="true" aria-controls="collapseOneY">
            <i class="fa fa-sort-desc" style="font-size:24px"><h5>¿Como implemento JD TAE?</h5></i>
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
          <i class="fa fa-sort-desc" style="font-size:24px"><h6>¿Que beneficios tengo con JD TAE?</h6></i>
                      </a>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
        data-mdb-parent="#accordionExampleY">
        <div class="accordion-body text-justify">
          Un potente Punto de Venta para tu negocio de alimentos, gestiona fácilmente tus ventas y sin
          importar el tamaño de tu negocio, te apoya a simplificar tus órdenes a través de una interfaz
          intuitiva y diseñada para optimizar tiempos.
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
      <img src="../public/imagenes/whatsapp.png" alt="" style="width: 100%;"/>
    </a>
  </div>



    
   
<?php
include ('footer.php');
?>