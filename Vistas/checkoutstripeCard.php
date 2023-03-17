<?php
include 'header.php';
require './Conexion/config.php';

if(isset($_SESSION['username'])){
    // Consulta para obtener los datos del pedido del usuario logueado
    $sesion = $_SESSION['username'];
    $sql = 'SELECT concat(i_nmb,".",i_ext)as rutaimagen,pd_producto,a_cb,a_nmb, pd_cantidad, pd_precio, pd_descuento 
        FROM pedidoscld
        INNER JOIN articulos ON a_cb = pd_producto
        INNER JOIN imagenes ON a_cb = i_idproducto
        WHERE pd_pedido="'.$sesion.'" AND pd_conf = 0';
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
    <div class="container-fluid p-5">
    <form action="CreateChargeCard.php" method="post" id="payment-form">
    <input type="hidden" name="subtotal" value="<?php echo $total;?>">
    <input type="hidden" name="envio" value="<?php echo $envio;?>">
    <input type="hidden" name="total" value="<?php echo $totalen;?>">
      <div class="form-row">
        <h4 for="card-element">
          Tarjeta de Credito o Debito
        </h4>
        <div id="card-element">
          <!-- A Stripe Element will be inserted here. -->
        </div>
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
        <div class="mt-3">
            <h4>Terminos y condiciones</h4>
            <span>T&E</span>
            <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                    Acepto los terminos y condiciones
                </label>
            </div>
        </div>
      </div>
      <div class="mt-3">
        <button class="btn btn-warning">
        <a class="btn btn-warning" href="#" role="button">
            Ir a verificacion
        </a>
        </button>
        <button type="submit" class="btn btn-primary float-right">
        <a type="submit" class="btn btn-primary float-right" id="compraf" data-user="<?php echo $sesion;?>" 
            data-subtotal="<?php echo $total;?>" data-envio="<?php echo $envio;?>" data-total="<?php echo $totalen?>">
            Pagar <?php echo MONEDA. number_format($totalen,2,'.',',');?>
        </a>
        </button>
       </div>
    </form>
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


 