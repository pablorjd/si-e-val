<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct (){
		parent::__construct ();
		$this->load->model('Model');
		$this->load->library('funciones');
		session_start();
		if (!isset($_SESSION['NRRutUsuario']) ) {
            # code...
            redirect(base_url().'Login/','refresh');
            
        }
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	

	public function pa_IPregunta(){

		
		$CDTPPregunta=$this->input->post("TipoPregunta");
		$IDAsignatura=$this->input->post("asignatura");
		$CDTPNivel=$this->input->post("nivel");
		$GLPregunta=$this->input->post("Pregunta");
		//echo $GLPregunta. "glosa";exit;
		$GLRutaImagen = $this->input->post("GLRutaImagen");
		$NRRutUsuario= $_SESSION["NRRutUsuario"];
		echo $this->Model->pa_IPregunta($CDTPPregunta,$IDAsignatura,$CDTPNivel,$GLPregunta,$GLRutaImagen,$NRRutUsuario);exit;
		
	}
	
}
