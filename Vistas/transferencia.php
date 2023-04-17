<?php
include 'header.php';
$usuario = $_SESSION['username'];
if(isset($_SESSION['username'])){
    $usuario = $_SESSION['username'];
    $sql1 ="SELECT c_id, c_nmb FROM clientes WHERE c_mail ='$usuario'";
    $resultado = setq($sql1);
    $idusuario = mysqli_fetch_array($resultado);
    $idusu = $idusuario['c_id'];
    $usu = $idusuario['c_nmb'];
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
                                        $envio;
                                    }else{
                                        $envio = 150;
                                        $envio;
                                    }
    $totalE= $total + $envio;
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
                        <input type="hidden" id="subtotal" name="subtotal" value="<?php echo ($total); ?>"/>
                        <input type="hidden" id="envio" name="envio" value="<?php echo ($envio); ?>"/>
                        <input type="hidden" id="precio" name="precio" value="<?php echo ($totalE); ?>"/>
                        <input type="hidden" id="user" name="user" value="<?php echo ($usu);?>">
                        <input type="hidden" id="email" name="email" value="<?php echo ($usuario);?>">
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