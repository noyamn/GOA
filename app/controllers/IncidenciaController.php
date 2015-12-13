<?php

class IncidenciaController extends BaseController {
    
    protected $layout = 'layouts.master_operador';

	public function getInbox()
	{
	   $incidencias = Incidencia::where('id_operador','=', 0)->
                                  orderBy('prioridad', 'asc')->
                                  get();                             
       
		return $this->layout->content= View::make('operador.Incidencia_inbox', compact('incidencias'));
	}
    
	public function getPendientes()
	{
	   $incidencias = Incidencia::where('id_operador','=', Auth::User()->id_usuario)->
                                  where('id_estado','=', 2)->
                                  orderBy('prioridad', 'asc')->
                                  get();
       
		return $this->layout->content= View::make('operador.Incidencia_pendientes', compact('incidencias'));
	}    
    
    public function getDesvincular($id)
    {
        $incidencia = Incidencia::find($id);
        
        if($incidencia != null)
        {
            if($incidencia->id_operador == Auth::User()->id_usuario && $incidencia->id_estado == 2)
            {
                $incidencia->id_operador = 0;
                
                $incidencia->id_estado = 1;
                
                $incidencia->save();
                
                return Redirect::back();
            }
        }
        
        return Redirect::to('panel_administrador');       
    }    
    
    public function getProcesar($id)
    {
        $incidencia = Incidencia::find($id);
        
        if($incidencia != null)
        {
            //Si es la primera vez que ingresa le asigno la Incidencia al Operador y le cambio el Estado
            if($incidencia->id_operador == 0)
            {
                //Cambiar el 1 por el id de la Session
                $incidencia->id_operador = Auth::User()->id_usuario;
                
                $incidencia->id_estado = 2;
                
                $incidencia->save();
                
                NotificacionService::incidenciaEstado($incidencia);
            }
            
            //Cambiar el 1 por el id de la Session
            if($incidencia->id_operador == Auth::User()->id_usuario && $incidencia->id_estado == 2)
            {
                return $this->layout->content= View::make('operador.Incidencia_procesar', compact('incidencia'));               
            }
        }
        
        return Redirect::to('panel_administrador');
    }
    
    public function postCerrar($id=null)
    {
        $input = Input::All();
        
        $validacion = Validator::make(Input::All(), array 
        (
            'id' => 'required',            
            'txtRespuesta' => 'required'
        ));
        
        if(!$validacion->fails())
        {
            $incidencia = Incidencia::find($input['id']);
            
            if($incidencia->id_operador == Auth::User()->id_usuario && $incidencia->id_estado == 2)
            {
                $incidencia->id_estado = 3;
                
                $incidencia->respuesta = $input['txtRespuesta'];
                
                date_default_timezone_set('Etc/GMT+3');
                
                $incidencia->fecha_cierre = Carbon\Carbon::now();
                
                $incidencia->save();
                
                NotificacionService::incidenciaEstado($incidencia);
                
                return Redirect::action('IncidenciaController@getInbox');
            }           
        }
        
        return Redirect::to('panel_administrador');
    }
    
    public function getImprimir($codigoIncidencia = null)
    {
        if($codigoIncidencia != null)
        {
            $incidencia = Incidencia::Where('codigo', '=', $codigoIncidencia)->
                                      Where('id_operador', '=', Auth::User()->id_usuario)->first();
            
            if($incidencia != null)
            {
                ImpresionService::imprimeIncidencia($incidencia);
            }
            else
            {
                return Redirect::action('OperadorController@getIndex');       
            }
        }
        else 
        {
            return Redirect::action('OperadorController@getIndex'); 
        }
    }
    
    public function getConsulta()
    {
        $incidencias = Incidencia::Where('id_estado', '=', 3)->get();
        
        return $this->layout->content= View::make('operador.Incidencia_consulta', compact('incidencias'));
    }
    
    public function postConsulta()
    {
        $input = Input::All();
        
        $incidencias = Incidencia::Where('id_estado', '=', 3)->
                                   Where('codigo', 'like', $input['nro_incidencia'].'%')->
                                   WhereHas('agente', function($agente) use($input)
                                   {
                                        $agente->where('nombre_fantasia','like', $input['nombre_fantasia'].'%');
                                                                            
                                   })->get();
        
        return $this->layout->content= View::make('operador.Incidencia_consulta', compact('incidencias'));
    }
    
    public function getConsultar($id)
    {
        $incidencia = Incidencia::find($id);
        
        if($incidencia != null)
        {           
            if($incidencia->id_operador == Auth::User()->id_usuario && $incidencia->id_estado == 3)
            {
                return $this->layout->content= View::make('operador.Incidencia_consultar', compact('incidencia'));               
            }
        }
        
        return Redirect::to('panel_administrador');
    }                 
}
