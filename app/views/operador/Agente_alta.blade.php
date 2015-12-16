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
               {{ Form::label('estado', 'Estado:') }}
               {{ Form::select('estado', $estados, null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group @if($errors->first('codigo') != '') {{'has-error'}} @endif">
               {{ Form::label('codigo', 'Codigo:') }}
               <label id='form_codigo_error'></label>
               {{ Form::text('codigo', null, array('class' => 'form-control', 'placeholder' => 'Codigo')) }}
            </div>
            <div class="form-group @if($errors->first('razon_social') != '') {{'has-error'}} @endif">               
               {{ Form::label('razon-social', 'Razon Social:') }}
               <label id='form_razon-social_error'></label>
               {{ Form::text('razon-social', null, array('class' => 'form-control', 'placeholder' => 'Razon Social')) }}               
            </div>
            <div class="form-group @if($errors->first('nombre_fantasia') != '') {{'has-error'}} @endif">               
               {{ Form::label('nombre-fantasia', 'Nombre Fantasia:') }}
               <label id='form_nombre-fantasia_error'></label>               
               {{ Form::text('nombre-fantasia', null, array('class' => 'form-control', 'placeholder' => 'Nombre Fantasia')) }}
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
               <label id='form_domicilio_error'></label>
               {{ Form::text('domicilio', null, array('class' => 'form-control', 'placeholder' => 'Domicilio')) }}
            </div>
         </div>
      </div>
      <div class="col-md-12">
        <div class="form-group box-header with-border">
            <h3 class="box-title">Datos de Acceso</h3>
         </div>      
         <div class="col-md-4">
            <div class="form-group @if($errors->first('codigo') != '') {{'has-error'}} @endif">
               {{ Form::label('email', 'Email:') }}
               <label id='form_email_error'></label>
               {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) }}
            </div>
            <div class="form-group @if($errors->first('codigo') != '') {{'has-error'}} @endif">
               {{ Form::label('password', 'Password:') }}
               <label id='form_password_error'></label>
               <input type="password" name="password" id="password"  class="form-control" placeholder="Password"/>
            </div>
            <div class="form-group @if($errors->first('codigo') != '') {{'has-error'}} @endif">
               {{ Form::label('repassword', 'Re-Password:') }}
               <label id='form_repassword_error'></label>
               <input type="password" name="repassword" id="repassword"  class="form-control" placeholder="Re-Password"/>
            </div>                        
         </div>
         <div class="form-group col-md-5">
         </div>
      </div>        
      {{ Form::close() }}
   </div>
   <!-- /.box-body -->
   <div class="box-footer">
      Alta de Agente
   </div>
</div>
@stop
@section('javascript')
//Validaciones
var validator  = new Validator("form");

validator.EnableOnPageErrorDisplay();

validator.EnableMsgsTogether();

validator.addValidation("codigo","req");
validator.addValidation("codigo","maxlen=10");

validator.addValidation("razon-social","req");
validator.addValidation("razon-social","maxlen=20");

validator.addValidation("nombre-fantasia","req");
validator.addValidation("nombre-fantasia","maxlen=20");

validator.addValidation("domicilio","req");
validator.addValidation("domicilio","maxlen=20");

validator.addValidation("email","req");
validator.addValidation("email","maxlen=20");

validator.addValidation("password","req");
validator.addValidation("password","maxlen=20");

validator.addValidation("repassword","req");
validator.addValidation("repassword","maxlen=20");
@stop