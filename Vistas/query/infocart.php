<?php   
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

    $sql = "SELECT SUM(pd_cantidad) as cantidadTotal FROM pedidoscld";
    $resultado = setq($sql);
if ($fila = $resultado->fetch_assoc()) {
    $cantidadTotal = $fila['cantidadTotal'];
    echo number_format($cantidadTotal);
} else {
    echo "No se encontraron resultados";
}


?>