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
    
    <link rel="shortcut icon" href="../public/imagenes/favicon.png"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.html" >
        <img src="../public/imagenes/logoJD.png" alt="">
      </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

  <nav class="navbar navbar-expand-lg " style="background-color:<?php echo $bg ?>;">
    <div class="container-fluid" >
      <a class="navbar-brand" href="./index.html" >
        <img src="../public/imagenes/logoJD.png" alt="">
      </a>
      <div class="navbar-dark my-2">
            <button class="navbar-toggler w-100 "style="color:#03727d;font-size:32px;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" style="font-size:24px color:#03727d;"></i><span class="align-middle"> Menú</span>
            </button>
      
      <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="JD_Store.php">JD Store</a>
          <a class="nav-link" href="JDRest.php">JD Rest</a>
          <a class="nav-link" href="JD_Invoice.php">JD Invoice</a>
          <a class="nav-link" href="JDEcomm.php">JD Ecomm</a>
          <a class="nav-link" href="JD_tae.php">JD TAE</a>
          <a class="nav-link" href="">JD CEO</a>
          <a class="nav-link" href="shop.php">Tienda</a>
          <a class="nav-link" href="login.php">Iniciar sesion</a>
          <a href="verif_Tienda.php" class="nav-link" >
              <i class="fas fa-shopping-cart"></i> 0
          </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
    
   