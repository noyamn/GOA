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
      <h1 class="box-title">Resultados de la Busqueda</h1>
   </div>
   <div class="box-body">
      <div class="row">
         <div class="col-md-10 col-md-offset-1">
            <p style="color:#777">
               En esta seccion usted puede consultar el estado de sus reclamos, operador que atendio el mismo, y la respuesta a su Incidencia. 
            </p>
         </div>
      </div>
      <div class="row" style="padding:15px;">
         <div class="col-md-10">
            <p class="lead" style="margin-top:20px">
               Resultados de la Busqueda:
            </p>
         </div>
         <div class="col-md-12">
            <table id="tabla-resultados" class="table table-striped">
               <thead>
                  <tr>
                     <th>Nro. Incidencia</th>
                     <th>Descripcion</th>
                     <th>MTCN</th>
                     <th>Fecha Incidencia</th>
                     <th>Estado</th>
                     <th>Operador</th>
                     <th>Fecha Cierre</th>
                     <th>Accion</th>
                  </tr>
               </thead>
               <tbody>
               
               @foreach ($incidencias as $incidencia)
               
                     <tr>
                        <td>
                           {{ $incidencia->codigo }}
                        </td>
                        <td>
                           <b>{{ $incidencia->apertura->incidente->descripcion }}</b> {{ $incidencia->apertura->descripcion }}
                        </td>
                        <td>
                           {{ $incidencia->mtcn }}
                        </td>
                        <td>
                           {{ $incidencia->fecha_alta }}
                        </td>
                        <td>
                        
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
                        
                        </td>
                        <td>
                           {{ $incidencia->operador->nombre_apellido }}
                        </td>
                        <td>
                           {{ $incidencia->fecha_cierre }}
                        </td>
                        <td>
                           <a class="btn btn-primary btn-sm" href="estado/{{$incidencia->codigo}}" data-toggle="tooltip" data-original-title="Ver">
                           <i class="fa  fa-search"></i>
                           </a>
                        </td>
                     </tr>
                     
                @endforeach
                                     
               </tbody>
               <tfoot>
                  <tr>
                     <th>Nro. Incidencia</th>
                     <th>Descripcion</th>
                     <th>MTCN</th>
                     <th>Fecha Incidencia</th>
                     <th>Estado</th>
                     <th>Operador</th>
                     <th>Fecha Cierre</th>
                     <th>Accion</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
   <div class="box-footer" style="margin-top:25px">
   </div>
</div>

@stop

@section('javascript')   
	
$('#tabla-resultados').dataTable();
$('#fecha-incidencia').daterangepicker({format: 'DD-MM-YYYY'});
   
@stop