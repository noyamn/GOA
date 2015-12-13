function procesaNotificaciones(notificaciones)
{  
    $.each(notificaciones, function(e, notificacion)
    {
        if(notificacion.isRecibida == 0)
        {
            muestraWebNotification(notificacion);
        }
    });
    
    notificacionesHTML(notificaciones);
}

function notificacionesHTML(notificaciones)
{ 
    var ul = '';
    
    var cantNotificaciones = 0;
        
    $.each(notificaciones, function(e, notificacion)
    {
        ul += '<li><a href="#"><i class="fa fa-warning text-yellow"></i>';
        
        ul += notificacion.texto;
        
        ul += '</a></li>';
        
        if(notificacion.isVista == 0)
        {
            cantNotificaciones++;
        }        
    });
    
    $('#count-notificaciones').html(cantNotificaciones);
    
    $('#notificaciones').html(ul);
}

function muestraWebNotification(notificacion)
{   
    var notif = showWebNotification('Notificacion', notificacion.texto , url() + '/dist/img/logo-notification.jpg', null, 1000000);    
    
    //notif.addEventListener("show", Notification_OnEvent);
    
    //notif.addEventListener("click", Notification_OnEvent);
    
    //notif.addEventListener("close", Notification_OnEvent);
}

function procesaBoxIncidencia(incidencia)
{
    $('#boxIncidencia #agente').val(incidencia.agente.nombre_fantasia);
    
    $('#boxIncidencia #incidente').val(incidencia.apertura.incidente.descripcion);
    
    $('#boxIncidencia #apertura').val(incidencia.apertura.descripcion);
    
    $('#boxIncidencia #mtcn').val(incidencia.mtcn);
    
    $('#boxIncidencia #beneficiario').val(incidencia.beneficiario);
    
    $('#boxIncidencia #monto').val(incidencia.monto);
    
    $('#boxIncidencia #destino').val(incidencia.destino);
    
    $('#boxIncidencia #observaciones').html(incidencia.observaciones);
    
    $('#boxIncidencia').modal('show');
}

function procesaBoxAgente(agente)
{
    $('#boxAgente #codigo').val(agente.codigo);
        
    $('#boxAgente #nombre_fantasia').val(agente.nombre_fantasia);
        
    $('#boxAgente #razon_social').val(agente.razon_social);
        
    $('#boxAgente #provincia').val(agente.localidad.provincia.descripcion);
    
    $('#boxAgente #provincia').val(agente.localidad.provincia.descripcion);
    
    $('#boxAgente #domicilio').val(agente.domicilio);
    
    $('#boxAgente #localidad').val(agente.localidad.descripcion);      
    
    $('#boxAgente').modal('show');
}


