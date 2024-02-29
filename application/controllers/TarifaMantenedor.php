
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TarifaMantenedor extends CI_Controller {
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
        $titulos=$this->Model->VI_TarifaTitulo();
        
        
        foreach($titulos as $key=>$titulo){
            
            
           if (!isset($titulo->CDTarifa)) {
               # code...
               $titulo->CDTarifa = 0;
           }
            $titulo->Tarifa=$this->Model->getTarifas($titulo->CDTarifa);
            $titulo->Restricciones=$this->Model->pa_BRestriccionesPorTitulo($titulo->IDTitulo);
            
            
        }
        
        
        $data["Titulos"]=$titulos;
        $data["ValorDolar"]=$this->Model->PA_BUltimoValorDolar()[0];
        $this->load->view("Mantenedores/Tarifa/ListaTarifasTitulo",$data); 
    }
    public function getTarifas($IDTarifa){
        $data["Tarifas"]=$this->Model->getTarifas($IDTarifa);
        echo json_encode( $data["Tarifas"]);
    }
    

}

/* End of file Controllername.php */
