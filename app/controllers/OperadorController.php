<?php

class OperadorController extends BaseController {
    
    protected $layout = 'layouts.master_operador';

	public function getIndex()
	{
		return Redirect::to(url('panel_administrador/incidencias/inbox'));
	}

}
