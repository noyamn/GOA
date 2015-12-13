function countIncidencias(url)	
{
    $.ajax({
		url:   url + '/ajax/countincidencias',
		type:  'POST',
		success:	function (response) 
		{
			$("#count-incidencias").html(response);
		}
	});
}

function countPendientes(url)	
{
    $.ajax({
		url:   url + '/ajax/countpendientes',
		type:  'POST',
		success:	function (response) 
		{
			$("#count-pendientes").html(response);
		}
	});
}

function cargaNotificaciones(url, usuario)	
{
    $.ajax({
		url:   url + '/ajax/carganotificaciones',
		type:  'POST',
        data: {'usuario': usuario},         
		success:	function (response) 
		{
		  response = JSON.parse(response);
          
		  if(response.length != 0)
          {
            procesaNotificaciones(response); 
          }
		}
	});
}

function getNotificaciones(url, usuario)	
{
    $.ajax({
		url:   url + '/ajax/getnotificaciones',
		type:  'POST',
        data: {'usuario': usuario},         
		success:	function (response) 
		{
		  response = JSON.parse(response);
          
		  if(response.length != 0)
          {
            procesaNotificaciones(response); 
          }
		}
	});
}

function clickNotificaciones(url, usuario)	
{
    $.ajax({
		url:   url + '/ajax/clicknotificaciones',
		type:  'POST',
        data: {'usuario': usuario},         
		success:	function (response) 
		{        
            $('#count-notificaciones').html(0);         
		}
	});
}

function boxIncidencia(codigoIncidencia)	
{
    $.ajax({
		url:   url() + '/ajax/boxincidencia',
		type:  'POST',
        data: {'codigoIncidencia': codigoIncidencia},         
		success:	function (response) 
		{        
		  response = JSON.parse(response);
		  
          if(response.length != 0)
          {
            procesaBoxIncidencia(response); 
          }         
		}
	});
}

function boxAgente(codigoAgente)	
{
    $.ajax({
		url:   url() + '/ajax/boxagente',
		type:  'POST',
        data: {'idAgente': codigoAgente},         
		success:	function (response) 
		{        
		  response = JSON.parse(response);
		  
          if(response.length != 0)
          {
            procesaBoxAgente(response); 
          }         
		}
	});
}


