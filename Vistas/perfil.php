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

    $sql="UPDATE clientes SET c_nmb = TRIM('$nombre'), c_apellidos =TRIM('$apellido'), c_telefono=TRIM('$telefono'), c_rfc = TRIM('$rfc'),
    c_razon=TRIM('$razonsoc'), c_regimenfis=TRIM('$regimen'), c_calle=TRIM('$calle'), c_colonia=TRIM('$colonia'), c_nume=TRIM('$numeroe'),
    c_numi=TRIM('$numeroi'), c_municipio=TRIM('$municipio'), c_cp=TRIM('$cp'), c_estado=TRIM('$estado'), c_pais=TRIM('$pais'), c_fmod=NOW()
    WHERE c_mail='$usuario'";
if (setq($sql)) {
        ?>
        <script>
    Swal.fire({
            title: 'Datos Actualizados',
            timer: 1500,
            timerProgressBar: true,
            icon: 'success'
        }
    );
    window.location.href = "verperfil.php";
        </script>
<?php
    }

    else {
        echo "Hubo Un Error En La Actualizacion";
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

    $sql="UPDATE clientes SET c_nmb = TRIM('$nombre'), c_apellidos =TRIM('$apellido'), c_telefono=TRIM('$telefono'), c_rfc = TRIM('$rfc'),
    c_razon=TRIM('$razonsoc'), c_regimenfis=TRIM('$regimen'), c_calle=TRIM('$calle'), c_colonia=TRIM('$colonia'), c_nume=TRIM('$numeroe'),
    c_numi=TRIM('$numeroi'), c_municipio=TRIM('$municipio'), c_cp=TRIM('$cp'), c_estado=TRIM('$estado'), c_pais=TRIM('$pais'),
    c_password=PASSWORD('$contrasena')
     WHERE c_mail='$usuario'";
if (setq($sql)) {
        ?>
        <script>
    window.location.href = "verperfil.php";

    Swal.fire({
            title: 'Datos Actualizados',
            timer: 1500,
            timerProgressBar: true,
            icon: 'success'
        }

    );
        </script>
<?php
    }

    else {
        echo "Hubo Un Error En La Actualizacion";
    }
}
?>