@extends('layouts.master_operador')

@section('ruta')
<li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
<li><a href="#">ABM de Aperturas</a></li>
<li class="active">Consulta</li>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">ABM de Apertura</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row menu-botones">
      <div class="col-md-12">
        <div class="mailbox-controls">
          <a class="btn btn-primary" href="abm_apertura/alta">
          <i class="fa fa-file"></i>
          <span>Nuevo</span>
          </a>
          <button class="btn btn-primary">
          <i class="fa fa-refresh"></i>
          <span>Actualizar</span>
          </button>		  
          <button class="btn btn-primary">
          <i class="fa fa-table"></i>
          <span>Excel</span>
          </button>	  		  
          <button class="btn btn-primary">
          <i class="fa fa-print"></i>
          <span> Imprimir</span>
          </button>			  
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table id="tabla-inbox" class="table table-striped">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
			  <th>Incidente</th>			  
			  <th>Activo</th>
            </tr>
          </thead>
          <tbody>
            @foreach($aperturas as $apertura)
				<tr>
				  <td>
					{{ $apertura->codigo }}
				  </td>
				  <td>
					{{ $apertura->descripcion }}
				  </td>
				  <td>
					{{ $apertura->incidente->descripcion }}
				  </td>					  
				  <td>
                  @if($apertura->estado_logico)
					<input type="checkbox"  checked disabled />
                  @else
                    <input type="checkbox"  disabled />
                  @endif    
				  </td>			  
				</tr>
            @endforeach     
          </tbody>
          <tfoot>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
			  <th>Activo</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    ABM de Apertura
  </div>
</div>

@stop

@section('javascript')
$('#tabla-inbox').dataTable();
@stop