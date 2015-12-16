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
      <h1 class="box-title">@if($tipoIncidente=='reclamo') Reclamo enviado exitosamente @else Consulta enviada exitosamente @endif</h1>
   </div>
   <div class="box-body">
      <div class="row">
         <div class="col-md-10 col-md-offset-1" style="background-image:url('../../dist/img/tilde.jpg')">
            <p class="lead" style="margin-top:20px">
               @if($tipoIncidente=='reclamo') Su reclamo ha sido enviado exitosamente. @else Su consulta ha sido enviada exitosamente. @endif
            </p>
            <div class="form-group col-md-6">
               <strong>N&ordm; de incidente:</strong>
                <span style='margin-left:10px;'>
                    {{ $incidencia->codigo }}
                </span>
               </p>
               <strong>Incidente:</strong>
               <span style='margin-left:10px;'>
                    {{ $incidencia->apertura->incidente->descripcion }}
                </span>
                </p>
               <strong>Apertura:</strong>
               <span style='margin-left:10px;'>
                    {{ $incidencia->apertura->descripcion }}
                </span>
                </p>
               <strong>MTCN:</strong>
               <span style='margin-left:10px;'>
                    {{ $incidencia->mtcn }}
               </span>
               </p>        
               <strong>Beneficiario:</strong>
               <span style='margin-left:10px;'>
                    {{ $incidencia->beneficiario }}
               </span>
               </p>
               <strong>Monto principal:</strong>
               <span style='margin-left:10px;'>
                    {{ $incidencia->monto }}
               </span>
               </p>
               <strong>Destino:</strong>
               <span style='margin-left:10px;'>
                    {{ $incidencia->destino }}
               </span>
               </p>
               <strong>Observaciones:</strong>
               <span style='margin-left:10px;'>
               </br>{{ $incidencia->observaciones }}
               </span>
               </p>
            </div>
            <div class="col-md-12">
                <button class="btn btn-warning pull-right"  style="margin-top: -40px;" onclick=" window.open('imprimir/{{ $incidencia->codigo }}','_blank')">
                    <i class="fa fa-print"></i>
                    <span> Imprimir</span>
                </button>            
            </div>
         </div>
      </div>
   </div>
</div>

@stop

@section('javascript')   
   
@stop