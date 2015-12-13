<?php

class AbmAperturaController extends BaseController {
    
    protected $layout = 'layouts.master_operador';

	public function getIndex()
	{
	   $aperturas = Apertura::All();
       
	   return $this->layout->content= View::make('operador.Apertura_abm', compact('aperturas'));
	}
    
    public function getAlta()
    {
        $estados['1'] = 'Habilitado';
        
        $estados['0'] = 'Deshabilitado';
        
        $incidentes = Incidente::Lists('descripcion','id');
        
        return $this->layout->content= View::make('operador.Apertura_alta', compact('incidentes','estados'));
    }
    
    public function postAlta()
    {
        $input = Input::All();
        
        $apertura = new Apertura();
        
        $apertura->codigo = $input['codigo'];
        
        $apertura->descripcion = $input['descripcion'];
        
        $apertura->descripcion = $input['descripcion'];
        
        $apertura->id_incidente = $input['incidente'];
        
        $apertura->estado_logico = $input['estado']; 
        
        $apertura->save();
        
        return Redirect::to('panel_administrador/abm_apertura');
        
    }
}
