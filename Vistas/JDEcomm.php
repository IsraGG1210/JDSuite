<?php
include ('header.php');
?>


<!--CONTENT VIDEO-->
<div class="col-12 card" id="videoi">
	<div class="ratio ratio-16x9">
		<iframe src="https://www.youtube.com/embed/-ogV7BTkobA?autoplay=1&mute=1" allowfullscreen></iframe>
	</div>
</div> <br>


<div class="display-inline container">
	<div class="row d-flex  col-sm-12">
		<div class="col-md-4 mb-4 d-flex ">
			<div class="card">
				<div class="view col-auto d-none d-lg-block">
					<img src="../public/imagenes/ecomm1.png" class="card-img-top" alt="JD Ecomm sistema de comercio electronico">
				</div>
				<div class="card-body">
					<h3 class="card-title">¿Que es JD Ecomm?</h3>
					<p class="card-text text-justify">JD Ecomm es una Página WEB personalizada con la imagen de tu
						empresa, donde podrás vender
						tus productos o artículos a cualquier parte del País.Al mismo tiempo es un punto de venta por
						internet, donde
						tus clientes te compraran de forma rápida, fácil y segura.</p>
				</div>
			</div>
		</div>

		<div class="col-md-4 mb-4 d-flex ">
			<div class="card">
				<div class="view col-auto d-none d-lg-block">
					<img src="../public/imagenes/ecomm2.gif" class="card-img-top" alt="Funciona para cualquier giro">
				</div>
				<div class="card-body">
					<h3 class="card-title">Funciona para cualquier giro</h3>
					<p class="card-text text-justify">¡Mientras tú disfrutas de tu familia y tu tiempo,
						“JD Ecomm” vende por ti, nunca fue tan fácil vender! No importa el
						tamaño de tu empresa JD Ecomm es la herramienta para incrementar tus ventas.
						Una tienda virtual es tu propio negocio en Internet, pues como en un super mercado
						tus clientes estarán esperando por ti, porque ellos mismos elegirán sus productos
						de preferencia, te harán los pagos necesarios, podrás gestiona tus ventas sencillamente,
						identifica los pedidos que te han hecho y revísalos en forma histórica para saber quién y que te
						están comprando. <br>
						Descarga las características.</p>
					<center>
						<button class="btn" style="background-color: #29A8B0; color: white;">Caracteristicas</button>
					</center>
				</div>
			</div>
		</div>
		<div class="container col-md-4 col-sm-12 d-flex" id="cotizacion">
			<div class="row main d-flex mb-4" style="margin: 0px;">
				<div class="main-login main-center" style="height: auto;">
					<center>
						<img src="../public/imagenes/lecomm.png" alt="Pagina web perzonalizada para tu empresa" class="imgEcomm col-sm-12"
							style="background-color:white;border-radius: 50px;">
					</center>
					<form class="" method="post" action="#">

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label"><b>Nombre</b></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa"
											aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"
										placeholder="Ingresa tu nombre" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label"><b>Correo</b></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa"
											aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"
										placeholder="Ingresa tu correo" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="celular" class="cols-sm-2 control-label"><b>Celular</b></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone fa"
											aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="celular" id="celular"
										placeholder="Ingresa tu celular" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="noproductos" class="cols-sm-2 control-label"><b>No. Productos</b></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-hashtag fa"
											aria-hidden="true"></i></span>
									<input type="number" class="form-control" min="1" name="noproductos"
										id="productos" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="logoe" class="cols-sm-2 control-label"><b>Logo de la empresa</b></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-image fa"
											aria-hidden="true"></i></span>
									<input type="file" class="form-control" name="logoe" id="logoe" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="giroempresa" class="cols-sm-2 control-label"><b>Formas de pago</b></label>
							<div class="cols-sm-10">
								<label for=""><input type="checkbox" name="" id="">Transferencia/Deposito
									Bancario</label> <br>
								<label for=""><input type="checkbox">PayPal</label> <br>
								<label for=""><input type="checkbox">Tarjeta Credito/Debito (Mercado Pago)</label>
							</div>
						</div>

						<div class="form-group">
							<label for="giroempresa" class="cols-sm-2 control-label"><b>Giro de la empresa</b></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa"
											aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="giroempresa" id="giroempresa"
										placeholder="Ingresa el giro de tu empresa" />
								</div>
							</div>
						</div>



						<div class="form-group btncotizar">
							<a href="#" target="_blank" type="button" id="button"
								class="btn btn-primary btn-lg btn-block login-button">Cotizar</a>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div><br>
</div>

<?php
include ('footer.php');
?>