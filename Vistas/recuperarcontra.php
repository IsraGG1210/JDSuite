<?php 
include ('header.php');


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