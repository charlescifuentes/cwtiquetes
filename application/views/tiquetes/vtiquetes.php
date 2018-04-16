<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>Generador de tiquetes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Tiquetes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">SELECCION PASAJE</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <h4><?php echo validation_errors(); ?></h4>
                    <?php echo form_open('ctiquetes/create_tiquete'); ?>
                        <div class="box-body">
                            <div class="form-group">
                              <label for="fecha">Fecha:</label>
                              <?php date_default_timezone_set('America/Bogota'); ?>
                              <input type="datetime-local" class="form-control" name="fecha" value="<?php echo date("Y-m-d\TH:i:s");?>">
                            </div>
                            <div class="form-group">
                                <label>Seleccionar Vehiculo:</label>
                                <?php foreach($vehiculos as $vehiculo): ?>
                                <?php if($vehiculo['enturnar'] == 1){ ?>
                                <div class="radio form-control">
                                <label><input type="radio" name="vehiculo" onclick="show_vehiculo(this.value)" value="<?php echo $vehiculo['numero_vehiculo'] ?>"><?php echo $vehiculo['numero_vehiculo']." - ".$vehiculo['nombres_conductor']." ".$vehiculo['apellidos_conductor'] ?></label>
                                </div>
                                <?php } ?>
                                <?php endforeach; ?>
                            </div>
                            <div class="form-group">
                                <label>Seleccionar Cliente</label>
                                <select class="form-control select2" name="cliente" style="width: 100%;" required>
                                  <option value="1" selected="selected">1 - CLIENTE GENERAL</option>
                                  <?php foreach($clientes as $cliente): ?>
                                  <option value=<?php echo $cliente['doc_cliente'] ?>><?php echo $cliente['doc_cliente']." - ".$cliente['nom_cliente']." ".$cliente['apell_cliente'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ruta">Ruta</label>
                                <select class="form-control select2" name="ruta" style="width: 100%;" onchange="show_valor_pasaje(this.value)">
                                  <option selected="selected"></option>
                                  <?php foreach($rutas as $ruta): ?>
                                  <option value=<?php echo $ruta['id_ruta'] ?>> <?php echo $ruta['nom_ruta'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                                <label for="cant_pasajeros">Pasajeros</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                                <input type="text" class="form-control" name="cant_pasajeros" id="cant_pasajeros" value="1">
                              </div>
                             </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                                <label for="valor_pasaje">Valor Pasaje</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar (alias)"></i></span>
                                <input type="text" class="form-control" name="valor_pasaje" id="valor_pasaje">
                              </div>
                             </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="nombre_pasajero">Observaciones</label>
                                <textarea class="form-control" rows="3" name="observacion"  placeholder="Escriba una observación"></textarea>
                            </div> -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-6">
                <div class="box box-success" id="datos_venta">
                    <div class="box-header with-border" id="header_datos">
                        <h3 class="box-title">DATOS</h3>
                        <button onclick="modal_client()" class="btn btn-primary btn-sm pull-right">CREAR CLIENTE</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <td width="50%"><b style="font-size:17px;">Tiquete # </b></td>
                                <td width="50%"><span style="color:red;font-size:17px;font-weight:bold;"><?php echo $cons_tiquete + 1 ?></span></td>
                            </tr>
                            <tr>
                                <td width="50%"><b style="font-size:17px;">Placa de Vehiculo: </b></td>
                                <td width="50%"><span style="color:red;font-size:17px;font-weight:bold;" id="placa_vehiculo"></span></td>
                            </tr>
                            <tr>
                                <td width="50%"><b style="font-size:17px;">Clase de Vehiculo: </b></td>
                                <td width="50%"><span style="color:red;font-size:17px;font-weight:bold;" id="clase_vehiculo"></span></td>
                            </tr>
                            <tr>
                                <td width="50%"><b style="font-size:17px;">Conductor: </b></td>
                                <td width="50%"><span style="color:red;font-size:17px;font-weight:bold;" id="nombres_conductor"></span></td>
                            </tr>
                            <tr>
                                <td><b style="font-size:17px;">Cupo de Vehiculo: </b></td>
                                <td><span style="color:red;font-size:17px;font-weight:bold;" id="pasajeros_asignados"></span><b style="font-size:20px;"> de: </b><span style="color:red;font-size:20px;font-weight:bold;" id="capacidad_pasajeros"></span></td>
                            </tr>
                            <tr>
                                <td><b style="font-size:17px;">Venc. Licencia: </b></td>
                                <td><span style="color:red;font-size:17px;font-weight:bold;" id="vencimiento_licencia"></span></td>
                            </tr>
                            <tr>
                                <td><b style="font-size:17px;">Venc. SOAT: </b></td>
                                <td><span style="color:red;font-size:17px;font-weight:bold;" id="vencimiento_soat"></span></td>
                            </tr>
                            <tr>
                                <td><b style="font-size:17px;">Venc. Tarjeta de Operación: </b></td>
                                <td><span style="color:red;font-size:17px;font-weight:bold;" id="vencimiento_tarjeta_operacion"></span></td>
                            </tr>
                            <tr>
                                <td><b style="font-size:17px;">Venc. Extracto Contractual: </b></td>
                                <td><span style="color:red;font-size:17px;font-weight:bold;" id="venc_extracto_contractual"></span></td>
                            </tr>
                            <tr>
                                <td><b style="font-size:17px;">Venc. Tecnicomecanica: </b></td>
                                <td><span style="color:red;font-size:17px;font-weight:bold;" id="venc_tecnico_mecanica"></span></td>
                            </tr>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!--/.col (right) -->

                <!-- Oculto hasta despachar vehiculo -->
                <div class="box box-success" id="despacho_vehiculo" style="display: none;">
                    <div class="box-header with-border" id="header_datos">
                        <h3 class="box-title">DESPACHO VEHÍCULO</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                     <form class="form-horizontal" role="form" id="client_form">
                        <div class="form-group">
                         <label for="fecha_despacho" class="col-sm-4 control-label">Fecha Despacho</label>
                         <div class="col-sm-8">
                          <input type="datetime-local" class="form-control" id="fecha_despacho" value="<?php echo date("Y-m-d\TH:i:s");?>">
                         </div>
                        </div>
                        <div class="form-group">
                         <label for="vehiculo_despacho" class="col-sm-4 control-label">Vehículo</label>
                         <div class="col-sm-8">
                          <input type="text" class="form-control" id="vehiculo_despacho">
                         </div>
                        </div>
                        <div class="form-group">
                         <label for="ruta_despacho" class="col-sm-4 control-label">Ruta</label>
                         <div class="col-sm-8">
                          <select class="form-control" id="ruta_despacho">
                           <option selected="selected" value="1">SELECCIONE UNA RUTA</option>
                           <?php foreach($rutas as $ruta): ?>
                           <option value=<?php echo $ruta['id_ruta'] ?>> <?php echo $ruta['nom_ruta'] ?></option>
                           <?php endforeach; ?>
                          </select>
                         </div>
                        </div>
                        <div class="form-group">
                         <label for="pasajeros_despacho" class="col-sm-4 control-label">Pasajeros</label>
                         <div class="col-sm-8">
                          <input type="text" class="form-control" id="pasajeros_despacho">
                         </div>
                        </div>
                        <div class="form-group">
                         <label for="valor_admin" class="col-sm-4 control-label">Valor Administración</label>
                         <div class="col-sm-8">
                          <div class="radio">
                           <label><input type="radio" name="optradio" value="2000">2.000</label>
                          </div>
                          <div class="radio">
                           <label><input type="radio" name="optradio" value="2300">2.300</label>
                          </div>
                          <div class="radio">
                           <label><input type="radio" name="optradio" value="2500">2.500</label>
                          </div>
                          <div class="radio">
                           <label><input type="radio" name="optradio" value="3000">3.000</label>
                          </div>
                          <div class="radio">
                           <label><input type="radio" name="optradio" value="4500">4.500</label>
                          </div>
                          <div class="radio">
                           <label><input type="radio" name="optradio" value="6500">6.500</label>
                          </div>
                          <div class="radio">
                           <label><input type="radio" name="optradio" value="0">0</label>
                          </div>
                         </div>
                        </div>
                     </form>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" onclick="despachar_vehiculo()">Despachar Vehículo</button>
                    </div>
                </div>
                <!--/.col (right) -->

            </div>

            <!-- Modal Cliente-->
            <div class="modal fade" id="modal_cliente">
             <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background-color: #3c8dbc;">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                  <h4 class="modal-title" style="color:white;">Crear Nuevo Cliente</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                <div id="client_message"></div>
                 <form class="form-horizontal" role="form" id="client_form">
                     <div class="form-group">
                        <label for="doc_cliente" class="col-sm-4 control-label">DOC Cliente</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="doc_cli">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nom_ruta" class="col-sm-4 control-label">Nombres</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="nom_cli">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="valor_ruta" class="col-sm-4 control-label">Apellidos</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="apell_cli">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="valor_ruta" class="col-sm-4 control-label">Teléfono</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="tel_cli">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="valor_ruta" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="email_cli">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="valor_ruta" class="col-sm-4 control-label">Ciudad</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="ciudad_cli">
                        </div>
                    </div>
                 </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" onclick="crear_cliente()">Crear Cliente</button>
                </div>
              </div>
             </div>
            </div>

        <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->

<script type="text/javascript">

    function show_vehiculo(str) {
        $( "#btn_despachar").remove();
        $("#datos_venta").show();
        $("#despacho_vehiculo").hide();

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10) {
            dd='0'+dd
        }

        if(mm<10) {
            mm='0'+mm
        }

        today = yyyy+'-'+mm+'-'+dd;

        $.post("<?php echo base_url();?>ctiquetes/get_clase_vehiculo",
            {
                numero_vehiculo: str
            },
            function (data){
                var cv = JSON.parse(data);
                $.each(cv, function(i, item){
                    $('#clase_vehiculo').text(item.clase_vehiculo);
                    $('#placa_vehiculo').text(item.placa_vehiculo);
                    $('#nombres_conductor').text(item.nombres_conductor + " " + item.apellidos_conductor);
                    $('#pasajeros_asignados').text(item.pasajeros_asignados);
                    $('#capacidad_pasajeros').text(item.capacidad_pasajeros);
                    $('#vencimiento_licencia').text(convert_date(item.venc_licencia));
                    $('#vencimiento_soat').text(convert_date(item.venc_soat));
                    $('#vencimiento_tarjeta_operacion').text(convert_date(item.venc_tarjeta_operacion));
                    $('#venc_extracto_contractual').text(convert_date(item.venc_extracto_contractual));
                    $('#venc_tecnico_mecanica').text(convert_date(item.venc_tecnico_mecanica));

                    //if (item.capacidad_pasajeros <= item.pasajeros_asignados){
                    //$( "#btn_despachar").remove();
                    $( "#header_datos" ).append( "<type='button' id='btn_despachar' class='btn btn-success' onclick='despacho_vehiculo(\"" + item.numero_vehiculo + "\",\"" + item.nombres_conductor + "\",\"" + item.apellidos_conductor + "\",\"" + item.pasajeros_asignados + "\")'>Despachar Vehículo</button>" );
                    //}
                    if (today >= item.venc_licencia){

                        $("#vencimiento_licencia").append(" - VENCIDO! ");
                    }
                    if (today >= item.venc_soat){

                        $("#vencimiento_soat").append(" - VENCIDO! ");
                    }
                    if (today >= item.venc_tarjeta_operacion){

                        $("#vencimiento_tarjeta_operacion").append(" - VENCIDO! ");
                    }
                    if (today >= item.venc_extracto_contractual){

                        $("#venc_extracto_contractual").append(" - VENCIDO! ");
                    }
                    if (today >= item.venc_tecnico_mecanica){

                        $("#venc_tecnico_mecanica").append(" - VENCIDO! ");
                    }
                });
            });
    }

    function convert_date(str){
        var mydate = new Date(str);
        var dd = mydate.getDate()+1;
        var mm = mydate.getMonth()+1; //January is 0!
        var yyyy = mydate.getFullYear();

        if(dd<10) {
            dd='0'+dd
        }

        if(mm<10) {
            mm='0'+mm
        }

        return mydate = dd+'-'+mm+'-'+yyyy;
    }

    function show_valor_pasaje(str) {
        $.post("<?php echo base_url();?>ctiquetes/get_valor_ruta",
            {
                ruta: str
            },
            function (data){
                var vr = JSON.parse(data);
                $.each(vr, function(i, item){
                    $('#valor_pasaje').val(item.valor_ruta);
                    $('#nombre_ruta').val(item.nom_ruta);
                });
            });
    }

    function despacho_vehiculo(num_veh, nom_cond, apell_cond, pasajeros){
        $("#datos_venta").hide();
        $("#despacho_vehiculo").show();

        $("#vehiculo_despacho").val(num_veh);
        $("#pasajeros_despacho").val(pasajeros);
    }

    function despachar_vehiculo(str){
        $.post("<?php echo base_url();?>ctiquetes/update_cupo_vehiculo",
            {
                fecha_despacho: $('#fecha_despacho').val(),
                numero_vehiculo: $('#vehiculo_despacho').val(),
                ruta_despacho: $('#ruta_despacho').val(),
                pasajeros_despacho: $('#pasajeros_despacho').val(),
                valor_admin: $('input[name=optradio]:checked').val()
            },
            function (status){
                alert("Vehículo despachado");
                location.reload();
            });
    }

    function modal_client(){
        $('#modal_cliente').on('hidden.bs.modal', function () {
            $(this).find("input,textarea,select").val('').end();
            $("#client_message").html("");

        });

        $('#modal_cliente').modal('show');
    }

    function crear_cliente(){
        $.post("<?php echo base_url();?>ctiquetes/create_cliente",
            {
                doc_cliente : $("#doc_cli").val(),
                nom_cliente : $("#nom_cli").val(),
                apell_cliente: $("#apell_cli").val(),
                tel_cliente: $("#tel_cli").val(),
                email_cliente: $("#email_cli").val(),
                ciudad_cliente: $("#ciudad_cli").val()
            },
            function (data){
                if (data == 1) {
                    $('#modal_cliente').modal('toggle');
                    location.reload();
                }else{
                    $("#client_message").text("Este Cliente ya existe");
                }
            });
    }

</script>