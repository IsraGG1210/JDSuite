<?php
include 'header.php';
require './Conexion/config.php';
require_once './Conexion/funciones.php';
//session_start();
$sesion = $_SESSION['username'];

$sqln="SELECT c_nmb FROM clientes WHERE c_mail = '$sesion'";
$consutlan= setq($sqln);
$nameuse = mysqli_fetch_assoc($consutlan);
$nameuser = $nameuse['c_nmb'];
   
if(isset($_SESSION['username'])){
    // Consulta para obtener los datos del pedido del usuario logueado
    $usuario = $_SESSION['username'];
    $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$usuario'";
    $resultado = setq($sql1);
    $idusuario = mysqli_fetch_array($resultado);
    $idusu = $idusuario['c_id'];
    // Consulta para obtener los datos del pedido del usuario logueado
    $sesion = $_SESSION['username'];
    $pedido = busca($idusuario['c_id'],'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
    $sql = 'SELECT concat(i_nmb,".",i_ext)as rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
        FROM pedidoscld
        INNER JOIN articulos ON a_cb = pd_producto
        INNER JOIN imagenes ON a_cb = i_idproducto
        WHERE pd_pedido="'.$pedido.'" AND pd_conf = 0';
    $result = setq($sql);

    $datos = Array();
    while($row = mysqli_fetch_array($result)){
        $datos[]=$row;
    }
      $total=0;
      foreach($datos as $producto){
        $ruta = $producto['rutaimagen'];
        $id = $producto['a_cb'];
        $nombre = $producto['a_nmb'];
        $cantidad = $producto['pd_cantidad'];
        $precio = $producto['pd_precio'];
        $descuento = $producto['pd_descuento'];
        $subtotal = ($cantidad * $precio);
        $total += $subtotal;
    }}
    $envio = 0;
    if($total>5000){
         MONEDA.$envio;
    } elseif($total==0){
         MONEDA.$envio;
    }else{
        $envio = 150;
         MONEDA.$envio;
    }
    $totalen = $total+$envio;
?>
<html>
<html>
    <head>
    <title>Checkout</title>
    <script src="https://js.stripe.com/v3/"></script>
   
    </head>
  <body>
  <div class="container-fluid p-5">
    
    <form id="payment-form" action="CreateChargeOxxo.php" methos="post">
        <div class="form-row">
          <label for="name"><span><?php echo $nameuser?></span></label>
          <input type="hidden"id="name" name="name" value="<?php echo $nameuser?>" >
        </div>
        <span> Mandaremos una notificacion de pago al siguiente correo</span>
        <div class="form-row">
          <label for="email"><?php echo $sesion?></label>
          <input type="hidden"id="email" name="email" value="<?php echo $sesion?>" >
        </div>
        <div>
          <label for="amount">Monto a pagar es de <?php echo MONEDA. number_format($totalen,2,'.',',');?></label>
          <input type="hidden" id="amount" name="amount" value="<?php echo $totalen;?>"
          
        </div>
        
        <div id="error-message"></div>
        <button class="btn btn-warning">
              <a class="btn btn-warning" href="#" role="button">
                  Ir a verificacion
              </a>
        </button>
        <!-- <button type="submit" id="submit-button" class="btn btn-primary float-right">
        Pay with OXXO
        </button> -->
        <button type="submit" id="submit-button" class="btn btn-primary float-right">Pay with OXXO</button>
        
        
      </form>
      
      </div>
    </div>
    
    
<script>
  function confirmar(){
        Swal.fire({
            title: 'Esperaremos su pago para concluir con su compra',
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirigir a la página de contacto del sitio web
                window.location.href = "index.php";
            }
        })
    }
  var stripe = Stripe('pk_test_51MmJTOGuTfIl032MCUof5RcMfmNgKRVGS3NMWUQOd7TAjJfJupvI2cNBgynNNAsQQnsdTRGppzS9itlVfLR45D4a00GxaW2FWq');
  const form = document.getElementById('payment-form');

  form.addEventListener('submit', async event => {
    event.preventDefault();

  const pago = document.getElementById("amount").value;
  const email = document.getElementById("email").value;
  const name = document.getElementById("name").value;

    const { id, clientSecret } = await fetch("CreateChargeOxxo.php",{
      method: "POST",
      headers: {"Content-Type": "application/json"},
      body: JSON.stringify({
        /* request_type: 'create_payment_oxxo', */
        pago:pago,
        email:email,
        name:name
      }),
    }).then((r) => r.json());

    client_secret_oxxo = clientSecret;
    payment_intent_id = id;

  
   const {error, paymentIntent} = await stripe.confirmOxxoPayment(
    client_secret_oxxo,
    {
      payment_method: {
        billing_details: {
          name: document.getElementById('name').value,
          email: document.getElementById('email').value,
        },
      },
    }
  );

  if (error) {
    console.error(error);
  }
 else {
    const {hosted_voucher_url} = paymentIntent.next_action.oxxo_display_details;
    console.log('URL del voucher:', hosted_voucher_url);
    fetch('query/enviarcorreooxxo.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        name: name,
        email: email,
        url: hosted_voucher_url
      })
    })
    .then(response => {
        stripe.retrievePaymentIntent(client_secret_oxxo);
        confirmar();
    })
    .catch(error => {
  // Manejar errores
});
  }
});

  

</script>


<?php
include 'footer.php';
?>