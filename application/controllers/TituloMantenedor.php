<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller TituloMantenedor
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class TituloMantenedor extends CI_Controller
{
    
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

  public function agregar(){    
    $data["Areas"]=$this->Model->PA_BTPAreas();
    $data["TPTitulos"]=$this->Model->PA_BTPTitulo();
    $this->load->view("Mantenedores/Titulo/Agregar",$data); 
  }
  public function agregarAsignaturaTitulo($IDTitulo){  
    $data["Titulo"]=$this->Model->VI_TituloMatriculaPorIDTitulo($IDTitulo)[0]  ;
    $data["Areas"]=$this->Model->PA_BTPAreas();
    $data["Asignaturas"]=$this->Model->pa_BAsignaturaNOTitulo($IDTitulo);
    $data["TPTitulos"]=$this->Model->PA_BTPTitulo();
   $this->load->view("Mantenedores/Titulo/AgregarAsignaturaTitulo",$data); 
  
  }
  public function editar(){    
    $data["Titulos"]=$this->Model->VI_TituloMatricula();
    $this->load->view("Mantenedores/Titulo/Editar",$data); 
  }
  public function detalleTitulo($IDTitulo,$mensaje=null){    
    $data["Asignaturas"]=$this->Model->pa_BAsignaturaporTitulo($IDTitulo);
    $data["NMTitulo"]=$this->Model->VI_TituloMatriculaPorIDTitulo($IDTitulo)[0]->NMTitulo;
    $data["IDTitulo"]=$this->Model->VI_TituloMatriculaPorIDTitulo($IDTitulo)[0]->IDTitulo;
    $data["CDTPArea"]=$this->Model->VI_TituloMatriculaPorIDTitulo($IDTitulo)[0]->CDTPArea;
    $this->load->view("Mantenedores/Titulo/DetalleTitulo",$data); 
  }
  public function pa_BAsignaturaporTitulo($IDTitulo){    
    echo json_encode($this->Model->pa_BAsignaturaporTitulo($IDTitulo));
   // $this->load->view("Mantenedores/Titulo/DetalleTitulo",$data); 
  }
  public function pa_EAreaAsignatura($CDTPArea,$IDAsignatura){    
    ($this->Model->pa_EAreaAsignatura($CDTPArea,$IDAsignatura));   
  } 
  public function Pa_IAreaAsignatura(){    
    $IDAsignatura=$this->input->post("IDAsignatura");
    $GLAsignatura=$this->Model->pa_BAsignaturasPorID($IDAsignatura)[0]->GLAsignatura;
    $CDTPArea=$this->input->post("CDTPArea");
    $CDTitulo=$this->input->post("IDTitulo");
    $NMTitulo=$this->input->post("NMTitulo");
   // echo "IDAsignatura".$IDAsignatura,"CDTitulo".$CDTitulo,"CDTPArea".$CDTPArea," GLAsignatura".$GLAsignatura," NMTitulo".$NMTitulo;
    //exit();
    $this->Model->Pa_IAreaAsignatura($IDAsignatura,$CDTPArea,$_SESSION["NRRutUsuario"]);
    //se redige al metodo detalle titulo
   $_SESSION["mensaje"] ="Se agrega la asignatura <b>$GLAsignatura</b> para el Título <b>$NMTitulo</b> ";
    //$this->detalleTitulo($CDTitulo,$mensaje);
    redirect(base_url()."TituloMantenedor/detalleTitulo/$CDTitulo");
  }

  public function Pa_UAreaAsignatura(){    
    $IDAsignatura=$this->input->post("IDAsignatura");
    $GLAsignatura=$this->Model->pa_BAsignaturasPorID($IDAsignatura)[0]->GLAsignatura;
    $CDTPArea=$this->input->post("CDTPArea");
    $CDTitulo=$this->input->post("IDTitulo");
    $NMTitulo=$this->input->post("NMTitulo");

    $this->Model->Pa_UAreaAsignatura($IDAsignatura);
    //se redige al metodo detalle titulo
   $_SESSION["mensaje"] ="Se agrega la asignatura <b>$GLAsignatura</b> para el Título <b>$NMTitulo</b> ";
    
    redirect(base_url()."TituloMantenedor/detalleTitulo/$CDTitulo");
  }






  public function index(){
     echo json_encode($this->Model->PA_BTPAreas());
  }
  public function areaAsignaturaExpirar($ID){
    $this->Modelo_acceso->PA_UAreaAsignatura($ID);
  }
  public function areaPersonaExpirar($ID){
      $this->Modelo_acceso->PA_UAreaPersona($ID);
  }
  public function TarifaTituloExpirar($ID){
      $this->Modelo_acceso->PA_UTarifaTitulo($ID);
  }
  public function TituloPreguntaExpirar($ID){
      $this->Modelo_acceso->PA_UTituloPregunta($ID);
  }

}


/* End of file TituloMantenedor.php */
/* Location: ./application/controllers/TituloMantenedor.php */