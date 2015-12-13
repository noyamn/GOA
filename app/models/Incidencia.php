<?php

class Incidencia extends Eloquent 
 {
	protected $table = 'incidencia';
    
    public $timestamps = false;
    
    public function agente()
    {
        return $this->hasOne('Agente', 'id', 'id_agente');
    }
    
    public function operador()
    {
        return $this->hasOne('Operador', 'id', 'id_operador');
    }
    
    public function apertura()
    {
        return $this->hasOne('Apertura', 'id', 'id_apertura');
    }
    
    public function estado()
    {
        return $this->hasOne('EstadoIncidencia', 'id', 'id_estado');
    }     
}
