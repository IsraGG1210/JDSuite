<?php
require 'header.php'
?>
<br>

<div class="container" id="login">
			<div class="row main">
				<div class="main-login main-center" style="height: auto;">
				
				<h2 class="text-center"><i class="far fa-user fa-sm"> &nbsp </i>Inicia Sesión </h2>
					<form class="iniciosesion" method="post" action="#">
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label"><b>Correo*</b></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email"  placeholder="Ingresa tu correo" required/>
								</div>
							</div>
						</div>
                        <div class="form-group">
							<label for="pwd" class="cols-sm-2 control-label"><b>Contraseña*</b></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fas fa-key" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="pwd" id="pswd"  placeholder="Ingresa tu contraseña"required/>
								</div>
							</div>
						</div>
                        <div class="registro d-flex justify-content-around">
                            <a href="registro.php" class="btnRegistro" style="color:white;">Registrate</a>
                            <a href="#" class="btnRegistro" style="color:white;">¿Olvidaste tu contraseña?</a>
                        </div>
					

						<div class="form-group btningresar"> 
							<a href="#" target="_blank" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">Ingresar</a>
						</div>
						
					</form>
				</div>
			</div>
</div>


<?php
require 'footer.php'
?>