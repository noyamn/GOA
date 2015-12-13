<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Log in</title>
    <!-- Bootstrap 3.3.4 -->
    {{ HTML::style('bootstrap/css/bootstrap.min.css') }}
    <!-- Font Awesome Icons -->
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}
    <!-- Ionicons -->
    {{ HTML::style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}
    <!-- Theme style -->
    {{ HTML::style('dist/css/styles-agente.css') }}
    <!-- AdminLTE Skins --!>
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
  <!-- CKEditor -->
    {{ HTML::script('//cdn.ckeditor.com/4.4.7/basic/ckeditor.js') }}
  <!-- Date Range --> 
    {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js') }}
    {{ HTML::script('plugins/daterangepicker/daterangepicker.js') }}
    <!-- DATA TABES SCRIPT -->  
    {{ HTML::script('plugins/datatables/jquery.dataTables.min.js') }}
    {{ HTML::script('plugins/datatables/dataTables.bootstrap.min.js') }}
  <!-- Validator-->
    {{ HTML::script('plugins/validator/gen_validatorv4.js') }}    
  <!-- Funciones JavaScript del Sistema-->
    {{ HTML::script('dist/js/Funciones.js') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <b>WU</b>GoA
      </div><!-- /.login-logo -->

     <!-- Main content -->
      <div class="login-box-body">
	<p class="login-box-msg">Entra para iniciar tu sesi&oacute;n</p>
    <p style="color:red">
        {{ $errors->first() }}
    </p>
	{{ Form::open(array('url' => 'login/loguear', 'method' => 'POST', 'id' => 'form')) }}
	  <div class="form-group has-feedback">
	  	{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
	    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	  </div>
	  <div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="Password" id="password" name="password"/>
	    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	  </div>
	  <div class="row">
	    <div class="col-xs-8">
	      <div>
	        <label>
	        	{{ Form::checkbox('recordar, null, true') }}
	          	Recordarme
	        </label>
	      </div>
	    </div><!-- /.col -->
	    <div class="col-xs-4">
	      <button type="submit" class="btn btn-block btn-warning" style="margin-top:15px;">Iniciar</button>
	    </div><!-- /.col -->
	  </div>
	{{ Form::close() }}
	<a href="#">Olvid&eacute; mi contrase&ntilde;a</a><br>
</div>
<!-- /.content -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  </body>
</html>