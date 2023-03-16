<?php
include 'header.php';
require './Conexion/config.php';

require_once './Conexion/funciones.php';

?>
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="lip row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <h2>Verifica tu pago</h2>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-12">
        <div class="row mb-2">
            <div class="col-md-8">
            
        <div class="d-flex justify-content-center">
            <div class="accordion col-md-8 col-sm-12" id="accordionExampleY">
                <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwoY" >
                            <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" style="color:black"
                                data-mdb-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                <i class="fa-brands fa-stripe-s fa-lg me-2 opacity-70"></i>
                                <h3 >Stripe</h3>
                            </button>
                        </h2>
                        <div id="collapseTwo1" class="accordion-collapse collapse" aria-labelledby="headingTwoY"
                            data-mdb-parent="#accordionExampleY">
                            <br>
                           
                           <center>
                           <a href="checkoutstripe.php">
                            <button class="btn btn-primary rounded-pill" style="background-color:#29A8B0;">
                           <i class="fa-brands fa-stripe-s fa-lg me-2 opacity-70"></i>Pagar Con Stripe
                            </button>
                            </a>
                            </center>
                            <br>
                        </div>
                    </div>
                <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwoY">
                            <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" style="color:black"
                                data-mdb-target="#collapseTwoY" aria-expanded="false" aria-controls="collapseTwoY">
                                <i class="fa-brands fa-paypal fa-lg me-2 opacity-70"></i>
                                <h3>Paypal</h3>
                            </button>
                        </h2>
                        <div id="collapseTwoY" class="accordion-collapse collapse" aria-labelledby="headingTwoY"
                            data-mdb-parent="#accordionExampleY">
                            <br>
                           
                           <center>
                           <a href="checkoutpaypal.php"><button class="btn btn-primary rounded-pill">
                           <i class="fa-brands fa-paypal fa-lg me-2 opacity-70"></i>Pagar Con PayPal
                            </button>
                            </a>
                            </center>
                            <br>
                        </div>
                    </div>
                <div class="accordion-item">
                <h2 class="accordion-header" id="headingThreeY">
                    <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" style="color:black"
                    data-mdb-target="#collapseThreeY" aria-expanded="false" aria-controls="collapseThreeY">
                    <i class="fa-sharp fa-solid fa-list fa-lg me-2 opacity-70"></i>
                    <h3>Transferencias</h3>
                    </button>
                </h2>
                <div id="collapseThreeY" class="accordion-collapse collapse" aria-labelledby="headingThreeY"
                    data-mdb-parent="#accordionExampleY">
                    <div class="accordion-body text-justify">
                    <br>
                           
                           <center>
                           <a href="checkoutstripe.php"><button class="btn btn-primary rounded-pill">
                           <i class="fa-solid fa-money-bill-transfer fa-lg me-2 opacity-70"></i>Pagar Con Transferencia
                            </button>
                            </a>
                            </center>
                            <br>
                    </div>
                </div>
                </div>
                <div class="accordion-item">
                <h2 class="accordion-header" id="headingThreeY">
                    <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" style="color:black"
                    data-mdb-target="#collapseThreeY" aria-expanded="false" aria-controls="collapseThreeY">
                    <i class="fa-sharp fa-solid fa-list fa-lg me-2 opacity-70"></i>
                    <h3>Efectivo</h3>
                    </button>
                </h2>
                <div id="collapseThreeY" class="accordion-collapse collapse" aria-labelledby="headingThreeY"
                    data-mdb-parent="#accordionExampleY">
                    <div class="accordion-body text-justify">
                    <br>
                           
                           <center>
                           <a href="checkoutstripe.php"><button class="btn btn-primary rounded-pill">
                           <i class="fa-solid fa-money-bill-transfer fa-lg me-2 opacity-70"></i>Pagar Con Transferencia
                            </button>
                            </a>
                            </center>
                            <br>
                    </div>
                </div>
                </div>
            </div>
            <!--Carrusel de imagenes de caracteristicas-->
           
            </div>
            </div>
            <div class="col-md-4">
                segunda
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php'
?>