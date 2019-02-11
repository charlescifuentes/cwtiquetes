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
            <div class="box-header" style="text-align: center">
              <h3 class="box-title">Despacho Vehículos</h3>
              <p style="font-size:10px;">Desde: <?php echo date("d-m-Y", strtotime($desde)); ?> hasta: <?php echo date("d-m-Y", strtotime($hasta)); ?></p>
            </div>
            <div class="box-body">
             <table class="table table-bordered">
              <thead>
               <tr>
                <th>Detalle</th>
                <th>Cantidad</th>
               </tr>
              </thead>
              <tbody>
               <?php foreach($results as $result): ?>
                <tr>
                  <td>Ruta: </td>
                  <td><?php echo $result['nom_ruta'] ?></td>
                </tr>
                <tr>
                  <td>Valor:</td>
                  <td><?php echo "$ ".number_format($result['total_admin'],0,',','.'); ?></td>
                </tr>
                <tr>
                  <td>Total pasajeros:</td>
                  <td><?php echo $result['total_pasajeros'] ?></td>
                </tr>
                <?php endforeach; ?>
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