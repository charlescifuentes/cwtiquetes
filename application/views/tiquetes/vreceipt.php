   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>#<?php echo $last_sale['id_tiquete'] ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo base_url('ctiquetes');?>"><i class="fa fa-dashboard"></i> Tiquetes</a></li>
        <li class="active"><?php echo $title ?></li>
      </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Nota:</h4>
        Esta es una vista de impresión. Dar clic en el boton Imprimir para generar la factura
      </div>
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
          <div style="font-weight:bold; font-size: 18px;">Vehiculo No.</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div style="font-weight:bold; font-size: 22px;"><?php echo $last_sale['numero_vehiculo'] ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div style="font-weight:bold;">Tiquete No.</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div><?php echo $last_sale['id_tiquete'] ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div style="font-weight:bold;">Fecha y Hora:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div><?php echo date("d/m/Y-h:i:a", strtotime($last_sale['fecha_venta_tiq'])); ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div style="font-weight:bold;">Ruta:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div><?php echo $last_sale['nom_ruta'] ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div style="font-weight:bold;">ID Pasajero:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div><?php echo $last_sale['doc_cliente'] ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div style="font-weight:bold;">Nombres Pasajero:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div><?php echo $last_sale['nom_cliente']." ".$last_sale['apell_cliente'] ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div style="font-weight:bold;">Pasajeros:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div><?php echo $last_sale['pasajeros'] ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div style="font-weight:bold;">Total Pasaje:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div><?php echo "$ ".number_format($last_sale['valor_ruta'] * $last_sale['pasajeros'],0,',','.'); ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div style="font-weight:bold;">Vehiculo Placa:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div><?php echo $last_sale['placa_vehiculo'] ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div style="font-weight:bold;">Cía Aseguradora:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div><?php echo $config['cia_aseguradora'] ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div style="font-weight:bold;">Poliza Número:</div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div><?php echo $config['poliza_numero'] ?></div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div style="font-size: 12px;"><b>SEÑOR PASAJERO: </b>Este atento al despacho del vehículo asignado. La Empresa no se
        responsabiliza por la perdida del viaje</div>
        </div>
      </div>
      <!--<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div style="text-align:center;"><img src="<?php echo base_url();?>assets/images/logo_mintransporte.jpg" width="100%"  alt="Logo Minstransporte" /></div>
        </div>
      </div>-->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?php base_url("ctiquetes") ?>" class="btn btn-success pull-right">
            <i class="fa fa-credit-card"></i>Nuevo
          </a>
          <a href="" class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="myFunction()">
            <i class="fa fa-print"></i>Imprimir
          </a>
        </div>
      </div>
    </section>
    <!-- /.content -->

    <script>
            window.print();
            setTimeout("closePrintView()", 1000);

            function closePrintView() {
                window.location.replace("<?php base_url('ctiquetes') ?>");
            }

    </script>