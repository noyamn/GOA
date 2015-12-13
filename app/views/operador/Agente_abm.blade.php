@extends('layouts.master_operador')

@section('ruta')
<li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
<li><a href="#">ABM de Agentes</a></li>
<li class="active">Consulta</li>
@stop

@section('content')

<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">ABM de Agente</h3>
      <div class="box-tools pull-right">
         <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
         <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
   </div>
   <div class="box-body">
      <div class="row menu-botones">
         <div class="col-md-12">
            <div class="mailbox-controls">
               <a class="btn btn-primary" href="abm_agente/alta">
               <i class="fa fa-file"></i>
               <span>Nuevo</span>
               </a>
               <a class="btn btn-primary" href="abm_agente">
               <i class="fa fa-refresh"></i>
               <span>Actualizar</span>
               </a>		  
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
                     <th>Razon Social</th>
                     <th>Nombre Fantasia</th>
                     <th>Domicilio</th>
                     <th>Localidad</th>
                     <th>Activo</th>
                     <th>Accion</th>
                  </tr>
               </thead>
               <tbody>
                    @foreach ($agentes as $agente)
                    <a href="#">
                        <tr>
                            <td>
                            {{ $agente->codigo }}
                            </td>
                            <td>
                            {{ $agente->razon_social }}
                            </td>
                            <td>
                            {{ $agente->nombre_fantasia }}
                            </td>
                            <td>
                            {{ $agente->domicilio }}
                            </td>
                            <td>
                            {{ $agente->localidad->descripcion }}
                            </td>
                            <td>
                            <input type="checkbox" disabled 
                                                       
                            @if($agente->estado_logico)
                            {
                                checked
                            }
                            @endif
                            
                            />
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="abm_agente/modificar/{{$agente->id}}" data-toggle="tooltip" data-original-title="Modificar">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                    <span></span>
                                </a>
                                <a class="btn btn-primary btn-sm" href="abm_agente/borrar/{{$agente->id}}" data-toggle="tooltip" data-original-title="Borrar">
                                    <i class="glyphicon glyphicon-trash"></i>
                                <span></span>
                                </a>	                    
                            </td>                              
                        </tr>
                    </a>
                    @endforeach
               </tbody>
               <tfoot>
                  <tr>
                     <th>Codigo</th>
                     <th>Razon Social</th>
                     <th>Nombre Fantasia</th>
                     <th>Domicilio</th>
                     <th>Localidad</th>
                     <th>Accion</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
   <!-- /.box-body -->
   <div class="box-footer">
      ABM de Agente
   </div>
</div>
<script type="text/javascript">	
   $('#tabla-inbox').dataTable();	
   
</script>

@stop