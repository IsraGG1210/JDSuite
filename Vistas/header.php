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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
</head>


<body>

    <nav class="navbar navbar-expand-lg" id="navbar" style="background-color:<?php echo $bg ?>;">
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
                            <a class="nav-link" href="JD_Store.php">JD Store</a>
                            <a class="nav-link" href="JDRest.php">JD Rest</a>
                            <a class="nav-link" href="JD_Invoice.php">JD Invoice</a>
                            <a class="nav-link" href="JDEcomm.php">JD Ecomm</a>
                            <a class="nav-link" href="JD_tae.php">JD TAE</a>
                            <a class="nav-link" href="">JD CEO</a>
                            <a class="nav-link" href="shop.php?page=1">Tienda</a>
                            <?php if(!isset($_SESSION['username'])){?>
                            <a class="nav-link" href="login.php">Iniciar sesion</a>
                            <?php } else {?>
                            <a class="nav-link" href="logout.php">Cerrar sesion</a>
                            <?php }?>


                            <a href="verif_Tienda.php" class="nav-link">
                            <div id="carrito-cantidad">
                                <i class="fas fa-shopping-cart"></i>
                                <?php
                                $newitem = 0;
                                $cantidad_total = 0;
                                
                                if(isset($_COOKIE['cart'])) {
                                    
                                    foreach($_COOKIE['cart'] as $clave=>$item) {
                                        $cantidad_total += $item[1];
                                    }
                                    echo $cantidad_total;
                                }
                                ?>
                            </div>
                            </a>
                        </div>
                    </div>
               
        </div>
    </nav>