<?php

require 'Conexion/funciones.php';
include ('header.php');
  
$mensaje='';

if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['contrasena']) && !empty($_POST['c_contrasena'])){
	if($_POST['contrasena'] == $_POST['c_contrasena']){
		$email = $_POST['email'];
		$sql2 = "SELECT COUNT(*) as contar FROM clientes WHERE c_mail = '$email'";
		$resultado = setq($sql2);
		$array = mysqli_fetch_array($resultado);
		if($array['contar'] == '0' ){
			$nombre=$_POST['nombre'];
			$correo=$_POST['email'];
			$contra=$_POST['contrasena'];
			$sql  ="INSERT INTO clientes(c_nmb,c_mail,c_password) VALUES('$nombre', '$email', PASSWORD('$contra'))";
			if(setq($sql)){
				$mensaje="Usuario Nuevo Creado";
				?>
			<script>
				
				window.location.href = "login.php";
				swal("Usuario nuevo creado",{icon:"success"});
			</script>
<?php
			}else{
				$mensaje ="Ocurrio Un problema en la creacion";
			}
		} else{
			$mensaje ="Correo existente";
		}
	}else{
		$mensaje="Contraseñas no coinciden";
	}
}
if(isset($_SESSION['username'])){
	?>
	<script>
		window.location.href = "index.php"
	</script>
	<?php
}
?>

<br>

<?php if(!empty($mensaje)):?>
<script>
	swal("Error","<?php echo $mensaje?>","warning");
</script>

<?php endif;?>


<div class="container" id="login">
	<div class="row main">
		<div class="main-login main-center" style="height: auto;">
			<h2 class="text-center"><i class="far fa-user fa-sm"> &nbsp </i>Registrate</h2>
			<form class="" method="POST" action="registro.php">

				<div class="form-group">
					<label for="name" class="cols-sm-2 control-label"><b>Nombre*</b></label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="nombre" id="nombre"
								placeholder="Ingresa tu nombre" required />
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="cols-sm-2 control-label"><b>Correo*</b></label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="email" id="email"
								placeholder="Ingresa tu correo" required />
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="pwd" class="cols-sm-2 control-label"><b>Contraseña*</b></label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-key" aria-hidden="true"></i></span>
							<input type="password" class="form-control" minlength="8" name="contrasena" id="contrasena"
								placeholder="Ingresa tu contraseña" required />
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="pwd" class="cols-sm-2 control-label"><b>Confirma tu Contraseña*</b></label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-key" aria-hidden="true"></i></span>
							<input type="password" class="form-control" minlength="8" name="c_contrasena" id="c_contrasena"
								placeholder="Confirma tu contraseña" />
						</div>
					</div>
				</div>
				<center>
					<div class="form-group btnregistro ">
						<!-- <input class ="btn btn-primary" type="submit" value="Registrate" > -->
						<button class="btn btn-secondary btn-lg " type="submit">Registrate</button>
					</div>
				</center>
			</form>
		</div>
	</div>
</div>


<?php
include 'footer.php';
?>