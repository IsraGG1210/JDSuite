<?php
include 'header.php';
$usuario=$_SESSION['username'];

$sql="SELECT * FROM clientes WHERE c_mail = '$usuario'";
$consutla= setq($sql);
$result = mysqli_fetch_array($consutla);




?>
<script>
    function confirmar(){
        Swal.fire({
            title: '¿Sus datos son correctos?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("domicilio").submit();
            }
        })
    }
</script>
<div class="container">
    <form action="config/datosenvio.php" method="post" name="domicilio" id="domicilio">
    <div class="row">
        <h2 id="seccion3">Datos De Envio</h2>
        <div class="col-md-6">
            <label for="calle" class="cols-sm-10 control-label"><b>Calle</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" class="form-control" name="calle" id="calle"
                        value="<?php echo $result['c_calle']?>" placeholder="Calle" required />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="colonia" class="cols-sm-10 control-label"><b>Colonia</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" value="<?php echo $result['c_colonia']?>" class="form-control" name="colonia"
                        id="colonia" placeholder="Colonia" required />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="numeroe" class="cols-sm-10 control-label"><b>Numero Exterior</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                        value="<?php echo $result['c_nume']?>" class="form-control" name="numeroe" id="numeroe"
                        placeholder="Numero Exterior" required />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="numeroi" class="cols-sm-10 control-label"><b>Numero Interior</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" value="<?php echo $result['c_numi']?>" class="form-control" name="numeroi"
                        id="numeroi" placeholder="Numero interior(Opcional)" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="municipio" class="cols-sm-10 control-label"><b>Municipio</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" value="<?php echo $result['c_municipio']?>" class="form-control" name="municipio"
                        id="municipio" placeholder="Municipio" required />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="codigop" class="cols-sm-10 control-label"><b>Codigo Postal</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="5"
                        value="<?php echo $result['c_cp']?>" class="form-control" name="codigop" id="codigop"
                        placeholder="Codigo Postal" required />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="estado" class="cols-sm-10 control-label"><b>Estado</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" value="<?php echo $result['c_estado']?>" class="form-control" name="estado"
                        id="estado" placeholder="Estado" required />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="pais" class="cols-sm-10 control-label"><b>Pais</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" value="<?php echo $result['c_pais']?>" class="form-control" name="pais" id="pais"
                        placeholder="Pais" required />
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <label for="pais" class="cols-sm-10 control-label"><b>Referencias</b></label>
            <div class="col-md-11">
                <div class="input-group">
                    <input type="text" value="" maxlength="145" class="form-control" name="referencias" id="referencias"
                        placeholder="Referencias para llegar a su domicilio" />
                </div>
            </div>
        </div>
        <div style="text-align:end;"><br>
            <button class="btn btn-success" name="editar" id="editar" type="button" style="background-color:#29A8B0;">
                Atras
            </button>
            <button class="btn btn-danger" name="cancelar" id="cancelar" type="button" style="background-color:#29A8B0;" onclick="confirmar()">
                Siguiente
            </button>
        </div>
    </div>
    </form>
</div>
<br>




<?php
include 'footer.php'
?>