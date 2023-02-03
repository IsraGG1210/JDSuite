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
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/mdb.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="../public/imagenes/logoJD.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
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
            <li class="nav-item">
            <a class="nav-link" href="shop.php">
            <i class="fas fa-shopping-cart" style="font-size:38px; color:white;"></i> 0
            </a>
            </li>

        </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>