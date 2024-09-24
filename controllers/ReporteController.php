<?php

namespace Controllers;

use Model\ActiveRecord;
use Mpdf\HTMLParserMode;
use Mpdf\Mpdf;
use MVC\Router;

class ReporteController
{
    public static function pdf(Router $router)
    {
        $id = $_POST['deta_id'];
    
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    
        $mpdf = new Mpdf([
            "default_font_size" => "12",
            "default_font" => "arial",
            "orientation" => "P",
            "margin_top" => "30",
            "margin_bottom" => "10",
            "format" => "Letter"
        ]);
        
     
        
       
        $productos = ActiveRecord::fetchArray(" SELECT 
    DETA_ID,
    EMP_NOMBRES AS deta_empleado,
    CLIE_NOMBRES AS deta_reservacion,
    CLIE_NIT AS nit_cliente,
    HABI_TIPO AS tipo_habitacion,
    HABI_PRECIO AS deta_total,
    HABI_DESCRIPCION AS descripcion_habitacion
    FROM DETALLE_FACTURA 
    JOIN EMPLEADOS  ON DETA_EMPLEADO = EMP_ID
    JOIN  RESERVACION  ON DETA_RESERVACION = RESER_ID
    JOIN CLIENTES  ON RESER_CLIENTE = CLIE_ID
    JOIN HABITACION  ON RESER_HABITACION = HABI_ID
    WHERE DETA_ID = $id;");
    
        $html = $router->load('pdf/reporte', [
            'productos' => $productos
        ]);
    
        if (empty($html)) {
            die("No se generó contenido para el PDF.");
        }
    
        $css = file_get_contents(__DIR__ . '/../views/pdf/styles.css');
        $header = $router->load('pdf/header');
        $footer = $router->load('pdf/footer');
        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter($footer);
        $mpdf->WriteHTML($css, HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, HTMLParserMode::HTML_BODY);
    
        // Generar y mostrar el PDF
        $mpdf->Output("reporte.pdf", "I");

    }

}