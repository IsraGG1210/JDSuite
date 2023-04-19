<?php
include 'header.php';
require './Conexion/config.php';
require_once './Conexion/funciones.php';


if(isset($_SESSION['username'])){
    $usuario = $_SESSION['username'];
    $sql1 ="SELECT c_id FROM clientes WHERE c_mail ='$usuario'";
    $resultado = setq($sql1);
    $idusuario = mysqli_fetch_array($resultado);
    $idusu = $idusuario['c_id'];
    // Consulta para obtener los datos del pedido del usuario logueado
    $sesion = $_SESSION['username'];
    
        $pedido = busca($idusuario['c_id'],'pedidoscl','p_estatus = "N" AND p_cliente','p_id');
       
       $sql="SELECT pd_cantidad, pd_precio, pd_descuento FROM pedidoscld WHERE pd_pedido='".$pedido."' AND pd_conf = 0";
        /* die($sql); */
    $result = setq($sql);
  
    $datos = Array();
    while($row = mysqli_fetch_array($result)){
        $datos[]=$row;
    }
      $total=0;
      foreach($datos as $producto){
  
        $cantidad = $producto['pd_cantidad'];
        $precio = $producto['pd_precio'];
        $descuento = $producto['pd_descuento'];
        $subtotal = $cantidad * $precio;
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
      if (isset($descuento) && $descuento != '') {
        $totalen = $total-$descuento;
        $totalen = $totalen + $envio;
      } else {
        // No discount, use full price
        $totalen = $total+$envio;
      }
      
  ?>
<html>
<html>
  <head>
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <!-- Display a payment form -->
    <form id="payment-form">
    <span> Mandaremos una notificacion de pago al siguiente correo</span>
          <div class="form-row">
            <label for="email"><?php echo $sesion?></label>
            <input type="hidden"id="email" name="email" value="<?php echo $sesion?>" >
            <input type="hidden" id="amount" name="amount" value="<?php echo $totalen;?>">
          </div>
            <div id="card-element"><!-- placeholder for Elements --></div>
            <div class="card-errors">

            </div>
            <button id="card-button" class="btn btn-primary float-right">Pagar ahora</button>
            <p id="payment-result"> 
                <!-- Pago realzado exitosamente! -->
                    <a href="" target="_blank">Stripe dashboard</a>
            </p>
    </form>

    <!-- MODAL -->
    <div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">PAGO EXITOSO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Su pago aha sido exitoso</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
  </body>
  </head>
  
</html>
    
    <script>
    function confirmar(){
        Swal.fire({
            title: 'Su pago ha sido exitoso',
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirigir a la página de contacto del sitio web
                window.location.href = "miscompras.php";
            }
        })
    }
    
    const stripe = Stripe('pk_test_51MmJTOGuTfIl032MCUof5RcMfmNgKRVGS3NMWUQOd7TAjJfJupvI2cNBgynNNAsQQnsdTRGppzS9itlVfLR45D4a00GxaW2FWq');

    let elements = stripe.elements();
    //console.log(elements);
    const card = elements.create('card');
    //var paymentElement = elements.getElement('card');
    //console.log(cardElement);
    card.mount('#card-element');
    const form = document.getElementById("payment-form");

    var resultContainer = document.getElementById('payment-result');
    card.addEventListener('change', function(event) {
    
    if (event.error) {
        resultContainer.textContent = event.error.message;
    } else {
        resultContainer.textContent = '';
    }
    });

    form.addEventListener('submit', async event => {
    event.preventDefault();
    resultContainer.textContent = '';

    const pago = document.getElementById("amount").value;
    const email = document.getElementById("email").value;
    console.log(pago);

    const { id, clientSecret } = await fetch("CreateChargeCard.php",{
        method: "POST",
      headers: {"Content-Type": "application/json"},
      body: JSON.stringify({
        /* request_type: 'create_payment_oxxo', */
        pago:pago,
        email:email
      }),
    }).then((r) => r.json());
    let cli_sec_card = clientSecret;
    let payment_intent_id = id;
    stripe.createPaymentMethod({
        type :'card',
        card : card,
    }).then(function(result){
        if(result.error){
            var errorElement = document.getElementById('payment-result');
            errorElement.textContent = result.error.message;
        }else{
            var paymentMethodId = result.paymentMethod.id;
            // Use paymentMethodId to confirm PaymentIntent
            confirmCardPayment(paymentMethodId);
        }
    });
    //elements = stripe.elements(clientSecret);
    

    async function retrieve() {
        const {paymentIntent} = await stripe.retrievePaymentIntent(cli_sec_card);
        if(paymentIntent){
            switch(paymentIntent.status){
                case "succeeded":
                    fetch("Retriev.php",{
                    method: "POST",
                    headers: {"Content-Type" : "application/json"},
                    body: JSON.stringify({
                        id: id
                    })
                    }).then((r) => r.json());
                    confirmar();
                break;
                case "Error":
                    Swal.fire({
                        title: 'Su pago no ha sido procesado',
                        icon: 'error',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Intentar nuevamente'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirigir a la página de contacto del sitio web
                            window.location.href = "checkoutstripeCard.php";
                        }
                    })
                break;
                }
        }
    }

    function confirmCardPayment(paymentMethodId) {
         stripe.confirmCardPayment(
            cli_sec_card,
        {
            payment_method:paymentMethodId,
        }).then (function(result){
            if (result.error) {
            // Handle error
            } else {
            // PaymentIntent confirmed successfully

            fetch('query/enviarcorreoCard.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                pago:pago,
                email: email
            })
            })
            .then(function(resul){
                if(resul.error){
                    var errorElement = document.getElementById('payment-result');
                    errorElement.textContent = resul.error.message;
                }else{
                    retrieve();
                }
            })
            }
        });
    }
    });
    </script>
<?php
include 'footer.php';
?>