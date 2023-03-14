<?php 
require 'Conexion/funciones.php';
include 'header.php';

?>
<script>
    function confirmacion() {
        Swal.fire({
            title: '¿Seguro que deseas actualizar tus datos?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.perfil.php.submit();
            }
        })
    }
</script>
<?php
if(empty($_SESSION['username'])){
	?>
<script>
    window.location.href = "index.php"
</script>
<?php
}

$usuario=$_SESSION['username'];

$sql="SELECT * FROM clientes WHERE c_mail = '$usuario'";
$consutla= setq($sql);
$result = mysqli_fetch_array($consutla);



if(isset($_POST['editar'])){
    if ( $_POST['password'] == $result['c_password'] ) {
        $nombre = $_POST['name'];
        $apellido = $_POST['apellidos'];
        $telefono = $_POST['telefono'];
        $rfc = $_POST['rfc'];
        $razonsoc = $_POST['razonsocial'];
        $regimen = $_POST['regimen'];
        $calle = $_POST['calle'];
        $colonia = $_POST['colonia'];
        $numeroe = $_POST['numeroe'];
        $numeroi = $_POST['numeroi'];
        $municipio = $_POST['municipio'];
        $cp = $_POST['codigop'];
        $estado = $_POST['estado'];
        $pais = $_POST['pais'];
        $sql ="UPDATE clientes SET c_nmb = TRIM('$nombre'), c_apellidos =TRIM('$apellido'), c_telefono=TRIM('$telefono'), c_rfc = TRIM('$rfc')
        , c_razon = TRIM('$razonsoc'), c_regimenfis = TRIM('$regimen'), c_calle = TRIM('$calle'), c_colonia = TRIM('$colonia'), c_nume = TRIM('$numeroe')
        , c_numi = TRIM('$numeroi'), c_municipio = TRIM('$municipio'), c_cp = TRIM('$cp'), c_estado = TRIM('$estado'), c_pais = TRIM('$pais'),
        c_fmod = NOW() 
        WHERE c_mail = '$usuario'";
        if (setq($sql)) {
            ?>
<script>
    Swal.fire({
        title: 'Datos Actualizados',
        timer: 1500,
        timerProgressBar: true,
        icon: 'success'
    });
    window.location.href = "verperfil.php";
</script>
<?php
        } else {
            echo "Hubo Un Error En La Actualizacion";
        }
    }  else if( $_POST['password'] != $result['c_password']){
        $nombre = $_POST['name'];
        $apellido = $_POST['apellidos'];
        $telefono = $_POST['telefono'];
        $rfc = $_POST['rfc'];
        $razonsoc = $_POST['razonsocial'];
        $regimen = $_POST['regimen'];
        $calle = $_POST['calle'];
        $colonia = $_POST['colonia'];
        $numeroe = $_POST['numeroe'];
        $numeroi = $_POST['numeroi'];
        $municipio = $_POST['municipio'];
        $cp = $_POST['codigop'];
        $estado = $_POST['estado'];
        $pais = $_POST['pais'];
        $contrasena = $_POST['password'];
        $sql ="UPDATE clientes SET c_nmb = TRIM('$nombre'), c_apellidos =TRIM('$apellido'), c_telefono=TRIM('$telefono'), c_rfc = TRIM('$rfc')
        , c_razon = TRIM('$razonsoc'), c_regimenfis = TRIM('$regimen'), c_calle = TRIM('$calle'), c_colonia = TRIM('$colonia'), c_nume = TRIM('$numeroe')
        , c_numi = TRIM('$numeroi'), c_municipio = TRIM('$municipio'), c_cp = TRIM('$cp'), c_estado = TRIM('$estado'), c_pais = TRIM('$pais') ,
        c_password = PASSWORD('$contrasena') 
        WHERE c_mail = '$usuario'";
        if (setq($sql)) {
            ?>
<script>
    Swal.fire({
        title: 'Datos Actualizados',
        timer: 1500,
        timerProgressBar: true,
        icon: 'success'
    });

    window.location.href = "verperfil.php";
</script>
<?php
        } else {
            echo "Hubo Un Error En La Actualizacion";
        }
}
}


if (isset($_POST['cancelar'])) {
    $sql="SELECT * FROM clientes WHERE c_mail = '$usuario'";
    $consutla= setq($sql);
    $result = mysqli_fetch_array($consutla);
    ?>
<script>
    window.location.href = "verperfil.php";
</script>
<?php
   
} 


?>

<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg" id="navbar" style="background-color:<?php echo $bg ?>;">
                <div class="col">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none" >
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        
                    <strong class="col-md-8 col-sm-0 col-xs-0 d-none d-md-block d-sm-block"><?php echo $nameuser;?></strong>
                </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarPerfil" aria-controls="navbarPerfil" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa-sharp fa-solid fa-bars" style="color:white;"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarPerfil">
                    <div class="container">
                    
                        <ul class="navbar-nav flex-column">
                        <!-- <li class="nav-item active d-none d-md-flex align-items-center">
                            <strong class="col-sm-12 col-md-12 d-none d-lg-block d-xl-block"><?php echo $nameuser;?></strong>
                        </li> -->

                        <li class="nav-item active d-flex align-items-center">
                            <a class="nav-link" href="#seccion1">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <i class="fa-solid fa-user" style="font-size:30px"></i>
                                    </div>
                                    <div class="col-md-8 col-sm-0  d-none d-md-block d-sm-block">
                                        Datos Personales
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item active d-flex align-items-center">
                            <a class="nav-link" href="#seccion2">
                            <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <i class='fas fa-landmark' style="font-size:30px"></i>
                                    </div>
                                    <div class="col-md-8 col-sm-0  d-none d-md-block d-sm-block">
                                        Datos Fiscales
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item active d-flex align-items-center">
                            <a class="nav-link" href="#seccion3">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <i class="fa fa-map-marker" style="font-size:28px"></i>
                                    </div>
                                    <div class="col-md-8 col-sm-0 d-none d-md-block d-sm-block">
                                        Datos Domiciliarios
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item active d-flex align-items-center">
                            <a class="nav-link" href="#">
                            <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <i class="fa-brands fa-shopify" style="font-size:34px"></i>
                                    </div>
                                    <div class="col-md-8 col-sm-0 d-none d-md-block d-sm-block">
                                        Compras
                                    </div>
                                </div>
                            </a>
                        </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-8">
            <form action="" name="perfil" method="post">
            <h2>Datos Personales</h2>
            <div class="row">
                <div class="col-md-6">
                    <label for="name" class="cols-sm-10 control-label"><b>Nombre(s)</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre"
                                value="<?php echo $result['c_nmb']?>" required />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="apellidos" class="cols-sm-10 control-label"><b>Apellido(s)</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="apellidos" id="apellidos"
                                value="<?php echo $result['c_apellidos']?>" placeholder="Apellidos" required />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="password" class="cols-sm-10 control-label"><b>Contraseña</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="password" minlength="8" class="form-control" name="password" id="password"
                                value="<?php echo $result['c_password']?>" placeholder="Contraseña" required /> <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="telefono" class="cols-sm-10 control-label"><b>Telefono</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                maxlength="10" value="<?php echo $result['c_telefono']?>" class="form-control"
                                name="telefono" id="telefono" placeholder="Numero de telefono" /> <br>
                        </div>
                    </div>
                </div>
                <hr size="8px" color="#29A8B0" style="margin-top:20px;">
                <h2>Datos Fiscales</h2>
                <div class="col-md-6">
                    <label for="rfc" class="cols-sm-10 control-label"><b>RFC</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" pattern="[A-Za-z0-9]+" maxlength="13" class="form-control" name="rfc"
                                id="rfc" placeholder="RFC" value="<?php echo $result['c_rfc']?>" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="razonsocial" class="cols-sm-10 control-label"><b>Razon Social</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="razonsocial" id="razonsocial"
                                value="<?php echo $result['c_razon']?>" placeholder="Razon Social" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="regimen" class="cols-sm-10 control-label"><b>Regimen Fiscal</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">

                            <?php

                            $sql2="SELECT * FROM cfdi_regimenfiscal";
                            $resultado2 = setq($sql2);
                            ?>
                            <select name="regimen" id="regimen" class="col-12">
                                <option value="default">NINGUNO</option>
                                <?php while($row = $resultado2->fetch_array()){
                                    if($result['c_regimenfis'] == $row['cr_id'])
                                        $select = 'selected';
                                    else 
                                        $select = '';
                                    echo '<option value="'.$row['cr_id'].'" '.$select.'>'.$row['cr_nmb'].'</option>';
            
                                    }?>
                            </select>

                        </div>
                    </div>
                </div>
                <hr width="50%" size="8px" color="#29A8B0" style="margin-top:20px;">
                <h2>Datos Domiciliarios</h2>
                <div class="col-md-6">
                    <label for="calle" class="cols-sm-10 control-label"><b>Calle</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="calle" id="calle"
                                value="<?php echo $result['c_calle']?>" placeholder="Calle" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="colonia" class="cols-sm-10 control-label"><b>Colonia</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" value="<?php echo $result['c_colonia']?>" class="form-control" name="colonia"
                                id="colonia" placeholder="Colonia" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="numeroe" class="cols-sm-10 control-label"><b>Numero Exterior</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                value="<?php echo $result['c_nume']?>" class="form-control" name="numeroe" id="numeroe"
                                placeholder="Numero Exterior" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="numeroi" class="cols-sm-10 control-label"><b>Numero Interior</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" value="<?php echo $result['c_numi']?>" class="form-control" name="numeroi"
                                id="numeroi" placeholder="Numero interior(Opcional)" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="municipio" class="cols-sm-10 control-label"><b>Municipio</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" value="<?php echo $result['c_municipio']?>" class="form-control"
                                name="municipio" id="municipio" placeholder="Municipio" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="codigop" class="cols-sm-10 control-label"><b>Codigo Postal</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                maxlength="5" value="<?php echo $result['c_cp']?>" class="form-control" name="codigop"
                                id="codigop" placeholder="Codigo Postal" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="estado" class="cols-sm-10 control-label"><b>Estado</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" value="<?php echo $result['c_estado']?>" class="form-control" name="estado"
                                id="estado" placeholder="Estado" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="pais" class="cols-sm-10 control-label"><b>Pais</b></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" value="<?php echo $result['c_pais']?>" class="form-control" name="pais"
                                id="pais" placeholder="Pais" />
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align:center;"><br>
                <button class="btn btn-success" name="editar" id="editar" type="submit" onclick="confirmacion()">
                    Actualizar
                </button>
                <button class="btn btn-danger" name="cancelar" id="cancelar" type="submit">
                    Cancelar cambios
                </button>
            </div>



        </form>
        </div>

    </div>

</div>
<br>
<?php 
include 'footer.php';
?>