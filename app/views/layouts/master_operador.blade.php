<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminGOA | Panel de Administrador</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
	<!-- Bootstrap 3.3.4 -->
    {{ HTML::style('bootstrap/css/bootstrap.min.css') }}
    <!-- Font Awesome Icons -->    
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->    
    {{ HTML::style('dist/css/styles-operador.css') }}
    <!-- AdminLTE Skins -->    
    {{ HTML::style('dist/css/skins/_all-skins.css') }}
    <!-- DATA TABLES -->    
	{{ HTML::style('plugins/datatables/dataTables.bootstrap.css') }}
    <!-- Date Range -->		
    {{ HTML::style('plugins/daterangepicker/daterangepicker-bs3.css') }}
    
	<!-- Scripts JavaScript-->
    <!-- jQuery 2.1.4 -->
    {{ HTML::script('plugins/jQuery/jQuery-2.1.4.min.js') }}
    <!-- Bootstrap 3.3.2 JS -->
    {{ HTML::script('bootstrap/js/bootstrap.min.js') }}
    <!-- SlimScroll -->
    {{ HTML::script('plugins/slimScroll/jquery.slimscroll.min.js') }}
    <!-- FastClick -->
    {{ HTML::script('plugins/fastclick/fastclick.min.js') }}
    <!-- AdminLTE App -->
    {{ HTML::script('dist/js/app.min.js') }}
    <!-- AdminLTE for demo purposes -->    
    {{ HTML::script('dist/js/demo.js') }}
    <!-- DATA TABES SCRIPT -->    
    {{ HTML::script('plugins/datatables/jquery.dataTables.min.js') }}
    {{ HTML::script('plugins/datatables/dataTables.bootstrap.min.js') }}
	<!-- CKEditor -->	
    {{ HTML::script('//cdn.ckeditor.com/4.4.7/basic/ckeditor.js') }}
	<!-- Date Range -->	
    {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js') }}
    {{ HTML::script('plugins/daterangepicker/daterangepicker.js') }}
	<!-- Validator-->
    {{ HTML::script('plugins/validator/gen_validatorv4.js') }}        
	<!-- Web Notifications-->
    {{ HTML::script('plugins/webnotification/WebNotifications.js') }}     		
	<!-- Funciones JavaScript del Sistema-->
    {{ HTML::script('dist/js/Funciones.js') }}
	<!-- Funciones AJAX del Sistema-->
    {{ HTML::script('dist/js/Ajax.js') }}    
        
  </head>
  <!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
  <!-- the fixed layout is not compatible with sidebar-mini -->
  <body class="skin-yellow fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>G</b>OA</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>GOA</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu" style="visibility: hidden;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <!-- end message -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-danger" id="count-notificaciones">
                    0
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Notificaciones</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu" id="notificaciones">                                                  
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li> 
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{url()}}../dist/img/user-call.png" class="user-image" alt="User Image"/>
                <span class="hidden-xs">Operador</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{url()}}/dist/img/user-call.png" class="img-circle" alt="User Image" />
                    <p style="color: black;">
                      {{ Auth::user()->operador->nombre_apellido }} - Operador
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{url('panel_administrador/datos_operador')}}" class="btn btn-default btn-flat">Datos Operador</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{url()}}/login/cerrarsesion" class="btn btn-default btn-flat">Cerrar Sesion</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- =============================================== -->
      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left info">
              <p>{{ Auth::user()->operador->nombre_apellido }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu Operador</li>
            <li class="treeview">
              <a href="{{ url('panel_administrador/incidencias/inbox') }}">
              <i class="fa fa-inbox"></i>
              <span>Inbox de Incidencias</span>
              <span class="label label-primary pull-right" id="count-incidencias">	
              -			
			  </span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{ url('panel_administrador/incidencias/pendientes') }}">
              <i class="fa fa-info-circle"></i>
              <span>Incidencias Pendientes</span>
              <span class="label label-warning pull-right" id="count-pendientes">
              -			
			  </span>
              </a>
            </li>	
            <li class="treeview">
              <a href="{{ url('panel_administrador/incidencias/consulta') }}">
              <i class="glyphicon glyphicon-search"></i>
              <span>Consulta de Incidencias</span>
              </a>
            </li>            		
            <li class="treeview">
              <a href="#">
              <i class="fa fa-list"></i> <span>Listados</span>
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
					<a href="{{ url('panel_administrador/listados/agentes') }}">
						<i class="fa fa-align-justify"></i>
						Listado de Agentes
					</a>
				</li>
                <li>
					<a href="{{ url('panel_administrador/listados/incidencias') }}">
						<i class="fa fa-align-justify"></i>
						Historico de Incidencias
					</a>
				</li>
              </ul>
            </li>
            <li class="treeview">
              <a href="{{ url('panel_administrador/abm_agente') }}">
              <i class="fa fa-edit"></i>
              <span>ABM de Agentes</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{ url('panel_administrador/abm_operador') }}">
              <i class="fa fa-edit"></i>
              <span>ABM de Operadores</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{ url('panel_administrador/abm_incidentes') }}">
              <i class="fa fa-edit"></i>
              <span>ABM de Incidentes</span>
              </a>
            </li>
            <li class="treeview">
              <a href="{{ url('panel_administrador/incidencias/pendientes') }}">
              <i class="fa fa-edit"></i>
              <span>ABM de Aperturas</span>
              </a>
            </li>                                                            
            <li class="treeview">
              <a href="#">
              <i class="glyphicon glyphicon-cog"></i> <span>Configuracion</span>
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
					<a href="javascript:cargarPantalla('operador/operador-datos.php')">
					<i class="fa fa-edit"></i>Datos Operador</a>
				</li>			  
                <li>
					<a href="javascript:cargarPantalla('operador/agente-abm.php')">
					<i class="fa fa-edit"></i>Cerrar Sesion</a>
				</li>				
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- =============================================== -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Panel de Administrador
            <small>Usted ha iniciado sesion como Operador...</small>
          </h1>
          <ol class="breadcrumb">
          @yield('ruta')
          </ol>
        </section>
        <!-- Main content -->
        <section class="content" id="contenedorPrincipal">
        
            @yield('content')
          <!--<div class="callout callout-info">
            <h4>Tip!</h4>
            <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar is bigger than your content because it prevents extra unwanted scrolling.</p>
            </div>-->
			
          <!-- Pantalla -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div>
    <!-- ./wrapper -->
    
<script type="text/javascript">
    
    $( document ).ready(function() {
    
        var url = '{{url()}}';
        
        countPendientes(url);
        
        countIncidencias(url);
        
        getNotificaciones(url, 'operador');
        
        var cantIncidencias = function() 
        { 
            countIncidencias(url);
            return false;
        }
        
        var cantPendientes = function()
        {
            countPendientes(url);
            return false;
        }

        var notificaciones = function() 
        { 
            getNotificaciones(url, 'operador');
            return false;
        }        
                
        setInterval(notificaciones, 2000);                    
        
        setInterval(cantIncidencias, 2000);
        
        setInterval(cantPendientes, 2000);
        
        $('.notifications-menu').click(function(){ clickNotificaciones(url, 'operador'); });      
                     
        @yield('javascript')	
            
    });
    
    function url()
    {
      return '{{App::make('url')->to('/')}}';
    }  
     	
</script>	
  </body>
</html>