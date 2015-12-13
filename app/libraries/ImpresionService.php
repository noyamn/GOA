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
}

?>