<?php

class Incidente extends Eloquent 
 {
	protected $table = 'incidente';
    
    public $timestamps = false;
    
    public function tipoIncidente()
    {
        return $this->hasOne('TipoIncidente', 'id', 'id_tipo');
    }
}
