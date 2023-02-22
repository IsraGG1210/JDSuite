<?php

include ('header.php');
require_once 'Conexion/funciones.php';


$sql ="SELECT * FROM departamentosw limit 8";
$resultado = setq($sql);



?>


<nav class="navbar navbar-expand-sm " style="background-color:#E5E5E5;">
  <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        

      <?php while($row=$resultado->fetch_array()){?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo $row['dw_nmb']?></a>
          <ul class="dropdown-menu">
            <?php
             $sql2 ='SELECT * FROM conceptos INNER JOIN departamento_concepto ON c_id = dc_concepto WHERE dc_departamento = "'.$row['dw_id'].'"';
            $resultado2 = setq($sql2);
            while($row2 = $resultado2->fetch_array()){?>
            <li><a class="dropdown-item" href="#"><?php echo $row2['c_nmb']?></a></li>
            <?php }?>
            <li><a class="dropdown-item" href="#">VER TODO</a></li>
          </ul>
        </li>
        <?php }?>
        
       
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Buscar">
        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
      </form>
    </div>
  </div>
</nav>