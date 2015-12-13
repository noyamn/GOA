<?php
	
class LoginController extends BaseController {

	public function getIndex()
	{
		return View::make('login.index');
	}
    
    public function postLoguear()
    {
        $input = Input::All();
        
        $usuario = Usuario::Where('email', '=', $input['email'])->
                            Where('password','=',$input['password'])->first();
                            
        if($usuario != null)
        {
            Auth::login($usuario);
            
            if($usuario->id_tipo == 1)
             {
                return Redirect::action('AgenteController@getIndex');
             }
             elseif($usuario->id_tipo == 2)
             {
               return Redirect::action('OperadorController@getIndex'); 
             }
        }
        else
        {
            return Redirect::back()->withErrors(['*Los datos ingresados no son validos.']);
        }        
    }
    
    public function getCerrarsesion()
    {
        Auth::logout();
        
        return Redirect::action('LoginController@getIndex');
    }
}

?>