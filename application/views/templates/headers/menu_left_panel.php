  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php echo ($currentUrl=='PanelController/dashboard')?'active':'' ?>">
          <a href="<?php echo base_url() ?>PanelController/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php echo ($currentUrl=='PanelController/edititem')?'active':'' ?>">
          <a href="<?php echo base_url() ?>PanelController/edititem">
            <i class="fa fa-book"></i>
            <span>Agregar Documentación</span>
          </a>
        </li>
        <li class="<?php echo ($currentUrl=='PanelController/editSector')?'active':'' ?>">
          <a href="<?php echo base_url() ?>PanelController/editSector">
            <i class="fa fa-sitemap"></i> <span>Agregar Sector</span>
          </a>
        </li>
        <li class="<?php echo ($currentUrl=='PanelController/editTag')?'active':'' ?>">
          <a href="<?php echo base_url() ?>PanelController/editTag">
            <i class="fa fa-tags"></i> <span>Agregar Etiqueta</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>