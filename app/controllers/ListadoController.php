<?php

class ListadoController extends BaseController {
    
    protected $layout = 'layouts.master_operador';

	public function getIncidencias()
	{
	   $incidencias = Incidencia::Where('id_estado','=', 3)->get();
                                  
       $tipoIncidente = TipoIncidente::Lists('descripcion', 'id');                                
       
	   return $this->layout->content= View::make('operador.Listado_incidencias', compact('incidencias','tipoIncidente'));
    }
    
    public function postIncidencias()
    {
        $input = Input::All();

        $tipoIncidente = $input['tipoIncidente'];
        
        //Ver de validar los privilegios
        $incidencias = Incidencia:: Where('id_estado','=', 3)->
                                    WhereHas('apertura', function($apertura) use($tipoIncidente)
                                    {
                                        $apertura->WhereHas('incidente', function($incidente) use($tipoIncidente)
                                        {
                                            $incidente->where('id_tipo', '=', $tipoIncidente);
                                        });
                                                                            
                                    })->
                                    WhereHas('agente', function($agente) use($input)
                                    {
                                        $agente->where('nombre_fantasia','like', $input['nombre_fantasia'].'%');
                                                                            
                                    })->
                                    Where('codigo','like', $input['nro_incidencia'].'%')->
                                    Where('beneficiario','like', $input['beneficiario'].'%')->
                                    Where('mtcn','like', $input['mtcn'].'%')->
                                    get();
        
        
        $tipoIncidente = TipoIncidente::Lists('descripcion', 'id');  
        
        return $this->layout->content= View::make('operador.Listado_incidencias', compact('incidencias','tipoIncidente'));       
    }
    
	public function getAgentes()
	{
	   $agentes = Agente::All();                                      
       
       $provincias = Provincia::All()->Lists('descripcion', 'id');                          
       
	   return $this->layout->content= View::make('operador.Listado_agentes', compact('agentes', 'provincias'));
    }    
        
    public function postAgentes()
    {
        $input = Input::All();
        
        //Ver de validar los privilegios
        $agentes = Agente:: Where('codigo','like', $input['codigo'].'%')->
                                    Where('nombre_fantasia','like', $input['nombre_fantasia'].'%')->
                                    Where('razon_social','like', $input['razon_social'].'%')->
                                    WhereHas('localidad', function($localidad) use($input)
                                    {
                                        $localidad->Where('id_provincia', '=', $input['provincia']);                                                                            
                                    })->
                                    get();
                                            

        
        
        $provincias = Provincia::All()->Lists('descripcion', 'id'); 
        
        return $this->layout->content= View::make('operador.Listado_agentes', compact('agentes','provincias'));       
    }    
}