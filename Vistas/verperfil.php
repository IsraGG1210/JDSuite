<?php 
require 'Conexion/funciones.php';
include 'header.php';

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

$sqln="SELECT c_nmb FROM clientes WHERE c_mail = '$usuario'";
$consutlan= setq($sqln);
$nameuse = mysqli_fetch_assoc($consutlan);
$nameuser = $nameuse['c_nmb'];

if(isset($_POST['submit-btn'])){

    if(isset($_SESSION['username'])){
        $sesion = $_SESSION['username'];
        // Verificar si se ha enviado una imagen
        if(isset($_FILES["perfil"]) && $_FILES["perfil"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
            $filename = $_FILES["perfil"]["name"];
            $filetype = $_FILES["perfil"]["type"];
            $filesize = $_FILES["perfil"]["size"];
    
            // Verificar si el archivo cargado es una imagen
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Error: Elige un archivo válido.");
    
            // Verificar el tamaño máximo permitido
            $maxsize = 5 * 1024 * 1024; // 5MB
            if($filesize > $maxsize) die("Error: El archivo es demasiado grande.");
    
            //Destino 
            $directorio = "imagenes";
        
            // Verificar si el tipo de archivo es válido
            if(in_array($filetype, $allowed)){
                // Recuperar la imagen actual de la base de datos
                $sql = "SELECT photo FROM clientes WHERE c_mail = '$sesion'";
                $resultado = setq($sql);
                $fila = mysqli_fetch_assoc($resultado);
                $imagen_actual = $fila['photo'];
    
                // Eliminar la imagen actual del servidor
                unlink($imagen_actual);
    
                $imagen = ($_FILES["perfil"]["tmp_name"]);
                $destino = $directorio."/".$filename;
                //echo $destino;
                    $sql = "UPDATE clientes set photo = '$destino'
                    WHERE c_mail = '$sesion'";
                    $resultado = setq($sql);
                    if(move_uploaded_file($imagen,$destino)){
                        ?>
                        <script>
                            
                            window.location.href = "verperfil.php";
                        </script>
                        <?php
                    }
                   
            }
        }       
    } else{
        echo "Error: No puedes subir foto de perfil sin sesión";
    }
}
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
                document.getElementById("actualizar").removeAttribute("type");
                document.getElementById("actualizar").removeAttribute("onclick");
                document.getElementById("actualizar").setAttribute("type","submit");
                document.getElementById("actualizar").click();
                document.getElementById("actualizar").removeAttribute("type");
                document.getElementById("actualizar").setAttribute("type","button");
                document.getElementById("actualizar").setAttribute("onclick","confirmacion()");
                /* document.getElementById("perfile").submit(); */
            }
        })
    }

    function reload() {
        location.reload();
    }
</script>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
        <?php
            require_once 'Conexion/funciones.php';
            if(isset($_SESSION['username'])){
                $sesion = $_SESSION['username'];
                // Recuperar la imagen de la base de datos
                $sql = "SELECT photo FROM clientes WHERE c_mail = '$sesion'";
                $resultado = setq($sql);
                $IMAG = mysqli_fetch_array($resultado);
                $imagen = $IMAG['photo'];

            } 
            ?>

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg" id="navbar" style="background-color:<?php echo $bg ?>;">
                <div class="col">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none" >
                <?php
                    if($imagen){
                        ?>
                        <img src=<?php echo $imagen?> alt="Imagen perfil" width="32" height="32" class="rounded-circle me-2">
                        <?php
                    }else{

                    }?>
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
                            <a class="nav-link" href="miscompras.php">
                            <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <i class="fa-brands fa-shopify" style="font-size:34px"></i>
                                    </div>
                                    <div class="col-md-8 col-sm-0 d-none d-md-block d-sm-block">
                                      Mis Compras
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
        <div class="row">
            <h2 id="seccion4">Foto de Perfil</h2>
            <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="perfil">Subir foto de perfil:</label>
                <input type="file" name="perfil" id="perfil">
                <button type="submit" name="submit-btn"  id="submit-btn" style="display:none">Guardar</button>
            </form>

            <script>
                const perfilInput = document.getElementById('perfil');
                const submitBtn = document.getElementById('submit-btn');

                perfilInput.addEventListener('change', () => {
                    submitBtn.style.display = 'block';
                });
            </script>


            </div>
        </div>

            <form action="perfil.php" name="perfile" id="perfile" method="post">
                <h2 id="seccion1">Datos Personales</h2>
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
                    <h2 id="seccion2">Datos Fiscales</h2>
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
                    <h2 id="seccion3">Datos Domiciliarios</h2>
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
                                <input type="text" value="<?php echo $result['c_colonia']?>" class="form-control"
                                    name="colonia" id="colonia" placeholder="Colonia" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="numeroe" class="cols-sm-10 control-label"><b>Numero Exterior</b></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                    value="<?php echo $result['c_nume']?>" class="form-control" name="numeroe"
                                    id="numeroe" placeholder="Numero Exterior" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="numeroi" class="cols-sm-10 control-label"><b>Numero Interior</b></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" value="<?php echo $result['c_numi']?>" class="form-control"
                                    name="numeroi" id="numeroi" placeholder="Numero interior(Opcional)" />
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
                                    maxlength="5" value="<?php echo $result['c_cp']?>" class="form-control"
                                    name="codigop" id="codigop" placeholder="Codigo Postal" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estado" class="cols-sm-10 control-label"><b>Estado</b></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" value="<?php echo $result['c_estado']?>" class="form-control"
                                    name="estado" id="estado" placeholder="Estado" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="pais" class="cols-sm-10 control-label"><b>Pais</b></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" value="<?php echo $result['c_pais']?>" class="form-control"
                                    name="pais" id="pais" placeholder="Pais" />
                            </div>
                        </div>
                    </div>
                </div>
                <div style="text-align:center;"><br>
                    <button class="btn btn-success"  type="button" id="actualizar" onclick="confirmacion()">
                        Actualizar
                    </button>
                    <button class="btn btn-danger" name="cancelar" id="cancelar" type="button" onclick="reload()">
                        Descartar cambios
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