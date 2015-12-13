@extends('layouts.master_operador')

@section('ruta')
<li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
<li><a href="#">Incidencias Pendientes</a></li>
<li class="active">Consulta</li>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Incidencias Pendientes</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row menu-botones">
      <div class="col-md-12">
        <div class="mailbox-controls">
          <button class="btn btn-primary" onclick="javascript:cargarPantalla('operador/inbox-incidencias.php')">
          <i class="fa fa-refresh"></i>
          <span>Actualizar</span>
          </button>							
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table id="tabla-inbox" class="table table-striped">
          <thead>
            <tr>
              <th>Nro</th>
              <th>Tipo</th>
              <th>Descripcion</th>
              <th>MTCN</th>
              <th>Agente</th>
              <th>Fecha</th>
              <th>Prioridad</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
          
                @foreach ($incidencias as $incidencia)
                <tr>
                    <td class="inbox-tipo">
                    <b>{{ $incidencia->codigo }}</b>
                    </td>                 
                    <td class="inbox-tipo">
                    {{ $incidencia->apertura->incidente->tipoIncidente->descripcion }}
                    </td>                    
                    <td class="inbox-texto">
                    <b>{{ $incidencia->apertura->incidente->descripcion }}</b>
                    {{ $incidencia->apertura->descripcion }}
                    </td>
                    
                    <td>
                        <a href="javascript:boxIncidencia({{ $incidencia->codigo }});" >
                        {{ $incidencia->mtcn }}	
                        </a> 
                    </td>
                    
                    <td>
                    <a href="javascript:boxAgente({{ $incidencia->id_agente }});">
                    {{ $incidencia->agente->nombre_fantasia }}
                    </a>
                    </td>
                    
                    <td class="inbox-texto">
                    {{ $incidencia->fecha_alta }}
                    </td>                
                    
                    @if ($incidencia->apertura->incidente->prioridad == 1 ||
                         $incidencia->apertura->incidente->prioridad == 4)                        
                        <td class="inbox-texto text-red">
                        <b>Alta</b>
                        </td>       
                    @elseif ($incidencia->apertura->incidente->prioridad == 2 ||
                             $incidencia->apertura->incidente->prioridad == 5)                        
                        <td class="inbox-texto text-yellow">
                        <b>Moderada</b>
                        </td>                           
                    @else                        
                        <td class="inbox-texto text-blue">
                        <b>Baja</b>
                        </td>   
                    @endif                    
                    
                    <td>
                    <a class="btn btn-primary btn-sm" href="procesar/{{$incidencia->id}}" data-toggle="tooltip" data-original-title="Procesar">
                    <i class="glyphicon glyphicon-ok"></i>
                    <span></span>
                    </a>
					</a>
					<a class="btn btn-primary btn-sm" href="desvincular/{{$incidencia->id}}" data-toggle="tooltip" data-original-title="Desvincular">
					<i class="fa fa-remove"></i>
					<span></span>
					</a>	                    
                    </td>
                    
                </tr>
                @endforeach
                
          </tbody>
          <tfoot>
            <tr>
              <th>Nro</th>
              <th>Tipo</th>
              <th>Descripcion</th>
              <th>MTCN</th>
              <th>Agente</th>
              <th>Fecha</th>              
              <th>Prioridad</th>
              <th>Accion</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    Incidencias Pendientes
  </div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="boxIncidencia">
  <div class="modal-dialog modal-lg">
	<div class="modal-content" style="border-radius:6px;">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
		<h4 class="modal-title" id="mySmallModalLabel">Datos de la Incidencia</h4>
	  </div>  
	  <div class="modal-body">
		<div class="container-fluid">
		  <div class="form-group col-md-4">
			<label>Incidente:</label></br>
			<input id="incidente" type="text" class="form-control" disabled />
		  </div>
		  <div class="form-group col-md-8">
			<label>Agente:</label></br>
			<input id="agente" type="text" class="form-control" disabled />
		  </div>	
			<div class="form-group col-md-4"> 
			  <label>Apertura:</label>
			  <input id="apertura" type="text" class="form-control" disabled />
			</div>
			<div class="form-group col-md-4">
			  <label>MTCN:</label>
			  <input id="mtcn" type="text" class="form-control" disabled />
			</div>
			<div class="form-group col-md-4">
			  <label>Beneficiario:</label></br>
			  <input id="beneficiario" type="text" class="form-control" disabled />
			</div>
			<div class="form-group col-md-4">
			  <label>Monto Principal:</label>
			  <input id="monto" type="text" class="form-control" disabled />
			</div>
			<div class="form-group col-md-4">
			  <label>Destino:</label>
			  <input id="destino" type="text" class="form-control" disabled />
			</div>
			<div class="form-group col-md-12">
			  <label>Observaciones:</label>
              <div id="observaciones">
              </div>			  
			</div>		
		</div>
	  </div>
		<div class="modal-footer">
		<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
		</div>	  
	</div>
  </div>
</div>

<div class="modal fade datosAgente" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="boxAgente">
   <div class="modal-dialog modal-lg">
      <div class="modal-content" style="border-radius:6px;">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            <h4 class="modal-title" id="mySmallModalLabel">Datos de Agente</h4>
         </div>
         <div class="modal-body">
            <div class="container-fluid">
               <div class="form-group col-md-4">
                  <label>Codigo:</label></br>
                  <input id="codigo" type="text" class="form-control" value="" disabled />
               </div>
               <div class="form-group col-md-8">
                  <label>Nombre Fantasia:</label></br>
                  <input id="nombre_fantasia" type="text" class="form-control" value="" disabled />
               </div>
               <div class="form-group col-md-8"> 
                  <label>Razon Social:</label>
                  <input id="razon_social" type="text" class="form-control" value="" disabled />
               </div>
               <div class="form-group col-md-4">
                  <label>Provincia:</label>
                  <input id="provincia" type="text" class="form-control" value="" disabled />
               </div>
               <div class="form-group col-md-8">
                  <label>Domicilio:</label></br>
                  <input id="domicilio" type="text" class="form-control" value="" disabled />
               </div>
               <div class="form-group col-md-4">
                  <label>Localidad:</label>
                  <input id="localidad" type="text" class="form-control" value="" disabled />
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
         </div>
      </div>
   </div>
</div>

@stop

@section('javascript')
$('#tabla-inbox').dataTable({'bSort': false});
@stop    
