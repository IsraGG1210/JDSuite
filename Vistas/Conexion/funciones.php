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
 function getmax($key,$table,$cond=false,$sumar=true){
  $sql = 'SELECT MAX('.$key.') FROM '.$table.' ';
  if($cond) $sql.=' WHERE '.$cond;
  $result = setq($sql);
  list($id) = $result->fetch_array();
  if($sumar) $id++;

  return($id);
}

 function busca($target, $tabla, $id, $nmb) {
  $sql = "SELECT $nmb FROM $tabla WHERE $id=\"$target\"";
  $result = setq($sql) or die($sql.' <br>'.mysql_error());
  list($busca) = $result->fetch_row();
  return $busca;
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