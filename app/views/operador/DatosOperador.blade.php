@extends('layouts.master_operador')

@section('ruta')
<li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
<li><a href="#">Datos Operador</a></li>
<li class="active">Modificacion</li>
@stop

@section('content')


<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Datos de Operador</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row menu-botones">
      <div class="col-md-12">
        <div class="mailbox-controls">
          <button class="btn btn-primary" onclick="javascript:$('#form').submit()">
          <i class="fa fa-save"></i>
          <span> Guardar</span>
          </button>			  	  		  	  
        </div>
      </div>
    </div>
    {{ Form::open(array('url' => 'panel_administrador/datos_operador/modificacion', 'method' => 'POST', 'id' => 'form')) }}
	<div class="col-md-12">
		<div class="col-md-4">
			<div class="form-group">
               {{ Form::label('codigo', 'Codigo:') }}
               {{ Form::text('codigo', $operador->codigo, array('class' => 'form-control', 'disabled' => '')) }}              
			</div>
			<div class="form-group @if($errors->has('nombre_apellido') != '') {{'has-error'}} @endif">
                {{ Form::label('nombre_apellido', 'Nombre y Apellido:') }}
                {{ Form::text('nombre_apellido', $operador->nombre_apellido, array('class' =>'form-control','placeholder' => 'Ingrese Nombre y Apellido')) }}             
			</div>
			<div class="form-group">
               {{ Form::label('dni', 'DNI:') }}
               {{ Form::text('dni', $operador->dni, array('class' => 'form-control','placeholder' => $errors->first('dni'))) }}
			</div>
			<div class="form-group">
               {{ Form::label('email', 'Email:') }}
               {{ Form::text('email', $operador->email, array('class' => 'form-control','placeholder' => $errors->first('email'))) }}
			</div>
		</div>	
		<div class="col-md-4">
			<div class="form-group">
               {{ Form::label('contrasena', 'Password:') }}
               {{ Form::password('password', array('class' => 'form-control','placeholder' => $errors->first('password'))) }}
			</div>			
			<div class="form-group">
               {{ Form::label('re-password', 'Re-Password:') }}
               {{ Form::password('re-password', array('class' => 'form-control','placeholder' => $errors->first('re-password'))) }}
			</div>			
		</div>
	</div>
	{{ Form::close() }}
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    Datos de Operador
  </div>
</div>
<script type="text/javascript">	
   
</script>

@stop