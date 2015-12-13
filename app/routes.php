<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Rutas del Panel de Administrador
Route::group(array('before' => 'auth'), function()
{
    //Rutas del Panel de Administrador
    //if(Auth::user()->id_tipo == 2)
    {
        Route::get('panel_administrador', 'OperadorController@getIndex');
        
        Route::controller('ajax', 'AjaxController');
        
        Route::controller('panel_administrador/abm_agente', 'AbmAgenteController');
        
        Route::controller('panel_administrador/abm_apertura', 'AbmAperturaController');
        
        Route::controller('panel_administrador/datos_operador', 'DatosOperadorController');
        
        Route::controller('panel_administrador/incidencias', 'IncidenciaController');
        
        Route::controller('panel_administrador/listados', 'ListadoController');
    }

    //Rutas del Agente
    //if(Auth::user()->id_tipo == 1)
    {
        Route::get('home', 'AgenteController@getIndex');
        
        Route::get('home/datos_personales', 'AgenteController@getDatosPersonales');
        
        Route::controller('home/incidencias', 'IncidenciaAgenteController');
    }


});

Route::controller('login', 'LoginController');