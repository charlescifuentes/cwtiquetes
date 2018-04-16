<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>Vehículo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('cvehiculos');?>"><i class="fa fa-dashboard"></i> Vehículos</a></li>
        <li class="active">Vehículo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">VEHICULO DETALLE</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('cvehiculos/update', 'class="form-horizontal"'); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="numero_vehiculo" class="col-sm-2 control-label">Número</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="numero_vehiculo" value="<?php echo $vehiculo['numero_vehiculo'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="placa_vehiculo" class="col-sm-2 control-label">Placa</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="placa_vehiculo" value="<?php echo $vehiculo['placa_vehiculo'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombres_conductor" class="col-sm-2 control-label">Nombres Conductor</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombres_conductor" value="<?php echo $vehiculo['nombres_conductor'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="apellidos_conductor" class="col-sm-2 control-label">Apellidos Conductor</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="apellidos_conductor" value="<?php echo $vehiculo['apellidos_conductor'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono_conductor" class="col-sm-2 control-label">Teléfono Conductor</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="telefono_conductor" value="<?php echo $vehiculo['telefono_conductor'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="numero_licencia" class="col-sm-2 control-label">Número Licencia</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="numero_licencia" value="<?php echo $vehiculo['numero_licencia'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="categoria_licencia" class="col-sm-2 control-label">Categoría Licencia</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="categoria_licencia" value="<?php echo $vehiculo['categoria_licencia'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="venc_licencia" class="col-sm-2 control-label">Vencimiento Licencia Transito</label>
                                <div class="col-sm-10">
                                <input type="date" class="form-control" name="venc_licencia" value="<?php echo $vehiculo['venc_licencia'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="numero_soat" class="col-sm-2 control-label">Número SOAT</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="numero_soat" value="<?php echo $vehiculo['numero_soat'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="venc_soat" class="col-sm-2 control-label">Vencimiento SOAT</label>
                                <div class="col-sm-10">
                                <input type="date" class="form-control" name="venc_soat" value="<?php echo $vehiculo['venc_soat'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="num_tarjeta_operacion" class="col-sm-2 control-label">Número T. Operación</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="num_tarjeta_operacion" value="<?php echo $vehiculo['num_tarjeta_operacion'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="venc_tarjeta_operacion" class="col-sm-2 control-label">Vencimiento T. Operación</label>
                                <div class="col-sm-10">
                                <input type="date" class="form-control" name="venc_tarjeta_operacion" value="<?php echo $vehiculo['venc_tarjeta_operacion'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="extracto_contractual" class="col-sm-2 control-label">Extracto Contractual</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="extracto_contractual" value="<?php echo $vehiculo['extracto_contractual'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="venc_extracto_contractual" class="col-sm-2 control-label">Vencimiento Extracto Contractual</label>
                                <div class="col-sm-10">
                                <input type="date" class="form-control" name="venc_extracto_contractual" value="<?php echo $vehiculo['venc_extracto_contractual'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="num_tecnico_mecanica" class="col-sm-2 control-label">Número Tecnicomecánica</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="num_tecnico_mecanica" value="<?php echo $vehiculo['num_tecnico_mecanica'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="venc_tecnico_mecanica" class="col-sm-2 control-label">Vencimiento Tecnicomecánica</label>
                                <div class="col-sm-10">
                                <input type="date" class="form-control" name="venc_tecnico_mecanica" value="<?php echo $vehiculo['venc_tecnico_mecanica'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="clase_vehiculo" class="col-sm-2 control-label">Clase Vehículo</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="clase_vehiculo" value="<?php echo $vehiculo['clase_vehiculo'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="capacidad_pasajeros" class="col-sm-2 control-label">Capacidad Pasajeros</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="capacidad_pasajeros" value="<?php echo $vehiculo['capacidad_pasajeros'] ?>">
                                </div>
                            </div>

                            <h4>DATOS PROPIETARIO VEHÍCULO</h4>
                            <div class="form-group">
                                <label for="nombres_propietario" class="col-sm-2 control-label">Nombres Propietario</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombres_propietario" value="<?php echo $vehiculo['nombres_propietario'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="apellidos_propietario" class="col-sm-2 control-label">Apellidos Propietario</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="apellidos_propietario" value="<?php echo $vehiculo['apellidos_propietario'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono_propietario" class="col-sm-2 control-label">Teléfono Propietario</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="telefono_propietario" value="<?php echo $vehiculo['telefono_propietario'] ?>">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col -->
        </div>
    </section>
    <!-- /.content -->