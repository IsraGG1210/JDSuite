<?php
function setq($sql,$die = false){  //Realizar una consulta a BD en primer nivel
  $dbuser = "root"; // El usuario
  $dbpass = "wptye2014"; // El Pass
  $dbhost = "192.168.100.165"; // El host
  $db = "tyesolutions_jdceo"; // Nombre de la base
  
  $mysqli = new mysqli($dbhost, $dbuser,$dbpass, $db);
  $mysqli->query("SET CHARACTER SET utf8");
  $mysqli->query("SET NAMES utf8");
 
  if($die) die($sql);
  $result = $mysqli->query($sql);
  $mysqli->close();
 
  return($result);
 
 }
 
 /* function setq($sql,$die = false){  //Realizar una consulta a BD en primer nivel
   $dbuser = "tyesolut_root"; // El usuario
   $dbpass = "Wptyeall.0"; // El Pass
   $dbhost = "localhost"; // El host
   $db = "tyesolut_jdceo"; // Nombre de la base
   
   $mysqli = new mysqli($dbhost, $dbuser,$dbpass, $db);
   $mysqli->query("SET CHARACTER SET utf8");
   $mysqli->query("SET NAMES utf8");
  
   if($die) die($sql);
   $result = $mysqli->query($sql);
   $mysqli->close();
  
   return($result);
  
  } */
 

?>