<?php require 'Conexion/funciones.php';
include 'header.php';
$usuario=$_SESSION['username'];

$sql="SELECT * FROM clientes WHERE c_mail = '$usuario'";
$consutla=setq($sql);
$result=mysqli_fetch_array($consutla);

if ($_POST['password']==$result['c_password']) {
    $nombre=$_POST['name'];
    $apellido=$_POST['apellidos'];
    $telefono=$_POST['telefono'];
    $rfc=$_POST['rfc'];
    $razonsoc=$_POST['razonsocial'];
    $regimen=$_POST['regimen'];
    $calle=$_POST['calle'];
    $colonia=$_POST['colonia'];
    $numeroe=$_POST['numeroe'];
    $numeroi=$_POST['numeroi'];
    $municipio=$_POST['municipio'];
    $cp=$_POST['codigop'];
    $estado=$_POST['estado'];
    $pais=$_POST['pais'];

   
    $sql ='UPDATE clientes SET
    c_nmb = "'.clearvmayus($nombre).'",
    c_apellidos = "'.clearvmayus($apellido).'",
    c_telefono = "'.$telefono.'",
    c_rfc = "'.clearvmayus($rfc).'",
    c_razon = "'.clearvmayus($razonsoc).'",
    c_regimenfis = "'.clearvmayus($regimen).'",
    c_calle = "'.clearvmayus($calle).'",
    c_colonia = "'.clearvmayus($colonia).'",
    c_nume = "'.clearvmayus($numeroe).'",
    c_numi = "'.clearvmayus($numeroi).'",
    c_municipio = "'.clearvmayus($municipio).'",
    c_cp = "'.$cp.'",
    c_estado = "'.clearvmayus($estado).'",
    c_pais = "'.clearvmayus($pais).'",
    c_fmod = NOW()
    WHERE c_mail="'.$usuario.'"';
if (setq($sql,true)) {
        ?>
        <script>
            
    Swal.fire({
            title: 'Datos Actualizados',
            timer: 900,
            timerProgressBar: true,
            icon: 'success'
        }
    );
   
setTimeout(function () {
   window.location.href = "verperfil.php";
}, 900);

        </script>
<?php
    }

    else {
        ?>
        <script>
            
        Swal.fire({
                title: 'Hubo un error en la actualizacion de los datos',
                timer: 900,
                timerProgressBar: true,
                icon: 'error'
            }
        );
       
    setTimeout(function () {
       window.location.href = "verperfil.php";
    }, 900);
    
            </script>
            <?php
    }
}

else if($_POST['password'] !=$result['c_password']) {
    $nombre=$_POST['name'];
    $apellido=$_POST['apellidos'];
    $telefono=$_POST['telefono'];
    $rfc=$_POST['rfc'];
    $razonsoc=$_POST['razonsocial'];
    $regimen=$_POST['regimen'];
    $calle=$_POST['calle'];
    $colonia=$_POST['colonia'];
    $numeroe=$_POST['numeroe'];
    $numeroi=$_POST['numeroi'];
    $municipio=$_POST['municipio'];
    $cp=$_POST['codigop'];
    $estado=$_POST['estado'];
    $pais=$_POST['pais'];
    $contrasena=$_POST['password'];

   
     $sql ='UPDATE clientes SET
     c_nmb = "'.clearvmayus($nombre).'",
     c_apellidos = "'.clearvmayus($apellido).'",
     c_telefono = "'.$telefono.'",
     c_rfc = "'.clearvmayus($rfc).'",
     c_razon = "'.clearvmayus($razonsoc).'",
     c_regimenfis = "'.clearvmayus($regimen).'",
     c_calle = "'.clearvmayus($calle).'",
     c_colonia = "'.clearvmayus($colonia).'",
     c_nume = "'.clearvmayus($numeroe).'",
     c_numi = "'.clearvmayus($numeroi).'",
     c_municipio = "'.clearvmayus($municipio).'",
     c_cp = "'.$cp.'",
     c_estado = "'.clearvmayus($estado).'",
     c_pais = "'.clearvmayus($pais).'",
     c_password = "PASSWORD('.$contrasena.'",
     c_fmod = NOW()
     WHERE c_mail="'.$usuario.'"';
if (setq($sql,true)) {
        ?>
        <script>
    Swal.fire({
            title: 'Datos Actualizados',
            timer: 900,
            timerProgressBar: true,
            icon: 'success'
        }
    );
    setTimeout(function () {
   window.location.href = "verperfil.php";
}, 900);
        </script>
<?php
    }

    else {
        ?>
        <script>
            
        Swal.fire({
                title: 'Hubo un error en la actualizacion de los datos',
                timer: 900,
                timerProgressBar: true,
                icon: 'error'
            }
        );
       
    setTimeout(function () {
       window.location.href = "verperfil.php";
    }, 900);
    
            </script>
            <?php
    }
}
?>