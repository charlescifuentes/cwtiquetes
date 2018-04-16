<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>Registre un nuevo Cliente</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('cclientes');?>"><i class="fa fa-dashboard"></i> Clientes</a></li>
        <li class="active">Nuevo Cliente</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ingrese Datos</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <?php echo form_open('cclientes/insert', 'class="form-horizontal"'); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="doc_cliente" class="col-sm-2 control-label">DOC Cliente</label>
                                <div class="col-sm-10">
                                <?php echo form_error('doc_cliente'); ?>
                                <input type="text" class="form-control" name="doc_cliente">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nom_ruta" class="col-sm-2 control-label">Nombres</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="nom_cliente">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="valor_ruta" class="col-sm-2 control-label">Apellidos</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="apell_cliente">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="valor_ruta" class="col-sm-2 control-label">Teléfono</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="tel_cliente">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="valor_ruta" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="email_cliente">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="valor_ruta" class="col-sm-2 control-label">Ciudad</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="ciudad_cliente">
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