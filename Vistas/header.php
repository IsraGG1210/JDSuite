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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<?php
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

<body>

    <nav class="navbar navbar-expand-sm " style="background-color:<?php echo $bg ?>;">
        <div class="col-md-12">
            <div class="row mb-2">
                <div class="col-md-6">
                    <a class="navbar-brand" href="./index.php">
                        <img src="../public/imagenes/logoJD.png" alt="">
                    </a>
                    <center>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa-sharp fa-solid fa-bars" style="color:white;"></i>
                        </button>
                    </center>

                </div>
                <div class="col-md-6 " style="white-space: nowrap;">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="JD_Store.php">JD Store</a>
                            <a class="nav-link" href="JDRest.php">JD Rest</a>
                            <a class="nav-link" href="JD_Invoice.php">JD Invoice</a>
                            <a class="nav-link" href="JDEcomm.php">JD Ecomm</a>
                            <a class="nav-link" href="JD_tae.php">JD TAE</a>
                            <a class="nav-link" href="">JD CEO</a>
                            <a class="nav-link" href="shop.php">Tienda</a>
                            <?php if(!isset($_SESSION['username'])){?>
                           
                            <a class="nav-link" href="login.php">Iniciar sesion</a>
                            <?php } else {?>
                                <a class="nav-link" href="logout.php">Cerrar sesion</a>
                            <?php }?>


                            <a href="verif_Tienda.php" class="nav-link" >
                                <span id="cantcart">
                                <i class="fas fa-shopping-cart"></i> 0
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>