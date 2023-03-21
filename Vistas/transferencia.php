<?php
include 'header.php';
$usuario = $_SESSION['username'];
?>
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="lip row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <h2>Elige tu banco</h2>
        </div>
    </div>
</div>
<div class="container">
    <div class="d-flex justify-content-center">
        <!-- <div class="accordion col-md-8 col-sm-12" id="accordionExampleY">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwoY">
                   <a href="">
                        <button class="accordion-button collapsed" type="button" 
                            style="color:black"  aria-expanded="false">
                            <i class="fa-brands fa-stripe-s fa-lg me-2 opacity-70"></i>
                            <h3>Citinibamex</h3>
                        </button>
                   </a>
                </h2>
                
            </div>
        </div> -->
        <div class="accordion col-md-8 col-sm-12" id="accordionExampleY">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThreeY">
                    <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                        style="color:black" data-mdb-target="#collapseThreep" aria-expanded="false"
                        aria-controls="collapseThreep">
                        <i class="fa-sharp fa-solid fa-building-columns fa-lg me-2 opacity-70"></i>
                        <h3>CitiBanamex</h3>
                    </button>
                </h2>
                <div id="collapseThreep" class="accordion-collapse collapse" aria-labelledby="headingThreeY"
                    data-mdb-parent="#accordionExampleY">
                    <div class="accordion-body text-justify">
                        <br>
                        <form action="config/transfer.php" method="post">
                            <input type="text" hidden name="correo"value="<?php echo  $usuario;?>">
                            <center>
                                <button class="btn btn-primary rounded-pill" type="submit">
                                    <i class="fa-sharp fa-solid fa-building-columns fa-lg me-2 opacity-70"></i>Los datos
                                    para la tranferencia seran enviados a tu correo
                                </button>

                            </center>
                        </form>
                        <br>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>