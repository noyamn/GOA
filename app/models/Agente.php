<?php

class Agente extends Eloquent 
 {
	protected $table = 'agente';
    
    public $timestamps = false;
    
    public function localidad()
    {
        return $this->hasOne('Localidad', 'id', 'id_localidad');
    }
    
    public function usuarios()
    {
        return $this->hasMany('UsuarioAgente', 'id_agente', 'id');
    }
}
