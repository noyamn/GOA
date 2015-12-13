<?php

class Apertura extends Eloquent 
 {
	protected $table = 'apertura';
    
    public $timestamps = false;
    
    public function incidente()
    {
        return $this->hasOne('Incidente', 'id', 'id_incidente');
    }
}
