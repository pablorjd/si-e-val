

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estadisticas extends CI_Controller {


    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->library('funciones');
        $this->load->library('DompdfPuente');
        session_start();
        //Do your magic here
        if (!isset($_SESSION['NRRutUsuario']) ) {
            # code...
            redirect(base_url().'Login/','refresh');
            
        }
    }
    public function ejemplo(){
        $this->load->view('Estadisticas/ejemplo');//,$data);  
        
    }


    public function getAsignaturas(){
		$IdArea='';
		if($this->input->post('IdArea')){
			$IdArea=$this->input->post('IdArea');
		}
		$getAsignaturas=$this->Model->getAsignaturas($IdArea);
		$this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
							'getAsignaturas'=>$getAsignaturas,
                			))
            	);
    }
     
    public function index()
    {   
        //$data = array('totalPreguntas' => $this->Model->totalPreguntas());
            //$result=$this->input->post('ObjParam');
        ini_set('memory_limit', '2048M');
        ini_set('max_execute_time', '0');
        ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M            ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); // Setting to 512M - for pdo_sqlsrv
        $data['totalPreguntas'] = json_encode($this->Model->totalPreguntas());
        //$data = array('totalPreguntas' => $this->Model->totalPreguntas());
        $this->load->view('Estadisticas/estadisticas');//,$data);  
    }

    public function totalPreguntas(){ 
        ini_set('memory_limit', '2048M');
        ini_set('max_execute_time', '0');
        ini_set('sqlsrv.ClientBufferMaxKBSize','524288');   
		$totalPreguntas=$this->Model->totalPreguntas();
		$this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
							'totalPreguntas'=>$totalPreguntas,
                			))
            	);
    }

    public function Asignaturacount(){ 
        ini_set('memory_limit', '2048M');
        ini_set('max_execute_time', '0');
        ini_set('sqlsrv.ClientBufferMaxKBSize','524288');   
		$Asignaturacount=$this->Model->Asignaturacount();
		$this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
							'Asignaturacount'=>$Asignaturacount,
                			))
            	);
    }
}

/* End of file Controllername.php */
