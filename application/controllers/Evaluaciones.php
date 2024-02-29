<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluaciones extends CI_Controller {

    
    public function __construct(){
        parent::__construct();
        $this->load->model('Model');
        $this->load->library('funciones');
        $this->load->library('DompdfPuente');
        session_start();
        if (!isset($_SESSION['NRRutUsuario']) ) {
            # code...
            redirect(base_url().'Login/','refresh');
            
        }
    }

    public function index(){
        $data=[]; 
        $Where['1']='1';
        
        $data['getAreas']=$this->Model->Pa_BTPArea();
        
        $data['getNivel']=$this->Model->Pa_BNivel();
        $data['reparticiones'] = $this->Model->getReparticiones();
        $data['getReparticiones'] = $this->Model->getReparticiones();
        $data['titulosTarifa'] = $this->Model->cargarTitulosConTarifa();
        $data['buscartodotitulos'] = $this->Model->buscarTodoTitulos();
        $examenesCalendario = $this->Model->buscarExamenCalendario();
        //echo json_encode($examenesCalendario);exit;
        if($examenesCalendario > 0){
            foreach($examenesCalendario as $key=>$examen){
                $examen->DetalleCalendarios=$this->Model->buscarCalendarioExamenesAreaAsignatura($examen->IDCalendario);
            }
        }
        $data['buscarExamenCalendario']=$examenesCalendario;
        $this->load->view('Evaluaciones/titulosFecha',$data);        
        
    }

    function generarExamenConAsignaturasEdumar(){
     
        $IDCalendario = $this->input->post('IDCalendario');
        $data[] = [];      
            $asignaturas=$this->Model->buscarCalendarioExamenesAreaAsignatura($IDCalendario);
            // echo json_encode($asignaturas); exit;
            
            foreach( $asignaturas as $key=>$asignatura){                
                $asignatura->Reparticiones=$this->Model->buscarCalendarioExamenesReparticion($IDCalendario, $asignatura->IDAsignatura);
                //$data['reparticiones'] = $this->Model->buscarCalendarioExamenesReparticion($asignatura->IDTitulo, $asignatura->IDAsignatura);
                //$asignatura->Preguntas=$this->Model->PA_BPreguntasPorTitulo($calendario->IDTitulo,$cantidadPreguntas);
            }
        $data["asignaturas"]=$asignaturas;
        $data['getNivel']=$this->Model->Pa_BNivel();
        $this->load->view('Evaluaciones/vistaExamen',$data);
    }
    public function examensinAgendaPrevia(){
        $data['getReparticiones'] = $this->Model->getReparticiones();
        $data['titulos'] = $this->Model->buscarTodoTitulos();      
        $this->load->view('Evaluaciones/examensinagendaprevia',$data);        
    }
    public function examensinrequisitos(){
        $data=[];
        $Where['1']='1';
        
        $data['getAreas']=$this->Model->Pa_BTPArea();
        
        $data['getNivel']=$this->Model->Pa_BNivel();
        $data['reparticiones'] = $this->Model->getReparticiones();
        $data['getReparticiones'] = $this->Model->getReparticiones();
        $data['titulosTarifa'] = $this->Model->cargarTitulosConTarifa();
        $data['buscartodotitulos'] = $this->Model->buscarTodoTitulos();
        $data['buscarExamenCalendario'] = $this->Model->buscarExamenCalendario();
        $data['listaExamenes'] = $this->Model->listaExamenes();
        $this->load->view('Evaluaciones/examensinrequisitos',$data);        
    }
    
    public function buscarExamenCalendarioID(){

        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Error al buscar los titulos ",
        );

        $IDTitulo=$this->input->post('IDTitulo');
        $data['IDTitulo'] =  $IDTitulo;
        if ($IDTitulo == '') {return $MensajeError;}
        $data['buscarCalendarioExamenesAreaAsignatura'] = $this->Model->buscarCalendarioExamenesAreaAsignatura($IDTitulo);
        $this->load->view('Evaluaciones/asignaturaTitulo',$data); 
    }
    public function buscarExamenCalendarioID1($IDTitulo){

        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Error al buscar los titulos ",
        );

        $IDTitulo=$this->input->post('IDTitulo');
        $data['IDTitulo'] =  $IDTitulo;
        if ($IDTitulo == '') {return $MensajeError;}
        $data['buscarCalendarioExamenesAreaAsignatura'] = $this->Model->buscarCalendarioExamenesAreaAsignatura($IDTitulo);
        $this->load->view('Evaluaciones/asignaturaTitulo',$data); 
    }

    public function evaluaciones(){

        $data=[];
        $Where['1']='1';
        
        $data['getAreas']=$this->Model->Pa_BTPArea();
        
        $data['getNivel']=$this->Model->Pa_BNivel();
        $data['reparticiones'] = $this->Model->getReparticiones();
        $data['getReparticiones'] = $this->Model->getReparticiones();
        $data['titulosTarifa'] = $this->Model->cargarTitulosConTarifa();
        $data['buscartodotitulos'] = $this->Model->buscarTodoTitulos();
        $data['buscarExamenCalendario'] = $this->Model->buscarExamenCalendario();
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Error al buscar los titulos ",
        );

        $IDTitulo=$this->input->post('IDTitulo');
        $IDAsignatura=$this->input->post('IDAsignatura');
        $IDDetalleCalendario=$this->input->post('IDDetalleCalendario');
        $data['IDTitulo'] = $IDTitulo;
        $data['IDAsignatura'] = $IDAsignatura;
        $data['IDDetalleCalendario'] = $IDDetalleCalendario;
        if ($IDTitulo == '' || $IDDetalleCalendario == '') {return $MensajeError;}
        $data['examenhoraCalendario'] = $this->Model->buscarDatoCalendario($IDDetalleCalendario);
        $data['examenhoraTituloArea'] = $this->Model->buscarDatoTituloArea($IDTitulo);
        if( $IDAsignatura == 0 ){
            $data['examenhoraSinAsignatura'] = $this->Model->buscarSinAsignatura($IDTitulo);
        }else{
            $data['examenhoraAsignatura'] = $this->Model->buscarAsignatura($IDAsignatura);
        }
        
        
        $this->load->view('Evaluaciones/evaluaciones',$data);
    }

    public function buscarCalendarioExamenesReparticion(){

        $IDTitulo=$this->input->post('IDTitulo');
        $IDAsignatura=$this->input->post('IDAsignatura');
        $data['IDTitulo'] = $IDTitulo;
        $data['IDAsignatura'] = $IDAsignatura;
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Error al buscar los titulos ",
        );
        if ($IDTitulo == '' || $IDAsignatura =='') {return $MensajeError;}
        $data['buscarCalendarioExamenesReparticion'] = $this->Model->buscarCalendarioExamenesReparticion($IDTitulo,$IDAsignatura);
        $this->load->view('Evaluaciones/asignaturaReparticion',$data);
    }

    public function generarExamenPDF() {
        ini_set('memory_limit', '2048M');
		ini_set('max_execute_time', '0');
		ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
		ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); // Setting to 512M - for pdo_sqlsrv
        $IDFormatoExamen = $this->input->post('IDFormatoExamen');
        $NMTitulo = $this->input->post('NMTitulo');
        //echo $IDFormatoExamen."efsff";exit;
        $preguntas = $this->Model->verExamen($IDFormatoExamen);
        //echo json_encode($preguntas);exit;
        foreach($preguntas as $key=>$pregunta){
            $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPreguntaFormatoExamen($pregunta->IDFormatoExamenPregunta);
            $pregunta->Asignaturas = $this->Model->Pa_BAsignaturasPorIDPregunta($pregunta->IDPregunta);
        }    
        $data['listaExamen']=$preguntas;
        //echo json_encode($preguntas);exit;
        $data['NMTitulo']=$NMTitulo;
        $html = $this->load->view('Evaluaciones/examenPDF',$data, true);  
        //echo $html;exit;
        $this->load->library('DompdfPuente');
        $dompdf = new DompdfPuente();
        $dompdf->generarPDF($html);
    }




    public function generarExamenPDF1() {

        ini_set('memory_limit', '2048M');
		ini_set('max_execute_time', '0');
		ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
		ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); // Setting to 512M - for pdo_sqlsrv
        $IDFormatoExamen = $this->input->post('IDFormatoExamen');
        $NMTitulo = $this->input->post('NMTitulo');
        //echo $NMTitulo."efsff";exit;
 
        
        $preguntas = $this->Model->verExamen(222);

        //echo json_encode($preguntas);exit;
        foreach($preguntas as $key=>$pregunta){
            $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPreguntaFormatoExamen($pregunta->IDFormatoExamenPregunta);
            $pregunta->Asignaturas = $this->Model->Pa_BAsignaturasPorIDPregunta($pregunta->IDPregunta);
        }    
        $data['listaExamen']=$preguntas;

        echo var_dump(($preguntas[9]->GLPregunta));
    }

    public function generarHojaRespuesta() {
        $IDFormatoExamen = $this->input->post('IDFormatoExamen');
        $NMTitulo = $this->input->post('NMTitulo');
        //echo $NMTitulo."efsff";exit;

        
        $preguntas = $this->Model->verExamen($IDFormatoExamen);
        foreach($preguntas as $key=>$pregunta){
            $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPreguntaFormatoExamen($pregunta->IDFormatoExamenPregunta);
            //$pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPregunta($pregunta->IDPregunta);
            $pregunta->Asignaturas = $this->Model->Pa_BAsignaturasPorIDPregunta($pregunta->IDPregunta);
        }    
        $data['listaExamen']=$preguntas;
        $data['NMTitulo']=$NMTitulo;

       
        $html = $this->load->view('Evaluaciones/generarHojaRespuesta',$data, true);       
        $this->load->library('DompdfPuente');
        $dompdf = new DompdfPuente();
        $dompdf->generarPDF($html);
    }

    public function generarPautaCorreccion() {
        $IDFormatoExamen = $this->input->post('IDFormatoExamen');
        $NMTitulo = $this->input->post('NMTitulo');
        //echo $NMTitulo."efsff";exit;

        
        $preguntas = $this->Model->verExamen($IDFormatoExamen);
        foreach($preguntas as $key=>$pregunta){
            //$pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPregunta($pregunta->IDPregunta);
            $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPreguntaFormatoExamen($pregunta->IDFormatoExamenPregunta);
            //$pregunta->Asignaturas = $this->Model->Pa_BAsignaturasPorIDPregunta($pregunta->IDPregunta);
        }    
        $data['listaExamen']=$preguntas;
        $data['NMTitulo']=$NMTitulo;

        
        $html = $this->load->view('Evaluaciones/pautacorreccion',$data, true);   
            
        $this->load->library('DompdfPuente');
        $dompdf = new DompdfPuente();
        $dompdf->generarPDF($html);
    }
    public function generarPautaCorreccionDesarrollo1() {
        //maxiflo
        ini_set('memory_limit', '2048M');
		ini_set('max_execute_time', '0');
		ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
		ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); // Setting to 512M - for pdo_sqlsrv

        $IDFormatoExamen = $this->input->post('IDFormatoExamen');
        $NMTitulo = $this->input->post('NMTitulo');
        //echo $NMTitulo."efsff";exit;

        
        $preguntas = $this->Model->verExamen($IDFormatoExamen);
        foreach($preguntas as $key=>$pregunta){
            //$pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPregunta($pregunta->IDPregunta);
            $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPreguntaFormatoExamen($pregunta->IDFormatoExamenPregunta);
            //$pregunta->Asignaturas = $this->Model->Pa_BAsignaturasPorIDPregunta($pregunta->IDPregunta);
        }    
        $data['listaExamen']=$preguntas;
        $data['NMTitulo']=$NMTitulo;

        
        $html = $this->load->view('Evaluaciones/pautacorrecciondesarrollo',$data, true);       
        $this->load->library('DompdfPuente');
        $dompdf = new DompdfPuente();
        $dompdf->generarPDF($html);
    }
    public function eliminarExamen() {
        //maxiflopablo
        $IDFormatoExamen = $this->input->post('IDFormatoExamen');
        $this->Model->eliminarExamen($IDFormatoExamen);
        $this->listaExamenes();     
       
    }
    public function generarPautaCorreccionDesarrollo() {
        //maxiflo
        ini_set('memory_limit', '2048M');
		ini_set('max_execute_time', '0');
		ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
		ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); // Setting to 512M - for pdo_sqlsrv
        header("Content-type: text/css; charset: UTF-8");

        $IDFormatoExamen = $this->input->post('IDFormatoExamen');
        $NMTitulo = $this->input->post('NMTitulo');
        //echo $NMTitulo."efsff";exit;

        
        $respuestas = $this->Model->pautaCorreccionDesarrollo($IDFormatoExamen);
        // foreach($preguntas as $key=>$pregunta){
        //     //$pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPregunta($pregunta->IDPregunta);
        //     $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPreguntaFormatoExamen($pregunta->IDFormatoExamenPregunta);
        //     //$pregunta->Asignaturas = $this->Model->Pa_BAsignaturasPorIDPregunta($pregunta->IDPregunta);
        // }    
        // echo var_dump (str_replace("&nbsp",' ',str_replace(chr( 194 ) . chr( 160 ), ' ',(preg_replace("/[\r\n|\n|\r|\t]+/",'',str_replace("\n\n\n\t\n\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t",' . ',$respuestas[1]->GLRespuesta))))));
        $data['listaExamen']=$respuestas;
        $data['NMTitulo']=$NMTitulo;

        
        $html = $this->load->view('Evaluaciones/pautacorrecciondesarrollo',$data, true);    
        //echo $html;   
         $this->load->library('DompdfPuente');
         $dompdf = new DompdfPuente();
         $dompdf->generarPDF($html);
    }
    public function generarPautaCorreccion1() {
        $IDFormatoExamen = $this->input->post('IDFormatoExamen');
        $NMTitulo = $this->input->post('NMTitulo');
        //echo $NMTitulo."efsff";exit;

        
        $preguntas = $this->Model->verExamen($IDFormatoExamen);
        foreach($preguntas as $key=>$pregunta){
            //$pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPregunta($pregunta->IDPregunta);
            $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPreguntaFormatoExamen($pregunta->IDFormatoExamenPregunta);
            //$pregunta->Asignaturas = $this->Model->Pa_BAsignaturasPorIDPregunta($pregunta->IDPregunta);
        }    
        $data['listaExamen']=$preguntas;
        $data['NMTitulo']=$NMTitulo;

        
        $this->load->view('Evaluaciones/getPreguntasIDFormatoExamen',$data);      
            
       
    }

    public function SetPreguntaPDF(){

        $IDFormatoExamen = $this->input->post('IDFormatoExamen');
        $NMTitulo = $this->uri->segment(3);
        $preguntas = $this->Model->verExamen($IDFormatoExamen);
        foreach($preguntas as $key=>$pregunta){
            $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPregunta($pregunta->IDPregunta);
        }    
        $this->load->library('fpdf');
        $this->load->library('PDF_MC_Table');
        $this->pdf = new PDF_MC_Table();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        $this->pdf->SetAutoPageBreak(true, 0);
        $this->pdf->SetTitle(utf8_decode("Sieval Preguntas."));
        $this->pdf->SetFillColor(224,236,255);
        $hei=8;
        $DS = DIRECTORY_SEPARATOR;
        //$this->pdf->Image(base_url().'assets/img/logo_tecmar_azul.png',10, 7, 80,20,'PNG');
        //$this->pdf->Image(base_url().'assets/img/logo_tecmar_azul.png',10, 7, 80,20,'JPG');


        $this->pdf->Ln('25');
        $this->pdf->SetTextColor(69, 69, 69);

        $this->pdf->SetFont('Arial', 'B', 16);
        $this->pdf->Cell(0,$hei,utf8_decode('EXAMEN S I E V A L'),1, 1 , 'C',false);
        //$this->pdf->Write(0,$hei,utf8_decode('titulo: .'.str_replace('%','',$NMTitulo),1, 1 , 'C',false);
        $this->pdf->Ln('8');
        $this->pdf->Write(4,utf8_decode('Titulo: '.str_replace('%','',str_replace('20',' ',$NMTitulo))),0, 1 , 'L',false);
        $this->pdf->Ln('10');
      
        //echo json_encode($preguntas);
        $this->pdf->SetFont('Arial', '', 12);
        $this->pdf->Write(4,'Nombre:__________________________________________________',0,1,'L',false);
        $this->pdf->Ln('5');
        $this->pdf->Write(4,'Nota:____________________________________________________',0,1,'L',false);
        $this->pdf->Ln('5');
        $this->pdf->Write(4,'Firma:___________________________________________________',0,1,'L',false);
        $this->pdf->Ln('10');
        foreach ($preguntas as $key=>$pregunta) {
            $this->pdf->SetFont('Arial', 'B', 12);
            $this->pdf->Write(4,utf8_decode(''.($key+1).') '.str_replace("'\'","",str_replace("&oacute;","",str_replace("&nbsp;","",strip_tags($pregunta->GLPregunta))))),0, 1 , 'L',false);
            //$this->pdf->Ln('2');
            foreach ($pregunta->Respuestas as $key=>$respuesta) {
                $this->pdf->SetFont('Arial', '', 12);
                //$this->pdf->Ln('5');
                $this->pdf->Write(6,utf8_decode(str_replace("'\'","",str_replace("&oacute;","",str_replace("&nbsp;","",strip_tags($respuesta->GLRespuesta))))),0, 1 , 'L',false);
                $this->pdf->Ln('7');
            }
        }
        
        //bloque que pone el numero de pie de pagina
        $this->pdf->SetY(-10);
        $this->pdf->SetFont('Arial','I',8);
        $this->pdf->Cell(0,10,utf8_decode('página ').$this->pdf->PageNo().'/{nb}',0,0,'C');

        $this->pdf->Output("InformeControlAcceso.pdf",'i');
    
    }

    public function bPreguntasPorAsignaturaPorNivel(){
        //$result=$this->input->post('ObjParam');
        ini_set('memory_limit', '2048M');
        ini_set('max_execute_time', '0');
        ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
        ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); // Setting to 512M - for pdo_sqlsrv
        $IDAsignatura=$this->input->post('result');
        $nivel=$this->input->post('nivel');
        $preguntas = $this->Model->bPreguntasPorAsignaturaPorNivel($IDAsignatura,$nivel);
        $this->load->view("Evaluaciones/examen",$preguntas);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array(
            'preguntas'=>$preguntas
            ))
        );
        //$this->vistaPreviaActivaciontest($preguntas);
    }

    public function getPreguntasExamen(){
        //$result=$this->input->post('ObjParam');
        ini_set('memory_limit', '2048M');
        ini_set('max_execute_time', '0');
        ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
        ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); // Setting to 512M - for pdo_sqlsrv
        $result=$this->input->post('result');
        $nivel=$this->input->post('nivel');

        $Resultado=implode(',',$result);
        $resultadoPreguntasExamen ="'".$Resultado."'";
        $preguntas = $this->Model->getPreguntasExamen($resultadoPreguntasExamen,$nivel);
        $this->load->view("Evaluaciones/examen",$preguntas);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array(
            'preguntas'=>$preguntas
            ))
        );
        //$this->vistaPreviaActivaciontest($preguntas);
    }
    public function getPreguntasExamen2(){
        //$result=$this->input->post('ObjParam');
        ini_set('memory_limit', '2048M');
        ini_set('max_execute_time', '0');
        ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
        ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); // Setting to 512M - for pdo_sqlsrv
        $result=$this->input->post('result');
        $nivel=$this->input->post('nivel');

        // $Resultado=implode(',',$result);
        // $resultadoPreguntasExamen ="'".$Resultado."'";
        $preguntas = $this->Model->getPreguntasExamen2($result,$nivel);
        $this->load->view("Evaluaciones/examen",$preguntas);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array(
            'preguntas'=>$preguntas
            ))
        );
        //$this->vistaPreviaActivaciontest($preguntas);
    }
    public function pa_BPreguntasPorAsignaturaPorNivel($IDAsignatura,$nivel){
        //$result=$this->input->post('ObjParam');
        ini_set('memory_limit', '2048M');
        ini_set('max_execute_time', '0');
        ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
        ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); // Setting to 512M - for pdo_sqlsrv
        

       
        $preguntas = $this->Model->pa_BPreguntasPorAsignaturaPorNivel($IDAsignatura,$nivel);
        
        echo json_encode($preguntas);
        //$data["preguntas"]=$preguntas;
        //$this->load->view('Evaluaciones/selectPreguntas',$data);
        //$this->vistaPreviaActivaciontest($preguntas);
    }
    function panelPreguntasSeleccionadas(){
        $prueba = $this->input->post("prueba");
        //echo json_encode($prueba);
        $data["prueba"]=$prueba;
        $this->load->view('Evaluaciones/panelPreguntasSeleccionadas',$data);
    
    }

    public function asignaturasPorTitulo(){
       
           $getAsignaturas=$this->Model->asignaturasportitulo($this->input->post('IDTitulo'));

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                            'getAsignaturas'=>$getAsignaturas
                            ))
                );
    }
    public function getAsignaturas(){
        $IdArea='';
        if($this->input->post('IdArea')){
            $IdArea=$this->input->post('IdArea');
        }
        
        $getAsignaturas=$this->Model->getAsignaturas($IdArea);

        //echo $getAsignaturas." asignaturas";
        //exit;
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                            'getAsignaturas'=>$getAsignaturas
                            ))
                );
    }
    
    public function getTitulosporArea(){

        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Error al buscar los titulos ",
        );
        
        $IdArea2='';
        if($this->input->post('IdArea2')){
            $IdArea2=$this->input->post('IdArea2');
        }
        
        //$CDTPArea = $this->input->post('CDTPArea');
        if ($IdArea2 == '') {return $MensajeError;}
        $getTitulosporArea = $this->Model->getTitulosporArea($IdArea2);
        if(isset($getTitulosporArea)){
            if($getTitulosporArea['success']==1){
               $getTitulosporArea=$getTitulosporArea['Result'];
            }
        }
        
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                            'getTitulosporArea'=>$getTitulosporArea 
                            ))
                );
    }

    //pablo esto debes modifica
    public function crearExamen(){
        //$preguntasOrdenadas = $this->input->post('preguntasOrdenadas');

        //var_dump($preguntasOrdenadas);exit;
        /*primer inser */
        $puntajeTotalGlobal = $this->input->post('puntajeTotalGlobal');
        $NRDuracionminuto =$this->input->post('NRDuracionminuto');
        $LGBorrador =$this->input->post('LGBorrador');
        $FCIngreso  =$this->input->post('FCIngreso');
        $NRRutUsuario =$this->input->post('NRRutUsuario');
        /*primer inser */

        /*segundo inser */
        $CDReparticion = $this->input->post('CDReparticion');
        $IDTitulo = $this->input->post('IDTitulo');

        //tercer insert
        $IDAsignatura = $this->input->post('IDAsignatura');
      
        $idPreguntas =$this->input->post('idPreguntas'); //ok
        //echo json_encode($idPreguntas);exit;
        $prema = $this->input->post('prema');

        $preguntasOrdenadas = $this->input->post('preguntasOrdenadas');

        //echo json_encode($preguntasOrdenadas)."respuesta con los datos del examen ";exit;

        $this->Model->crearExamen($prema,$NRDuracionminuto,$LGBorrador,$FCIngreso,$NRRutUsuario,$puntajeTotalGlobal,$idPreguntas,$CDReparticion,$IDTitulo,$IDAsignatura,$preguntasOrdenadas);
}

    public function crearExamenEdumar1(){
        /*primer inser */
        $IDDetalleCalendario = $this->input->post('IDDetalleCalendario');
        $puntajeTotalGlobal = $this->input->post('puntajeTotalGlobal');
        $NRDuracionminuto =$this->input->post('NRDuracionminuto');
        $LGBorrador =$this->input->post('LGBorrador');
        $FCIngreso  =$this->input->post('FCIngreso');
        $NRRutUsuario =$this->input->post('NRRutUsuario');

        $IDAsignatura = $this->input->post('IDAsignatura');
        $idPreguntas =$this->input->post('idPreguntas');
        $prema = $this->input->post('prema');

        
        $idFormatoExamen =$this->Model->Pa_IFormatoExamenCreacion($NRDuracionminuto,$LGBorrador,$NRRutUsuario);
        $this->Model->Pa_IDetalleFormatoCalendarioCreacion($IDDetalleCalendario,$NRRutUsuario,$idFormatoExamen);
        //se recorren las preguntas
        $preguntas =array();
        foreach($preguntas as $key=>$pregunta){
            $this->Model->Pa_IFormatoExamenPreguntaCreacion($puntajeTotalGlobal,$pregunta->IDPregunta,$NRRutUsuario);
        }
       

        $resultadoUno = $this->Model->crearExamenEdumar($prema,$NRDuracionminuto,$LGBorrador,$FCIngreso,$NRRutUsuario,$puntajeTotalGlobal,$idPreguntas,$IDAsignatura,$IDDetalleCalendario);

        return $resultadoUno;
}
public function crearExamenEdumar(){
    /*primer inser */
    $IDDetalleCalendario = $this->input->post('IDDetalleCalendario');
    $puntajeTotalGlobal = $this->input->post('puntajeTotalGlobal');
    $NRDuracionminuto =$this->input->post('NRDuracionminuto');
    $LGBorrador =$this->input->post('LGBorrador');
    $FCIngreso  =$this->input->post('FCIngreso');
    $NRRutUsuario =$this->input->post('NRRutUsuario');
   // echo json_encode($IDDetalleCalendario); exit;
    
    $idPreguntas =$this->input->post('idPreguntas');
    
    $prema = $this->input->post('prema');

    $preguntasOrdenadas = $this->input->post('preguntasOrdenadas');

    //echo var_dump($preguntasOrdenadas); exit;exit;exit;
    $resultadoUno = $this->Model->crearExamenEdumar(
        $prema,
        
        $NRDuracionminuto,
        $LGBorrador,
        $NRRutUsuario,
        $puntajeTotalGlobal
        ,$idPreguntas,$IDDetalleCalendario,$preguntasOrdenadas);
    echo json_encode($_POST);
   
}
    public function crearExamenEdumarSinAsignatura(){
        /*primer inser */
        $IDDetalleCalendario = $this->input->post('IDDetalleCalendario');
        $puntajeTotalGlobal = $this->input->post('puntajeTotalGlobal');
        $NRDuracionminuto =$this->input->post('NRDuracionminuto');
        $LGBorrador =$this->input->post('LGBorrador');
        $FCIngreso  =$this->input->post('FCIngreso');
        $NRRutUsuario =$this->input->post('NRRutUsuario');

        $IDAsignatura = $this->input->post('IDAsignatura');
        $idPreguntas =$this->input->post('idPreguntas');
        $prema = $this->input->post('prema');
        $resultadoUno = $this->Model->crearExamenEdumarSinAsignatura($prema,$NRDuracionminuto,$LGBorrador,$FCIngreso,$NRRutUsuario,$puntajeTotalGlobal,$idPreguntas,$IDAsignatura,$IDDetalleCalendario);

        return $resultadoUno;
}


    public function listaExamenes(){
        # code...
        $data['listaExamenes'] = $this->Model->listaExamenes();
        if($data['listaExamenes'] !=0){
            $this->load->view('Evaluaciones/reporteExamenes',$data);
        }
        //$this->load->view('Evaluaciones/error');
    }

    public function verExamen()
    {
        # code...
        $IDFormatoExamen = $this->input->post('IDFormatoExamen');
        if ($IDFormatoExamen != '') {
            $preguntas = $this->Model->verExamen($IDFormatoExamen);
            foreach($preguntas as $key=>$pregunta){
                $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPreguntaFormatoExamen($pregunta->IDFormatoExamenPregunta);
            }


             $data['listaExamen']=$preguntas;
            $this->load->view('Evaluaciones/examen',$data);
        }else{
            return 0;
        }
        
    }

    public function vistaExamen(){
        # code...
        $this->load->view('Evaluaciones/vistaExamen');
    }

    function titulo(){
        $asignaturas=$this->Model->buscarCalendarioExamenesAreaAsignatura(41);
        //echo json_encode($asignaturas);
        foreach( $asignaturas as $key=>$asignatura){                
            $asignatura->Reparticiones=$this->Model->buscarCalendarioExamenesReparticion(41, $asignatura->IDAsignatura);
            
            $data['reparticiones'] = $this->Model->buscarCalendarioExamenesReparticion(41, $asignatura->IDAsignatura);
            //$asignatura->Preguntas=$this->Model->PA_BPreguntasPorTitulo($calendario->IDTitulo,$cantidadPreguntas);
        }
    //}
    echo json_encode($asignaturas);
    }
    


    function buscarCalendarioExamenesReparticion1(){
        $asignaturas=$this->Model->buscarCalendarioExamenesReparticion(64, 0);
        echo json_encode($asignaturas);

    }
    
    public function examenconfigurable($IDTitulo)
    {
        $cantidadPreguntas="";

        $data[] = [];
        
        

        
            $asignaturas=$this->Model->buscarCalendarioExamenesAreaAsignatura($IDTitulo);
            $data['sinAsignatura'] = $this->Model->pa_BAsignaturaporTitulo($IDTitulo);
            $idsAsignaturas=array();
            foreach ($this->Model->pa_BAsignaturaporTitulo($IDTitulo) as $key=>$asignatura){
                array_push($idsAsignaturas,$asignatura->IDAsignatura);
            }

            foreach( $asignaturas as $key=>$asignatura){                
                $asignatura->Reparticiones=$this->Model->buscarCalendarioExamenesReparticion($IDTitulo, $asignatura->IDAsignatura);
                
                $this->Model->buscarCalendarioExamenesReparticion($IDTitulo, $asignatura->IDAsignatura);
                
            }
            
        //}
  
        $data["IDTitulo"]=$IDTitulo;
        $data["Titulo"]=$this->Model->PA_BTitulosPorID($IDTitulo);
        $data["asignaturas"]=$asignaturas;
        $data["idsAsignaturas"]=$idsAsignaturas;
        $data['getNivel']=$this->Model->Pa_BNivel();
        //echo json_encode($asignaturas);
        $this->load->view('Evaluaciones/ExamenConfigurable',$data);
    }
    //
    public function sinAsignatura($IDTitulo)
    {
        
      //  echo $IDTitulo." titulo 1";
      //  echo '<br>';
            $asignaturas=$this->Model->buscarCalendarioExamenesAreaAsignatura($IDTitulo);
           // echo $asignaturas." asignaturas 2";
           // echo '<br>';
           if($asignaturas==0){
            $asignaturas=$this->Model->pa_BAsignaturaporTitulo($IDTitulo);
           }

            //$asignaturas2 = $this->Model->pa_BAsignaturaporTitulo($IDTitulo);
           // $sinAsignatura = 
            $data['sinAsignatura'] = $asignaturas;

            $idsAsignaturas=array();

            foreach ($this->Model->pa_BAsignaturaporTitulo($IDTitulo) as $key=>$asignatura){
                array_push($idsAsignaturas,$asignatura->IDAsignatura);
            }

             json_encode($idsAsignaturas)." Ids asignaturas 3";
                
            
            foreach(  $asignaturas as $key=>$asignatura){                       
                //el 0 va porque es sin asignatura      
                $asignatura->Reparticiones=$this->Model->buscarCalendarioExamenesReparticion($IDTitulo, 0);
                //$this->Model->buscarCalendarioExamenesReparticion($IDTitulo, $asignatura->IDAsignatura);   
            } 
          // echo json_encode($asignaturas);exit;


        //}
        $reparticiones = array();
        $data["IDTitulo"]=$IDTitulo;
        $data["Titulo"]=$this->Model->PA_BTitulosPorID($IDTitulo);
        $data["asignaturas"]=$asignaturas;
        $data["idsAsignaturas"]=$idsAsignaturas;
        $data['getNivel']=$this->Model->Pa_BNivel();
        $this->load->view('Evaluaciones/sinAsignatura',$data);
    }
    public function prueba()
    {
       echo json_encode( $this->Model->buscarCalendarioExamenesReparticion(72, 0));
    }

    // public function generarHojaRespuesta() {
    //     $IDFormatoExamen = $this->input->post('IDFormatoExamen');
    //     $NMTitulo = $this->input->post('NMTitulo');
    //     //echo $NMTitulo."efsff";exit;

        
    //     $preguntas = $this->Model->verExamen($IDFormatoExamen);
    //     foreach($preguntas as $key=>$pregunta){
    //         $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPregunta($pregunta->IDPregunta);
    //         $pregunta->Asignaturas = $this->Model->Pa_BAsignaturasPorIDPregunta($pregunta->IDPregunta);
    //     }    
    //     $data['listaExamen']=$preguntas;
    //     $data['NMTitulo']=$NMTitulo;

       
    //     $html = $this->load->view('Evaluaciones/generarHojaRespuesta',$data, true);       
    //     $this->load->library('DompdfPuente');
    //     $dompdf = new DompdfPuente();
    //     $dompdf->generarPDF($html);
    // }

    // public function generarPautaCorreccion() {
    //     $IDFormatoExamen = $this->input->post('IDFormatoExamen');
    //     $NMTitulo = $this->input->post('NMTitulo');
    //     //echo $NMTitulo."efsff";exit;

        
    //     $preguntas = $this->Model->verExamen($IDFormatoExamen);
    //     foreach($preguntas as $key=>$pregunta){
    //         $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPregunta($pregunta->IDPregunta);
    //         $pregunta->Asignaturas = $this->Model->Pa_BAsignaturasPorIDPregunta($pregunta->IDPregunta);
    //     }    
    //     $data['listaExamen']=$preguntas;
    //     $data['NMTitulo']=$NMTitulo;

       
    //     $html = $this->load->view('Evaluaciones/pautacorreccion',$data, true);       
    //     $this->load->library('DompdfPuente');
    //     $dompdf = new DompdfPuente();
    //     $dompdf->generarPDF($html);
    // }
    
    
}

/* End of file Evaluaciones.php */