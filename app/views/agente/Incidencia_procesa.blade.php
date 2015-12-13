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
      <h1 class="box-title">Ingrese los datos de reclamo</h1>
   </div>
   <div class="box-body">
      <div class="row">
         <div class="col-md-10 col-md-offset-1">
            <p style="color:#777">
               En esta secci&oacute;n usted puede iniciar un reclamo pertinente. Seleccione el reclamo correspondiente e ingrese los datos para llevar a cabo el mismo.
            Cuando el reclamo est&eacute; siendo procesado, usted ser&aacute; notificado.
            </p>
         </div>
      </div>
      <div class="row">
      
         {{ Form::open(array('url' => 'home/incidencias/envia', 'method' => 'POST', 'id' => 'form')) }}
         
            <input type="hidden" name="Funcion" value="generaIncidencia" /> 
            <div class="col-md-10 col-md-offset-1">
               <p class="lead" style="margin-top:20px">
                  Datos de Reclamo:
               </p>
            </div>
            <div class="col-md-10 col-md-offset-1">
               <div class="form-group col-md-6">
                  {{ Form::label('apertura', 'Apertura:') }}
                  {{ Form::select('apertura', $aperturas, null, array('class' => 'form-control')) }}
               </div>
               <div class="form-group col-md-6">
                  {{ Form::label('usuario', 'Usuario:') }}
                  {{ Form::select('usuario_agente', $usuarios, null, array('class' => 'form-control')) }}
               </div>
               <div class="form-group col-md-6">
                  {{ Form::label('mtcn', 'MTCN:') }}
                  <label id='form_mtcn_error'></label>
                  {{ Form::text('mtcn', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el MTCN','requiered' => '')) }}
               </div>
               <div class="form-group col-md-6">
                  {{ Form::label('beneficiario', 'Beneficiario:') }}
                  <label id='form_beneficiario_error'></label>
                  {{ Form::text('beneficiario', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el Beneficiario')) }}
               </div>
               <div class="form-group col-md-6">
                  {{ Form::label('monto', 'Monto Principal:') }}
                  <label id='form_monto_error'></label>
                  {{ Form::text('monto', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el Monto Principal')) }}
               </div>
               <div class="form-group col-md-6">
                  {{ Form::label('destino', 'Destino:') }}
                  <label id='form_destino_error'></label>
                  {{ Form::text('destino', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el Destino')) }}
               </div>
               <div class="form-group col-md-12">
                  {{ Form::label('observaciones', 'Observaciones:') }}
                  <label id='form_txtObservaciones_error'></label>
                  <textarea class="form-control" name="txtObservaciones" id="txtObservaciones" rows="3" placeholder="Enter ...">								
                  </textarea>
               </div>
               <div class="col-md-3 pull-right">
                  <button class="btn btn-block btn-warning" style="margin-top:15px;" >
                  Realizar Reclamo
                  </button>							
               </div>
            </div>
        
        {{ Form::close() }}
            
      </div>
      <div class="box-footer" style="margin-top:25px">
      </div>
   </div>   
</div>

@stop

@section('javascript')   
	
setTimeout(function()
{
    CKEDITOR.replace('txtObservaciones');
},100);

//Validaciones
var validator  = new Validator("form");

validator.EnableOnPageErrorDisplay();

validator.EnableMsgsTogether();

validator.addValidation("mtcn","req");
validator.addValidation("mtcn","num");
validator.addValidation("mtcn","maxlen=10");
validator.addValidation("mtcn","minlen=10");

validator.addValidation("beneficiario","req");
validator.addValidation("beneficiario","maxlen=20");

validator.addValidation("monto","req");
validator.addValidation("monto","num");

validator.addValidation("destino","req");
validator.addValidation("destino","maxlen=20");

validator.addValidation("txtObservaciones","req");
validator.addValidation("txtObservaciones","maxlen=200");

   
@stop