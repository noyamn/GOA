<?php

class AgenteController extends BaseController {
    
    protected $layout = 'layouts.master_agente';

	public function getIndex()
	{
		return View::make('agente.index');
	}
    
    public function getDatosPersonales()
    {
        $agente = Agente::Find(Auth::user()->id_usuario);
        
        return $this->layout->content= View::make('agente.Agente_datos', compact('agente'));
    }
}
