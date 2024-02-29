<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignaturas extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Model');
        $this->load->library('funciones');
        session_start();
        if (!isset($_SESSION['NRRutUsuario']) ) {
            # code...
            redirect(base_url().'Login/','refresh');
            
        }
        
    }
    

    public function index(){
        $data['getAreas']=$this->Model->Pa_BTPArea();
        $data['asignaturas'] = $this->Model->getAllAsignaturas();
        $this->load->view('Asignaturas/asignaturas',$data);
    }

      public function agregarAsignatura(){

        $MensajeError = array(
			"error" => true,
			"Mensaje" => "Error al crear la Asignatura",
		);
        $GLAsignatura = $this->input->post('GLAsignatura');
        $NRRutUsuario = $this->input->post('NRRutUsuario');
        $CDTPArea = $this->input->post('CDTPArea');
        if($GLAsignatura == '' || $NRRutUsuario =='' ){
            return $MensajeError;
        }

        $resultado = $this->Model->agregarAsignatura($GLAsignatura,$NRRutUsuario,$CDTPArea);

        return $resultado;
    }

    public function eliminarAsignatura(){

        $MensajeError = array(
			"error" => true,
			"Mensaje" => "Error al crear la Asignatura",
		);

        $IDAsignatura = $this->input->post('IDAsignatura');

        if($IDAsignatura == ''){
            return $MensajeError;
        }

        $resultado = $this->Model->eliminarAsignatura($IDAsignatura);

        $data['asignaturas'] = $this->Model->getAllAsignaturas();
        $this->load->view('Asignaturas/asignaturas',$data);
    }
    public function getAsignatura(){

        $MensajeError = array(
			"error" => true,
			"Mensaje" => "Error al crear la Asignatura",
        );
        
        $IDAsignatura = $this->input->post('IDAsignatura');

        if($IDAsignatura == ''){
            return $MensajeError;
        }
        $asignatura = $this->Model->getAsignatura($IDAsignatura);
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                            'getAsignaturas'=>$asignatura
                			))
            	);
    }
    public function actualizarAsignatura(){

        $MensajeError = array(
			"error" => true,
			"Mensaje" => "Error al crear la Asignatura",
        );

        
        $IDAsignaturaActualizar = $this->input->post('IDAsignaturaActualizar');
        $GLAsignaturaActualizar = $this->input->post('GLAsignaturaActualizar');
        $NRRutUsuario = $this->input->post('NRRutUsuario');

       
        if($IDAsignaturaActualizar == '' || $GLAsignaturaActualizar =='' || $NRRutUsuario == ''){
            return $MensajeError;
        }
        $asignatura = $this->Model->crearActualizarAsignatura($IDAsignaturaActualizar, $GLAsignaturaActualizar,$NRRutUsuario);

    }
    public function pa_MAsignatura(){   
        $IDAsignaturaActualizar = $this->input->post('IDAsignaturaActualizar');
        $GLAsignaturaActualizar = $this->input->post('GLAsignaturaActualizar');
        //echo $GLAsignaturaActualizar." glosa mas ID actualizar".$IDAsignaturaActualizar;
        //exit;
        ($this->Model->pa_MAsignatura($IDAsignaturaActualizar,$GLAsignaturaActualizar));   
    }

    

 

    public function reportePreguntasAsignatura($IDAsignatura)
    {
        $niveles=$this->Model->Pa_BNivel();
        $data['asignatura'] = $this->Model->pa_BAsignaturasPorID($IDAsignatura);
        //Pa_BCountPreguntasPorIDAsignaturas($IDAsignatura,$CDTPNivel)
        foreach($niveles as $key=>$nivel){
            $nivel->contador=count($this->Model->pa_BPreguntasPorAsignaturaPorNivelReporte($IDAsignatura,$nivel->CDTPNivel));

        }
        $data['getNivel'] = $niveles;
        $this->load->view('Asignaturas/reportePreguntasAsignatura',$data);
    }


    public function Pa_BPreguntaPorAsignatura($IDAsignatura,$CDTPNivel){
    
    $preguntas = $this->Model->pa_BPreguntasPorAsignaturaPorNivelReporte($IDAsignatura,$CDTPNivel);
    foreach($preguntas as $key=>$pregunta){
        $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPregunta($pregunta->IDPregunta);
        
    } 
    $data['listaExamen']=$preguntas;
    $html = $this->load->view('Asignaturas/preguntasAsignaturaPDF',$data, true);       
    $this->load->library('DompdfPuente');
    $dompdf = new DompdfPuente();
    $dompdf->generarPDF($html);
    }

    

}

/* End of file Controllername.php */