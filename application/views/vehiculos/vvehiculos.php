<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>Base de datos vehiculos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Vehiculos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Vehículos</h3>
              <?php echo anchor('cvehiculos/create', 'Agregar Vehículo', 'class="btn btn-primary btn-lg pull-right"') ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Número</th>
                  <th>Placa</th>
                  <th>Nombres Conductor</th>
                  <th>Apellidos Conductor</th>
                  <th>Clase Vehículo</th>
                  <th>Capacidad Vehículo</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($vehiculos as $vehiculo): ?>
                <tr>
                  <td><?php echo $vehiculo['numero_vehiculo'] ?></td>
                  <td><?php echo $vehiculo['placa_vehiculo'] ?></td>
                  <td><?php echo $vehiculo['nombres_conductor'] ?></td>
                  <td><?php echo $vehiculo['apellidos_conductor'] ?></td>
                  <td><?php echo $vehiculo['clase_vehiculo'] ?></td>
                  <td><?php echo $vehiculo['capacidad_pasajeros'] ?></td>
                  <?php if($vehiculo['enturnar'] == 0){ ?>
                    <td><button type="button" class="btn btn-success btn-xs" onclick='enturnar_vehiculo("<?php echo $vehiculo['numero_vehiculo'] ?>");' title="Enturnar este vehículo">Enturnar</button></td>
                  <?php } ?>
                  <?php if($vehiculo['enturnar'] == 1){ ?>
                    <td><button type="button" class="btn btn-warning btn-xs" onclick='desenturnar_vehiculo("<?php echo $vehiculo['numero_vehiculo'] ?>");' title="Desenturnar este vehículo">Desenturnar</button></td>
                  <?php } ?>
                  <td><?php echo anchor('cvehiculos/view/'.$vehiculo['numero_vehiculo'].'', 'Editar', 'title="Editar Vehículo"'); ?></td>
                  <td><button type="button" class="btn btn-danger btn-xs" onclick='borrar_vehiculo("<?php echo $vehiculo['numero_vehiculo'] ?>");' id="btn_delete" title="Borrar este item">Borrar</button></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Número</th>
                  <th>Placa</th>
                  <th>Nombres Conductor</th>
                  <th>Apellidos Conductor</th>
                  <th>Clase Vehículo</th>
                  <th>Capacidad Vehículo</th>
                  <th></th>
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
    function borrar_vehiculo(str) {
        $.post("<?php echo base_url();?>cvehiculos/delete",
            {
                vehiculo: str
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

    function enturnar_vehiculo(str) {
        $.post("<?php echo base_url();?>cvehiculos/enturnar",
            {
                vehiculo: str
            },
            function (data){
                if (data == 1) {
                    location.reload();
                }
            });

    }

    function desenturnar_vehiculo(str) {
        $.post("<?php echo base_url();?>cvehiculos/desenturnar",
            {
                vehiculo: str
            },
            function (data){
                if (data == 0) {
                    location.reload();
                }
            });

    }
</script>