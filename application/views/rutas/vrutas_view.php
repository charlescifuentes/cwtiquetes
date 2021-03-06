﻿<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>Ruta</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('crutas');?>"><i class="fa fa-dashboard"></i> Rutas</a></li>
        <li class="active">Ruta</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">RUTA DETALLE</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('crutas/update', 'class="form-horizontal"'); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="id_ruta" class="col-sm-2 control-label">ID Ruta</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="id_ruta" value="<?php echo $ruta['id_ruta'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nom_ruta" class="col-sm-2 control-label">Nombres Ruta</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="nom_ruta" value="<?php echo $ruta['nom_ruta'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="valor_ruta" class="col-sm-2 control-label">Valor Ruta</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="valor_ruta" value="<?php echo $ruta['valor_ruta'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="activo_ruta" class="col-sm-2 control-label">Ruta Activa</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="activo_ruta" value="<?php echo $ruta['activo_ruta'] ?>">
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