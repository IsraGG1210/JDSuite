<?php 
require_once './Conexion/funciones.php';
session_start();
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = uniqid();
}
$sesion = $_SESSION['id'];
  //ECHO $_SERVER['REQUEST_URI'];
  if ($_SERVER['REQUEST_URI'] == '/JDSuite/Vistas/JD_Store.php')
  $bg = '#2B4B6B';
else if ($_SERVER['REQUEST_URI'] == '/JDSuite/Vistas/JDRest.php')
  $bg = '#F46606';
else if ($_SERVER['REQUEST_URI'] == '/JDSuite/Vistas/JD_Invoice.php')
  $bg = '#27A8AF';
else if ($_SERVER['REQUEST_URI'] == '/JDSuite/Vistas/JDEcomm.php')
  $bg = '#29A8B0';
else if ($_SERVER['REQUEST_URI'] == '/JDSuite/Vistas/JD_tae.php')
  $bg = '#1F8187';
else
  $bg = '#29A8B0';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JD_Suite</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="shortcut icon" href="../public/imagenes/favicon.png" />

    <link rel="stylesheet" href="../public/css/flip.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
</head>


<body>

    <nav class="navbar navbar-expand-xl" id="navbar" style="background-color:<?php echo $bg ?>;">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">
                <img src="../public/imagenes/logoJD.png" alt="">
            </a>
            <div class=" mb-2" style="display: flex; justify-content: space-between;">

                <div class="" id="tiendas" style="white-space: nowrap; display: flex;">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fa-sharp fa-solid fa-bars" style="color:white;"></i>
                    </button>


                </div>


            </div>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav" style="margin-left: auto;">
                    <button class="btn btn-link" onclick="window.location.href='JD_Store.php'" class="white-space: pre;" id="linksnb">
                        JD Store
                    </button>
                    <button class="btn btn-link" onclick="window.location.href='JDRest.php'" id="linksnb">
                        JD Rest
                    </button>
                    <button class="btn btn-link" onclick="window.location.href='JD_Invoice.php'" id="linksnb">
                        JD Invoice
                    </button>
                    <button class="btn btn-link" onclick="window.location.href='JDEcomm.php'" id="linksnb">
                        JD Ecomm
                    </button>
                    <button class="btn btn-link" onclick="window.location.href='JD_tae.php'" id="linksnb">
                        JD TAE
                    </button>
                    <button class="btn btn-link" onclick="window.location.href='#'" id="linksnb">
                        JD CEO
                    </button>
                    <button class="btn btn-link" onclick="window.location.href='shop.php'" id="linksnb">
                        Tienda
                    </button>
                   

                    <li class="nav-item dropdown">
                        <button class="btn btn-link dropdown-toggle" id="linksnb"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle fa-2xl"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu" >
                            <?php 
                                    if (!isset($_SESSION['username'])) {
                                        ?>
                            <li><a class="dropdown-item" href="login.php">Iniciar Sesion</a></li>
                            <li><a class="dropdown-item" href="registro.php">Registrarse</a></li>
                            <?php
                                    } else {
                                        ?>
                            <li><a class="dropdown-item" href="verperfil.php">Ver Perfil</a></li>
                            <li><a class="dropdown-item" href="logout.php">Cerrar Sesion</a></li>
                            <?php
                                    }
                                    ?>

                        </ul>
                    </li>
                    <button class="btn btn-link" onclick="window.location.href='verif_Tienda.php'" id="linksnb">
                    
                        <div id="carrito-cantidad">
                            <i class="fas fa-shopping-cart fa-xl"></i>
                            <?php
                            $newitem = 0;
                            $cantidad_total = 7;

                            if(isset($_SESSION['username'])){ 
                                $sesion = $_SESSION['username'];
                                //echo $sesion;
                                $sql = 'SELECT COUNT(pd_cantidad) AS cantidad FROM pedidoscld WHERE pd_pedido="'.$sesion.'"AND pd_conf = 0';
                                $result = setq($sql);
                                $cantidad_tota = mysqli_fetch_assoc($result);
                                $cantidad_total = $cantidad_tota['cantidad'];
                            //echo $cantidad_total;
                            

                            }else{
                                if(isset($_COOKIE['cart'])) {
                                
                                    foreach($_COOKIE['cart'] as $clave=>$item) {
                                        $cantidad_total += $item[1];
                                    }
                                    //echo $cantidad_total;
                                }
                            } 
                            echo $cantidad_total;
                            ?>
                        </div>
                    
                    </button>
                    
                </div>
            </div>

        </div>
    </nav>