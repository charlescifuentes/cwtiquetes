<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('creportes');?>"><i class="fa fa-dashboard"></i> Reportes</a></li>
        <li class="active">Reportes Bodega</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <?php date_default_timezone_set('America/Bogota'); ?>
              <h3 class="box-title">Reporte de Servicio de Bodega Vendidos desde: <?php echo date("d-m-Y", strtotime($desde)); ?> hasta: <?php echo date("d-m-Y", strtotime($hasta)); ?> </h3>
              <?php echo anchor('creportes/impr_rep_bodega/'.$desde.'/'. $hasta.'', 'Imprimir', array('class' => 'btn btn-primary btn-xm pull-right','title'=>'Imprimir Reporte')); ?>
            </div>
            <div class="box-body">
             <div class="table-responsive">
             <table id="example1" class="table table-bordered table-striped table-hover">
               <thead>
                <tr>
                  <th>Fecha Venta</th>
                  <th>Tiquete No</th>
                  <th>Cliente</th>
                  <th>Servicio</th>
                  <th>Valor</th>
                  <th>Observación</th>
                  <th></th>
                </tr>
               </thead>
               <tbody id="myTable">
                <?php foreach($results as $result): ?>
                <tr>
                  <td><?php echo date("d-m-Y - h:i:sa", strtotime($result['fecha_venta_bod'])); ?></td>
                  <td><?php echo $result['id_bodega'] ?></td>
                  <td><?php echo $result['nom_cliente']." ".$result['apell_cliente'] ?></td>
                  <td><?php echo $result['nom_servicio'] ?></td>
                  <td><?php echo "$ ".number_format($result['valor_servicio'],0,',','.'); ?></td>
                  <td><?php echo $result['observaciones'] ?></td>
                      <?php $total += $result['valor_servicio'] ?>
                  <td><?php echo anchor('creportes/print_receipt_bodega/'.$result['id_bodega'].'', 'Imprimir', 'title="Imprimir este tiquete"'); ?></td>
                </tr>
                <?php endforeach; ?>
               </tbody>
               <tfoot>
                <tr>
                  <th>Fecha Venta</th>
                  <th>Tiquete No</th>
                  <th>Cliente</th>
                  <th>Servicio</th>
                  <th>Valor</th>
                  <th>Observación</th>
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
              <span class="info-box-text">Total Venta</span>
              <span class="info-box-number"><?php echo "$ ".number_format($total,0,',','.'); ?></span>
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

</script>