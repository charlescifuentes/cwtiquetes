<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>Datos Generales</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Configuración General</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Actualizar Datos</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('cconfiguracion/update', 'class="form-horizontal"'); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nombre_empresa" class="col-sm-2 control-label">Nombre Empresa</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre_empresa" value="<?php echo $config['nombre_empresa'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nit_empresa" class="col-sm-2 control-label">NIT Empresa</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="nit_empresa" value="<?php echo $config['nit_empresa'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="direccion_empresa" class="col-sm-2 control-label">Dirección Empresa</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="direccion_empresa" value="<?php echo $config['direccion_empresa'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono_empresa" class="col-sm-2 control-label">Teléfono Empresa</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="telefono_empresa" value="<?php echo $config['telefono_empresa'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cia_aseguradora" class="col-sm-2 control-label">Cía Aseguradora</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="cia_aseguradora" value="<?php echo $config['cia_aseguradora'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="poliza_numero" class="col-sm-2 control-label">Poliza Número</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="poliza_numero" value="<?php echo $config['poliza_numero'] ?>">
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