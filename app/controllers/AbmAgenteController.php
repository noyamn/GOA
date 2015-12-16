<?php

class AbmAgenteController extends BaseController {
    
    protected $layout = 'layouts.master_operador';

	public function getIndex()
	{
	   $agentes = Agente::All();
       
	   return $this->layout->content= View::make('operador.Agente_abm', compact('agentes'));
	}
    
    public function getAlta()
    {        
        $estados['1'] = 'Habilitado';
        
        $estados['0'] = 'Deshabilitado';
        
        $localidades = Localidad::Lists('descripcion', 'id');
        
        $provincias = Provincia::Lists('descripcion', 'id');
        
        $compact = array
        (
            'estados',
            'localidades',
            'provincias'
        );
        
        return $this->layout->content= View::make('operador.Agente_alta', compact($compact));
    }
    
    public function postAlta()
    {
        $input = Input::All();
                
        $validacion = Validator::make(Input::All(), array 
        (
            'codigo' => 'required|unique:agente,codigo',            
            'razon-social' => 'required',
            'nombre-fantasia' => 'required',
            'domicilio' => 'required',
            'password' => 'required',
            'repassword' => 'required'
        ));
        
        if(!$validacion->fails())
        {
            $agente = new Agente();
            
            $agente->estado_logico = $input['estado'];
            
            $agente->codigo = $input['codigo'];
            
            $agente->razon_social = $input['razon-social'];
            
            $agente->nombre_fantasia = $input['nombre-fantasia'];
            
            $agente->domicilio = $input['domicilio'];
            
            $agente->id_localidad = $input['localidad'];
            
            $agente->codigo_postal = '1678';
            
            $agente->save();
            
            $usuario = new Usuario();
            
            $usuario->id_usuario = $agente->id;
            
            $usuario->email = $input['email'];
            
            $usuario->password = $input['password'];
            
            $usuario->id_tipo = 1;
            
            $usuario->save();
            
             return Redirect::to('panel_administrador/abm_agente');
        }
        else
        {
            return Redirect::back()->withErrors($validacion);
        }
    }
    
    public function getModificar($id=null)
    {
        if($id != null)
        {
            $agente = Agente::find($id);
            
            if($agente != null)
            {
                $estados['1'] = 'Habilitado';
                
                $estados['0'] = 'Deshabilitado';
                
                $localidades = Localidad::Lists('descripcion', 'id');
                
                $provincias = Provincia::Lists('descripcion', 'id'); 
                               
                return $this->layout->content= View::make('operador.Agente_modificacion', compact('agente', 'estados', 'localidades', 'provincias'));
            }
            else
            {
                return Redirect::action('OperadorController@getInbox');
            }
        }
        else
        {
            return Redirect::action('OperadorController@getIndex');
        }
    }
    
    public function postModificar()
    {
        $input = Input::All();
                
        $validacion = Validator::make(Input::All(), array 
        (         
            'razon_social' => 'required',
            'nombre_fantasia' => 'required',
            'domicilio' => 'required',
        ));
        
        if(!$validacion->fails())
        {
            $agente = Agente::find($input['id']);
            
            if($agente != null)
            {
                $agente->estado_logico = $input['estado'];
                
                $agente->razon_social = $input['razon_social'];
                
                $agente->nombre_fantasia = $input['nombre_fantasia'];
                
                $agente->domicilio = $input['domicilio'];
                
                $agente->id_localidad = $input['localidad'];
                
                $agente->save();                
                
                $usuario = $agente->usuario();
                
                $usuario->email = $input['email'];
                
                if($input['password'] != '' && $input['password'] == $input['repassword'])
                {
                    $usuario->password = $input['password'];                   
                }   
                                                     
                $usuario->save();                
                
                 return Redirect::to('panel_administrador/abm_agente');
            }
            else
            {
                return Redirect::action('AbmAgenteController@getIndex');
            }
        }
        else
        {
            return Redirect::back()->withErrors($validacion);
        }
    }
    
    public function getBorrar($id=null)
    {
        if($id != null)
        {
            $agente = Agente::find($id);
            
            if($agente != null)
            {
                $agente->delete();
                
                $agente->usuario()->delete();
            }
        }
        
        return Redirect::action('AbmAgenteController@getIndex');
    } 
}
