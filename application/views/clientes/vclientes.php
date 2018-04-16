<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Clientes</h3>
              <?php echo anchor('cclientes/create', 'Agregar Clientes', 'class="btn btn-primary btn-lg pull-right"') ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Doc Cliente</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Teléfono</th>
                  <th>Email</th>
                  <th>Ciudad</th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($clientes as $cliente): ?>
                <tr>
                  <td><?php echo $cliente['doc_cliente'] ?></td>
                  <td><?php echo $cliente['nom_cliente'] ?></td>
                  <td><?php echo $cliente['apell_cliente'] ?></td>
                  <td><?php echo $cliente['tel_cliente'] ?></td>
                  <td><?php echo $cliente['email_cliente'] ?></td>
                  <td><?php echo $cliente['ciudad_cliente'] ?></td>
                  <td><?php echo anchor('cclientes/view/'.$cliente['doc_cliente'].'', 'Editar', 'title="Editar Cliente"'); ?></td>
                  <!--<td><?php echo anchor('cclientes', 'Borrar', array('title'=>'Borrar Cliente' , 'onclick'=>"validate_cliente(".$cliente['doc_cliente'].");")); ?></td>-->
                  <td><button type="button" class="btn btn-danger btn-xs" onclick='validate_cliente("<?php echo $cliente['doc_cliente'] ?>");' title="Borrar este item">Borrar</button></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Doc Cliente</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Teléfono</th>
                  <th>Email</th>
                  <th>Ciudad</th>
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
    function validate_cliente(str) {
        $.post("<?php echo base_url();?>cclientes/delete",
            {
                cliente: str
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