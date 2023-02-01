<?php
require 'header.php'
?>
<br>
<div class="container" id="login">
			<div class="row main">
				<div class="main-login main-center">
				<h2 class="text-center"><i class="far fa-user fa-sm"> &nbsp </i>Registrate</h2>
					<form class="" method="post" action="#">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label"><b>Nombre*</b></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name"id="name"  placeholder="Ingresa tu nombre"required />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label"><b>Correo*</b></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Ingresa tu correo"required />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="pwd" class="cols-sm-2 control-label"><b>Contraseña*</b></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fas fa-key" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="pwd" id="pwd"  placeholder="Ingresa tu contraseña" required/>
								</div>
							</div>
						</div>

                        <div class="form-group">
							<label for="pwd" class="cols-sm-2 control-label"><b>Confirma tu Contraseña*</b></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fas fa-key" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="pwd" id="pwd"  placeholder="Confirma tu contraseña"/>
								</div>
							</div>
						</div>
				
						<div class="form-group btnregistro"> 
							<a href="#" target="_blank" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">Registrate</a>
						</div>
						
					</form>
				</div>
			</div>
		</div>


<?php
require 'footer.php'?>