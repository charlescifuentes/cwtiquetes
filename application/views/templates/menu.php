<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo $this->session->userdata['logged_in']['username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i>En linea</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU PRINCIPAL</li>
        <li><a href="<?php echo base_url('chome');?>"><i class="fa fa-dashboard"></i> <span>Panel de Control</span></a></li>
        <li><a href="<?php echo base_url('ctiquetes');?>"><i class="fa fa-ticket"></i> <span>Tiquetes</span></a></li>
        <li><a href="<?php echo base_url('cbodega');?>"><i class="fa fa-archive"></i> <span>Bodega</span></a></li>
        <li><a href="<?php echo base_url('creportes');?>"><i class="fa fa-line-chart"></i> <span>Reportes</span></a></li>
        <li><a href="<?php echo base_url('cclientes');?>"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
        <li><a href="<?php echo base_url('cvehiculos');?>"><i class="fa fa-automobile"></i> <span>Vehiculos</span></a></li>
        <li><a href="<?php echo base_url('crutas');?>"><i class="fa fa-map"></i> <span>Rutas</span></a></li>
        <li><a href="<?php echo base_url('cconfiguracion');?>"><i class="fa fa-dashboard"></i> <span>Configuración</span></a></li>
        <li><a href="<?php echo base_url('clogin/logout');?>"><i class="fa fa-power-off"></i> <span>Salir</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">