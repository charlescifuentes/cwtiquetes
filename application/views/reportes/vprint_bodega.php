<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('creportes');?>"><i class="fa fa-dashboard"></i> Reportes</a></li>
        <li class="active"><?php echo $title ?></li>
      </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Nota:</h4>
        Este informe es para impresión
      </div>
    </div>

    <section class="content">
     <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Reporte de Servicio de Bodega: <?php echo date("d-m-Y", strtotime($desde)); ?> hasta: <?php echo date("d-m-Y", strtotime($hasta)); ?></h3>
            </div>
            <div class="box-body">
             <table class="table table-bordered">
              <thead>
               <tr>
                  <th>Fecha Venta</th>
                  <th>Tiquete No</th>
                  <th>Cliente</th>
                  <th>Servicio</th>
                  <th>Valor</th>
                  <th>Observación</th>
               </tr>
              </thead>
              <tbody>
               <?php foreach($results as $result): ?>
                <tr>
                  <td><p style="font-size:12px;"><?php echo date("d-m-Y - h:i:sa", strtotime($result['fecha_venta_bod'])); ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['id_bodega'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['nom_cliente']." ".$result['apell_cliente'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['nom_servicio'] ?></p></td>
                  <td><p style="font-size:12px;"><?php echo "$ ".number_format($result['valor_servicio'],0,',','.'); ?></p></td>
                  <td><p style="font-size:12px;"><?php echo $result['observaciones'] ?></p></td>
                      <?php $total += $result['valor_servicio'] ?>
                </tr>
                <?php endforeach; ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><b>TOTAL</b></td>
                  <td><b><?php echo "$ ".number_format($total,0,',','.'); ?></b></td>
                  <td></td>
                </tr>
              </tbody>
             </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="" class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="myFunction()">
            <i class="fa fa-print"></i>Imprimir
          </a>
        </div>
      </div>
    </section>
    <!-- /.content -->

    <script>
        function myFunction(){
            window.print();
        }
    </script>