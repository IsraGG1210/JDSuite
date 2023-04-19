<?php 
require 'Conexion/funciones.php';
include 'header.php';
$usuario=$_SESSION['username'];
$idusuario= busca($usuario,'clientes','c_mail','c_id');
$sql2="SELECT * FROM direnvio WHERE d_cliente = '$idusuario'";
$cons = setq($sql2);
$result2 = mysqli_fetch_array($cons);
?>
<div class="col-md-12">
    <label for="regimen" class="cols-sm-10 control-label"><b>Direcciones de envio</b></label>
    <div class="col-sm-10">
        <div class="input-group">
            <?php
                                $idusu = busca($usuario, 'clientes','c_mail','c_id');
                                $sql2="SELECT * FROM direnvio WHERE d_cliente = '$idusu'";
                                $resultado2 = setq($sql2);
                                ?>
            <select name="direnvio" id="direnvio" class="col-12">
                <option value="default">Nueva Direccion</option>
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
        </div>
    </div>
    <br>
    <form action="direccion.php" id="direccionn" method="post">
    <div name="direccion" id="direccion">
       <?php 
       $idusu = busca($usuario, 'clientes','c_mail','c_id');?>
        <input type="hidden" name="idu" id="idu" value="<?php echo $idusu?>">
        
        <input type="checkbox" name="predet" id="predet"> Direccion Predeterminada
        <div class="col-md-6">
            <label for="calle" class="cols-sm-10 control-label"><b>Calle</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" value="<?php echo $result2['d_calle']?>" class="form-control" name="calle"
                        id="calle" required placeholder="Calle" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="colonia" class="cols-sm-10 control-label"><b>Colonia</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" value="<?php echo $result2['d_colonia']?>" class="form-control" name="colonia"
                        id="colonia" required placeholder="Colonia" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="numeroe" class="cols-sm-10 control-label"><b>Numero Exterior</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" value="<?php echo $result2['d_nume']?>"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control"
                        name="numeroe" id="numeroe" required placeholder="Numero Exterior" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="numeroi" class="cols-sm-10 control-label"><b>Numero Interior</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" value="<?php echo $result2['d_numi']?>" class="form-control" name="numeroi"
                        id="numeroi" required placeholder="Numero interior(Opcional)" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="municipio" class="cols-sm-10 control-label"><b>Municipio</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" value="<?php echo $result2['d_municipio']?>" class="form-control"
                        name="municipio" id="municipio" required placeholder="Municipio" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="codigop" class="cols-sm-10 control-label"><b>Codigo Postal</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" value="<?php echo $result2['d_cp']?>"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="5"
                        class="form-control" name="codigop" id="codigop" required placeholder="Codigo Postal" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="estado" class="cols-sm-10 control-label"><b>Estado</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" value="<?php echo $result2['d_estado']?>" class="form-control" name="estado"
                        id="estado" required placeholder="Estado" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="pais" class="cols-sm-10 control-label"><b>Pais</b></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" value="<?php echo $result2['d_pais']?>" class="form-control" name="pais"
                        id="pais" required placeholder="Pais" />
                </div>
            </div>
        </div>
        <br>
    </div>

    <div style="text-align:center;">
        <button class="btn btn-success" type="button" id="nuevadir" onclick="direccion()">
            Nueva Direccion
        </button>
        <button class="btn btn-success" type="button" id="guardadir" hidden onclick="guardadireccion()">
            Guardar Direccion
        </button>
        <button class="btn btn-danger" type="button" id="canceladir" hidden onclick="cancela()">
            Cancelar
        </button>
        <script>
            function direccion() {
                document.getElementById("guardadir").removeAttribute("hidden");
                document.getElementById("canceladir").removeAttribute("hidden");
                document.getElementById("nuevadir").hidden = true;
                document.getElementById("direnvio").hidden = true;
                document.getElementById("calle").value="";
                document.getElementById("colonia").value="";
                document.getElementById("numeroe").value="";
                document.getElementById("numeroi").value="";
                document.getElementById("municipio").value="";
                document.getElementById("codigop").value="";
                document.getElementById("estado").value="";
                document.getElementById("pais").value="";
            }

            function guardadireccion() {
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
                location.reload();
            }
        </script>
    </div>
    </form>
</div>
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
                url: "consulta.php",
                type: "POST",
                /* dataType: "json", */
                data: {
                    option: valueSelected
                },


                success: function (result) {
                    // Esta función se ejecuta cuando se recibe una respuesta satisfactoria del servidor.


                    $("#calle").val(result.d_calle);
                    $("#colonia").val(result.d_colonia);
                    $("#numeroe").val(result.d_nume);
                    $("#numeroi").val(result.d_numi);
                    $("#municipio").val(result.d_municipio);
                    $("#estado").val(result.d_estado);
                    $("#pais").val(result.d_pais);
                }
            });
        });
    });
</script>