<?php

class NotificacionService
{
    public static function creaNotificacion($codigoFormato, $array)
    {
        $notificacion = new Notificacion();
        
        $formato = FormatoNotificacion::Where('codigo', '=', $codigoFormato)->first();        
        
        if(isset($array['id_agente']))
        {
            $notificacion->id_usuario = $array['id_agente'];
            
            unset($array['id_agente']);
        }
        else
        {
            $notificacion->id_operador = $array['id_operador'];
            
            unset($array['id_operador']);
        }        

        $notificacion->texto = vsprintf($formato->formato, $array);
        
        date_default_timezone_set('Etc/GMT+3');            
                
        $notificacion->fecha_alta = Carbon\Carbon::now();
        
        $notificacion->isRecibida = False;
        
        $notificacion->isVista = False;
        
        $notificacion->id_formato = $formato->id;
        
        $notificacion->save(); 
    }
    
    public static function incidenciaEstado($incidencia)
    {
        NotificacionService::creaNotificacion(1, array('id_agente' => $incidencia->id_agente, 
                                                       'nroIncidencia' => $incidencia->codigo,                                         
                                                       'estado' => $incidencia->estado->descripcion));
    }
    
    public static function incidenciaRegistra($incidencia)
    {
        $operadores = Operador::where('estado_logico', '=', 1)->
                                where('id','!=', 0)->get();
        
        foreach($operadores as $operador)
        {
            NotificacionService::creaNotificacion(2, array('id_operador' => $operador->id, 
                                                           'nroIncidencia' => $incidencia->codigo));
        }
    }            
}

?>