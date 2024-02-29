<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	public function __construct (){
		parent::__construct ();
		$this->load->model('Model');
        $this->load->library('funciones');
        session_start();
       // echo json_encode($_SESSION);
        if (!isset($_SESSION['NRRutUsuario']) ) {
            # code...
            redirect(base_url().'Login/','refresh');
            
        }

        // if (!isset($_SESSION['tiempo'])) {
        //     $_SESSION['tiempo']=time();
        // }
        // else if (time() - $_SESSION['tiempo'] > 30) {
        //     session_destroy();
        //     /* Aquí redireccionas a la url especifica */
        //     redirect(base_url().'Login/','refresh');
        //     die();  
        // }
        // $_SESSION['tiempo']=time(); //Si hay actividad seteamos el valor al tiempo actual

        
    }
     
        public function contadorAsignatura(){
            $result = $this->Modelo_acceso->PA_BContadorAsignatura()[0];
            return $result->cantidad;
            //echo json_encode($result);
        }


	public function index(){
		$data=[];

		$Where[]='FCExpiracion is null';
        $data['getCountPreguntas']=$this->Model->_selectCount("Pregunta",$Where,'default');
        $data['getCountAsignaturas'] = $this->Model->PA_BContadorAsignatura()[0];
			
		$this->load->view('Dashboard/index',$data);	

		
	}

	public function contadores($op, $ID = 0){
        // Buscador de pregutnas según opcion entregada y en caso de ser necesario 
        // recibir el $ID para realizar la busqueda
        // Opciones : 
            // 1: para buscar por CDTPPregunta
            // 2: para buscar por IDAsignatura
            // 3: para buscar por CDTPNivel
            // 0: para buscar todas las preguntas
        switch($op){
            case 1:
                // - CDTPPregunta
                $resultPreguntas = $this->Model->PA_BContadores($op, $ID);
                echo 'N° de preguntas por CDTPPregunta: '.count($resultPreguntas);
 
            break;
            case 2:
                // - IDAsignatura
                $resultPreguntas = $this->Model->PA_BContadores($op, $ID);
                echo 'N° de preguntas por IDAsignatura: '.count($resultPreguntas);
 
            break;
            case 3:
                // - CDTPNivel
                $resultPreguntas = $this->Model->PA_BContadores($op, $ID);
                echo 'N° de preguntas por CDTPNivel: '.count($resultPreguntas);
 
            break;
            default:
                // Buscar Todas
                $resultPreguntas = $this->Model->PA_BContadores($op, $ID);
                echo 'N° de preguntas totales: '.count($resultPreguntas);
            break;
        }
    }
}
