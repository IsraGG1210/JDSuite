<?php
require_once '../Conexion/funciones.php';

session_start();
if(isset($_SESSION['username'])){
    $sesion = $_SESSION['username'];
    // Verificar si se ha enviado una imagen
    if(isset($_FILES["perfil"]) && $_FILES["perfil"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
        $filename = $_FILES["perfil"]["name"];
        $filetype = $_FILES["perfil"]["type"];
        $filesize = $_FILES["perfil"]["size"];

        // Verificar si el archivo cargado es una imagen
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Elige un archivo válido.");

        // Verificar el tamaño máximo permitido
        $maxsize = 5 * 1024 * 1024; // 5MB
        if($filesize > $maxsize) die("Error: El archivo es demasiado grande.");

        //Destino 
        $directorio = "imagenes";
        
        // Verificar si el tipo de archivo es válido
        if(in_array($filetype, $allowed)){
            // Dividir la imagen en partes más pequeñas
            $imagen = ($_FILES["perfil"]["tmp_name"]);
            $destino = $directorio."/".$filename;
            //echo $destino;
                $sql = "UPDATE clientes set photo = '$destino'
                WHERE c_mail = '$sesion'";
                $resultado = setq($sql);
                if(move_uploaded_file($imagen,$destino)){
                    ?>
                    <script>
                        
                        window.location.href = "verperfil.php";
                    </script>
                    <?php
                }
               
        }
    }       
} else{
    echo "Error: No puedes subir foto de perfil sin sesión";
}
?>
