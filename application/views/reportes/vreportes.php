<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Reportes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Cuota de Administración</h3>
            </div>
            <?php echo validation_errors(); ?>
            <?php echo form_open('creportes/report_administracion'); ?>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                <label>Desde:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <?php date_default_timezone_set('America/Bogota'); ?>
                  <input type="datetime-local" class="form-control" name="tfecha_desde" value="<?php echo date("Y-m-d\T00:00:00");?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                <label>Hasta:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="datetime-local" class="form-control" name="tfecha_hasta" value="<?php echo date("Y-m-d\T23:59:59");?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
               <label>Seleccionar Ruta</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa  fa-map"></i>
                </span>
                <select class="form-control select2" name="ruta">
                <option selected="selected" value="null"></option>
                 <?php foreach($rutas as $ruta): ?>
                  <option value=<?php echo $ruta['id_ruta'] ?>><?php echo $ruta['id_ruta']." - ".$ruta['nom_ruta'] ?></option>
                 <?php endforeach; ?>
                </select>
               </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <button type="submit" class="btn btn-primary btn-lg pull-right">Generar Reporte</button>
            </div>
            <?php echo form_close(); ?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Venta de Tiquetes</h3>
            </div>
            <?php echo validation_errors(); ?>
            <?php echo form_open('creportes/report_tiquetes'); ?>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                <label>Desde:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <?php date_default_timezone_set('America/Bogota'); ?>
                  <input type="datetime-local" class="form-control" name="tfecha_desde" value="<?php echo date("Y-m-d\T00:00:00");?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                <label>Hasta:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="datetime-local" class="form-control" name="tfecha_hasta" value="<?php echo date("Y-m-d\T23:59:59");?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
               <label>Seleccionar Ruta</label>
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="fa  fa-map"></i>
                </span>
                <select class="form-control select2" name="ruta">
                <option selected="selected" value="null"></option>
                 <?php foreach($rutas as $ruta): ?>
                  <option value=<?php echo $ruta['id_ruta'] ?>><?php echo $ruta['id_ruta']." - ".$ruta['nom_ruta'] ?></option>
                 <?php endforeach; ?>
                </select>
               </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <button type="submit" class="btn btn-primary btn-lg pull-right">Generar Reporte</button>
            </div>
            <?php echo form_close(); ?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Venta de Bodega</h3>
            </div>
            <?php echo validation_errors(); ?>
            <?php echo form_open('creportes/report_bodega'); ?>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                <label>Desde:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <?php date_default_timezone_set('America/Bogota'); ?>
                  <input type="datetime-local" class="form-control" name="tfecha_desde" value="<?php echo date("Y-m-d\T00:00:00");?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                <label>Hasta:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="datetime-local" class="form-control" name="tfecha_hasta" value="<?php echo date("Y-m-d\T23:59:59");?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <button type="submit" class="btn btn-primary btn-lg pull-right">Generar Reporte</button>
            </div>
            <?php echo form_close(); ?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<script>

</script>