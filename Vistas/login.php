<?php

require 'Conexion/funciones.php';
include ('header.php');
$mensaje="";
//session_start();

if(!empty($_POST['email']) && !empty($_POST['contrasena'])){
	$correo = $_POST['email'];
	$contrasena = $_POST['contrasena'];
	$sql ="SELECT COUNT(*) AS contar, c_nmb FROM clientes WHERE c_mail = '$correo' AND c_password =PASSWORD('$contrasena') OR c_rstpass = PASSWORD('$contrasena')";
	$resultado = setq($sql);
	die($resultado);
	$array = mysqli_fetch_array($resultado);
		if($array['contar'] != '0'){
		$sql = "UPDATE clientes SET c_flogin = NOW() WHERE c_mail = '$correo'";
		setq($sql);

		$_SESSION['username'] = $correo;
			$pd = $_SESSION['username'];
			if(isset($_COOKIE["cart"])){
				$sqls ="SELECT*FROM pedidoscld WHERE pd_pedido='$pd'";
					$resultados = setq($sqls);
				if(mysqli_num_rows($resultados) == 0){
					$cart = $_COOKIE["cart"];
    
					// Insertar los datos en la base de datos
					foreach ($cart as $item) {
						$id = $item[0];
						$cantidad = $item[1];
						$talla = $item[2];
						$color = $item[3];
						$precio = $item[4];
						$descuento = $item[5];
						
						$sql = 'INSERT INTO pedidoscld SET
						pd_producto = "'.$id.'",
						pd_pedido = "'.$pd.'",
						pd_cantidad = "'.$cantidad.'",
						pd_talla = "'.$talla.'",
						pd_color = "'.$color.'",
						pd_precio = "'.$precio.'",
						pd_descuento = "'.$descuento.'"';
						//mysqli_query($conn, $sql);
						setq($sql);  
					}
				}
			}
		?>

<script>
	Swal.fire({
		title: 'Bienvenido',
		timer: 1500,
		timerProgressBar: true,
		icon: 'success'
	});
	window.location.href = "index.php";
</script>
<?php
			$_SESSION['username'] = $correo;
			
		} else {
			?>
<script>
	Swal.fire("Error", "Datos incorrectos", "error");
</script>
<?php
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
					<a href="recuperarcontra.php" class="btnRegistro" style="color:white; text-align:end;">¿Olvidaste tu
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