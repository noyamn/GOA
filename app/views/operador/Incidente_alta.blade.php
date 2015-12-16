@extends('layouts.master_operador')

@section('ruta')
<li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
<li><a href="#">ABM de Incidentes</a></li>
<li class="active">Alta</li>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Alta de Incidente</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row menu-botones">
      <div class="col-md-12">
        <div class="mailbox-controls">
          <button class="btn btn-primary" onclick="javascript:cargarPantalla('operador/incidente-abm.php')">
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
		<div class="col-md-5">
			<div class="form-group">
			  <label>Estado:</label>
             {{ Form::select('estado', $estados, null, array('class' => 'form-control')) }}
			</div>		
			<div class="form-group">
			  <label>Codigo:</label>
			  <input type="text" class="form-control"/>
			</div>
			<div class="form-group">
			  <label>Descripcion:</label>
			  <input type="text" class="form-control"/>
			</div>					
		</div>
		<div class="col-md-5">
			<div class="form-group">
			  <label>Tipo de Incidente:</label>
              {{ Form::select('tipoIncidente', $tipoIncidente, null, array('class' => 'form-control')) }}
			</div>		
			<div class="form-group">
            <label>Prioridad:</label>
            {{ Form::select('prioridad', $prioridades, null, array('class' => 'form-control')) }}
			</div>					
		</div>        

	</div>
	
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    Alta de Incidente
  </div>
</div>

@stop

@section('javascript')
@stop