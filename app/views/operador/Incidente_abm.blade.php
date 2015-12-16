@extends('layouts.master_operador')

@section('ruta')
<li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
<li><a href="#">ABM de Aperturas</a></li>
<li class="active">Consulta</li>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">ABM de Incidente</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row menu-botones">
      <div class="col-md-12">
        <div class="mailbox-controls">
          <a class="btn btn-primary" href="abm_incidente/alta">
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
              <th>Tipo</th>
              <th>Descripcion</th>
              <th>Prioridad</th>
			  <th>Activo</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
          @foreach($incidentes as $incidente)
				<tr>
				  <td>
					{{$incidente->codigo}}
				  </td>
				  <td>
					{{$incidente->tipoIncidente->descripcion}}
				  </td>                  
				  <td>
					{{$incidente->descripcion}}
				  </td>	
                    @if ($incidente->prioridad == 1 ||
                         $incidente->prioridad == 4)                        
                        <td class="inbox-texto text-red">
                        <b>Alta</b>
                        </td>       
                    @elseif ($incidente->prioridad == 2 ||
                             $incidente->prioridad == 5)                        
                        <td class="inbox-texto text-yellow">
                        <b>Moderada</b>
                        </td>                           
                    @else                        
                        <td class="inbox-texto text-blue">
                        <b>Baja</b>
                        </td>   
                    @endif                   	  
				  <td>
                  @if($incidente->estado_logico)
					<input type="checkbox"  checked disabled />
                  @else
                    <input type="checkbox"  disabled />
                  @endif    
				  </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="abm_incidente/modificar/{{$incidente->id}}" data-toggle="tooltip" data-original-title="Modificar">
                        <i class="glyphicon glyphicon-pencil"></i>
                        <span></span>
                    </a>
                    <a class="btn btn-primary btn-sm" href="" data-toggle="tooltip" data-original-title="Borrar">
                        <i class="glyphicon glyphicon-trash"></i>
                    <span></span>
                    </a>	                    
                </td>            	
			  
				</tr>
          @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Codigo</th>
              <th>Tipo</th>
              <th>Descripcion</th>
              <th>Prioridad</th>
			  <th>Activo</th>
              <th>Accion</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    Footer
  </div>
</div>
<script type="text/javascript">	
						
	$('#tabla-inbox').dataTable();	

</script>	

@stop

@section('javascript')
$('#tabla-inbox').dataTable();
@stop