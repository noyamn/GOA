@extends('layouts.master_agente')

@section('header')
<section class="content-header">
    <h1>
      @if($tipoIncidente=='reclamo') Reclamos @else Consultas @endif
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">@if($tipoIncidente=='reclamo') Reclamos @else Consultas @endif</li>
    </ol>
</section>
@stop

@section('content')

<div class="box box-default">
  <div class="box-header with-border">
    <h1 class="box-title">@if($tipoIncidente=='reclamo') Iniciando un reclamo @else Iniciando una consulta @endif </h1>
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <p style="color:#777">
            En esta secci&oacute;n usted puede iniciar una incidencia pertinente. Seleccione el incidente correspondiente e ingrese los datos para llevar a cabo el mismo.
            Cuando la incidencia est&eacute; siendo procesada, usted ser&aacute; notificado.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <p class="lead" style="margin-top:20px">
          @if($tipoIncidente=='reclamo') Seleccione un reclamo: @else Seleccione una consulta: @endif
        </p>
        <div class="col-md-8">           
            
            {{ Form::open(array('url' => 'home/incidencias/procesa', 'method' => 'POST', 'id' => 'form')) }}
              
                {{ Form::select('incidente', $incidentes, null, array('class' => 'form-control')) }}
                
            {{ Form::close() }}
            
          <div class="row">
            <div class="col-md-4 pull-right">
              <button class="btn btn-block btn-warning" style="margin-top:15px;" onclick="$('#form').submit()">
              Iniciar Incidencia
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="box-footer" style="margin-top:25px">
  </div>
</div>

@stop