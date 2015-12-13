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
   <h1 class="box-title">Datos de la Incidencia</h1>
</div>
<div class="box-body">
   <div class="row">
      <form>
         <div class="col-md-10 col-md-offset-1">
            <p class="lead col-md-6" style="margin-top:20px">
               Datos de la Incidencia	
            </p>
            <p class="lead col-md-2 pull-right" style="margin-top:20px">           
                
            @if ($incidencia->id_estado == 1)                        
                <span class ="label label-info">
                    {{ $incidencia->estado->descripcion }}
                </span>                        
            @elseif ($incidencia->id_estado == 2)                        
                <span class ="label label-warning">
                    {{ $incidencia->estado->descripcion }}
                </span>                        
            @else                        
                <span class ="label label-success">
                    {{ $incidencia->estado->descripcion }}
                </span>
            @endif
            
            </p>
         </div>
         <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6">
               <div class="form-group">
                  {{ Form::label('nro_incidencia', 'Nro. Incidencia:') }}
                  {{ Form::text('nro_incidencia', $incidencia->codigo, array('class' => 'form-control', 'disabled')) }}
               </div>
               <div class="form-group">
                  {{ Form::label('incidente', 'Incidente:') }}
                  {{ Form::text('incidente', $incidencia->apertura->incidente->descripcion, array('class' => 'form-control', 'disabled')) }}
               </div>
               <div class="form-group">
                  {{ Form::label('apertura', 'Apertura:') }}
                  {{ Form::text('apertura', $incidencia->apertura->descripcion, array('class' => 'form-control', 'disabled')) }}
               </div>
               <div class="form-group">
                  {{ Form::label('beneficiario', 'Beneficiario:') }}
                  {{ Form::text('beneficiario', $incidencia->beneficiario, array('class' => 'form-control', 'disabled')) }}
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  {{ Form::label('mtcn', 'MTCN:') }}
                  {{ Form::text('mtcn', $incidencia->mtcn, array('class' => 'form-control', 'disabled')) }}
               </div>
               <div class="form-group">
                  {{ Form::label('monto', 'Monto Principal:') }}
                  {{ Form::text('monto', $incidencia->monto, array('class' => 'form-control', 'disabled')) }}
               </div>
               <div class="form-group">
                  {{ Form::label('destino', 'Destino:') }}
                  {{ Form::text('destino', $incidencia->destino, array('class' => 'form-control', 'disabled')) }}
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  {{ Form::label('observaciones', 'Observaciones:') }}
 
                  {{ $incidencia->observaciones }}

               </div>
            </div>
         </div>
         <div class="col-md-10 col-md-offset-1">
            <p class="lead col-md-12" style="margin-top:20px">
               Respuesta del Operador
            </p>
            <div class="col-md-6">
               <div class="form-group">
                  <label>Operador:</label>
                  {{ Form::label('operador', 'Operador:') }}
                  {{ Form::text('operador', $incidencia->operador->nombre_apellido, array('class' => 'form-control', 'disabled')) }}
               </div>
               <div class="form-group">
                  {{ Form::label('fecha_cierre', 'Fecha:') }}
                  {{ Form::text('fecha_cierre', $incidencia->fecha_cierre, array('class' => 'form-control', 'disabled')) }}
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  {{ Form::label('respuesta', 'Observaciones:') }}                  {{ $incidencia->respuesta }}

               </div>
            </div>
         </div>
      </form>
   </div>
   <div class="box-footer" style="margin-top:25px">
   </div>
</div>

@stop

@section('javascript')   
@stop