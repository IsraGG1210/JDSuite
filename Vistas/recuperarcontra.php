<?php 
include ('header.php');
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}

if (!empty($_POST['email'])) {
    $correo=$_POST['email'];
    $sql ="SELECT COUNT(*) AS contar,c_mail FROM clientes WHERE c_mail = '$correo'";
   /*  die($sql); */
    $resultado = setq($sql);
    $array = mysqli_fetch_array($resultado);

    if($array['contar'] !='0'){
        $contrasenan = generate_string($permitted_chars,10);
        $sql="UPDATE clientes SET c_rstpass = PASSWORD('$contrasenan') WHERE c_mail = '$correo'";
        setq($sql);
        $destinatario ="$correo";
        $titulo = "Recuperacion de contraseña";
        $mensaje = "Tu nueva contraseña es $contrasenan";
        $remitente = "From: p02297280@gmail.com";
        if(mail($destinatario,$titulo,$mensaje,$remitente)){
            $sql ="UPDATE clientes SET c_fmod = NOW() WHERE c_mail='$correo'";
           echo "Contraseña nueva enviada"; 
        }else {
            echo "Hubo un error";
        }
    }else {
        echo "Correo inexistente";
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
<style>
    @media (max-width: 512px) {
        #buttonsrc {
            display: inline-grid;
        }
    }
</style>
<div class="container" id="login">
    <div class="row main">
        <div class="main-login main-center" style="height: auto;">

            <h2 class="text-center">Recuperacion de Contraseña </h2>
            <form class="iniciosesion" method="POST" action="config/recovery.php">
                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label"><b>Correo*</b></label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Ingresa tu correo registrado en la plataforma" required />
                        </div>
                    </div>
                </div>
                <center>
                    <div class="form-group btningresar" id="buttonsrc">
                        <button class="btn btn-secondary btn-lg" type="submit">Enviar</button>
                        &nbsp
                        <a href="login.php" class="btn btn-secondary btn-lg">Cancelar</a>
                    </div>
                </center>
            </form>
        </div>
    </div>
</div>

<?php 
include ('footer.php');
?>