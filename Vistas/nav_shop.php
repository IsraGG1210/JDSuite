<?php
include ('header.php');
/* Select cw_nmb AS Cateogria, c_nmb as Concepto FROM categoriasw inner JOIN concepto_categoria on cw_categoria = cc_categoria INNER JOIN conceptos on c_id = cc_concepto */
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.min.js" integrity="sha512-eHx4nbBTkIr2i0m9SANm/cczPESd0DUEcfl84JpIuutE6oDxPhXvskMR08Wmvmfx5wUpVjlWdi82G5YLvqqJdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
  

  <div id="nav">
    <div class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="">
        <div class="navbar-dark my-2">
          <button class="navbar-toggler w-100 " style="color:#03727d;font-size:32px;" type="button"
            data-bs-toggle="collapse" data-bs-target="#shop" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fa fa-ellipsis-v" style="font-size:24px color:#03727d;"></i> Categorías
          </button>
        </div>
      </div>
      <div class="text-center mt-3 collapse navbar-collapse p-0" id="shop">
        <ul class="navbar-nav p-0 mx-auto ">
          <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">SOFTWARE</a>
            <ul class="dropdown-menu" style="position: inherit;">
              <li><a class="dropdown-item " href="#">KIT DE CAMARAS DE SEGURIDAD</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">EQUIPOS DE COMPUTO</a>
            <ul class="dropdown-menu" style="position: inherit;">
              <li><a class="dropdown-item" href="#">CABLES DE RED</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">CONSUMIBLES</a>
            <ul class="dropdown-menu" style="position: inherit;">
              <li><a class="dropdown-item" href="#">NO BREAKS Y UPS</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">FACTURACION ELECTRONICA</a>
            <ul class="dropdown-menu" style="position: inherit;">
              <li><a class="dropdown-item" href="#">ECOMM</a></li>
              <li><a class="dropdown-item" href="#">CEO</a></li>
            </ul>
          </li>
          <div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
      Dropdown button
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Link 1</a></li>
      <li><a class="dropdown-item" href="#">Link 2</a></li>
      <li><a class="dropdown-item" href="#">Link 3</a></li>
    </ul>
  </div>
          <li class="nav-item">
            <form role="search">
              <input class="form-control inpse" type="Buscar" placeholder="Buscar" aria-label="Buscar">
              <button class="btn" type="">
                <i class="fa fa-search"></i>
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>

  
    
  
</body>

</html>