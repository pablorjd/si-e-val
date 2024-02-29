<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EnsayoController extends CI_Controller {

    public function __construct()
  {
    parent::__construct();
    $this->load->model('Model');
    session_start();
    if (!isset($_SESSION['NRRutUsuario']) ) {
      # code...
      redirect(base_url().'Login/','refresh');
      
  }
  }

    public function index()
    {
        $data["Titulos"]=$this->Model->Pa_BEnsayoTitulo();
        $this->load->view('Mantenedores/Ensayo/index',$data);
    }

    public function Pa_UHabilitarEnsayo()
    {
        # code...
        $opc = $this->uri->segment(3);
        $IDTituloPractica = $this->uri->segment(4);
        $this->Model->Pa_UHabilitarEnsayo($opc,$IDTituloPractica);
    }

    
    //actualiza la puntaje en la tabla titulo pregunta
    public function Pa_UTituloPracticaNRPuntaje($IDTituloPractica, $NRPuntaje)
    {
      $this->Model->Pa_UTituloPracticaNRPuntaje($IDTituloPractica, $NRPuntaje);
    }
    //actualiza la pregunta en la tabla titulo pregunta
    public function Pa_UTituloPracticaNRPregunta($IDTituloPractica, $NRPregunta)
    {
      $this->Model->Pa_UTituloPracticaNRPregunta($IDTituloPractica, $NRPregunta);
    }
    //actualiza la prema en la tabla titulo pregunta
    public function Pa_UTituloPracticaNRPrema($IDTituloPractica, $NRPrema)
    {
      $this->Model->Pa_UTituloPracticaNRPrema($IDTituloPractica, $NRPrema);
    }


    //actualiza la duracion en la tabla titulo pregunta
    public function Pa_UTituloPracticaNRDuracion($IDTituloPractica, $NRDuracion)
    {
      $this->Model->Pa_UTituloPracticaNRDuracion($IDTituloPractica, $NRDuracion);
    }

}

/* End of file EnsayoController.php */
