@extends('layouts.master_operador')

@section('ruta')
<li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
<li><a href="#">ABM de Aperturas</a></li>
<li class="active">Alta</li>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Alta de Apertura</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row menu-botones">
      <div class="col-md-12">
        <div class="mailbox-controls">
          <button class="btn btn-primary" onclick="$('#form').submit()">
          <i class="fa fa-save"></i>
          <span> Guardar</span>
          </button>			  
          <button class="btn btn-primary" disabled>
          <i class="fa fa-trash"></i>
          <span> Borrar</span>
          </button>			
        </div>
      </div>
    </div>
	<div class="col-md-12">
    {{ Form::open(array('url' => 'panel_administrador/abm_apertura/alta', 'method'=>'POST', 'id'=>'form')) }}    			
		<div class="col-md-5">
			<div class="form-group">
               {{ Form::label('estado', 'Estado:') }}
               {{ Form::select('estado', $estados, null, array('class' => 'form-control')) }}
			</div>		
			<div class="form-group">
               {{ Form::label('codigo', 'Codigo:') }}
               {{ Form::text('codigo', null, array('class' => 'form-control', 'placeholder' => 'Codigo')) }}
			</div>
			<div class="form-group">
               {{ Form::label('descripcion', 'Descripcion:') }}
               {{ Form::text('descripcion', null, array('class' => 'form-control', 'placeholder' => 'Descripcion')) }}
			</div>					
		</div>
		<div class="col-md-5">
			<div class="form-group">
               {{ Form::label('incidente', 'Incidente:') }}
               {{ Form::select('incidente', $incidentes, null, array('class' => 'form-control')) }}
			</div>			
		</div>
    {{ Form::close() }}	
	</div>
	
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    Alta de Apertura
  </div>
</div>

@stop

@section('javascript')
@stop