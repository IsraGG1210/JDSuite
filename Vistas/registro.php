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
				header ("location: login.php");
			}else{
				$mensaje ="Ocurrio Un problemas en la creacion";
			}
		} else{
			$mensaje ="Correo existente";
		}
	}else{
		$mensaje="Contraseñas no coinciden";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JD_Suite</title>
	<link rel="stylesheet" href="../public/css/style.css">
	<link rel="shortcut icon" href="../public/imagenes/favicon.png" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
		integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	
</head>

<body>
	<br>

	<?php if(!empty($mensaje)):?>
	<?php echo $mensaje ?>
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
								<span class="input-group-addon"><i class="fa fa-envelope fa"
										aria-hidden="true"></i></span>
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
								<input type="password" class="form-control" name="contrasena" id="contrasena"
									placeholder="Ingresa tu contraseña" required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="pwd" class="cols-sm-2 control-label"><b>Confirma tu Contraseña*</b></label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fas fa-key" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="c_contrasena" id="c_contrasena"
									placeholder="Confirma tu contraseña" />
							</div>
						</div>
					</div>
					<center>
						<div class="form-group btnregistro">
							<input type="submit" value="Registrate">
						</div>
						<!--insert into 
					c_contraseña = PASSWORD("'..'") -->
					</center>


				</form>
			</div>
		</div>
	</div>
</body>

</html>

<?php
include 'footer.php';
?>