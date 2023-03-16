<?php
include 'header.php';
?>
<div class="container-fluid">
    <div class="container">
        <div class="accordion-body text-justify">
            <form action="/charge" method="post" id="payment-form">
                <div class="form-row">
                    <h4 class="mt3">Datos de su tarjeta</h4>
                    <div id="card-element" class="form-control">
                         <!-- A Stripe Element will be inserted here. -->
                     </div>
                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                    </div>
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
                    <div class="mt-3">
                        <a class="btn btn-warning" href="#" role="button">Ir a verificacion</a>
                            <button type="submit" class="btn btn-primary float-right">Pagar</button>
                    </div>
            </form>
        </div>
    </div>
</div>

  <script src="../vendor/stripe.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
<?php
include 'footer.php'
?>