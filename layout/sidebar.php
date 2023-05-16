<header class="main-header">
     <!-- Logo -->
     <a href="<?php echo $URL;?>/index2.html" class="logo">
       <!-- mini logo for sidebar mini 50x50 pixels -->
       <span class="logo-mini"><b>G</b>P</span>
       <!-- logo for regular state and mobile devices -->
       <span class="logo-lg"><b>Garzas</b>Plata</span>
     </a>
     <!-- Header Navbar: style can be found in header.less -->
     <nav class="navbar navbar-static-top">
       <!-- Sidebar toggle button-->
       <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
         <span class="sr-only">Toggle navigation</span>
       </a>
 
       <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">
           <!-- User Account: style can be found in dropdown.less -->
           <li class="dropdown user user-menu">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <img src="<?php echo $URL;?>/dist/img/Garza.jpg" class="user-image" alt="User Image">
               <span class="hidden-xs">NOMBRE DE USUARIO</span>
             </a>
             <ul class="dropdown-menu">
               <!-- User image -->
               <li class="user-header">
                 <img src="<?php echo $URL;?>/dist/img/Garza.jpg" class="img-circle" alt="User Image">
 
                 <p>
                   NOMBRE DE USUARIO - CARGO
                   <small>Member since Nov. 2012</small>
                 </p>
               </li>
               
               <!-- Menu Footer-->
               <li class="user-footer">
                 <div class="pull-left">
                   <a href="#" class="btn btn-default btn-flat">Perfil</a>
                 </div>
                 <div class="pull-right">
                   <a href="#" class="btn btn-default btn-flat">Cerrar Sessión</a>
                 </div>
               </li>
             </ul>
           </li>
         </ul>
       </div>
     </nav>
</header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $URL;?>/dist/img/Garza.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>NOMBRE DE USUARIO</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENÚ NAVEGACIONAL</li>
        <!-- SECCIÓN DE GESTIÓN-->
        <li><a href="<?php echo $URL;?>/templete/pages/panel.php"><i class="fa fa-th-large"></i> Panel</a></li>
        <li><a href="<?php echo $URL;?>/templete/pages/dependencias/index.php"><i class="fa fa-university"></i> Dependencias</a></li>
        <li><a href="<?php echo $URL;?>/templete/pages/cargos/index.php"><i class="fa fa-address-card-o"></i> Cargos</a></li>
        <li><a href="<?php echo $URL;?>/templete/pages/empleados/index.php"><i class="fa fa-users"></i> Usuarios</a></li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-soccer-ball-o"></i> <span>Deportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $URL;?>/templete/pages/deportes/index.php"><i class="fa fa-soccer-ball-o"></i> Deportes</a></li>
            <li><a href="<?php echo $URL;?>/templete/pages/categorias/index.php"><i class="fa fa-tags"></i> Categorias</a></li>
            <li><a href="<?php echo $URL;?>/templete/pages/ramas/index.php"><i class="fa fa-sitemap"></i> Rama</a></li>
          </ul>
        </li>
        <li><a href="<?php echo $URL;?>/templete/pages/registros/index.php"><i class="fa fa-file-text-o"></i> Inscripciones</a></li>
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <style>
    .skin-blue .main-header .navbar {
      background-color: #800101;
    }

    .skin-blue .main-header .logo {
      background-color: #ba0f17;
      color: #fff;
      border-bottom: 0 solid transparent;
    }

    .skin-blue .sidebar-menu>li.active>a {
      border-left-color: #ba0f17;
    }

    .skin-blue .main-header li.user-header {
    background-color: #ba0f17;
    }
  </style>