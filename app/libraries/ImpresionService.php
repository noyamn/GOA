<?php

class ImpresionService
{
    public static function imprimeIncidencia($incidencia)
    {
        Fpdf::AddPage();
        
        Fpdf::Image(App::make('url')->to('/dist/img/wu-header.gif'), 10, 5, 190, 25);
    
        Fpdf::Ln(25);
        
        Fpdf::Rect(10, 32, 190, 70);                
    
        Fpdf::SetFont('Arial','B',11);
        
        Fpdf::SetX(13);
    
        Fpdf::Cell(35,10, "Datos de la incidencia");
    
        Fpdf::Ln(10);
        
        Fpdf::SetFont('Arial','',10);
        
        Fpdf::SetX(13);
    
        Fpdf::Cell(35,8, "Nro. Incidencia:");
        
        Fpdf::Cell(60,8, $incidencia->codigo);
    
        Fpdf::Cell(35,8, "Fecha:");
        
        $fecha = date('d/m/Y H:i', strtotime($incidencia->fecha_alta));
    
        Fpdf::Cell(60,8, $fecha);
    
        Fpdf::ln();
        
        Fpdf::SetX(13);
        
        Fpdf::Cell(35,8, "Incidente:");
    
        Fpdf::Cell(60,8, html_entity_decode($incidencia->apertura->incidente->descripcion));
    
        Fpdf::Cell(35,8, "Beneficiario:");
    
        Fpdf::Cell(60,8, $incidencia->beneficiario);
    
        Fpdf::ln();
        
        Fpdf::SetX(13);
    
        Fpdf::Cell(35,8, "Apertura:");
    
        Fpdf::Cell(60,8, html_entity_decode($incidencia->apertura->descripcion));
    
        Fpdf::Cell(35,8, "Monto principal:");
    
        Fpdf::Cell(60,8, $incidencia->monto);
        
        Fpdf::ln();
        
        Fpdf::SetX(13);
    
        Fpdf::Cell(35,8, "MTCN:");
    
        Fpdf::Cell(60,8, html_entity_decode($incidencia->mtcn));
        
        Fpdf::Cell(35,8, "Destino:");
    
        Fpdf::Cell(60,8, $incidencia->destino);
        
        Fpdf::ln();
        
        Fpdf::SetX(13);
    
        Fpdf::Cell(35,8, html_entity_decode("Observaciones:"));
        
        Fpdf::ln();
        
        Fpdf::SetX(13);
    
        $observaciones = str_replace('<p>', '', $incidencia->observaciones);
    
        $observaciones = str_replace('</p>', '', $observaciones);
    
        Fpdf::Multicell(170,5, $observaciones);
    
        Fpdf::Ln(10);
        
        Fpdf::Rect(10, 105, 190, 50);
        
        Fpdf::Ln(4);               
    
        Fpdf::SetFont('Arial','B',11);
        
        Fpdf::SetX(13);
    
        Fpdf::Cell(35,8, "Datos del agente");
    
        Fpdf::Ln(10);
        
        Fpdf::SetX(13);
    
        Fpdf::SetFont('Arial','',10);
    
        Fpdf::Cell(35,8, html_entity_decode("Código:"));
    
        Fpdf::Cell(60,8, html_entity_decode($incidencia->agente->codigo));
        
        Fpdf::Cell(35,8, html_entity_decode("Código Postal:"));
    
        Fpdf::Cell(60,8, html_entity_decode($incidencia->agente->codigo_postal));                
    
        Fpdf::Ln();
        
        Fpdf::SetX(13);
    
        Fpdf::Cell(35,8, html_entity_decode("Razón Social:"));
    
        Fpdf::Cell(60,8, html_entity_decode($incidencia->agente->razon_social));
        
        Fpdf::Cell(35,8, html_entity_decode("Localidad:"));
    
        Fpdf::Cell(60,8, html_entity_decode($incidencia->agente->localidad->descripcion));                
    
        Fpdf::Ln();
        
        Fpdf::SetX(13);        
    
        Fpdf::Cell(35,8, "Domicilio:");
    
        Fpdf::Cell(60,8, html_entity_decode($incidencia->agente->domicilio));
        
        Fpdf::Cell(35,8, html_entity_decode("Provincia:"));
    
        Fpdf::Cell(60,8, html_entity_decode($incidencia->agente->localidad->provincia->descripcion));     
    
        Fpdf::Output();
        
        exit;        
    }
    
    public static function imprimeListadoAgente($agentes)
    {
        Fpdf::AddPage();
        
        Fpdf::Image(App::make('url')->to('/dist/img/wu-header.gif'), 10, 5, 190, 25);
    
        Fpdf::Ln(25);

        $cabecera = array('COD',html_entity_decode('RAZÓN SOCIAL'),html_entity_decode('NOMBRE FANTASIA'),'DOMICILIO', 'PROVINCIA', 'LOCALIDAD', 'ESTADO');

        Fpdf::SetFont('Arial','',12);
        Fpdf::Cell(190,8,'Listado de Agentes',1,0,'C');
        Fpdf::Ln(13);
        // Anchuras de las columnas
        $w = array(10, 35, 35, 30, 30, 30, 20);
        // Cabeceras
        Fpdf::SetFont('Arial','B',7);
        for($j=0;$j<count($cabecera);$j++)
        {
            Fpdf::Cell($w[$j],8,$cabecera[$j],1,0,'C');
        }
        Fpdf::Ln();
        // Datos
        Fpdf::SetFont('Arial','',7);
        foreach($agentes as $agente)
        {       
            Fpdf::Cell($w[0],8,$agente->codigo,1,'',"C");
            Fpdf::Cell($w[1],8,$agente->razon_social,1,'',"C");
            Fpdf::Cell($w[2],8,$agente->nombre_fantasia,1,0,'C');
            Fpdf::Cell($w[3],8,$agente->domicilio,1,0,'C');
            Fpdf::Cell($w[4],8,$agente->localidad->provincia->descripcion,1,0,'C');
            Fpdf::Cell($w[5],8,$agente->localidad->descripcion,1,0,'C');
            if($agente->estado_logico == 1)
            {
               Fpdf::Cell($w[6],8,'Habilitado', 1,0,'C'); 
            }
            else
            {
                Fpdf::Cell($w[6],8,'Deshabilitado',1,0,'C');
            }
            Fpdf::Ln();
        }

        Fpdf::Output('test','I');
    }
    
    public static function imprimeListadoIncidencias($incidencias)
    {
        Fpdf::AddPage();
        
        Fpdf::Image(App::make('url')->to('/dist/img/wu-header.gif'), 10, 5, 190, 25);
    
        Fpdf::Ln(25);

        $cabecera = array('NRO','TIPO',html_entity_decode('DESCRIPCIÓN'),'AGENTE', 'MTCN', 'FECHA RECIBIDO', 'FECHA CIERRE');

        Fpdf::SetFont('Arial','',12);
        Fpdf::Cell(190,8,'Consulta de Incidencias - '.Auth::User()->operador->nombre_apellido ,1,0,'C');
        Fpdf::Ln(13);
        // Anchuras de las columnas
        $w = array(10, 20, 45, 40, 25, 25, 25);
        // Cabeceras
        Fpdf::SetFont('Arial','B',7);
        for($j=0;$j<count($cabecera);$j++)
        {
            Fpdf::Cell($w[$j],8,$cabecera[$j],1,0,'C');
        }
        Fpdf::Ln();
        // Datos
        Fpdf::SetFont('Arial','',7);
        foreach($incidencias as $incidencia)
        {       
            Fpdf::Cell($w[0],8,$incidencia->codigo,1,'',"L");
            Fpdf::Cell($w[1],8,$incidencia->apertura->incidente->tipoIncidente->descripcion,1,'',"L");
            $current_y = Fpdf::GetY();
            $current_x = Fpdf::GetX();
            $descripcion = $incidencia->apertura->incidente->descripcion.' -'.$incidencia->apertura->descripcion;
            if (strlen($descripcion) > 35)
                Fpdf::MultiCell($w[2],4,html_entity_decode($descripcion),1,'L');
            else
                Fpdf::MultiCell($w[2],8,html_entity_decode($descripcion),1,'L');
            Fpdf::SetXY($current_x + 45, $current_y);
            $current_y = Fpdf::GetY();
            $current_x = Fpdf::GetX();
            if (strlen($incidencia->agente->nombre_fantasia) > 30)
                Fpdf::MultiCell($w[3],4,html_entity_decode($incidencia->agente->nombre_fantasia),1,'L');
            else
                Fpdf::MultiCell($w[3],8,html_entity_decode($incidencia->agente->nombre_fantasia),1,'L');
            Fpdf::SetXY($current_x + 40, $current_y);
            Fpdf::Cell($w[4],8,$incidencia->mtcn,1,0,'L');
            Fpdf::Cell($w[5],8,$incidencia->fecha_alta,1,0,'L');
            Fpdf::Cell($w[6],8,$incidencia->fecha_cierre,1,0,'L');
            Fpdf::Ln();
        }

        Fpdf::Output();
    }
    
    public static function imprimeListadoHistorico($incidencias)
    {
        Fpdf::AddPage();
        
        Fpdf::Image(App::make('url')->to('/dist/img/wu-header.gif'), 10, 5, 190, 25);
    
        Fpdf::Ln(25);

        $cabecera = array('NRO','TIPO','AGENTE',html_entity_decode('DESCRIPCIÓN'), 'MTCN', 'BENEFICIARIO', 'DESTINO', 'MONTO', 'OPERADOR');

        Fpdf::SetFont('Arial','',12);
        Fpdf::Cell(190,8,html_entity_decode('Histórico de Incidencias'),1,0,'C');
        Fpdf::Ln(13);
        // Anchuras de las columnas
        $w = array(10, 15, 30, 30, 20, 25, 25, 15, 20);
        // Cabeceras
        Fpdf::SetFont('Arial','B',7);
        for($j=0;$j<count($cabecera);$j++)
        {
            Fpdf::Cell($w[$j],8,$cabecera[$j],1,0,'C');
        }
        Fpdf::Ln();
        // Datos
        Fpdf::SetFont('Arial','',7);
        foreach($incidencias as $incidencia)
        {       
            Fpdf::Cell($w[0],8,$incidencia->codigo,1,'',"C");
            Fpdf::Cell($w[1],8,$incidencia->apertura->incidente->tipoIncidente->descripcion,1,'',"L");
            $current_y = Fpdf::GetY();
            $current_x = Fpdf::GetX();
            if (strlen($incidencia->agente->nombre_fantasia) > 30)
                Fpdf::MultiCell($w[2],4,$incidencia->agente->nombre_fantasia,1,'L');
            else
                Fpdf::MultiCell($w[2],8,$incidencia->agente->nombre_fantasia,1,'L');
            Fpdf::SetXY($current_x + 30, $current_y);
            $current_y = Fpdf::GetY();
            $current_x = Fpdf::GetX();
            $descripcion = $incidencia->apertura->incidente->descripcion.' -'.$incidencia->apertura->descripcion;
            if (strlen($descripcion) > 35)
                Fpdf::MultiCell($w[3],4,$descripcion,1,'L');
            else
                Fpdf::MultiCell($w[3],8,$descripcion,1,'L');
            Fpdf::SetXY($current_x + 30, $current_y);
            Fpdf::Cell($w[4],8,$incidencia->mtcn,1,0,'C');
            $current_y = Fpdf::GetY();
            $current_x = Fpdf::GetX();
            if (strlen($incidencia->beneficiario) > 25)
                Fpdf::MultiCell($w[5],4,$incidencia->beneficiario,1,'L');
            else
                Fpdf::MultiCell($w[5],8,$incidencia->beneficiario,1,'L');
            Fpdf::SetXY($current_x + 25, $current_y);
            $current_y = Fpdf::GetY();
            $current_x = Fpdf::GetX();
            if (strlen($incidencia->destino) > 25)
                Fpdf::MultiCell($w[6],4,$incidencia->destino,1,'L');
            else
                Fpdf::MultiCell($w[6],8,$incidencia->destino,1,'L');
            Fpdf::SetXY($current_x + 25, $current_y);
            Fpdf::Cell($w[7],8,$incidencia->monto,1,0,'C');
            $current_y = Fpdf::GetY();
            $current_x = Fpdf::GetX();
            if (strlen($incidencia->operador->nombre_apellido) > 20) {
                Fpdf::MultiCell($w[8],4,$incidencia->operador->nombre_apellido,1,'L');
                Fpdf::SetXY($current_x - 190, $current_y + 4);
            }
            else {
                Fpdf::MultiCell($w[8],8,$incidencia->operador->nombre_apellido,1,'L');
                Fpdf::SetXY($current_x - 190, $current_y);
            }
            Fpdf::Ln();
        }

        Fpdf::Output();
    }
}

?>