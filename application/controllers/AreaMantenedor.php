<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AreaMantenedor extends CI_Controller {

    
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
        //$data["Titulo"]=$this->Model->VI_TituloMatriculaPorIDTitulo($IDTitulo)[0]  ;
        //$data["Areas"]=$this->Model->PA_BTPAreas();
        //$Areas=$this->Model->PA_BTPAreas();
        $Areas=$this->Model->Pa_BTPArea();
        foreach($Areas as $key=>$area){
            $area->Personas=count($this->Model->VI_PersonaSieval($area->CDTPArea));
        }
        $data["Areas"]=$Areas;
     //   $data["PersonasSieval"]=$this->Model->VI_PersonaSieval();
        //$data["Asignaturas"]=$this->Model->pa_BAsignaturaNOTitulo($IDTitulo);
        //$data["TPTitulos"]=$this->Model->PA_BTPTitulo();
        $this->load->view("Mantenedores/Area/AgregarArea",$data); 
    }
    public function buscarPersonasPorArea($IDPersona,$CDTPArea){      
        $area =( $this->input->post("area"));
        $area = (json_decode(str_replace("'",'"',$area)));
        //exit;
        $data["PersonasSieval"]=$this->Model->VI_PersonaSieval($CDTPArea);
        $data["Area"]=$area;
        $this->load->view("Mantenedores/Area/PersonasPorArea",$data); 
    }
    public function agregarAsignaturaArea(){
        //$data["Titulo"]=$this->Model->VI_TituloMatriculaPorIDTitulo($IDTitulo)[0]  ;
        $data["Areas"]=$this->Model->PA_BTPAreas();
       // $data["Asignaturas"]=$this->Model->pa_BAsignaturaNOTitulo($IDTitulo);
      //  $data["TPTitulos"]=$this->Model->PA_BTPTitulo();
       $this->load->view("Mantenedores/Area/AgregarArea",$data); 
    }
    public function pa_UExpirarArea(){
        //$data["Titulo"]=$this->Model->VI_TituloMatriculaPorIDTitulo($IDTitulo)[0]  ;
        $CDTPArea = $this->input->post('CDTPArea');
        $data["CDTPArea"]=$this->Model->pa_UExpirarArea($CDTPArea);
       // $data["Asignaturas"]=$this->Model->pa_BAsignaturaNOTitulo($IDTitulo);
      //  $data["TPTitulos"]=$this->Model->PA_BTPTitulo();
       //$this->load->view("Mantenedores/Area/AgregarArea",$data); 
    }
    function test(){
        $cantidadPreguntas="";
        $calendarios = $this->Model->buscarExamenCalendario();
        foreach($calendarios as $key=>$calendario){
            $calendario->Asignaturas=$this->Model->buscarCalendarioExamenesAreaAsignatura($calendario->IDTitulo);
            foreach( $calendario->Asignaturas as $key=>$asignatura){
                $asignatura->Reparticiones=$this->Model->buscarCalendarioExamenesReparticion($calendario->IDTitulo, $asignatura->IDAsignatura);
                //$asignatura->Preguntas=$this->Model->PA_BPreguntasPorTitulo($calendario->IDTitulo,$cantidadPreguntas);
            }
        }
        echo json_encode($calendarios);
    }
    function test12(){
        $cantidadPreguntas="";
        $calendarios = $this->Model->buscarExamenCalendario();
        foreach($calendarios as $key=>$calendario){
            $calendario->Asignaturas=$this->Model->buscarCalendarioExamenesAreaAsignatura(74);
            foreach( $calendario->Asignaturas as $key=>$asignatura){
                $asignatura->Reparticiones=$this->Model->buscarCalendarioExamenesReparticion($calendario->IDTitulo, $asignatura->IDAsignatura);
                //$asignatura->Preguntas=$this->Model->PA_BPreguntasPorTitulo($calendario->IDTitulo,$cantidadPreguntas);
            }
        }
        echo json_encode($calendarios);
    }
    function pa_BAsignaturaporTitulo($IDTitulo){
      $asignaturas= $this->Model->pa_BAsignaturaporTitulo($IDTitulo);            
        echo json_encode($asignaturas);
    }
  
    public function preguntasExamenTitulo($asig,$numPreguntas,$CDTPNivel){

        $NAsignaturas                   =$asig;

       
        $NPreguntas                     = $numPreguntas;
        // variable que se obtiene de la operación matematica división para obtener el numero
        // de preguntas de cada asignatura
        $preguntasPorAsignatura         = floatval(($NPreguntas/sizeof($NAsignaturas)));
        // arreglo utilizado para guardar la cantidad de preguntas por cada asignatura
        // esto con el objetivo de controlar que el numero total de preguntas sea el proporcionado
        // ya que si obtenemos una división con decimales faltaria una pregunta en cualquier asignatura
        $numeroPreguntasPorAsignatura   = [];
        // arreglo para almacenar las preguntas obtenidas de cada asignatura
        $preguntas                      = [];
        // arreglo para almacenar los numeros random de preguntas
        $numeroDePreguntas              = [];
        if($NPreguntas % round($preguntasPorAsignatura, 0,PHP_ROUND_HALF_UP) === 0){
            // si la operación obtiene 0 el arreglo se llena de manera normal con la cantidad
            // de preguntas correspondientes al resultado de $preguntasPorAsignatura
            $NPreguntasAsignatura = $preguntasPorAsignatura;
            for($a = 0 ; $a <= sizeof($NAsignaturas)-1 ; $a++){
                array_push($numeroPreguntasPorAsignatura, $NPreguntasAsignatura);
            }
        }else{
            // en el caso en que exista el modulo, la posición [0] del arreglo $numeroPreguntasPorAsignatura
            // se suma 1 para alcanzar el numero correspondiente a $NPreguntas
            $NPreguntasAsignatura = round($preguntasPorAsignatura, 0,PHP_ROUND_HALF_DOWN);
            for($a = 0 ; $a <= sizeof($NAsignaturas)-1 ; $a++){
                $numeroPreguntasPorAsignatura[0] = $NPreguntasAsignatura+1;
                $numeroPreguntasPorAsignatura[$a] = $NPreguntasAsignatura;
            }
        }
        $resultado=array();
        $asignaturas=array();
        $asignaturasResultado=array();
        foreach($NAsignaturas as $key=>$IDAsignatura){
            array_push($asignaturas,array("IDAsignatura"=>$IDAsignatura));
            //echo json_encode($IDAsignatura);
            //se buscan las preguntas de la asignatura

            array_push($resultado, $preguntasAsignatura = $this->Model->PA_BPreguntasExamen($IDAsignatura,$CDTPNivel));
 
        }
        foreach ($asignaturas as $key=>$a){
           // echo json_encode($asignatura);
          // var_dump($a["IDAsignatura"]);
     
            $a["preguntas"]=$this->Model->PA_BPreguntasExamen($a["IDAsignatura"],$CDTPNivel);
            array_push($asignaturasResultado,$a);
           // echo json_encode($a);
        }

        $preguntasSeleccionadas = array();

    //CORRECTO
    
        foreach($asignaturasResultado as $key=>$asignatura){
            //echo "<br>".json_encode(count($asignatura['preguntas']));
            //total numero de preguntas por asignatura item
            foreach($numeroPreguntasPorAsignatura as $key=>$item){        
             
           
                for($i = 0 ; $i <= $item-1 ; $i++){
                    $asignaturaItem=$asignaturasResultado[$key];
                    //echo (count($asignaturaItem["preguntas"]))."<br>";
                    if(count($asignaturaItem["preguntas"])!=0){
                        $numeroRandom = rand(0,(count($asignaturaItem["preguntas"])-1));
                        //echo $numeroRandom;
                        $preguntaSeleccionada =($asignaturaItem["preguntas"][$numeroRandom]);
                        array_push(
                            $preguntasSeleccionadas,$preguntaSeleccionada
                        );
                    }
                    
                }
           
                
            } 
        return $preguntasSeleccionadas;
        // FIN CORRECTO
        //return $preguntasSeleccionadas;
    //  exit(); 
    }
}
    
    function generarPruebaPorAsignaturas($asignaturas,$numPreguntas,$CDTPNivel){
      //var_dump($asignaturas);
     // exit;
        //  $titulo->preguntas="aaa";
        $preguntasPrueba=(object)array();
            foreach($asignaturas as $key=>$asignatura){
                if($asignatura!=0){
                    //si es 0 es porque tiene que traer n preguntas de la asignatura individual
                    $arrayAsignatura=array($asignatura);//[85]
                   // $numPreguntas=1;
                    $preguntasPrueba->preguntas=$this->preguntasExamenTitulo($arrayAsignatura,$numPreguntas,$CDTPNivel);
                    //se buscan detalle de preguntas por id
                    foreach($preguntasPrueba->preguntas as $key=>$pregunta){
                        $pregunta->Detalle =$this->Model->PA_BPreguntasPorID( $pregunta->IDPregunta);
                    }
                       
                }else{
                    
                    $AsignaturasDeltitulo = json_decode(file_get_contents("http://10.16.153.81/sievalcompleto/sieval/AreaMantenedor/pa_BAsignaturaporTitulo/".$IDTitulo));
                    //var_dump($AsignaturasDeltitulo);
                    $nuevasAsig=array();
                    foreach($AsignaturasDeltitulo as $key=>$a){
                        array_push($nuevasAsig,$a->IDAsignatura);
                    }
                    //var_dump($nuevasAsig);
                    $asignatura->preguntas=$asignatura->preguntas=$this->preguntasExamenTitulo($nuevasAsig);
                }
            }

        return($preguntasPrueba);
 
      
     }
     function generarExamenParaAsignatura($IDAsignatura,$numPreguntas,$CDTPNivel){
        //$asignaturas = json_decode(file_get_contents("http://10.16.153.81/sievalcompleto/sieval/AreaMantenedor/pa_BAsignaturaporTitulo/".$idTitulo));
        $asignaturas=(object)array((int)$IDAsignatura);            
        $preguntas= $this->generarPruebaPorAsignaturas($asignaturas,$numPreguntas,$CDTPNivel);
        return $preguntas;
     } 

    
     function generarTablaPreguntasExamenPorAsignatura($IDAsignatura,$numPreguntas,$CDTPNivel){
         echo $IDAsignatura;
        $data["preguntas"]=$this->generarExamenParaAsignatura($IDAsignatura,$numPreguntas,$CDTPNivel)->preguntas;
        //echo json_encode($data["preguntas"]);
        //echo json_encode($data["preguntas"]->preguntas);
        //exit;
        $this->load->view("Evaluaciones/tablaPreguntas",$data);
     }
     function generarTablaPreguntasExamenSinAgnatura($IDtitulo,$numPreguntas,$CDTPNivel){
        $IDAsignatura = $this->input->post('IDAsignatura');
        //$CDTPNivel = $this->input->post('CDTPNivel');
        //$numPreguntas = $this->input->post('numPreguntas');
        $preguntasPrueba=$this->generarTablaPreguntasExamenSinAsignatuta($IDtitulo,$numPreguntas,$CDTPNivel);
        foreach($preguntasPrueba as $key=>$pregunta){
            $pregunta->Detalle =$this->Model->PA_BPreguntasPorID( $pregunta->IDPregunta);
        }
        $data["preguntas"]=$preguntasPrueba;
        $data["numPreguntas"]=$numPreguntas;
        //echo json_encode($data["preguntas"]);
        //echo json_encode($data["preguntas"]->preguntas);
        //exit;
        $this->load->view("Evaluaciones/tablaPreguntas",$data);
     }
    function test1(){
        // http://10.16.153.81/sievalcompleto/sieval/AreaMantenedor/test
        $titulos = (json_decode(file_get_contents('http://10.16.153.81/sievalcompleto/sieval/AreaMantenedor/test')));
        //$preguntas =$this->preguntasExamenTitulo($titulos[2]->Asignaturas);
        //echo json_encode($preguntas);
        //echo json_encode($this->preguntasExamenTitulo($titulos[0]->Asignaturas));
        //$titulo1=($titulos[0]->Prueba=$this->preguntasExamenTitulo($titulos[0]->Asignaturas));
        foreach ($titulos as $key => $titulo) {
        //  $titulo->preguntas="aaa";
            foreach($titulo->Asignaturas as $key=>$asignatura){
                if($asignatura->IDAsignatura!=0){
                    //si es 0 es porque tiene que traer n preguntas de la asignatura individual
                    $arrayAsignatura=array($asignatura->IDAsignatura);//[85]
                    $asignatura->preguntas=$this->preguntasExamenTitulo($arrayAsignatura);
                }else{
                    $AsignaturasDeltitulo = json_decode(file_get_contents("http://10.16.153.81/sievalcompleto/sieval/AreaMantenedor/pa_BAsignaturaporTitulo/".$titulo->IDTitulo));
                    //var_dump($AsignaturasDeltitulo);
                    $nuevasAsig=array();
                    foreach($AsignaturasDeltitulo as $key=>$a){
                        array_push($nuevasAsig,$a->IDAsignatura);
                    }
                    //var_dump($nuevasAsig);
                    $asignatura->preguntas=$asignatura->preguntas=$this->preguntasExamenTitulo($nuevasAsig);
                }
            }
 
    //echo json_encode($titulo);    
            //$titulo->preguntas=$this->preguntasExamenTitulo($Asignaturas);
        //  echo json_encode($titulo->Asignaturas);
        //echo $key;        
        
        }
        echo  json_encode($titulos);
 
      
    }

     //mantenedor PERSONA MAURICIO
     public function guardarAreaPersona($IDPersona, $CDTPArea){

        $this->Model->PA_IAreaPersona($IDPersona, $CDTPArea,$_SESSION["NRRutUsuario"]);
    }
     public function PA_EAreaPersona($IDPersona,$CDTPArea){

        $this->Model->PA_EAreaPersona($IDPersona,$CDTPArea,$_SESSION["NRRutUsuario"]);
    }
    
    function modalAgregarPersonaArea($CDTPArea,$NRRut){
        $data["personas"]=$this->Model->Pa_BPersonaNOAreaPorRut($CDTPArea,$NRRut);
        //echo json_encode($data["personas"]);
        $this->load->view("Mantenedores/Area/ModalAgregarPersonaArea",$data); 

    }
    function generarTablaPreguntasExamenSinAsignatuta($IDtitulo,$numPreguntas,$CDTPNivel){
        $asignaturas=array();
            foreach ($this->Model->pa_BAsignaturaporTitulo($IDtitulo) as $key=>$asignatura){
                array_push($asignaturas,$asignatura->IDAsignatura);
        } 
        //echo count($asignaturas);
        //echo json_encode($numPreguntas);
      //exit;
          //76 = 31 asignaturas
               
        if(count($asignaturas)>$numPreguntas){
            $nuevasAsignaturas=array();
            //se van a buscar las primeras asignaturas que contemplan el largo de preguntas
            for($i = 0 ; $i <= $numPreguntas-1 ; $i++){
                //se agregan solamente los indices que corresponden a tantas asignaturas como preguntas hay
                array_push($nuevasAsignaturas,$asignaturas[$i]);
            }
            //echo json_encode($nuevasAsignaturas);
          //  exit;
          //se igualan las variables para ser usada enel nuevo m{etodo}
          $asignaturas=$nuevasAsignaturas;
        }
                        
        $preguntas= $this->preguntasExamenTitulo($asignaturas,$numPreguntas,$CDTPNivel);
        return($preguntas);
     }

     //vista configurACIOON EXAMEN vista 1
     public function vertitulos()
     {
         $data['titulopreguntas']=$this->Model->VI_TituloMatricula();
         $this->load->view('Mantenedores/TituloPregunta/titulopregunta',$data);
     }

      //LISTA LAS ASIGNATURAS DE UN TITULO EN PARTICULAR vista 2
      public function asignaturasportitulo($IDTitulo)
      {
          $data['IDTitulo'] = $IDTitulo;
          $data['asignaturasTitulo']=$this->Model->asignaturasportitulo($IDTitulo);
          $data['titulo']=$this->Model->PA_BTitulosPorID($IDTitulo);
          $data['AsignaturasNoTitulos']=$this->Model->pa_BAsignaturaNOTitulo($IDTitulo);
          //detalleTituloAsignatura
          $this->load->view('Mantenedores/TituloPregunta/detalleTituloAsignatura',$data);
      }
      //busca todas las configuraciones para un titulo con el IDAsigantura y el idtitulo
      public function Pa_BTituloPreguntaPorIDAsignaturaIDTitulo($IDAsignatura,$IDTitulo)
      {
        $data['getNivel']=$this->Model->Pa_BNivel();
        $data['TituloPreguntaConfiguracion']=$this->Model->Pa_BTituloPreguntaPorIDAsignaturaIDTitulo($IDAsignatura,$IDTitulo);
        //echo json_encode($data['TituloPreguntaConfiguracion']);
        $this->load->view('Mantenedores/TituloPregunta/configurarTituloPregunta',$data);
      }
    
      //Agrega un nueva configuracion
      public function Pa_ITituloPregunta($IDTitulo,$IDAsignatura)
      {
        $CDTPNivel = $this->input->post('CDTPNivel');
        $NRPregunta =$this->input->post('NRPregunta');
        $this->Model->Pa_ITituloPregunta($IDTitulo,$CDTPNivel,$IDAsignatura,$NRPregunta);
      }

     //ELIMINA UNA CONFIGURACIÓN
     public function Pa_ETituloPregunta($IDTituloPregunta)
     {  
         $this->Model->Pa_ETituloPregunta($IDTituloPregunta);
     }
    
     //CONFIGURA LOS TITULOPREGUNTA
     public function configurarTituloPregunta()
     {
        $this->load->view('Mantenedores/TituloPregunta/configurarTituloPregunta');
     }

     public function agregarAsignatura($IDTitulo,$IDAsignatura)
     {
        $getNiveles=$this->Model->Pa_BNivel();
        foreach($getNiveles as $key=>$nivel){
            $this->Model->Pa_ITituloPregunta($IDTitulo,$nivel->CDTPNivel,$IDAsignatura,5);
        }
     }
     public function Pa_UTituloPreguntaActualizado($IDTitulo,$IDAsignatura)
     {
        $this->Model->Pa_UTituloPreguntaActualizado($IDTitulo,$IDAsignatura);
     }
     //carga la vista TituloMantenedor
     public function TituloMantendor()
     {
        $data['getAreas']=$this->Model->Pa_BTPArea();
         $data['titulopreguntas']=$this->Model->VI_TituloMatricula();
         $this->load->view('Mantenedores/TituloPregunta/TituloMantenedor',$data);
     }
     //expira los Títulos
     public function Pa_ETitulo($IDTitulo)
     {
        $this->Model->Pa_ETitulo($IDTitulo);
     }
     //actualiza los Títulos
     public function Pa_UTitulo($IDTitulo)
     {
        $this->Model->Pa_UTitulo($IDTitulo);
     }

     //TRAE TODOS LOS TITULOS QUE ESTAN NO SE ENCUENTRAN EN SIEVAL PERO SI EN PERMARITIMO
     public function TituloPersonalMaritimo()
     {
        $data['TitulosNOSieval']=$this->Model->VI_TitulosNOSieval();
        $data['getAreas']=$this->Model->Pa_BTPArea();
        $this->load->view('Mantenedores/TituloPregunta/TituloPersonalMaritimo',$data);
     }
     //INSERTA EN LA TABLA TITULO 
     public function Pa_ITitulo($CDTitulo,$CDTPTitulo)
     {
        $CDTPArea = $_GET['area'];
        //echo $CDTitulo."     ".$CDTPTitulo."     ".$CDTPArea; exit;
        $this->Model->Pa_ITitulo($CDTitulo,$CDTPTitulo,$CDTPArea);
        redirect(base_url()."AreaMantenedor/TituloMantendor/");
     }

     public function Pa_UAreaTitulo($IDTitulo,$CDTPArea){
        $this->Model->Pa_UAreaTitulo($IDTitulo,$CDTPArea);
     }


   public function PA_IArea(){
    $GLTPArea = $this->input->post('GLTPArea');
    $resultado = $this->Model->PA_IArea($GLTPArea);

    return var_dump($resultado);
   }

}
/* End of file Controllername.php */
