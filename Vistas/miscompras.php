<?php 
require './Conexion/funciones.php';
include 'header.php';
require './Conexion/config.php';

$usuario=$_SESSION['username'];
$sqln="SELECT c_nmb FROM clientes WHERE c_mail = '$usuario'";
$consutlan= setq($sqln);
$nameuse = mysqli_fetch_assoc($consutlan);
$nameuser = $nameuse['c_nmb'];
?>
<div class="container p-4">
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
                        <a class="nav-link" href="<?php echo SERVERURL;?>verperfil">
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
                        <a class="nav-link" href="<?php echo SERVERURL;?>verperfil">
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
                        <a class="nav-link" href="<?php echo SERVERURL;?>verperfil">
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
                        <a class="nav-link" href="<?php echo SERVERURL;?>misCompras">
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
            <?php
            $usuario = $_SESSION['username'];
            $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$usuario'";
            $resultado = setq($sql1);
            $idusuario = mysqli_fetch_array($resultado);
            $idusu = $idusuario['c_id'];

               $sql_fechas = "SELECT DISTINCT DATE(p_fechagen) AS fecha FROM pedidoscl WHERE p_cliente='$idusu' ORDER BY fecha DESC";
               $result_fechas = setq($sql_fechas);
               $fechas = mysqli_fetch_all($result_fechas, MYSQLI_ASSOC);   
            ?>
            <div class="accordion col-md-8 col-sm-12" id="accordionExampleY">
    <?php foreach ($fechas as $fecha) : ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading-<?php echo $fecha['fecha']; ?>">
                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                        style="color:black"
                        data-mdb-target="#collapse-<?php echo $fecha['fecha']; ?>"
                        aria-expanded="false"
                        aria-controls="collapse-<?php echo $fecha['fecha']; ?>">
                        <div class="row">
                                    <div class="col-9">
                                        <span>
                                            <h6><b>Fecha de la compra:</b></h6>
                                        </span>
                                    </div>
                                    <div class="col-5">
                                        <span>
                                            <p data-total=""><b>
                                            <?php echo $fecha['fecha']; ?>
                                            </b></p>
                                        </span>
                                    </div>
                                </div>
                    
                </button>
            </h2>
            <div id="collapse-<?php echo $fecha['fecha']; ?>"
                 class="accordion-collapse collapse"
                 aria-labelledby="heading-<?php echo $fecha['fecha']; ?>"
                 data-mdb-parent="#accordionExampleY">
                 <table class="table p-0" id="tblistado">
                    <thead>
                        <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                 <?php
                 $fecha_actual = $fecha['fecha'];
                 $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$sesion'";
                 $resultado = setq($sql1);
                 $idusuario = mysqli_fetch_array($resultado);
                 $idusu = $idusuario['c_id'];
                 $sql_pedidos = "SELECT DISTINCT CONCAT(i_nmb, '.', i_ext) AS rutaimagen,
                            pd_producto,
                            p_estatus,
                            a_cb,
                            a_nmb
                    FROM pedidoscl
                    INNER JOIN pedidoscld ON pd_fechaconf=p_fechagen AND pd_pedido = p_cliente
                    INNER JOIN articulos ON pedidoscld.pd_producto = articulos.a_cb
                    INNER JOIN imagenes ON articulos.a_cb = imagenes.i_idproducto
                    WHERE p_id=pd_confirm AND p_cliente='".$idusu."' AND p_fechagen='$fecha_actual'";
                 $result_pedidos = setq($sql_pedidos);
                 $pedidos = mysqli_fetch_all($result_pedidos, MYSQLI_ASSOC);
                 
                    foreach ($pedidos as $pedido) {
                        $ruta = $pedido['rutaimagen'];
                        $producto = $pedido['pd_producto'];
                        $cb = $pedido['a_cb'];
                        $nombre = $pedido['a_nmb'];
                        $estatus = $pedido['p_estatus'];
                    ?>
                        <tr>
                            <td>
                                <img src="https://www.jdshop.mx/productos/<?php echo $ruta;?>" alt="" style="width:50px;"></img>
                            </td>
                            <td style="padding: 0rem">
                                <?php echo $nombre;?>
                                <input type="hidden" id="producto" value="<?php echo ($id); ?>"/>
                            </td>
                            <td>
                                <?php if ($estatus == 1) {
                                    echo '<span style="color:green;">PAGO REALIZADO</span>';
                                } else {
                                    echo '<span style="color:orange;">PAGO PENDIENTE</span>';
                                } ?>
                                <input type="hidden" id="producto" value="<?php echo ($id); ?>"/>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                 </table>
                <!-- Aquí colocas el código que muestra los datos de los pedidos para la fecha actual -->
            </div>
        </div>
    <?php endforeach; ?>
</div>

        </div></div></div>
<?php
include 'footer.php';
?>
<!-- jonydominguez0713@gmail.com -->