@extends('layouts.master_operador')

@section('ruta')
<li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
<li><a href="#">ABM de Agentes</a></li>
<li class="active">Alta</li>
@stop

@section('content')

<div class="box box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">Alta de Agente</h3>
      <div class="box-tools pull-right">         
         <a class="btn btn-box-tool" href="../abm_agente" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></a>
      </div>
   </div>
   <div class="box-body">
      <div class="row menu-botones">
         <div class="col-md-12">
            <div class="mailbox-controls">
               <button class="btn btn-primary" onclick="$('#form').submit()">
               <i class="fa fa-save"></i>
               <span> Guardar</span>
               </button>			  
               <button class="btn btn-primary" onclick="javascript:cargarPantalla('operador/inbox-incidencias.php')">
               <i class="fa fa-trash"></i>
               <span> Borrar</span>
               </button>			
            </div>
         </div>
      </div>
      {{ Form::open(array('url' => 'panel_administrador/abm_agente/alta', 'method' => 'POST', 'id' => 'form')) }}      
      <div class="col-md-12">
         <div class="col-md-4">
            <div class="form-group">
               <label>Estado:</label>
               {{ Form::label('estado', 'Estado:') }}
               {{ Form::select('estado', $estados, null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group @if($errors->first('codigo') != '') {{'has-error'}} @endif">
               {{ Form::label('codigo', 'Codigo:') }}
               {{ Form::text('codigo', null, array('class' => 'form-control', 'placeholder' => $errors->first('codigo'))) }}
            </div>
            <div class="form-group @if($errors->first('razon_social') != '') {{'has-error'}} @endif">               
               {{ Form::label('razon_social', 'Razon Social:') }}
               {{ Form::text('razon_social', null, array('class' => 'form-control', 'placeholder' => $errors->first('razon_social'))) }}               
            </div>
            <div class="form-group @if($errors->first('nombre_fantasia') != '') {{'has-error'}} @endif">               
               {{ Form::label('nombre_fantasia', 'Nombre Fantasia:') }}
               {{ Form::text('nombre_fantasia', null, array('class' => 'form-control', 'placeholder' => $errors->first('nombre_fantasia'))) }}
            </div>
         </div>
         <div class="form-group col-md-5">
            {{ Form::label('provincia', 'Provincia:') }}
            {{ Form::select('provincia', $provincias, null, array('class' => 'form-control')) }}
         </div>
         <div class="form-group col-md-5">
            {{ Form::label('localidad', 'Localidad:') }}
            {{ Form::select('localidad', $localidades, null, array('class' => 'form-control')) }}
         </div>
         <div class="form-group col-md-5">
            <div class="form-group @if($errors->first('domicilio') != '') {{'has-error'}} @endif">
               {{ Form::label('domicilio', 'Domicilio:') }}
               {{ Form::text('domicilio', null, array('class' => 'form-control', 'placeholder' => $errors->first('domicilio'))) }}
            </div>
         </div>
      </div>
      {{ Form::close() }}
   </div>
   <!-- /.box-body -->
   <div class="box-footer">
      Alta de Agente
   </div>
</div>
<script type="text/javascript">	
   //Funciones para cuando carga el DOM
   $( document ).ready(function() {
   	
   setTimeout(function()
   {
   	CKEDITOR.replace('txtRespuesta');
   },100);
   	
   });  
    
</script>

@stop