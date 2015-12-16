@extends('layouts.master_operador')

@section('ruta')
<li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
<li><a href="#">Listados</a></li>
<li class="active">Agentes</li>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Listado de Agentes</h3>
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
          <i class="glyphicon glyphicon-search"></i>
          <span> Buscar</span>
          </button>		  
          <a class="btn btn-primary" id="excel">
          <i class="fa fa-table"></i>
          <span> Excel</span>
          </a>	  		  
          <button class="btn btn-primary" id="imprimir">
          <i class="fa fa-print"></i>
          <span> Imprimir</span>
          </button>			  
        </div>
      </div>
    </div>
    <div class="row">
    {{ Form::open(array('url' => 'panel_administrador/listados/agentes', 'method' => 'POST', 'id' => 'form')) }}
      <div class="col-md-12 filtros-busqueda">
        <div class="row">
          <div class="form-group col-md-4">
            <label>Codigo:</label>
            <input type="text" name="codigo" class="form-control" placeholder="Codigo">
          </div>
          <div class="form-group col-md-4">
            <label>Razon Social:</label>
            <input type="text" name="razon_social" class="form-control" placeholder="Razon Social">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label>Nombre Fantasia:</label>
            <input type="text" name="nombre_fantasia" class="form-control" placeholder="Nombre Fantasia">
          </div>
          <div class="form-group col-md-4">
            <label>Provincia:</label>
            {{ Form::select('provincia', $provincias, null, array('class' => 'form-control')) }}
          </div>
        </div>
      </div>
      {{ Form::close() }}
      <div class="col-md-12">
        <table id="listado-agentes" class="table table-striped">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Razon Social</th>
              <th>Nombre Fantasia</th>
              <th>Domicilio</th>
              <th>Provincia</th>
              <th>Localidad</th>
              <th>Estado</th>              
            </tr>
          </thead>
          <tbody id="body">
            
            @foreach ($agentes as $agente)
            <tr>
              <td>
                {{ $agente->codigo }}
              </td>                        
              <td class="inbox-tipo">
                {{ $agente->razon_social }}
              </td>
              <td class="inbox-texto">
                {{ $agente->nombre_fantasia }}
              </td>
              <td>
                {{ $agente->domicilio }}
              </td>
              <td class="inbox-texto">
                {{ $agente->localidad->provincia->descripcion }}
              </td>              
              <td class="inbox-texto">
                {{ $agente->localidad->descripcion }}
              </td>          
                <td>
                
                @if ($agente->estado_logico == 1)                        
                    <span class ="text-green">
                        Habilitado
                    </span>                        
                @elseif ($agente->estado_logico == 0)                        
                    <span class ="text-red">
                        Deshabilitado
                    </span>                             
                @endif
                
                </td>                
            </tr>
            @endforeach
            
          </tbody>
          <tfoot>
            <tr>
              <th>Codigo</th>
              <th>Razon Social</th>
              <th>Nombre Fantasia</th>
              <th>Domicilio</th>
              <th>Provincia</th>              
              <th>Localidad</th>  
              <th>Estado</th>                          
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    Listado de Agentes
  </div>
</div>

@stop

@section('javascript') 
$('#listado-agentes').dataTable(); 
$('#fecha-recibido').daterangepicker({format: 'DD-MM-YYYY'});
$('#fecha-cierre').daterangepicker({format: 'DD-MM-YYYY'});
 $('#imprimir').click( function() {
  var table = $('#listado-agentes').tableToJSON();
  window.open('{{url()}}/panel_administrador/listados/imprimiragentes/' + concatenaCodListados(table,'Codigo'), '_blank')
}); 
$("#excel").on('click', function (event) {

    exportTableToCSV.apply(this, [$('#body'), 'listado-agentes.csv']);
});
@stop    
