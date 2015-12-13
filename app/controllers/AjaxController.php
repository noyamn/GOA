<?php

class AjaxController extends BaseController {
    
	public function postCountincidencias()
	{
	   $cantIncidencias = Incidencia::where('id_operador','=', 0)->count();
       
       return $cantIncidencias;
	}
    
    public function postCountpendientes()
    {
        $cantPendientes = Incidencia::where('id_operador','=', Auth::User()->id_usuario)->
                                      where('id_estado','=', 2)->count();
        
        return $cantPendientes;
    }
    
    public function postCarganotificaciones()
    {
        $input = Input::All();
        
        if ($input['usuario'] == 'agente')
        {
            $tipoUsuario = 'id_usuario';
        }
        else
        {
            $tipoUsuario = 'id_operador';
        }
                                        
        $notificaciones = Notificacion::where($tipoUsuario, '=', Auth::User()->id_usuario)->
                                        orderBy('fecha_alta', 'desc')-> 
                                        take(5)->get();                                     
                                        
        $json = $notificaciones->toJson();                                        
        
        return $json;                                                
    }    
    
    public function postGetnotificaciones()
    {
        $input = Input::All();
        
        if ($input['usuario'] == 'agente')
        {
            $tipoUsuario = 'id_usuario';
        }
        else
        {
            $tipoUsuario = 'id_operador';
        }
                                        
        $notificaciones = Notificacion::where($tipoUsuario, '=', Auth::User()->id_usuario)->
                                        orderBy('fecha_alta', 'desc')-> 
                                        take(5)->get();                                        
                                        
        $json = $notificaciones->toJson();                                        
                                        
        foreach($notificaciones as $notificacion)
        {
            if($notificacion->isRecibida == 0)
            {
                $notificacion->isRecibida = true;
                
                $notificacion->save();
            }
        }
        
        return $json;                                                
    }
    
    public function postClicknotificaciones()
    {
        $input = Input::All();
        
        if ($input['usuario'] == 'agente')
        {
            $tipoUsuario = 'id_usuario';
        }
        else
        {
            $tipoUsuario = 'id_operador';
        }
                
        $notificaciones = Notificacion::where($tipoUsuario, '=', Auth::User()->id_usuario)->       
                                        where('isVista', '=', 0)->get();
                                        
        foreach($notificaciones as $notificacion)
        {
            $notificacion->isVista = true;
        
            $notificacion->save();                       
        }
        
        return 1;                
    }    
    
    public function postBoxincidencia()
    {
        $input = Input::All();
        
        $codigoIncidencia = $input['codigoIncidencia'];
                
        $incidencia = Incidencia::where('codigo', '=', $codigoIncidencia)->first();
        
        $incidencia->agente;
        
        $incidencia->apertura;
        
        $incidencia->apertura->incidente;                                        
        
        return $incidencia->toJson();                    
    }
        
    public function postBoxagente()
    {
        $input = Input::All();
        
        $idAgente = $input['idAgente'];
                
        $agente = Agente::find($idAgente);    
        
        $agente->localidad->provincia;                                                
        
        return $agente->toJson();                    
    }            
}
