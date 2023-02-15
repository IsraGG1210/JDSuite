<?php
require 'Conexion/Database.php';
include ('header.php');

$mensaje='';
$db = new Database();
$con = $db->conectar();
/*if(!empty($_POST['email']) && !empty($_POST['contrasena']) && !empty($_POST['nombre'] && !empty($_POST['c_contrasena']))){
	$correo = $_POST['email'];
	$revisar = $con->prepare("SELECT COUNT(*) FROM clientes WHERE c_mail = '$correo'");
	if($revisar > 0){
		$mensaje ="Correo existente";
	}else{
		if($_POST['contrasena'] == $_POST['c_contrasena']){
			$nombre = $_POST['nombre'];
			$email = $_POST['email'];
			$contrasena = $_POST['contrasena'];
		  $sql = $con->prepare("INSERT INTO clientes (c_nmb,c_mail,c_password) VALUES('$nombre', '$email', PASSWORD('$contrasena'))");
		 
		  
		   if($sql->execute()){
			  $mensaje = "Nuevo Usuario Creado";
		   } else {
			  $mensaje = "Ocurrio Un Error En La Crecion Del Usuario";
		   }
		} else {
			$mensaje = "La contraseña no coincide";
		}
	}  
}*/

if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['contrasena']) && !empty($_POST['c_contrasena'])){
	if($_POST['contrasena'] == $_POST['c_contrasena']){
		$verif = $con->prepare("SELECT COUNT(*) FROM clientes WHERE c_mail = '$_POST['email']'");
		if($verif == 0){
			$sql = $con->prepare("INSERT INTO clientes(c_nmb,c_mail,c_password) VALUES('$_POST['nombre']', '$_POST['email']', PASSWORD('$_POST['contrasena']'))");
			if($sql->execute()){
				$mensaje="Usuario Nuevo Creado";
			}else{
				$mensaje ="Ocurrio Un problemas en la creacion";
			}
		} else{
			$mensaje ="Correo existente";
		}
	}else{
		$mensaje="Contraseñas no coinciden";
	}
}else{
	$mensaje ="Algun Campo Esta vacio";
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
	<p>
		<?php echo $mensaje ?>
	</p>
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