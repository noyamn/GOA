@extends('layouts.master_agente')

@section('header')
<section class="content-header">
    <h1>
      Reclamos
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Reclamos</li>
    </ol>
</section>
@stop

@section('content')

<div class="box box-default">
  <div class="box-header with-border">
    <h1 class="box-title">Estado de Incidencia</h1>
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <p style="color:#777">
			En esta seccion usted puede consultar el estado de sus reclamos, operador que atendio el mismo, y la respuesta a su Incidencia. 
        </p>
      </div>
    </div>
    
    {{ Form::open(array('url' => 'home/incidencias/resultado', 'method' => 'POST', 'id' => 'form')) }}
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <p class="lead" style="margin-top:20px">
            Estado de Incidencia:
          </p>
          <div class="col-md-8">
            <div class="form-group">
                {{ Form::label('nro_incidencia', 'Nro. de Incidencia:') }}
                {{ Form::text('nro_incidencia', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el Nro de Incidencia')) }}              
            </div>
            <div class="form-group">
              {{ Form::label('nro_incidencia', 'Fecha de Incidencia:') }}
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                {{ Form::text('fecha_incidencia', null, array('id' => 'fecha_incidencia', 'class' => 'form-control', 'placeholder' => 'Fecha de Incidencia')) }}   
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 pull-right">
                <button class="btn btn-block btn-warning" style="margin-top:15px;" onclick="cargarPantalla('incidencia-resultados.php')">
                Buscar
                </button>
              </div>
            </div>
          </div>
        </div>
    </div>
    
    {{ Form::close() }}
    
  </div>
  <div class="box-footer" style="margin-top:25px">
  </div>
</div>

@stop

@section('javascript')   
	
$('#fecha_incidencia').daterangepicker({format: 'DD-MM-YYYY'});
   
@stop