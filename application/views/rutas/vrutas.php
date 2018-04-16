<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Rutas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Rutas</h3>
              <?php echo anchor('crutas/create', 'Agregar Rutas', 'class="btn btn-primary btn-lg pull-right"') ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>ID Ruta</th>
                  <th>Nombres Ruta</th>
                  <th>Valor Ruta</th>
                  <th>Ruta Activa</th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody id="myTable">
                <?php foreach($rutas as $ruta): ?>
                <tr>
                  <td><?php echo $ruta['id_ruta'] ?></td>
                  <td><?php echo $ruta['nom_ruta'] ?></td>
                  <td><?php echo $ruta['valor_ruta'] ?></td>
                  <td><?php echo $ruta['activo_ruta'] ?></td>
                  <td><?php echo anchor('crutas/view/'.$ruta['id_ruta'].'', 'Editar', 'title="Editar Ruta"'); ?></td>
                  <td><button type="button" class="btn btn-danger btn-xs" onclick='validate_ruta("<?php echo $ruta['id_ruta'] ?>");' id="btn_delete" title="Borrar este item">Borrar</button></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID Ruta</th>
                  <th>Nombres Ruta</th>
                  <th>Valor Ruta</th>
                  <th>Ruta Activa</th>
                  <th></th>
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
    </section>
    <!-- /.content -->

<script>
    function validate_ruta(str) {
        $.post("<?php echo base_url();?>crutas/delete",
            {
                ruta: str
            },
            function (data){
                if (data == 1) {
                    location.reload();
                }
                else{
                var vr = JSON.parse(data);
                    alert("No se puede eliminar este registro porque ya tiene movimientos en Tiquetes - Código de error: " + vr.code);
                }
            });
    }
</script>