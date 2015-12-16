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

function concatenaCodListados(json, key)
{
    var strCodigos = '';
    
    $.each(json, function(e, fila)
    {  
        if(key != fila[key])       
        {
            strCodigos += strCodigos == '' ? fila[key] : '-' + fila[key] ; 
        }
    });
    
    return strCodigos;
}


function exportTableToCSV($table, filename) {

    var $rows = $table.find('tr:has(td)'),

        // Temporary delimiter characters unlikely to be typed by keyboard
        // This is to avoid accidentally splitting the actual contents
        tmpColDelim = String.fromCharCode(11), // vertical tab character
        tmpRowDelim = String.fromCharCode(0), // null character

        // actual delimiter characters for CSV format
        colDelim = '","',
        rowDelim = '"\r\n"',

        // Grab text from table into CSV formatted string
        csv = '"' + $rows.map(function (i, row) {
            var $row = $(row),
                $cols = $row.find('td');

            return $cols.map(function (j, col) {
                var $col = $(col),
                    text = $col.text();
                    text = $.trim(text);
                return text.replace(/"/g, '""'); // escape double quotes

            }).get().join(tmpColDelim);

        }).get().join(tmpRowDelim)
            .split(tmpRowDelim).join(rowDelim)
            .split(tmpColDelim).join(colDelim) + '"',

        // Data URI
        csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

    $(this)
        .attr({
        'download': filename,
            'href': csvData,
            'target': '_blank'
    });
}