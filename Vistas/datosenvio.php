<?php
include 'header.php';
$usuario=$_SESSION['username'];



$idusuario= busca($usuario,'clientes','c_mail','c_id');
$sql2="SELECT * FROM direnvio WHERE d_cliente = '$idusuario' AND d_predeterminado = '1'";
$cons = setq($sql2);
$result2 = mysqli_fetch_array($cons);
?>
<script>
    function confirmar() {
        Swal.fire({
            title: '¿Sus datos son correctos?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("continuar").removeAttribute("type");
                document.getElementById("continuar").removeAttribute("onclick");
                document.getElementById("continuar").setAttribute("type", "submit");
                document.getElementById("continuar").click();
                document.getElementById("continuar").removeAttribute("type");
                document.getElementById("continuar").setAttribute("type", "button");
                document.getElementById("continuar").setAttribute("onclick", "confirmar()");
                /* document.getElementById("domicilio").submit(); */
            }
        })
    }
</script>
<div class="container">
    <h2>Direcciones De Envio</h2>

    <?php
                    $idusu = busca($usuario, 'clientes','c_mail','c_id');
                    $sql2="SELECT * FROM direnvio WHERE d_cliente = '$idusu'";
                    $resultado2 = setq($sql2);
                    ?>
    <select name="direnvio" id="direnvio" class="col-12">
        <!-- <option value="default">Nueva Direccion</option> -->
        <?php while($row2 = $resultado2->fetch_array()){
                        if( $row2['d_predeterminado'] == '1')
                            $select = 'selected';
                        else 
                            $select = '';
                        echo '<option value="'.$row2['d_id'].'" '.$select.'>'.$row2['d_calle'].', #'.$row2['d_nume'].', '.
                        $row2['d_numi'].', Colonia '.$row2['d_colonia'].', Municipio '.$row2['d_municipio'].', C.P '.
                        $row2['d_cp'].', Estado '.$row2['d_estado'].
                        ','.$row2['d_pais'].'</option>';

                        }?>
    </select>


    <br>

    <form action="" id="direccionn" name="direccionn" method="post">
        <input type="hidden" name="direcc" id="direcc" value="<?php echo $result2['d_id']?>" />

        <?php 
                    $idusu = busca($usuario, 'clientes','c_mail','c_id');
                    echo '<input type="hidden" name="idu" id="idu" value="'.$idusu.'"/>'; 
                    if(@$result2['d_predeterminado']=='1'){
                        $preder = 'checked';
                    }else {
                        $preder = '';
                    }
                    ?>
        <input type="checkbox" name="predet" id="predet" <?php echo $preder;?>> Direccion Predeterminada

        <div class="row">
            <div class="col-md-6">
                <label for="calle1" class="cols-sm-10 control-label"><b>Calle</b></label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" value="<?php echo @$result2['d_calle']?>" class="form-control" name="calle1"
                            id="calle1" required placeholder="Calle" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="colonia1" class="cols-sm-10 control-label"><b>Colonia</b></label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" value="<?php echo @$result2['d_colonia']?>" class="form-control"
                            name="colonia1" id="colonia1" required placeholder="Colonia" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="numeroe1" class="cols-sm-10 control-label"><b>Numero Exterior</b></label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" value="<?php echo @$result2['d_nume']?>"
                            onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"
                            name="numeroe1" id="numeroe1" required placeholder="Numero Exterior" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="numeroi1" class="cols-sm-10 control-label"><b>Numero Interior</b></label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" value="<?php echo @$result2['d_numi']?>" class="form-control" name="numeroi1"
                            id="numeroi1" placeholder="Numero interior(Opcional)" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="municipio1" class="cols-sm-10 control-label"><b>Municipio</b></label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" value="<?php echo @$result2['d_municipio']?>" class="form-control"
                            name="municipio1" id="municipio1" required placeholder="Municipio" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="codigop1" class="cols-sm-10 control-label"><b>Codigo Postal</b></label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" value="<?php echo @$result2['d_cp']?>"
                            onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="5"
                            class="form-control" name="codigop1" id="codigop1" required placeholder="Codigo Postal" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="estado1" class="cols-sm-10 control-label"><b>Estado</b></label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" value="<?php echo @$result2['d_estado']?>" class="form-control"
                            name="estado1" id="estado1" required placeholder="Estado" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="pais1" class="cols-sm-10 control-label"><b>Pais</b></label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" value="<?php echo @$result2['d_pais']?>" class="form-control" name="pais1"
                            id="pais1" required placeholder="Pais" />
                    </div>
                </div>
            </div>

            <div style="text-align:center;">
                <br>
                <button class="btn btn-success" type="button" id="nuevadir" onclick="direccion()">
                    Nueva Direccion
                </button>
                <button class="btn btn-warning" type="button" id="actudir" onclick="actualiza()">
                    Actualizar Direccion
                </button>
                <button class="btn btn-success" type="button" id="guardadir" hidden onclick="guardadireccion()">
                    Guardar Direccion
                </button>
                <button class="btn btn-danger" type="button" id="canceladir" hidden onclick="cancela()">
                    Cancelar
                </button>

            </div>

        </div>

    </form>
    <form action="idenvio.php" method="post">
        <input type="hidden" name="pid" id="pid" value="<?php echo $result2['d_id']?>" />

</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-primary me-md-2" type="button" href="<?php echo SERVERURL;?>verif_Tienda"
        style="background-color:#29A8B0;" id="anterior" data-user="<?php echo $sesion;?>"
        data-subtotal="<?php echo $total;?>" data-envio="<?php echo $envio;?>" data-total="<?php echo $totalen?>">
        Atrás
    </a>

    <button class="btn btn-primary me-md-2" type="button" id="siguiente" name="siguiente"
        style="background-color:#29A8B0; " data-subtotal="<?php echo $total;?>" data-envio="<?php echo $envio;?>"
        data-total="<?php echo $totalen?>" onclick="siguiente2()">
        Siguiente
    </button>
</div>
</form>
<br>




<?php
include 'footer.php'
?>
<script>
    $(document).ready(function () {
        // Esta función se ejecuta cuando el documento HTML se ha cargado completamente
        // y está listo para ser manipulado.

        $("#direnvio").change(function () {
            // Esta función se ejecuta cuando se cambia el valor del elemento select con id "my-select".

            var optionSelected = $(this).find("option:selected");
            // Aquí se recupera el elemento option seleccionado en el select y se guarda en la variable optionSelected.
            // $(this) se refiere al select que desencadenó el evento, y find("option:selected") selecciona
            // el elemento option que ha sido seleccionado.

            var valueSelected = optionSelected.val();
            // Aquí se obtiene el valor del elemento option seleccionado y se guarda en la variable valueSelected.

            $.ajax({
                url: "consulta",
                type: "POST",
                /* dataType: "json", */
                data: {
                    option: valueSelected
                },


                success: function (result) {
                    // Esta función se ejecuta cuando se recibe una respuesta satisfactoria del servidor.


                    $("#calle1").val(result.d_calle);
                    $("#colonia1").val(result.d_colonia);
                    $("#numeroe1").val(result.d_nume);
                    $("#numeroi1").val(result.d_numi);
                    $("#municipio1").val(result.d_municipio);
                    $("#estado1").val(result.d_estado);
                    $("#pais1").val(result.d_pais);
                    if (result.d_predeterminado == '0') {
                        $("#predet").prop("checked", false);
                    } else {
                        $("#predet").prop("checked", true);
                    }
                }
            });
        });
    });

    $("#direnvio").change(function () {

        var optionSelected = $(this).find("option:selected");
        var valueSelected = optionSelected.val();
        $("#pid").val(valueSelected);
    });

    function direccion() {
        document.getElementById("guardadir").removeAttribute("hidden");
        document.getElementById("canceladir").removeAttribute("hidden");
        document.getElementById("nuevadir").hidden = true;
        document.getElementById("direnvio").hidden = true;
        document.getElementById("actudir").hidden = true;
        document.getElementById("calle1").value = "";
        document.getElementById("colonia1").value = "";
        document.getElementById("numeroe1").value = "";
        document.getElementById("numeroi1").value = "";
        document.getElementById("municipio1").value = "";
        document.getElementById("codigop1").value = "";
        document.getElementById("estado1").value = "";
        document.getElementById("pais1").value = "";
    }

    function actualiza() {
        Swal.fire({
            title: '¿Seguro que deseas actualizar tus datos?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {

                document.getElementById("direccionn").action = "update_predet.php";
                document.getElementById("actudir").removeAttribute("type");
                document.getElementById("actudir").removeAttribute("onclick");
                document.getElementById("actudir").setAttribute("type", "submit");
                document.getElementById("actudir").click();
                document.getElementById("actudir").removeAttribute("type");
                document.getElementById("actudir").setAttribute("type", "button");
                document.getElementById("actudir").setAttribute("onclick", "actualiza()");

            }
        })
    }

    function siguiente2() {
        Swal.fire({
            title: '¿Seguro que deseas enviar tus productos a esta direccion?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("siguiente").removeAttribute("type");
                document.getElementById("siguiente").removeAttribute("onclick");
                document.getElementById("siguiente").setAttribute("type", "submit");
                document.getElementById("siguiente").click();
                document.getElementById("siguiente").removeAttribute("type");
                document.getElementById("siguiente").setAttribute("type", "button");
                document.getElementById("siguiente").setAttribute("onclick", "siguiente()");

            }
        })
    }

    function guardadireccion() {
        document.getElementById("direccionn").action = "direccion.php";
        document.getElementById("guardadir").removeAttribute("type");
        document.getElementById("guardadir").removeAttribute("onclick");
        document.getElementById("guardadir").setAttribute("type", "submit");
        document.getElementById("guardadir").click();
        document.getElementById("guardadir").removeAttribute("type");
        document.getElementById("guardadir").setAttribute("type", "button");
        document.getElementById("guardadir").setAttribute("onclick", "guardadireccion()");
    }

    function cancela() {
        document.getElementById("nuevadir").removeAttribute("hidden");
        document.getElementById("guardadir").hidden = true;
        document.getElementById("canceladir").hidden = true;
        document.getElementById("direnvio").removeAttribute("hidden");
        document.getElementById("actudir").removeAttribute("hidden");
        location.reload();
    }
</script>