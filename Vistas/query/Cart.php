<?php
    /* require 'Conexion/config.php';    require 'Conexion/Database.php'; */
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];
$talla = $_POST['talla'];
$color = $_POST['colorsel'];
$cantidad = $_POST['cantidad'];
$producto = $_POST['p'];

        function setq($sql,$die = false){  //Realizar una consulta a BD en primer nivel
            $dbuser = "root"; // El usuario
            $dbpass = "wptye2014"; // El Pass
           
            $dbhost = "192.168.100.240"; // El host
            $db = "tyesolutions_jdceo"; // Nombre de la base
            $mysqli = new mysqli($dbhost, $dbuser,$dbpass, $db);
            $mysqli->query("SET CHARACTER SET utf8");
            $mysqli->query("SET NAMES utf8");
           
            if($die) die($sql);
            $result = $mysqli->query($sql);
            $mysqli->close();
           
            return($result);
           
           }
          
          $sql = "SELECT * FROM clientes";
          $resultado = setq($sql);
          while($row = $resultado->fetch_array()){
            
          }

    /* $sql = 'INSERT INTO pedidoscld (`pd_producto`, `pd_cantidad`, `pd_talla`, `pd_color`, `pd_precio`, `pd_descuento`)
    VALUES ('$producto', '$cantidad', '$talla', '$colorsel', '$precio', '$descuento');");'; */
    $sql = 'INSERT INTO pedidoscld SET
            pd_producto = "'.$producto.'",
            pd_cantidad = "'.$cantidad.'",
            pd_talla = "'.$talla.'",
            pd_color = "'.$color.'",
            pd_precio = "'.$precio.'",
            pd_descuento = "'.$descuento.'"';
    $result = setq($sql);    
?>