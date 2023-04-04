<?php
include 'header.php';
require './Conexion/config.php';

if(isset($_SESSION['username'])){
     // Consulta para obtener los datos del pedido del usuario logueado
     $usuario = $_SESSION['username'];
     $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$usuario'";
     $resultado = setq($sql1);
     $idusuario = mysqli_fetch_array($resultado);
     $idusu = $idusuario['c_id'];
     // Consulta para obtener los datos del pedido del usuario logueado
     $sesion = $_SESSION['username'];
     $sql = 'SELECT concat(i_nmb,".",i_ext)as rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
         FROM pedidoscld
         INNER JOIN articulos ON a_cb = pd_producto
         INNER JOIN imagenes ON a_cb = i_idproducto
         WHERE pd_pedido="'.$idusu.'" AND pd_conf = 0';
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
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="col-12">
        <div class="row">
            <div class="d-flex justify-content-center">
                    <div class="accordion col-md-8 col-sm-12" id="accordionExampleY">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwoY">
                                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                    style="color:black" data-mdb-target="#collapseTwo1" aria-expanded="false"
                                    aria-controls="collapseTwo1">
                                    <i class="fa-brands fa-stripe-s fa-lg me-2 opacity-70"></i>
                                    <i class="fa-regular fa-credit-card"></i></i>
                                    <h3>Pago con tarjeta</h3>
                                </button>
                            </h2>
                            <div id="collapseTwo1" class="accordion-collapse collapse" aria-labelledby="headingTwoY"
                                data-mdb-parent="#accordionExampleY">
                                <br>

                                <center>
                                    <a href="checkoutstripecaard.php">
                                        <button class="btn btn-primary rounded-pill" style="background-color:#29A8B0;">
                                        <i class="fa-regular fa-credit-card"></i></i>Pagar Con tarjeta
                                        </button>
                                    </a>
                                </center>
                                <br>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwoY">
                                <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                    style="color:black" data-mdb-target="#collapseTwoY" aria-expanded="false"
                                    aria-controls="collapseTwoY">
                                    <i class="fa-brands fa-paypal fa-lg me-2 opacity-70"></i>
                                    <i class="fa-solid fa-xmarks-lines"></i>
                                    <h3>Pago en oxxo</h3>
                                </button>
                            </h2>
                            <div id="collapseTwoY" class="accordion-collapse collapse" aria-labelledby="headingTwoY"
                                data-mdb-parent="#accordionExampleY">
                                <br>

                                <center>
                                <form action="checkoutstripeOxxo.php" method="post" id="payment-form">
                                    <input type="hidden" name="subtotal" value="<?php echo $total;?>">
                                    <input type="hidden" name="envio" value="<?php echo $envio;?>">
                                    <input type="hidden" name="total" value="<?php echo $totalen;?>">
                                    <button type="submit" id="submit" class="btn btn-primary float-right">
                                      Pagar en OXXO <?php echo MONEDA. number_format($totalen,2,'.',',');?>
                                    </button>
                                </form>
                                </center>
                                <br>
                            </div>
                        </div>

              </div>
        </div>
      </div>
    </div>
    <script>
      

      // Create a Stripe client.
      var stripe = Stripe('pk_test_51MmJTOGuTfIl032MCUof5RcMfmNgKRVGS3NMWUQOd7TAjJfJupvI2cNBgynNNAsQQnsdTRGppzS9itlVfLR45D4a00GxaW2FWq');
      // Create an instance of Elements.
      var elements = stripe.elements();
      // Custom styling can be passed to options when creating an Element.
      // (Note that this demo uses a wider set of styles than the guide below.)
      var style = {
        base: {
          color: '#32325d',
          lineHeight: '18px',
          fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
          fontSmoothing: 'antialiased',
          fontSize: '16px',
          '::placeholder': {
            color: '#aab7c4'
          }
        },
        invalid: {
          color: '#fa755a',
          iconColor: '#fa755a'
        }
      };
      // Create an instance of the card Element.
      var card = elements.create('card', {style: style});
      // Add an instance of the card Element into the `card-element` <div>.
      card.mount('#card-element');
      // Handle real-time validation errors from the card Element.
      card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
          displayError.textContent = event.error.message;
        } else {
          displayError.textContent = '';
        }
      });
      // Handle form submission.
      var form = document.getElementById('payment-form');
      form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
          if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
          } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
          }
        });
      });
      function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
      }
    </script>
<script src="https://js.stripe.com/v3/"></script>
<script src="../vendor/stripe.js"></script>
<?php
include 'footer.php';
?>


 