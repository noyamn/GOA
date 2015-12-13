<?php

class DatosOperadorController extends BaseController {
    
    protected $layout = 'layouts.master_operador';

	public function getIndex()
	{
	   $operador = Operador::find(Auth::User()->id_usuario);
	   
       return $this->layout->content= View::make('operador.DatosOperador', compact('operador'));
	}
    
    public function postModificacion()
    {
        $input = Input::All();
                
        $validacion = Validator::make(Input::All(), array 
        (
            'nombre_apellido' => 'required',            
            'dni' => 'required',
            'email' => 'required'
        ));
        
        if(!$validacion->fails())
        {           
            $operador = Operador::Find(Auth::User()->id_usuario);
            
            $operador->nombre_apellido = $input['nombre_apellido'];
            
            $operador->dni = $input['dni'];
            
            $operador->email = $input['email'];
            
            $operador->save();
            
            return Redirect::back()->withErrors($validacion);
        }
        else
        {           
            return Redirect::back()->withErrors($validacion);
        }
    }
}
