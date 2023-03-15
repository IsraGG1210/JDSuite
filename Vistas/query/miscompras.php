<?php 
require '../Conexion/funciones.php';
include 'header.php';

$usuario=$_SESSION['username'];
$sqln="SELECT c_nmb FROM clientes WHERE c_mail = '$usuario'";
$consutlan= setq($sqln);
$nameuse = mysqli_fetch_assoc($consutlan);
$nameuser = $nameuse['c_nmb'];
?>
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
                    <img src=<?php echo $imagen?> alt="" width="52" height="52" class="rounded-circle me-2">
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
                        <a class="nav-link" href="verperfil.php">
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
                        <a class="nav-link" href="verperfil.php">
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
                        <a class="nav-link" href="verperfil.php">
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
                        <a class="nav-link" href="misCompras.php">
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
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>