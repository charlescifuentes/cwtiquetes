<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>Servicio de Bodega</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Bodega</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">SELECCION SERVICIO</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('cbodega/create_servicio'); ?>
                        <div class="box-body">
                            <div class="form-group">
                              <label for="fecha">Fecha:</label>
                              <?php date_default_timezone_set('America/Bogota'); ?>
                              <input type="datetime-local" class="form-control" name="fecha" value="<?php echo date("Y-m-d\TH:i:s");?>">
                            </div>
                            <div class="form-group">
                                <label>Seleccionar Cliente</label>
                                <select class="form-control select2" name="cliente" style="width: 100%;" onchange="show_cliente(this.value)">
                                  <option selected="selected"></option>
                                  <?php foreach($clientes as $cliente): ?>
                                  <option value=<?php echo $cliente['doc_cliente'] ?>><?php echo $cliente['doc_cliente']." - ".$cliente['nom_cliente']." ".$cliente['apell_cliente'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ruta">Servicio</label>
                                <select class="form-control select2" name="servicio" style="width: 100%;" onchange="show_valor_servicio(this.value)">
                                  <option selected="selected"></option>
                                  <?php foreach($servicios as $servicio): ?>
                                  <option value=<?php echo $servicio['id_servicio'] ?>> <?php echo $servicio['nom_servicio'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="valor_servicio">Valor Servicio</label>
                                <input type="text" class="form-control" name="valor_servicio" id="valor_servicio">

                            </div>
                            <div class="form-group">
                                <label for="observacion">Observaciones</label>
                                <textarea class="form-control" rows="3" name="observacion"  placeholder="Escriba una observación"></textarea>
                            </div>
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
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">CLIENTE</h3>
                        <button onclick="modal_client()" class="btn btn-primary btn-sm pull-right">CREAR CLIENTE</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                              <th>Documento</th>
                              <th>Nombres</th>
                              <th>Apellidos</th>
                            </tr>
                            <tr id="cliente">
                            </tr>
                        </table>
                    </div>
                </div>
                    <!-- /.box-body -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">SERVICIO</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <td width="40%"><b style="font-size:20px;">Servicio Bodega # </b></td>
                                <td width="60%"><span style="color:red;font-size:20px;font-weight:bold;"><?php echo $cons_bodega + 1 ?></span></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
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

<script>
    function show_valor_servicio(str) {
        $.post("<?php echo base_url();?>cbodega/get_valor_servicio",
            {
                servicio: str
            },
            function (data){
                var vr = JSON.parse(data);
                $.each(vr, function(i, item){
                    $('#valor_servicio').val(item.valor_servicio);
                });
            });
    }

    function show_cliente(str) {
        $.post("<?php echo base_url();?>ctiquetes/get_cliente",
            {
                doc_cliente: str
            },
            function (data){
                var cl = JSON.parse(data);
                $('#cliente').text('');
                $.each(cl, function(i, item){
                    $('#cliente').append('<td>'+item.doc_cliente+'</td><td>'+item.nom_cliente+'</td><td>'+item.apell_cliente+'</td>');
                });
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