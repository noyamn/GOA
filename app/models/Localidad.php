<?php

class Localidad extends Eloquent 
 {
	protected $table = 'localidad';
    
    public $timestamps = false;
    
    public function provincia()
    {
        return $this->hasOne('Provincia', 'id', 'id_provincia');
    }

}
