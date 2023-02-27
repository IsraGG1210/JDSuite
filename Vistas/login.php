<?php

require 'Conexion/funciones.php';
include ('header.php');
$mensaje="";
//session_start();

if(!empty($_POST['email']) && !empty($_POST['contrasena'])){
	$correo = $_POST['email'];
	$contrasena = $_POST['contrasena'];
	$sql ="SELECT COUNT(*) AS contar, c_nmb FROM clientes WHERE c_mail = '$correo' && c_password =PASSWORD('$contrasena')";
	$resultado = setq($sql);
	$array = mysqli_fetch_array($resultado);
		if($array['contar'] != '0'){
		?>
		
			<script>
				window.location.href = "index.php";
				window.alert("Bienvenido");
			</script>
		<?php
			$_SESSION['username'] = $correo;
			
		} else {
			?>
			<script>
				window.alert("Datos Incorrectos");
			</script>
			<?php
		}
}

?>
<br>
<?php if(!empty($mensaje)):?>
<dialog id="myForm">
	<center>
		<i class="fas fa-exclamation-triangle"></i>&nbsp<?php echo $mensaje ?> <br>
		<button class="btn btn-primary" onclick="closeForm()"> Cerrar </button>
		<script>
			function closeForm() {
				document.getElementById("myForm").style.display = "none";
			}
		</script>
</dialog>
</center>

<?php endif;?>

<div class="container" id="login">
	<div class="row main">
		<div class="main-login main-center" style="height: auto;">

			<h2 class="text-center"><i class="far fa-user fa-sm"> &nbsp </i>Inicia Sesión </h2>
			<form class="iniciosesion" method="POST" action="login.php">
				<div class="form-group">
					<label for="email" class="cols-sm-2 control-label"><b>Correo*</b></label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							<input type="email" class="form-control" name="email" id="email"
								placeholder="Ingresa tu correo" required />
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="pwd" class="cols-sm-2 control-label"><b>Contraseña*</b></label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-key" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="contrasena" n id="contrasena"
								placeholder="Ingresa tu contraseña" required />
						</div>
					</div>
				</div>
				<div class="registro d-flex justify-content-around">
					<a href="registro.php" class="btnRegistro" style="color:white;">Registrate</a>
					<a href="#" class="btnRegistro" style="color:white; text-align:end;">¿Olvidaste tu
						contraseña?</a>
				</div>

				<center>
					<div class="form-group btningresar">
						<!-- <button class="btn btn-primary btn-lg btn-block login-button" name="button" id="button"
							type="submit">Ingresar</button> -->
							<button class="btn btn-secondary btn-lg" type="submit">Ingresar</button>
					</div>
				</center>
			</form>
		</div>
	</div>
</div>




<?php
include 'footer.php';
?>