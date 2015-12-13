<?php

class IncidenciaAgenteController extends BaseController {
    
    protected $layout = 'layouts.master_agente';

	public function getInicia($tipoIncidente=null)
	{   
	   if($tipoIncidente == 'reclamo' || $tipoIncidente == 'consulta')
       {
           if($tipoIncidente == 'reclamo')
           {
                $idTipoIncidente = 1; 
           }
           elseif($tipoIncidente == 'consulta')
           {
                $idTipoIncidente = 2;
           }   
           
    	   $incidentes = Incidente::Where('id_tipo', '=', $idTipoIncidente)->Lists('descripcion','id');
           
           return $this->layout->content = View::make('agente.Incidencia_inicia', compact('incidentes'));
       }
       else
       {
            return Redirect::action('AgenteController@getIndex');
       }
	}
    
    public function postProcesa()
    {
        $input = Input::All();
        
        $aperturas = Apertura::Where('id_incidente','=', $input['incidente'])->Lists('descripcion','id');
        
        $usuarios = UsuarioAgente::Where('id_agente', '=', Auth::User()->id_usuario)->get()->Lists('nombre_apellido','id');
        
        return $this->layout->content = View::make('agente.Incidencia_procesa', compact('aperturas', 'usuarios'));
    }
    
    public function postEnvia() 
    {
        $input = Input::All();
        
        $validacion = Validator::make(Input::All(), array 
        (
            'apertura' => 'required',            
            'mtcn' => 'required',
            'monto' => 'required',
            'usuario_agente' => 'required',
            'beneficiario' => 'required',
            'destino' => 'required',
        ));
        
        if(!$validacion->fails())
        {
            $incidencia = new Incidencia();
            
            $incidencia->id_apertura =  $input['apertura'];
            
            $incidencia->prioridad = $incidencia->apertura->incidente->prioridad;
            
            $incidencia->codigo = Incidencia::max('id') + 1;
            
            $incidencia->beneficiario = $input['beneficiario'];
            
            $incidencia->mtcn = $input['mtcn'];
            
            $incidencia->monto = $input['monto'];
            
            $incidencia->destino = $input['destino'];
            
            $incidencia->observaciones = $input['txtObservaciones'];
            
            $incidencia->id_agente = Auth::User()->id_usuario;    
            
            $incidencia->id_estado =  1;
            
            $incidencia->id_operador =  0;
            
            date_default_timezone_set('Etc/GMT+3');
            
            $incidencia->fecha_alta = Carbon\Carbon::now();
            
            $incidencia->save();
            
            NotificacionService::incidenciaRegistra($incidencia);
            
            return $this->layout->content = View::make('agente.Incidencia_envia', compact('incidencia'));
        }
        else
        {
            return "Ha ocurrido un error";
        }      
    }
    
    public function getBusca($tipoIncidente=null)
    {
        if($tipoIncidente == 'reclamo' || $tipoIncidente == 'consulta')
        {
            if($tipoIncidente == 'reclamo')
            {
                $idTipoIncidente = 1; 
            }
            elseif($tipoIncidente == 'consulta')
            {
                $idTipoIncidente = 2;
            }
            
            return $this->layout->content = View::make('agente.Incidencia_busca', compact('idTipoIncidente'));                        
        }
        else
        {
            return Redirect::action('AgenteController@getIndex');
        }
    }
    
    public function postResultado()
    {
        $input = Input::All();
        
        $incidencias = Incidencia::Where('id_agente', '=', Auth::User()->id_usuario)->
                                   Where('codigo', 'like',  $input['nro_incidencia'].'%')->
                                   get();
        
        return $this->layout->content = View::make('agente.Incidencia_resultado', compact('incidencias'));         
    }
    
    public function getEstado($codigoIncidencia = null)
    {
        if($codigoIncidencia != null)
        {
            $incidencia = Incidencia::Where('codigo', '=', $codigoIncidencia)->
                                      Where('id_agente', '=', Auth::User()->id_usuario)->first();
            
            if($incidencia != null)
            {
                return $this->layout->content = View::make('agente.Incidencia_estado', compact('incidencia'));   
            }
            else
            {
                return Redirect::action('AgenteController@getIndex');       
            }                   
        }
        else
        {
            return Redirect::action('AgenteController@getIndex');
        }        
    }
    
    public function getImprimir($codigoIncidencia = null)
    {
        if($codigoIncidencia != null)
        {
            $incidencia = Incidencia::Where('codigo', '=', $codigoIncidencia)->
                                      Where('id_agente', '=', Auth::User()->id_usuario)->first();
            
            if($incidencia != null)
            {
                ImpresionService::imprimeIncidencia($incidencia);
            }
            else
            {
                return Redirect::action('AgenteController@getIndex');       
            }
        }
        else
        {
            return Redirect::action('AgenteController@getIndex'); 
        }
    }
}
