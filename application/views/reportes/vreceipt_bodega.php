<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>#<?php echo $last_sale['id_bodega'] ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('creportes');?>"><i class="fa fa-dashboard"></i> Reportes</a></li>
        <li class="active"><?php echo $title ?></li>
      </ol>
    </section>

    <div class="pad margin no-print">

    </div>

    <!-- Main content -->
    <section class="invoice" id="invoice">
      <!-- Company Info -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <h4 class="page-header" style="text-align: center;font-weight: bold; font-size: 16px;">
           <ul class="list-unstyled">
            <li><?php echo $config['nombre_empresa'] ?></li>
            <li><?php echo $config['nit_empresa'] ?></li>
            <li><?php echo $config['direccion_empresa'] ?></li>
            <li><?php echo $config['telefono_empresa'] ?></li>
           </ul>
          </h4>
        </div>
      </div>
      <!-- Company -->

      <!-- Body Invoice -->
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div style="font-weight:bold;">Servicio Bodega N.</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div><?php echo $last_sale['id_bodega'] ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div style="font-weight:bold;">Fecha y Hora:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div><?php echo date("d-m-Y", strtotime($last_sale['fecha_venta_bod'])); ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div style="font-weight:bold;">Servicio:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div><?php echo $last_sale['nom_servicio'] ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div style="font-weight:bold;">Valor Servicio:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div><?php echo "$ ".number_format($last_sale['valor_servicio'],0,',','.'); ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div style="font-weight:bold;">Doc Usuario:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div><?php echo $last_sale['doc_cliente'] ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div style="font-weight:bold;">Nombres:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div><?php echo $last_sale['nom_cliente']." ".$last_sale['apell_cliente'] ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div style="font-weight:bold;">Observación:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div><?php echo $last_sale['observaciones'] ?></div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div style="font-size: 10px;"><b>SEÑOR PASAJERO: </b>La empresa se compromete a guardar su equipaje
        o encomienda en la fecha asignada en este tiquete hasta por 8 dias por un costo adicional por dia
        de $500. Despues de 8 dias no responde por su equipaje o encomienda. NO se responde por joyas y/o dinero
        , ni del daño de artículos frágiles, perecederos o previamente averiados. En caso de perdida el valor
        asegurado es de $ 20.000</div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div style="font-size: 15px;" align="center"><b>CONSERVE ESTE TIQUETE PARA RECLAMAR</b></div>
        </div>
      </div>

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">

        </div>
      </div>
    </section>
    <!-- /.content -->

    <script>
        window.print();
    </script>