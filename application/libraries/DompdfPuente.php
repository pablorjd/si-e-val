<?php
use Dompdf\Dompdf;
use Dompdf\Options;
require_once 'dompdf/autoload.inc.php';
class DompdfPuente {
    public function __construct() {
        
         $this->CI=&get_instance();
 
    }
    
    public function Dompdf(){       
         
        $dompdf = new Dompdf();
        // Load content from html file
        
        $html = file_get_contents("http://localhost/pabloj/sieval/application/libraries/pablo/pdf-content.php");
        $dompdf->loadHtml($html);
       
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $dompdf->stream("codexworld",array("Attachment"=>0));

    }
    public function descargarPDF($html) {
        $dompdf = new Dompdf();
        // Load content from html file
        
         //$html = file_get_contents("http://localhost/DOMPDF/pdf-content.php");
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();
        $nombreArchivo="Emergencias SAR reporte ".date("d/m/y");
        $fecha=date('d-m-Y');
        // Output the generated PDF (1 = download and 0 = preview)
        $dompdf->stream("Emergencias SAR reporte ".$fecha ,array("Attachment"=>0));
    }

    public function vistaPreviaActivacion() {
        $dompdf = new Dompdf();
        // Load content from html file   $html    
         
        $html = file_get_contents("http://localhost/pabloj/sieval/application/views/Evaluaciones/examen.php");
       
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        $nombreArchivo="Examen SIEVAL ".date("d/m/y");
        $fecha=date('d-m-Y');
        // Output the generated PDF (1 = download and 0 = preview)
        $dompdf->stream("Examen SIEVAL ".$fecha ,array("Attachment"=>0));
    }
    public function generarPDF($html) {
        $dompdf = new Dompdf(array('isPhpEnabled' => true,'isRemoteEnabled'=>true,'isHtml5ParserEnabled'=> true,'isJavascriptEnabled'=>true));
        $option = new Options();
        // Load content from html file   $html    
        // $dompdf->set_option('isRemoteEnabled',true);
        // $dompdf->setOptions('isRemoteEnabled',true);
        // $dompdf->setOptions('isPhpEnabled',true);
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('letter', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        $dompdf->output(['isRemoteEnabled' => true]);
        $nombreArchivo="Examen SIEVAL ".date("d/m/y");
        $fecha=date('d-m-Y');
        // Output the generated PDF (1 = download and 0 = preview)
        $dompdf->stream("Examen SIEVAL ".$fecha ,array("Attachment"=>0));
    }
    
}


?>