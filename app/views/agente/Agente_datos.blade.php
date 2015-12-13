@extends('layouts.master_agente')

@section('header')
<section class="content-header">
    <h1>
      Datos Personales
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Datos Personales</li>
    </ol>
</section>
@stop

@section('content')

<div class="box box-default">
  <div class="box-header with-border">
    <h1 class="box-title">Datos Personales</h1>
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <p style="color:#777">
			Desde esta seccion usted puede observar los datos personales de la Agencia.</br> 
			En la seccion "Usuarios Habilitados" puede ver los datos del personal habilitado para el envio de incidencias.</br>
			Para modificar su contrase&ntildea dirijase a la seccion "Cambio de Contrase&ntildea", ingrese su nuevo password y haga click en "Cambiar Contrase&ntildea".
        </p>
      </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			<p class="lead" style="margin-top:20px">
			  Datos de Agente
			</p>		
			<div class="col-md-6">
				<div class="form-group">
					<label>Codigo:</label>
					<input type="text" class="form-control" value="{{ $agente->codigo }}" disabled>
				</div>
				<div class="form-group">
					<label>Razon Social:</label>
					<input type="text" class="form-control" value="{{ $agente->razon_social }}" disabled>
				</div>
				<div class="form-group">
					<label>Nombre Fantasia:</label>
					<input type="text" class="form-control" value="{{ $agente->nombre_fantasia }}" disabled>
				</div>
				<div class="form-group">
					<label>Domicilio:</label>
					<input type="text" class="form-control" value="{{ $agente->domicilio }}" disabled>
				</div>					
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Codigo Postal:</label>
					<input type="text" class="form-control" value="{{ $agente->codigo_postal }}" disabled>
				</div>
				<div class="form-group">
					<label>Localidad:</label>
					<input type="text" class="form-control" value="{{ $agente->localidad->descripcion }}" disabled>
				</div>
				<div class="form-group">
					<label>Provincia:</label>
					<input type="text" class="form-control" value="{{ $agente->localidad->provincia->descripcion }}" disabled>
				</div>					
			</div>
        </div>
        <div class="col-md-10 col-md-offset-1">
			<p class="lead" style="margin-top:20px">
			  Usuarios Habilitados
			</p>
            <table id="tabla-usuarios" class="table table-striped">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nombre y Apellido</th>
                  <th>DNI</th>				  
                </tr>
              </thead>
              <tbody>
              @foreach ($agente->usuarios as $usuario)
                  <tr>
                    <td>
                      {{ $usuario->id }}
                    </td>
                    <td>
                      {{ $usuario->nombre_apellido }}
                    </td>
                    <td>
                      {{ $usuario->dni }}
                    </td>                   						
                  </tr>
              @endforeach    				  
              </tbody>
              <tfoot>
                <tr>
                  <th>Codigo</th>
                  <th>Nombre y Apellido</th>
                  <th>DNI</th>					  				  
                </tr>
              </tfoot>
            </table>			
		</div>
        <div class="col-md-10 col-md-offset-1">
			<p class="lead" style="margin-top:20px">
			  Cambio de Contrase&ntildea
			</p>
			<div class="col-md-12" style="margin-left:-15px">
				<div class="form-group col-md-6">
					<label>Nueva Contrase&ntildea:</label>
					<input type="password" class="form-control" placeholder="Nueva Contrase&ntildea...">
				</div>
			</div>
			<div class="col-md-12">				
				<div class="form-group col-md-6" style="margin-left:-15px">
					<label>Repita Contrase&ntildea:</label>
					<input type="password" class="form-control" placeholder="Repita Contrase&ntildea...">
				</div>	
				<div class="col-md-3 pull-right" style="margin-top:25px;">
				  <button class="btn btn-block btn-warning" onclick="$('#formIniciaReclamo').submit()">
				  Cambiar Contrase&ntildea
				  </button>
				</div>				
		    </div>		
		</div>
    </div>
  </div>
  <div class="box-footer" style="margin-top:25px">
  </div>
</div>

<script type="text/javascript">	
   $('#tabla-usuarios').dataTable();   
</script>

@stop