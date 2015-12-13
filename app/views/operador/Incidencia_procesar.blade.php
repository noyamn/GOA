@extends('layouts.master_operador')

@section('ruta')
<li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
<li><a href="#">Inbox de Incidencias</a></li>
<li class="active">Procesar</li>
@stop

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Datos de la incidencia: {{ $incidencia->id }}</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
  {{ Form::open(array('url' => '', 'method' => 'POST', 'id' => 'form')) }}
    <div class="row menu-botones">
      <div class="col-md-12">
        <div class="mailbox-controls">
          <button type="submit" class="btn btn-primary" formaction="../cerrar">
          <i class="glyphicon glyphicon-check"></i>
          <span> Cerrar Incidencia</span>
          </button>	
          <button class="btn btn-primary" onclick="javascript:cargarPantalla('operador/inbox-incidencias.php')" disabled>
          <i class="fa fa-save"></i>
          <span> Guardar</span>
          </button>			  
          <button class="btn btn-primary" onclick="javascript:cargarPantalla('operador/inbox-incidencias.php')">
          <i class="fa fa-list-alt"></i>
          <span> Modificar</span>
          </button>			  		  
          <button class="btn btn-primary" onclick=" window.open('{{url()}}/panel_administrador/incidencias/imprimir/{{ $incidencia->codigo }}','_blank')">
          <i class="fa fa-print"></i>
          <span> Imprimir</span>
          </button>			  
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-4">
          <div class="form-group">
            <label>Incidencia:</label></br>
            <input type="text" class="form-control" value="{{ $incidencia->apertura->incidente->descripcion }}" disabled />
          </div>
        </div>
        <div class="form-group col-md-7">
          <label>Agente:</label><br>
          <div class="input-group">
            <div class="input-group-btn">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              Accion 
              <span class="fa fa-caret-down"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="#" onclick="$('#datosAgente').modal('show')">Agente</a></li>
                <li><a href="#">Datos de Usuario</a></li>
              </ul>
            </div>
            <!-- /btn-group -->
            <input type="text" class="form-control" value="{{ $incidencia->agente->nombre_fantasia }}" disabled>
          </div>
        </div>
      </div>
      <div class="col-md-4" style="margin-top:10px; margin-left:15px;">
        <div class="form-group"> 
          <label>Apertura:</label>
          <input type="text" class="form-control" value="{{ $incidencia->apertura->descripcion }}" disabled />
        </div>
        <div class="form-group">
          <label>MTCN:</label>
          <input type="text" class="form-control" value="{{ $incidencia->mtcn }}" disabled />
        </div>
        <div class="form-group">
          <label>Beneficiario:</label></br>
          <input type="text" class="form-control" value="{{ $incidencia->beneficiario }}" disabled />
        </div>
      </div>
      <div class="col-md-4" style="margin-top:10px; margin-left:15px;">      
        <div class="form-group">
          <label>Monto Principal:</label>
          <input type="text" class="form-control" value="{{ $incidencia->monto }}" disabled />
        </div>
        <div class="form-group">
          <label>Destino:</label>
          <input type="text" class="form-control" value="{{ $incidencia->destino }}" disabled />
        </div>
      </div>      
      <div class="col-md-7">
        <div class="form-group col-md-12">
          <label>Observaciones:</label>
            {{ $incidencia->observaciones }}
        </div>
      </div>
      <div class="col-md-11">
        <div class="form-group box-header with-border">
          <h3 class="box-title">Respuesta de incidencia</h3>
          <label id='form_txtRespuesta_error'></label>
        </div>
        
        <textarea class="form-control" rows="7" name="txtRespuesta" id="txtRespuesta">
			
		</textarea>
      </div>
    </div>
    {{ Form::hidden('id', $incidencia->id) }}
    {{ Form::close() }}
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    Datos de la incidencia
  </div>
</div>
<div class="modal fade datosAgente" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="datosAgente">
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
                  <input type="text" class="form-control" value="{{ $incidencia->agente->codigo }}" disabled />
               </div>
               <div class="form-group col-md-8">
                  <label>Nombre Fantasia:</label></br>
                  <input type="text" class="form-control" value="{{ $incidencia->agente->nombre_fantasia }}" disabled />
               </div>
               <div class="form-group col-md-8"> 
                  <label>Razon Social:</label>
                  <input type="text" class="form-control" value="{{ $incidencia->agente->razon_social }}" disabled />
               </div>
               <div class="form-group col-md-4">
                  <label>Provincia:</label>
                  <input type="text" class="form-control" value="{{ $incidencia->agente->localidad->provincia->descripcion }}" disabled />
               </div>
               <div class="form-group col-md-8">
                  <label>Domicilio:</label></br>
                  <input type="text" class="form-control" value="{{ $incidencia->agente->domicilio }}" disabled />
               </div>
               <div class="form-group col-md-4">
                  <label>Localidad:</label>
                  <input type="text" class="form-control" value="{{ $incidencia->agente->localidad->descripcion }}" disabled />
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
setTimeout(function()
{
    CKEDITOR.replace('txtRespuesta');
}, 100);

//Validaciones
var validator  = new Validator("form");

validator.EnableOnPageErrorDisplay();

validator.EnableMsgsTogether();

validator.addValidation("txtRespuesta","req");
validator.addValidation("txtRespuesta","maxlen=200");
@stop