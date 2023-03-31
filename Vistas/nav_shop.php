<?php
include ('header.php');
require_once 'Conexion/funciones.php';


$sql ="SELECT * FROM departamentosw limit 8";
$resultado = setq($sql);



?>


<nav class="navbar navbar-expand-xl navbar-light bg-light" id="navshop">
  <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">


        <?php while($row=$resultado->fetch_array()){?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button"
            data-bs-toggle="dropdown"><?php echo $row['dw_nmb']?></a>
          <ul class="dropdown-menu">
            <?php
             $sql2 ='SELECT * FROM conceptos INNER JOIN departamento_concepto ON c_id = dc_concepto WHERE dc_departamento = "'.$row['dw_id'].'"';
            $resultado2 = setq($sql2);
            while($row2 = $resultado2->fetch_array()){?>
            <li><a class="dropdown-item"
                href="<?PHP echo SERVERURL;?>1/con/<?php echo $row2['c_id']?>"><?php echo $row2['c_nmb']?></a></li>
            <?php }?>
            <li><a class="dropdown-item" href="<?php echo SERVERURL;?>1/dep/<?php echo $row['dw_id']?>">VER TODO</a>
            </li>
          </ul>
        </li>
        <?php }?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?php echo SERVERURL?>1">TODOS LOS PRODUCTOS</a>
        </li>

      </ul>
      <form class="d-flex" method="GET" action="<?php echo SERVERURL?>1/">
        <input name="busqueda" class="form-control me-2" type="text" placeholder="Buscar">

        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
  </div>
</nav>

<script>


</script>