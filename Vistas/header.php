<?php
//ECHO $_SERVER['REQUEST_URI'];
if($_SERVER['REQUEST_URI'] == '/JDSuite/Vistas/JD_Store.php') $bg = 'bg-blue';
elseif($_SERVER['REQUEST_URI'] == '/JDSuite/Vistas/JDRest.php') $bg = 'bg-green';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JD_Suite</title>

    <link rel="stylesheet" href="../public/css/style.css">
    
    <link rel="shortcut icon" href="../public/imagenes/favicon.png"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/mdb.min.css" rel="stylesheet">
</head>
<body>
<div id="mainNavigation">
    <nav role="navigation">
        <div class="lip">
            <div class="py-3 text-center border-bottom">
            <a href="index.php"><img src="../public/imagenes/logoJD.png" alt="" class="invert"></a>
            <div class="logo2">
                <a href="#" class="nav-link" >
                <i class="fas fa-shopping-cart logo2"></i> 0
                </a>
            </div>
            </div>
        </div>
    </nav>
    <div class="navbar-expand-md">
        <div class="menu">
            <div class="navbar-dark my-2">
            <button class="navbar-toggler w-100 "style="color:#03727d;font-size:32px;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" style="font-size:24px color:#03727d;"></i><span class="align-middle"> Menú</span>
            </button>
            </div>
        </div>
        <div class="text-center mt-3 collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mx-auto ">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="JD_Store.php">JD Store</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="JDRest.php">JD Rest</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="JD_Invoice.php">JD Invoice</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="JDEcomm.php">JD Ecomm</a>
            </li>
             <li class="nav-item">
            <a class="nav-link" href="JD_tae.php">JD TAE</a>
            </li>
             <li class="nav-item">
            <a class="nav-link" href="#">JD CEO</a>
            </li>
             <li class="nav-item">
            <a class="nav-link" href="shop.php">Tienda</a>
            </li>
             <li class="nav-item">
            <a class="nav-link" href="login.php">Iniciar Sesion</a>
            </li>
        </ul>
        </div>
    </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
    
   