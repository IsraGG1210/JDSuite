
<!DOCTYPE html>
<html lang="es">
<head>
  <base href="/"/>
  <title>Detalle de Producto - JD SHOP</title>
  <meta charset="UTF-8">
  <meta name="robots" content="all,follow">
  <meta name="googlebot" content="index,follow,snippet,archive">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta content='JDShop' property='og:title'/>
  <meta content='https://www.jdshop.mx/img/logo.png' property='og:image'/>
  <meta content='Tu mejor opcion para comprar tecnologia. Enviamos a toda la republica, solo marcas originales.' property='og:description'/>
  <meta content='https://www.jdshop.mx' property='og:url'/>


  <style>

.modal {
  display: none; /* Hidden by default */
  /*padding-left:20px;*/
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 50px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

  </style>
    <link rel="shortcut icon" href="img/favjd.ico">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
  <link href="css/font-awesome.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/owl.carousel.css" rel="stylesheet">
  <link href="css/owl.theme.css" rel="stylesheet">
  <link href="css/style.red.css" rel="stylesheet" id="theme-stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
  <script src="js/respond.min.js"></script>


  <!-- Facebook Pixel Code -->
  <script>
  	!function(f,b,e,v,n,t,s)
  	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  	n.queue=[];t=b.createElement(e);t.async=!0;
  	t.src=v;s=b.getElementsByTagName(e)[0];
  	s.parentNode.insertBefore(t,s)}(window, document,'script',
  	'https://connect.facebook.net/en_US/fbevents.js');
  	fbq('init', '579788419963855');
  	fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
  	src="https://www.facebook.com/tr?id=579788419963855&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->

  <script src="js/jquery-1.11.0.min.js"></script>

  


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0L8FBYE3SL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0L8FBYE3SL');
</script>

</head>
<body>
<!-- <meta name="google-signin-client_id" content="1025774629891-a2s7t0ugbe5m02c32b7uq46q2r35secd.apps.googleusercontent.com"> -->
<!-- <meta name="google-signin-client_id" content="698101862254-0fpis3c7niarqinjfaadiqvi7tb5tfa8.apps.googleusercontent.com"> -->

<!--
<meta name="google-signin-client_id" content="213268994405-kmq2iigaqfvki90bql0b0elo5otqs5h5.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
-->

<script>
function checkft(){
  var sub = 1;
  var x = $("#nombreft").val();
  if(/^\s*$/.test(x) || x == ""){
    sub = 0;
    $("#nombreft")[0].setCustomValidity("Verifica este campo");
  }
  else{
    $("#nombreft")[0].setCustomValidity("");
  }
  var x = $("#emailft").val();
  if(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/.test(x)){
    $("#emailft")[0].setCustomValidity("");
  }
  else{
    sub = 0;
    $("#emailft")[0].setCustomValidity("No es un correo valido");
  }
  var x = $("#telefonoft").val();
  if(/^[0-9]{7,10}$/.test(x)){
    $("#telefonoft")[0].setCustomValidity("");
  }
  else{
    sub = 0;
    $("#telefonoft")[0].setCustomValidity("7 a 10 Digitos");
  }
  var x = $("#mensajeft").val();
  if(/^\s*$/.test(x) || x == ""){
    sub = 0;
    $("#mensajeft")[0].setCustomValidity("Verifica este campo");
  }
  else{
    $("#mensajeft")[0].setCustomValidity("");
  }
  /*if(sub == 1){
    document.getElementById("enviarc").disabled = false;
  }
  else if(sub == 0){
    document.getElementById("enviarc").disabled = true;
  }*/
}     
</script>
<div class="g-signin2" style="display: none;"></div>
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
              <span class="text-white font-weight-bold"><b>  ¡Si tu compra es mayor a $5,000.00 tu envío es gratis!</b></span>
                        </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                                        <li><a href="#" data-toggle="modal" data-target="#login-modal">Entrar</a></li>
                    <li><a href="register">Registrarse</a></li>
                    <li><a href="contact">Contacto</a></li>
<!--
                    <script>

                            function onSignIn(googleUser) {
                            var profile = googleUser.getBasicProfile();
                            auth("login", profile);
                            }


                            function auth(action, profile){
                              let data = {UserAction: action};

                              if(profile)
                              {
                                data =
                                {
                                  UserName: profile.getName(),
                                  UserEmail: profile.getEmail(),
                                  UserAction: action
                                };
                              }

                              $.ajax(
                                {

                                  type: "POST",
                                  url: "usergoogle.php",
                                  data: data,
                                  success: function(resultado){
                                if(resultado === "0"){

                                  $(location).attr('href',"index");
                                  //location.reload();
                                  //return false;

                                }
                                else{
                                  if(resultado === "1"){

                                  alert("Registro Exitoso");
                                  $(location).attr('href',"index");
                                            }
                                    }
                                  }
                                });

                                return false;

                            }




                            </script>
-->
                                    </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Acceso Clientes</h4>
                    </div>

                      <hr>
                        <form method="post" onsubmit="return checkloginm();">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="Correo" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="Contraseña" required>
                            </div>
                                                        <div class="form-group" id="dcaptchal-modal" style="display: none;">
                                <label for="captcha">Codigo de Confirmacion</label><br>
                                <label id="imgcap-modal"><img src="captchal" border="0"/></label>
                                <input type="text" class="form-control" name="captcha-modal" id="captcha-modal">
                            </div>
                            <div class="text-center" id="validalogin-modal"></div>
                            <p class="text-center text-muted"><a href="#" onclick="changel(1);">¿Olvidaste tu contraseña?</a></p>
                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i>Entrar</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">¿Todavía no estas registrado?</p>
                        <p class="text-center text-muted"><a href="register"><strong>Registrate Ahora!</strong></a> </p>
                    </div>
                    <div class="modal-body" id="rstmodal" style="display:none;">
                        <form method="post" onsubmit="return restpassl();">
                            <p class="text-center text-muted"><strong>Restablecer Contraseña</strong></p>
                            <div class="form-group">
                                <input type="text" class="form-control" id="remail-modal" placeholder="Correo">
                            </div>
                            <div class="text-center" id="rstmsg-modal"></div>
                            <p class="text-center">
                                <button class="btn btn-default" onclick="changel(2);"><i class="fa fa-times"></i>Cancelar</button>
                                <button class="btn btn-primary" id="subrst-modal"><i class="fa fa-user"></i>Enviar</button>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" id="popsp" data-toggle="modal" data-target="#popspm" style="display: none;">msg</a>
        <div class="modal fade" id="popspm" tabindex="-1" role="dialog" aria-labelledby="recuperacion" aria-hidden="true">
            <div class="modal-dialog modal-sm" style="min-width:600px;">
                <div class="modal-content">
                    <div class="modal-body" id="loginmodal">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <img src="img/spam.jpg" alt="" style="width: 100%;height: auto;"/>
                    </div>
                </div>
            </div>
        </div>
<script>
function checkloginm(){
  var email = $("#email-modal").val();
  var contrasena = $("#password-modal").val();
  var captcha = $("#captcha-modal").val();
  var datos = {
    'email' : email,
    'password' : contrasena,
    'captcha' : captcha
  };
  $.ajax({
    type: "POST",
    data: datos,
    url: "query/validarlogin.php",
    success: function(resultado){
      if(resultado == "0"){
        $(location).attr('href',"index");
      }
      else{
        $('#validalogin-modal').html('<label style="color:#FF0000;">Correo o Contraseña Incorrectos</label><br><label style="color:#FF0000;">'+resultado+' Intento(s) Fallidos</label>');
        $("#password-modal").val('');
        if(resultado >= 3){
          $('#dcaptchal-modal').show();
          $("#imgcap-modal").html('<img src="captchal" border="0"/>');
        }
      }
    }
  });
  return false;
}
function restpassl(){
  var email = $("#remail-modal").val();
  $("#subrst-modal").prop("disabled", true);
  var datos = {
    'email' : email
  };
  $.ajax({
    type: "POST",
    data: datos,
    url: "query/rstpass.php",
    success: function(resultado){
      var cad = '<label style="color:#00CC33;">Te hemos enviado un correo con tu nueva contraseña. </label>';
      $('#rstmsg-modal').html(resultado);
      $("#subrst-modal").prop("disabled", false);
      if(resultado == cad){
        $("#popsp").click();
      }
    }
  });
  return false;
}
function changel(id){
  if(id == 1){
    $('#loginmodal').hide();
    $('#rstmodal').show();
  }
  else if(id == 2){
    $('#loginmodal').show();
    $('#rstmodal').hide();
  }
}
</script>
    </div>
    <!-- *** TOP BAR END *** -->
    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index" data-animate-hover="none">
                    <img src="img/logo.png" alt="" class="hidden-xs logo">
                    <img src="img/logo.png" alt="" class="visible-xs logo"><span class="sr-only"></span>
                </a>

                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only"></span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only"></span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="cart">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs"></span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation" style="padding-left: 0px;padding-right: 0px;">


                <ul class="nav navbar-nav navbar-left">
                    <!--<li class="active"><a href="index">Home</a>
                    </li>-->
                                        <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">SEGURIDAD Y VIGILANCIA <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/17/KIT DE CAMARAS DE SEGURIDAD">KIT DE CAMARAS DE SEGURIDAD</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/17/KIT DE CAMARAS DE SEGURIDAD/ct/7/KIT DE 4 CÁMARAS DE SEGURIDAD">KIT DE 4 CÁMARAS DE SEGURIDAD</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/17/KIT DE CAMARAS DE SEGURIDAD/ct/18/KIT DE 8 CÁMARAS DE SEGURIDAD">KIT DE 8 CÁMARAS DE SEGURIDAD</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/17/KIT DE CAMARAS DE SEGURIDAD/ct/25/KIT DE 16 CÁMARAS DE SEGURIDAD">KIT DE 16 CÁMARAS DE SEGURIDAD</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/16/ACCESORIOS GENERALES">ACCESORIOS GENERALES</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/16/ACCESORIOS GENERALES/ct/26/TRANSCEPTORES DE VIDEO">TRANSCEPTORES DE VIDEO</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/16/ACCESORIOS GENERALES/ct/27/CAJAS DE INTERCONEXIÓN">CAJAS DE INTERCONEXIÓN</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/16/ACCESORIOS GENERALES/ct/70/ADAPTADORES DE ALIMENTACIÓN Y ELECTRICIDAD">ADAPTADORES DE ALIMENTACIÓN Y ELECTRICIDAD</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/16/ACCESORIOS GENERALES/ct/80/GABINETES PARA CÁMARAS">GABINETES PARA CÁMARAS</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/16/ACCESORIOS GENERALES/ct/81/GABINETES DE ACERO PARA DVR Y NVR">GABINETES DE ACERO PARA DVR Y NVR</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/16/ACCESORIOS GENERALES/ct/94/MICRÓFONOS">MICRÓFONOS</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/31/CONTROL DE ACCESO">CONTROL DE ACCESO</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/31/CONTROL DE ACCESO/ct/29/CHECADORES">CHECADORES</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/31/CONTROL DE ACCESO/ct/97/VIDEOPORTEROS E INTERFONOS">VIDEOPORTEROS E INTERFONOS</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/31/CONTROL DE ACCESO/ct/105/CERRADURAS">CERRADURAS</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/32/ENERGÍA">ENERGÍA</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/32/ENERGÍA/ct/39/FUENTE DE ALIMENTACIÓN">FUENTE DE ALIMENTACIÓN</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/32/ENERGÍA/ct/120/BATERÍAS">BATERÍAS</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/18/CAMARAS Y VIDEOGRABADORES">CAMARAS Y VIDEOGRABADORES</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/18/CAMARAS Y VIDEOGRABADORES/ct/9/CÁMARAS ESPECIALES">CÁMARAS ESPECIALES</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/18/CAMARAS Y VIDEOGRABADORES/ct/13/VIDEOGRABADORES DVR">VIDEOGRABADORES DVR</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/18/CAMARAS Y VIDEOGRABADORES/ct/14/CÁMARA TIPO BALA">CÁMARA TIPO BALA</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/18/CAMARAS Y VIDEOGRABADORES/ct/15/CÁMARA TIPO DOMO">CÁMARA TIPO DOMO</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/18/CAMARAS Y VIDEOGRABADORES/ct/69/PTZ">PTZ</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/18/CAMARAS Y VIDEOGRABADORES/ct/78/VIDEOGRABADORES NVR">VIDEOGRABADORES NVR</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/38/ALMACENAMIENTO">ALMACENAMIENTO</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/38/ALMACENAMIENTO/ct/54/MEMORIAS USB">MEMORIAS USB</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/38/ALMACENAMIENTO/ct/55/DISCO DURO EXTERNO">DISCO DURO EXTERNO</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/38/ALMACENAMIENTO/ct/60/DISCO DURO">DISCO DURO</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/38/ALMACENAMIENTO/ct/61/DISCO DURO SSD">DISCO DURO SSD</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/38/ALMACENAMIENTO/ct/101/MEMORIAS SD MEMORIAS MICRO SD">MEMORIAS SD MEMORIAS MICRO SD</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/45/CABLES Y CONECTORES">CABLES Y CONECTORES</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/45/CABLES Y CONECTORES/ct/84/CABLES ARMADOS">CABLES ARMADOS</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/45/CABLES Y CONECTORES/ct/116/VGA DVI HDMI">VGA DVI HDMI</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/45/CABLES Y CONECTORES/ct/117/CABLE COAXIAL Y CONECTORES">CABLE COAXIAL Y CONECTORES</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/43/CÁMARAS IP">CÁMARAS IP</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/43/CÁMARAS IP/ct/79/WIFI">WIFI</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/43/CÁMARAS IP/ct/95/CÁMARAS TIPO BALA IP">CÁMARAS TIPO BALA IP</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/43/CÁMARAS IP/ct/109/CÁMARAS WEB">CÁMARAS WEB</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/43/CÁMARAS IP/ct/115/CÁMARAS TIPO DOMO IP">CÁMARAS TIPO DOMO IP</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/43/CÁMARAS IP/ct/118/PTZ IP">PTZ IP</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/44/HIKVISION PANELES DE ALARMA Y ACCESORIOS">HIKVISION PANELES DE ALARMA Y ACCESORIOS</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/44/HIKVISION PANELES DE ALARMA Y ACCESORIOS/ct/82/AX PRO KITS">AX PRO KITS</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/44/HIKVISION PANELES DE ALARMA Y ACCESORIOS/ct/83/SENSORES">SENSORES</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/44/HIKVISION PANELES DE ALARMA Y ACCESORIOS/ct/111/BOTÓN DE PÁNICO">BOTÓN DE PÁNICO</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/51/VIDEOGRABADORAS MÓVILES Y PORTÁTILES">VIDEOGRABADORAS MÓVILES Y PORTÁTILES</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/51/VIDEOGRABADORAS MÓVILES Y PORTÁTILES/ct/106/CÁMARAS">CÁMARAS</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/56/MONITORES Y PANTALLAS">MONITORES Y PANTALLAS</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/3/SEGURIDAD Y VIGILANCIA/c/56/MONITORES Y PANTALLAS/ct/119/PANTALLAS Y MONITORES">PANTALLAS Y MONITORES</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                         </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                                        <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">REDES <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/6/REDES/c/7/CABLES RED">CABLES RED</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/7/CABLES RED/ct/8/UTP CATEGORÍA 5E">UTP CATEGORÍA 5E</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/7/CABLES RED/ct/33/UTP CATEGORÍA 6">UTP CATEGORÍA 6</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/7/CABLES RED/ct/35/PATCH CORD">PATCH CORD</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/7/CABLES RED/ct/102/UTP CATEGORÍA 6A">UTP CATEGORÍA 6A</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/7/CABLES RED/ct/103/UTP CATEGORÍA 7A">UTP CATEGORÍA 7A</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/7/CABLES RED/ct/104/FIBRA ÓPTICA">FIBRA ÓPTICA</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/6/REDES/c/33/CONECTORES">CONECTORES</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/33/CONECTORES/ct/34/JACKS - PLUGS">JACKS - PLUGS</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/6/REDES/c/34/RACKS Y GABINETES">RACKS Y GABINETES</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/34/RACKS Y GABINETES/ct/36/GABINETES PARA MONTAJE EN PARED">GABINETES PARA MONTAJE EN PARED</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/34/RACKS Y GABINETES/ct/37/RACKS ABIERTOS">RACKS ABIERTOS</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/34/RACKS Y GABINETES/ct/38/ACCESORIOS PARA RACK">ACCESORIOS PARA RACK</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/34/RACKS Y GABINETES/ct/52/PATCH PANEL">PATCH PANEL</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/6/REDES/c/36/RED ACTIVA">RED ACTIVA</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/36/RED ACTIVA/ct/48/ACCES POINT">ACCES POINT</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/36/RED ACTIVA/ct/49/EXTENSOR DE RED">EXTENSOR DE RED</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/36/RED ACTIVA/ct/50/ROUTER">ROUTER</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/6/REDES/c/36/RED ACTIVA/ct/51/SWITCH">SWITCH</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                         </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                                        <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">ENERGIA <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/4/ENERGIA/c/20/NO BREAKS Y UPS">NO BREAKS Y UPS</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/4/ENERGIA/c/20/NO BREAKS Y UPS/ct/41/NO BREAKS">NO BREAKS</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/4/ENERGIA/c/20/NO BREAKS Y UPS/ct/42/REGULADORES">REGULADORES</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/4/ENERGIA/c/53/ENERGÍA SOLAR">ENERGÍA SOLAR</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/4/ENERGIA/c/53/ENERGÍA SOLAR/ct/108/PANELES SOLARES">PANELES SOLARES</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/4/ENERGIA/c/53/ENERGÍA SOLAR/ct/114/ACCESORIOS ENERGÍA SOLAR">ACCESORIOS ENERGÍA SOLAR</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                         </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                                        <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">IOT GPS TELEMÁTICA <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/9/IOT GPS TELEMÁTICA/c/52/ANTENAS">ANTENAS</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/9/IOT GPS TELEMÁTICA/c/52/ANTENAS/ct/107/DIRECCIONALES">DIRECCIONALES</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/9/IOT GPS TELEMÁTICA/c/53/ENERGÍA SOLAR">ENERGÍA SOLAR</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/9/IOT GPS TELEMÁTICA/c/53/ENERGÍA SOLAR/ct/108/PANELES SOLARES">PANELES SOLARES</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/9/IOT GPS TELEMÁTICA/c/53/ENERGÍA SOLAR/ct/114/ACCESORIOS ENERGÍA SOLAR">ACCESORIOS ENERGÍA SOLAR</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/9/IOT GPS TELEMÁTICA/c/54/GPS">GPS</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/9/IOT GPS TELEMÁTICA/c/54/GPS/ct/110/TRACKERS GPS">TRACKERS GPS</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                         </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                                        <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">DETECCIÓN DE FUEGO <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                                                            <div class="col-sm-3">
                                            <h5><a href="category/d/10/DETECCIÓN DE FUEGO/c/55/DISPOSITIVOS CONVENCIONALES">DISPOSITIVOS CONVENCIONALES</a></h5>
                                            <ul>
                                                                                            <li>
                                                <a href="category/d/10/DETECCIÓN DE FUEGO/c/55/DISPOSITIVOS CONVENCIONALES/ct/112/DETECTORES DE TEMPERATURA">DETECTORES DE TEMPERATURA</a>
                                                </li>
                                                                                            <li>
                                                <a href="category/d/10/DETECCIÓN DE FUEGO/c/55/DISPOSITIVOS CONVENCIONALES/ct/113/DETECTORES DE HUMO">DETECTORES DE HUMO</a>
                                                </li>
                                                                                        </ul>
                                        </div>
                                                                         </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                                    </ul>


            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                                <a href="cart" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm" id="cartall">1</span></a>

              </div>
                <!--/.nav-collapse -->


                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only"></span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>



            </div>

            <div class="collapse clearfix" id="search">
            <form class="navbar-form" role="search" action="category" method="get">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Buscar">
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->
    <div id="all">

        <div id="content">
            <div class="container" >
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index">Home</a>
                        </li>
                        <li><a href="category/d/3/SEGURIDAD-Y-VIGILANCIA">SEGURIDAD Y VIGILANCIA</a>
                        </li>
                        <li><a href="category/d/3/SEGURIDAD-Y-VIGILANCIA/ct/15/CÁMARA-TIPO-DOMO">CÁMARA TIPO DOMO</a>
                        </li>
                        <li>TURRET TURBOHD 1080P LENTE 2.8 MM 50 MTS IR EXIR EXTERIOR IP66 METAL ULTRA BAJA ILUMINACIÓN 4 TECNOLOGÍAS</li>
                    </ul>

                </div>

                <div class="box col-md-12" style="background: white;
                    border-radius: 5px;">
                    <div class="row " id="productMain">       
                    
                            <div class="row col-md-1 col-sm-2 col-xs-2" id="thumbs">

                                     
                                                                <div class="col-md-12">
                                    <a href="productos/CB000007821228.peg" class="thumb">
                                        <img src="productos/CB000007821228.peg" id="thumb2" alt="" onclick="" class="img-responsive">
                                    </a>
                                    <br>
                                </div>
                                
                            </div>
                            

                        
                         <!-- de izq-->

                            <div class="col-md-6 col-sm-10 col-xs-10" style="">
                            


 
                            <div id="mainImage" class="" style="background: #ffffff; max-width:400px; margin:auto; border-radius: 10px;">
                            
                            <a style="cursor:pointer;" data-toggle="modal" data-target="#flipFlop">
                            <img  src="productos/CB000007821228.peg" alt="" class="img-responsive" style="margin:auto; display:block;">
                            </a> 
                            
                                                  
                         
                            <!-- The modal -->
                            <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                          
                            <div class="col-xs-11" style="text-align:end;     margin: 10px; ">
                            <button type="button" class="btn" style="color: #fdf; background-color: rgb(0 0 0 / 50%);border-color: #ccc; border-radius: 3vmax;" 
                            data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="" >
                            
                            
                            <center>
                            <img style="width:450px;" id="mostrarmainImage" src="productos/CB000007821228.peg" alt="" class="img-responsive">
                            <center>
                            </div>
                            </div>


                            </div>
                            <br>

                            
                               
                        

                            <br>
                            
                            
                        </div>
                        <div class="col-md-5">
                            <div class="box col-sm-12 col-xs-12" style="margin: 0 0 0px; border-radius: 10px;">
                                <h4 class="text-center" style="padding-top: 27px; text-align: left;">TURRET TURBOHD 1080P LENTE 2.8 MM 50 MTS IR EXIR EXTERIOR IP66 METAL ULTRA BAJA ILUMINACIÓN 4 TECNOLOGÍAS</h4> 
                                <p class="goToDescription"><a href="#details" class="scroll-to">Ir a la descripcion del producto</a>
                                </p>
                               
                                                                   <p class="price">$ 605.00</p>
                                   <input type="hidden" id="precio" value="605.00"/>
                                   <input type="hidden" id="descuento" value="0"/>

                                   <p class="text-center buttons">
                                   Existencia:  Disponible</p><br>
                                   <p class="text-center buttons">
                                    Clave: CB00000782</p>
                                    <p class="text-center buttons">
                                    Modelo: E8-TURBO-X5W</p>
                                    <p class="text-center buttons">
                                    Marca: EPCOM</p><br>
                                
                                  <p class="text-center buttons">
                                  CANTIDAD:<br>
                                  <a class="btn btn-default" onclick="subc();"><i class="fa fa-minus"></i></a>
                                  <input type="number" name="cantidad" id="cantidad" min="1" value="1" class="btn btn-default" onchange="changecant();" style="width: 25%;">
                                  <a class="btn btn-default" onclick="addc();"><i class="fa fa-plus"></i></a>
                                  </p>

                                  <p class="text-center buttons">
                                      <a id="bag" onclick="addbag('CB00000782',0);" class="btn btn-success"><i class="fa fa-usd"></i> Comprar</a>
                                      <a id="cart" onclick="addcart('CB00000782',0);" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Añadir a carrito</a>
                                      <!--<div class="row" style="padding-top:0;">
                                      <div class="text-right" style="max-height: 0px;">
                                      <a id="heart" onclick="addwish('CB00000782');" 
                                      class="btn btn-lg btn-link" style="padding: 0px;line-height: 0;font-size:24px;" alt="Añadir a Favoritos">
                                      <i class="fa fa-heart"  style="padding: 0px;"></i>
                                      </a>
                                      </div>
                                      </div>-->
                                      <a id="heart" onclick="addwish('CB00000782');"  class="btn btn-link"  alt="Añadir a Favoritos">
                                        <i class="fa fa-heart-o" style=""></i> Agregar a favoritos                                      </a>
                                  </p>

                                                            </div>
<!-- -->
 <!-------------------------------------->    
                              </div>
                              </div>
 
                   

                    <div class="" id="details">
                       
                          <hr>
                            <blockquote>
                            <h1 class="text-primary"> Detalles del producto</h1>
                            <p class="" style="font: size 10px;">RESOLUCIÓN MÁXIMA: 1920  1080 (1MP)<br />
ILUMINACIÓN MÍNIMA: ULTRA BAJA ILUMINACIÓN 0.005 LUX@(F1.2, AGC ON), 0 LUX CON IR<br />
<br />
LENTE: 2.8 MM.<br />
<br />
50 MTS IR EXIR.<br />
MENÚ OSD, 3D DNR,  WDR 120 DB.<br />
SOPORTA 4 TECNOLOGÍAS SELECCIONABLES (TVI  AHD  CVI  CVBS ).</p>              
                            </blockquote>

                            <hr>

                            <blockquote>
                                <h1 class="text-primary"> Especificaciones Técnicas</h1>
                                <p>TEMPERATURA DE OPERACIÓN: -40°C A 60°C.<br />
<br />
ALIMENTACIÓN: 12 VCD  4.6 WATTS.<br />
<br />
PROTECCIÓN: IP66 <br />
<br />
FABRICADO EN METAL<br />
<br />
DIMENSIONES: 127.92 MM X 102.26 MM<br />
<br />
PESO: 440 GRS.<br />
<br />
GARANTÍA: 4 AÑOS.</p>
                            </blockquote>

                            <hr>

                            <blockquote>
                                <h1 class="text-primary"> Descripción del producto</h1>
                                <p>                                </p>
                            </blockquote>
<!--
                            <div class="accordion" id="accordion">
                            <blockquote style="border-left: 5px solid #000000;">
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                  <button class="btn btn-default btn-block"  type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  <h5 style="text-align: left;">Descripción del producto<i class="fa fa-plus" aria-hidden="true"></i></h5>
                                </button>
                                </h2>
                              </div>

                              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                <p></p>
                              </div>
                              </div>
                            </div>
                            </blockquote> -->
                            </div>


                            <!-- prueba YT con Fancybox 
                            <a href="https://www.youtube.com/watch?v=8empmPXnbN4" data-fancybox="gallery">
                               <img src="https://i.ytimg.com/vi/8empmPXnbN4/hq720.jpg?sqp=-oaymwEcCNAFEJQDSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLBmb_l9eJQHpa3x-IEmawYhYgwyxg" class="imgresponsive">
                            </a>-->


                            <hr>
  



                        </p>
                    </div>

                    
                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>Productos Populares</h3>
                            </div>
                        </div>

                                                <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail/p/112/SISTEMA-TURBOHD-1080P-DVR-8-CANALES-8-CÁMARAS-EYEBALL-(EXTERIOR-2.8-MM)-TRANSCEPTORES-CONECTORES-FUENTE-DE-PODER-PROFESIONAL-HASTA-15-VCD-PARA-LARGA-DISTANCIA">
                                                <img src="productos/CB00000113164.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail/p/112/SISTEMA-TURBOHD-1080P-DVR-8-CANALES-8-CÁMARAS-EYEBALL-(EXTERIOR-2.8-MM)-TRANSCEPTORES-CONECTORES-FUENTE-DE-PODER-PROFESIONAL-HASTA-15-VCD-PARA-LARGA-DISTANCIA">
                                                <img src="productos/CB00000113165.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                                                <a href="detail/p/112/SISTEMA-TURBOHD-1080P-DVR-8-CANALES-8-CÁMARAS-EYEBALL-(EXTERIOR-2.8-MM)-TRANSCEPTORES-CONECTORES-FUENTE-DE-PODER-PROFESIONAL-HASTA-15-VCD-PARA-LARGA-DISTANCIA" class="invisible">
                                    <img src="productos/CB00000113164.jpg" alt="" class="img-responsive">
                                </a>
                                                                <div class="text">
                                    <h3>SISTEMA TURBOHD 1080P DVR 8 CANALES 8 CÁMARAS EYEBALL (EXTERIOR 2.8 MM) TRANSCEPTORES CONECTORES FUENTE DE PODER PROFESIONAL HASTA 15 VCD PARA LARGA DISTANCIA</h3>
                                    <p class="price">$  6,895.00 </p>                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                                                <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail/p/819/BULLET-TURBOHD-1080P-GRAN-ANGULAR-103°-LENTE-2.8-MM-METAL-IR-EXIR-INTELIGENTE-40-MTS-EXTERIOR-IP66-TVI-AHD-CVI-CVBS-DWDR">
                                                <img src="productos/CB000008161271.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail/p/819/BULLET-TURBOHD-1080P-GRAN-ANGULAR-103°-LENTE-2.8-MM-METAL-IR-EXIR-INTELIGENTE-40-MTS-EXTERIOR-IP66-TVI-AHD-CVI-CVBS-DWDR">
                                                <img src="productos/CB000008161271.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                                                <a href="detail/p/819/BULLET-TURBOHD-1080P-GRAN-ANGULAR-103°-LENTE-2.8-MM-METAL-IR-EXIR-INTELIGENTE-40-MTS-EXTERIOR-IP66-TVI-AHD-CVI-CVBS-DWDR" class="invisible">
                                    <img src="productos/CB000008161271.jpg" alt="" class="img-responsive">
                                </a>
                                                                <div class="text">
                                    <h3>BULLET TURBOHD 1080P GRAN ANGULAR 103° LENTE 2.8 MM METAL IR EXIR INTELIGENTE 40 MTS EXTERIOR IP66 TVI-AHD-CVI-CVBS DWDR</h3>
                                    <p class="price">$  556.00 </p>                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                                                <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail/p/191/MÍDULO-JACK-LEADFRAME,-KEYSTONE,-CATEGORÍA-5E,-DE-8-POSICIONES-Y-8-CABLES---ROJO">
                                                <img src="productos/CB00000192280.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail/p/191/MÍDULO-JACK-LEADFRAME,-KEYSTONE,-CATEGORÍA-5E,-DE-8-POSICIONES-Y-8-CABLES---ROJO">
                                                <img src="productos/CB00000192280.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                                                <a href="detail/p/191/MÍDULO-JACK-LEADFRAME,-KEYSTONE,-CATEGORÍA-5E,-DE-8-POSICIONES-Y-8-CABLES---ROJO" class="invisible">
                                    <img src="productos/CB00000192280.jpg" alt="" class="img-responsive">
                                </a>
                                                                <div class="text">
                                    <h3>MÍDULO JACK LEADFRAME, KEYSTONE, CATEGORÍA 5E, DE 8 POSICIONES Y 8 CABLES - ROJO</h3>
                                    <p class="price">$  90.00 </p>                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                                                <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail/p/173/CONECTOR-RJ45-PARA-CABLE-UTP-CATEGORÍA-6A">
                                                <img src="productos/CB00000174251.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail/p/173/CONECTOR-RJ45-PARA-CABLE-UTP-CATEGORÍA-6A">
                                                <img src="productos/CB00000174251.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                                                <a href="detail/p/173/CONECTOR-RJ45-PARA-CABLE-UTP-CATEGORÍA-6A" class="invisible">
                                    <img src="productos/CB00000174251.jpg" alt="" class="img-responsive">
                                </a>
                                                                <div class="text">
                                    <h3>CONECTOR RJ45 PARA CABLE UTP CATEGORÍA 6A</h3>
                                    <p class="price">$  12.00 </p>                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                                                <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail/p/215/CABLE-DE-PARCHEO-UTP-CATEGORÍA-5E,-CON-PLUG-MODULAR-EN-CADA-EXTREMO---1.5-M.---AZUL">
                                                <img src="productos/CB00000216304.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail/p/215/CABLE-DE-PARCHEO-UTP-CATEGORÍA-5E,-CON-PLUG-MODULAR-EN-CADA-EXTREMO---1.5-M.---AZUL">
                                                <img src="productos/CB00000216304.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                                                <a href="detail/p/215/CABLE-DE-PARCHEO-UTP-CATEGORÍA-5E,-CON-PLUG-MODULAR-EN-CADA-EXTREMO---1.5-M.---AZUL" class="invisible">
                                    <img src="productos/CB00000216304.jpg" alt="" class="img-responsive">
                                </a>
                                                                <div class="text">
                                    <h3>CABLE DE PARCHEO UTP CATEGORÍA 5E, CON PLUG MODULAR EN CADA EXTREMO - 1.5 M. - AZUL</h3>
                                    <p class="price">$  112.00 </p>                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                                                <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail/p/407/ORGANIZADOR-HORIZONTAL-INTELLINET-169950,-NEGRO,-500G">
                                                <img src="productos/CB00000408702.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail/p/407/ORGANIZADOR-HORIZONTAL-INTELLINET-169950,-NEGRO,-500G">
                                                <img src="productos/CB00000408703.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                                                <a href="detail/p/407/ORGANIZADOR-HORIZONTAL-INTELLINET-169950,-NEGRO,-500G" class="invisible">
                                    <img src="productos/CB00000408702.jpg" alt="" class="img-responsive">
                                </a>
                                                                <div class="text">
                                    <h3>ORGANIZADOR HORIZONTAL INTELLINET 169950, NEGRO, 500G</h3>
                                    <p class="price">$  421.00 </p>                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                                                <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail/p/208/CABLE-DE-PARCHEO-UTP-CAT6---2-M---AZUL">
                                                <img src="productos/CB00000209297.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail/p/208/CABLE-DE-PARCHEO-UTP-CAT6---2-M---AZUL">
                                                <img src="productos/CB00000209297.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                                                <a href="detail/p/208/CABLE-DE-PARCHEO-UTP-CAT6---2-M---AZUL" class="invisible">
                                    <img src="productos/CB00000209297.jpg" alt="" class="img-responsive">
                                </a>
                                                                <div class="text">
                                    <h3>CABLE DE PARCHEO UTP CAT6 - 2 M - AZUL</h3>
                                    <p class="price">$  79.00 </p>                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                        
                    </div>

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->





  <div class="msgwh" style="position: fixed;
    z-index: 9999;
    height: 50px;
    line-height: 50px;
    width: 50px;
    bottom: 10px;
    right: 10px;
    text-align: center;
    font-size: 45px;">
    <a href="https://wa.link/uftawh" target="_blank">
      <img src="images/whatsapp.png" alt="" style="width: 100%;"/>
    </a>
  </div>
  <!-- *** FOOTER ***-->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Clientes</h4>
                                                <ul>
                            <li><a data-toggle="modal" data-target="#login-modal" style="cursor:pointer;">Login</a>
                            </li>
                            <li><a href="registro">Registrar</a>
                            </li>

                        </ul>
                        
                        <hr>

                        <h4>Informacion</h4>
                        <ul>
                                                    <li><a href="TÉRMINOS-Y-CONDICIONES-JDSHOP.pdf" target="_blank">TÉRMINOS Y CONDICIONES</a><li>
                            <li><a href="AVISO-DE-PRIVACIDAD-JDSHOP.pdf" target="_blank">AVISO DE PRIVACIDAD</a><li>
                            <li><a href="faq">FAQ</a></li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Categorias Top</h4>
                        
                        <h5>SEGURIDAD Y VIGILANCIA</h5>
                        <ul>
                                                    <li>
                              <a href="category/d/3/SEGURIDAD-Y-VIGILANCIA/ct/9/CÁMARAS-ESPECIALES">CÁMARAS ESPECIALES</a>
                            </li>
                                                    <li>
                              <a href="category/d/3/SEGURIDAD-Y-VIGILANCIA/ct/9/CÁMARAS-ESPECIALES/ct/7/KIT-DE-4-CÁMARAS-DE-SEGURIDAD">KIT DE 4 CÁMARAS DE SEGURIDAD</a>
                            </li>
                                                    <li>
                              <a href="category/d/3/SEGURIDAD-Y-VIGILANCIA/ct/9/CÁMARAS-ESPECIALES/ct/7/KIT-DE-4-CÁMARAS-DE-SEGURIDAD/ct/18/KIT-DE-8-CÁMARAS-DE-SEGURIDAD">KIT DE 8 CÁMARAS DE SEGURIDAD</a>
                            </li>
                                                    <li>
                              <a href="category/d/3/SEGURIDAD-Y-VIGILANCIA/ct/9/CÁMARAS-ESPECIALES/ct/7/KIT-DE-4-CÁMARAS-DE-SEGURIDAD/ct/18/KIT-DE-8-CÁMARAS-DE-SEGURIDAD/ct/13/VIDEOGRABADORES-DVR">VIDEOGRABADORES DVR</a>
                            </li>
                                                    <li>
                              <a href="category/d/3/SEGURIDAD-Y-VIGILANCIA/ct/9/CÁMARAS-ESPECIALES/ct/7/KIT-DE-4-CÁMARAS-DE-SEGURIDAD/ct/18/KIT-DE-8-CÁMARAS-DE-SEGURIDAD/ct/13/VIDEOGRABADORES-DVR/ct/14/CÁMARA-TIPO-BALA">CÁMARA TIPO BALA</a>
                            </li>
                                                    <li>
                              <a href="category/d/3/SEGURIDAD-Y-VIGILANCIA/ct/9/CÁMARAS-ESPECIALES/ct/7/KIT-DE-4-CÁMARAS-DE-SEGURIDAD/ct/18/KIT-DE-8-CÁMARAS-DE-SEGURIDAD/ct/13/VIDEOGRABADORES-DVR/ct/14/CÁMARA-TIPO-BALA/ct/15/CÁMARA-TIPO-DOMO">CÁMARA TIPO DOMO</a>
                            </li>
                                                    <li>
                              <a href="category/d/3/SEGURIDAD-Y-VIGILANCIA/ct/9/CÁMARAS-ESPECIALES/ct/7/KIT-DE-4-CÁMARAS-DE-SEGURIDAD/ct/18/KIT-DE-8-CÁMARAS-DE-SEGURIDAD/ct/13/VIDEOGRABADORES-DVR/ct/14/CÁMARA-TIPO-BALA/ct/15/CÁMARA-TIPO-DOMO/ct/16/KIT-DE-2-CÁMARAS-DE-SEGURIDAD">KIT DE 2 CÁMARAS DE SEGURIDAD</a>
                            </li>
                                                </ul>
                        
                        <h5>REDES</h5>
                        <ul>
                                                    <li>
                              <a href="category/d/6/REDES/ct/8/UTP-CATEGORÍA-5E">UTP CATEGORÍA 5E</a>
                            </li>
                                                    <li>
                              <a href="category/d/6/REDES/ct/8/UTP-CATEGORÍA-5E/ct/33/UTP-CATEGORÍA-6">UTP CATEGORÍA 6</a>
                            </li>
                                                    <li>
                              <a href="category/d/6/REDES/ct/8/UTP-CATEGORÍA-5E/ct/33/UTP-CATEGORÍA-6/ct/34/JACKS---PLUGS">JACKS - PLUGS</a>
                            </li>
                                                    <li>
                              <a href="category/d/6/REDES/ct/8/UTP-CATEGORÍA-5E/ct/33/UTP-CATEGORÍA-6/ct/34/JACKS---PLUGS/ct/35/PATCH-CORD">PATCH CORD</a>
                            </li>
                                                    <li>
                              <a href="category/d/6/REDES/ct/8/UTP-CATEGORÍA-5E/ct/33/UTP-CATEGORÍA-6/ct/34/JACKS---PLUGS/ct/35/PATCH-CORD/ct/36/GABINETES-PARA-MONTAJE-EN-PARED">GABINETES PARA MONTAJE EN PARED</a>
                            </li>
                                                    <li>
                              <a href="category/d/6/REDES/ct/8/UTP-CATEGORÍA-5E/ct/33/UTP-CATEGORÍA-6/ct/34/JACKS---PLUGS/ct/35/PATCH-CORD/ct/36/GABINETES-PARA-MONTAJE-EN-PARED/ct/38/ACCESORIOS-PARA-RACK">ACCESORIOS PARA RACK</a>
                            </li>
                                                    <li>
                              <a href="category/d/6/REDES/ct/8/UTP-CATEGORÍA-5E/ct/33/UTP-CATEGORÍA-6/ct/34/JACKS---PLUGS/ct/35/PATCH-CORD/ct/36/GABINETES-PARA-MONTAJE-EN-PARED/ct/38/ACCESORIOS-PARA-RACK/ct/37/RACKS-ABIERTOS">RACKS ABIERTOS</a>
                            </li>
                                                </ul>
                        
                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">
                       <!-- <h4>Contacto</h4>
                                                <p>                                                                                                                                                                        <strong>
                                                </strong>
                        </p>  -->
                        <H4><a href="contact">Contacto</a></H4>
                        <ul>
                            <li>
                              <a class="acontacto colordos" href="mailto:contacto@jdshop.mx?Subject=Hola%20JD" target="_top"><i class="fa fa-envelope"></i> contacto@jdshop.mx</a><br>
                            </li>
                        </ul>
                        <hr class="hidden-md hidden-lg">
                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Suscribete</h4>

                        <p class="text-muted">Suscribete para recibir noticias y ofertas.</p>

                        <form onsubmit="return addsub();">
                            <div class="input-group">

                                <input type="email" id="mailsub" name="mailsub" class="form-control" placeholder="Correo" required>

                                <span class="input-group-btn">

			    <button id="btnsub" class="btn btn-default" type="submit">Suscribirse!</button>

			</span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>

                        
                        <h4>Mantente en Contacto</h4>

                        <p class="social">
                                                    <a href="https://www.facebook.com/JDShopmx" target="_blank" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                                                    <a href="https://twitter.com/JDShopmx" target="_blank" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                                                    <a href="https://www.instagram.com/jdshopmx" target="_blank" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                                                </p>
                                            </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***-->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© Copyright JD SHOP 2019 Todos los Derechos Reservados</p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->
<script>
function addsub(){
  var mail = $("#mailsub").val();
  $.post("query/insertsubscripcion",{correo:mail},function(htmle){
    $("#btnsub").html(htmle);
    $("#mailsub").val('');
  });
  return false;
}



</script>

<script src="js/jquery-1.11.0.min.js"></script>
<!-- 
<script src="https://cdn.rawgit.com/oauth-io/oauth-js/c5af4519/dist/oauth.js"></script>
<script>
$('#facebook-button3').on('click', function() {
  // Initialize with your OAuth.io app public key
  OAuth.initialize('FdGD_C7G6f85NwXSavAx1ruK3wA');
  // Use popup for oauth
  OAuth.popup('facebook').then(facebook => {
    //console.log('facebook:',facebook);
    // Prompts 'welcome' message with User's email on successful login
    // #me() is a convenient method to retrieve user data without requiring you
    // to know which OAuth provider url to call
    facebook.me().then(data => {
      //console.log('me data:', data);
      console.log('login'+ data.email + data.name);
      postfb('login', data.email, data.name);
      //alert('Facebook says your email is:' + data.email + ".\nView browser 'Console Log' for more details");
    })
    // Retrieves user data from OAuth provider by using #get() and
    // OAuth provider url
    facebook.get('/v2.5/me?fields=name,first_name,last_name,email,gender,location,locale,work,languages,birthday,relationship_status,hometown,picture').then(data => {
      //console.log('self data:', data);
    })
  });
})



function postfb(action,email,nombre){
 

 data = 
 {
   UserName: nombre,
   UserEmail: email,
   UserAction: action
 };

$.ajax(
{
  
  type: "POST",
  url: "usergoogle.php",
  data: data,
  success: function(resultado){
if(resultado === "0"){
  $(location).attr('href',"index");
  
}
else{
  if(resultado === "1"){
  alert("Registro Exitoso");
  $(location).attr('href',"index");
            } 
    }
  }
});
return false;
} 



function checkLoginState() {
FB.getLoginStatus(function(response) {
statusChangeCallback(response);
//console.log( JSON.stringify(response) );



});
}



</script>
-->

  
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.cookie.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/modernizr.js"></script>
  <script src="js/bootstrap-hover-dropdown.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/front.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

 

    </div>
    <!-- /#all -->
<script>
function submitf(filtro){
  if(filtro == 1 || filtro == 2){
    var marcas = '';
    $('#fmarcas input[type=checkbox]').each(function(){
      if (this.checked) {
        if(marcas != '')
          marcas += ',';
        marcas += $(this).val();
      }
    });
    var colores = '';
    $('#fcolores input[type=checkbox]').each(function(){
      if (this.checked) {
        if(colores != '')
          colores += ',';
        colores += $(this).val();
      }
    });

    if(marcas != '')
      $('#marcas').val('/m/'+marcas+'/'+marcas);
    else
      $('#marcas').val('');
    if(colores != '')
      $('#colores').val('/clr/'+colores+'/'+colores);
    else
      $('#colores').val('');
  }
  else if(filtro == 5){
    $('#marcas').val('');
  }
  else if(filtro == 6){
    $('#colores').val('');
  }
  var link = $('#link1').val()+$('#marcas').val()+$('#colores').val();
  $("#filt").attr('action', link);
  $("#filt").submit();
}
function addc(){
  var cantidad = $("#cantidad").val();
  cantidad++;
  $("#cantidad").val(cantidad);
}
function subc(){
  var cantidad = $("#cantidad").val();
  if(cantidad > 1)
    cantidad--;
  $("#cantidad").val(cantidad);
}
function addcart(idp,tc){
  document.getElementById("cart").disabled = true;
  precio = $("#precio").val();
  descuento = $("#descuento").val();
  if(tc == 0){
    talla = 0;
    color = 0;
  }
  else{
    talla = $("#talla").val();
    color = $("#colorsel").val();
  }
  cantidad = $("#cantidad").val();
  producto = idp;
  //alert(precio+" "+talla+" "+color+" "+cantidad+" "+producto);
  $.post("query/insertcart",{
    precio: precio,
    descuento: descuento,
    talla: talla,
    colorsel: color,
    cantidad: cantidad,
    p: producto
  },function(htmle){
    $("#cart").html(htmle);
    document.getElementById('cart').style.background='#009966';  
    $.post("query/infocart",{},function(htmlec){
      $("#cartall").html(htmlec);
    });
  });
}


function addwish(idp){
  document.getElementById("heart").disabled = true;
  producto = idp;
  $.post("query/insertwish",{
    p: producto
  },function(htmle){
   /**document.getElementById('heart').style.background='#F50A0A'; */
    $("#heart").html(htmle);
  });
}


function settc(prod){
  var talla = document.getElementById("talla").value;
  var color = document.getElementById("colorsel").value;
  if(document.getElementById("cantidad"))
    var cantidad = document.getElementById("cantidad").value;
  else
    var cantidad = 1;
  $("#detailp").load("query/checkp.php?t="+talla+"&c="+color+"&p="+prod+"&cant="+cantidad);
}
function changecolor(color){
  document.getElementById("colorsel").value = color;
}

/** funcion ir directo a compra */

function addbag(idp,tc){
  document.getElementById("bag").disabled = true;
  precio = $("#precio").val();
  descuento = $("#descuento").val();
  if(tc == 0){
    talla = 0;
    color = 0;
  }
  else{
    talla = $("#talla").val();
    color = $("#colorsel").val();
  }
  cantidad = $("#cantidad").val();
  producto = idp;
  $.post("query/insertcart",{
    precio: precio,
    descuento: descuento,
    talla: talla,
    colorsel: color,
    cantidad: cantidad,
    p: producto
  },function(htmle){
    $.post("query/infocart",{},function(htmlec){
      $("#cartall").html(htmlec);
      document.location.href = "cart.php";
    });
  });
} 




</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.0/jquery.fancybox.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-fancybox="gallery"]').fancybox({
    arrows: false,
    infobar: false,
    protect: true,
    touch: false,
    buttons : [
      'close'
    ]
  });
});
</script>

<!-- ACORDERON-->
<script>
  $("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
  $(e.target)
    .prev()
    .find("i:last-child")
    .toggleClass("fa-minus fa-plus");
});

</script>


</body>
</html>