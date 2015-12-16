<?php

class AbmIncidenteController extends BaseController {
    
    protected $layout = 'layouts.master_operador';

	public function getIndex()
	{
	   $incidentes = Incidente::All();
       
	   return $this->layout->content= View::make('operador.Incidente_abm', compact('incidentes'));
	}
    
    public function getAlta()
    {
        $estados['1'] = 'Habilitado';
        
        $estados['0'] = 'Deshabilitado';
        
        $prioridades['1'] = 'Alta';
        
        $prioridades['2'] = 'Moderada';
        
        $prioridades['3'] = 'Baja';
        
        $tipoIncidente = TipoIncidente::Lists('descripcion','id');
        
        return $this->layout->content= View::make('operador.Incidente_alta', compact('estados', 'prioridades','tipoIncidente'));
    }
    
    public function getModificar($idIncidente)
    {
        $incidente = Incidente::find($idIncidente);
        
        $estados['1'] = 'Habilitado';
        
        $estados['0'] = 'Deshabilitado';
        
        if($incidente->id_tipo == 1)
        {        
            $prioridades['1'] = 'Alta';
            
            $prioridades['2'] = 'Moderada';
            
            $prioridades['3'] = 'Baja';
        }
        else
        {
            $prioridades['4'] = 'Alta';
            
            $prioridades['5'] = 'Moderada';
            
            $prioridades['6'] = 'Baja';            
        }
        
        $tipoIncidente = TipoIncidente::Lists('descripcion','id');
        
        return $this->layout->content= View::make('operador.Incidente_modificacion', compact('estados', 'prioridades','tipoIncidente', 'incidente'));
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
