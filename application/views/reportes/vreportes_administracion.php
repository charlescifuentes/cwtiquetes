<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('creportes');?>"><i class="fa fa-dashboard"></i> Reportes</a></li>
        <li class="active">Reporte Administración</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"></h3>
              <?php date_default_timezone_set('America/Bogota'); ?>
              <h3 class="box-title">Reporte de Cuota de Administración Vehículos: <?php echo date("d-m-Y", strtotime($desde)); ?> hasta: <?php echo date("d-m-Y", strtotime($hasta)); ?> </h3>
              <?php echo anchor('creportes/impr_rep_admin/'.$desde.'/'. $hasta.'/'.$ruta.'', 'Imprimir', array('class' => 'btn btn-primary btn-xm pull-right','title'=>'Imprimir Reporte')); ?>
            </div>
            <div class="box-body">
             <div class="table-responsive">
             <table id="example1" class="table table-bordered table-striped table-hover">
               <thead>
                <tr>
                  <th>Consecutivo</th>
                  <th>Fecha Venta</th>
                  <th>Vehículo</th>
                  <th>Ruta</th>
                  <th>Pasajeros</th>
                  <th>Administración</th>
                  <th></th>
                </tr>
               </thead>
               <tbody id="myTable">
                <?php foreach($results as $result): ?>
                <tr>
                  <td><?php echo $result['id_cadmin'] ?></td>
                  <td><?php echo date("d-m-Y - h:i:sa", strtotime($result['fecha_venta'])); ?></td>
                  <td><?php echo $result['numero_vehiculo']." - ".$result['nombres_conductor']." ".$result['apellidos_conductor'] ?></td>
                  <td><?php echo $result['nom_ruta'] ?></td>
                  <td><?php echo $result['pasajeros'] ?></td>
                  <td><?php echo "$ ".number_format($result['valor_admin'],0,',','.'); ?></td>
                    <?php $total_pasajeros += $result['pasajeros'] ?>
                    <?php $total_admin += $result['valor_admin'] ?>
                  <td><button type="button" class="btn btn-danger btn-xs" onclick='borrar_cuota("<?php echo $result['id_cadmin'] ?>");' id="btn_delete" title="Borrar este item">Borrar</button></td>
                </tr>
                <?php endforeach; ?>
               </tbody>
               <tfoot>
                <tr>
                  <th>Consecutivo</th>
                  <th>Fecha Venta</th>
                  <th>Vehículo</th>
                  <th>Ruta</th>
                  <th>Pasajeros</th>
                  <th>Administración</th>
                  <th></th>
                </tr>
               </tfoot>
             </table>
             </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-dollar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Pasajeros</span>
              <span class="info-box-number"><?php echo $total_pasajeros; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-dollar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Admin</span>
              <span class="info-box-number"><?php echo "$ ".number_format($total_admin,0,',','.'); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
     </div>
    </section>
    <!-- /.content -->

<script>
    function borrar_cuota(str) {
        $.post("<?php echo base_url();?>creportes/delete_cuota",
            {
                id_cuota: str
            },
            function (data){
                if (data == 1) {
                    alert("Registro borrado");
                    location.reload();
                }
                else{
                var vr = JSON.parse(data);
                    alert("No se puede eliminar este registro - Código de error: " + vr.code);
                }
            });
    }
</script>