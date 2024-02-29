<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Configuracion extends CI_Controller {
    public function __construct (){
        parent::__construct ();
        $this->load->model('Model');
        $this->load->library('funciones');
        session_start();
       
    }
    public function pa_BConfiguracionesPorTitulo($IDTitulo){
         $asignaturas =($this->Model->pa_BConfiguracionesPorTitulo($IDTitulo));
         foreach ($asignaturas as $key=>$asignatura){
             $asignatura->configuraciones=$this->Model->Pa_BTituloPreguntaPorIDAsignaturaIDTitulo($asignatura->IDAsignatura,$IDTitulo);
         }
         $data["configuraciones"]=$asignaturas;
        $this->load->view("Configuracion/detalleConfiguracionTitulo",$data); 
    }
    //busca las configuraciones de una asignatura y un titulo en particular
    public function Pa_BTituloPreguntaPorIDAsignaturaIDTitulo(){
        header('Content-Type: application/json');
        $asignaturas = $this->input->post("result");
        $IDTitulo = $this->input->post("IDTitulo");
        $preguntasExamen=array();
        $errores=array();
        foreach ($asignaturas as $key=>$asignatura){
            $configuraciones=$this->Model->Pa_BTituloPreguntaPorIDAsignaturaIDTitulo($asignatura,$IDTitulo);
            foreach($configuraciones as $key =>$config){
                //validar si las preguntas obtenidas son las mínimas para crear el examen
                $preguntasConfig=$this->Model->PA_BPreguntasAsignaturas($config->IDAsignatura,$config->CDTPNivel, $config->NRPregunta);
                if(count($preguntasConfig)<$config->NRPregunta){
                    //se manda un mensaje que esta asignatura no tiene suficiientes preguntas de tan nivel
                    array_push($errores,
                    "No hay suficientes (".$config->NRPregunta.") preguntas para la asignatura: ".$config->GLAsignatura." con el nivel ".$config->GLTPNivel." (".$config->TotalPreguntas.")"
                );
                    //(array("Error"=>"No hay suficientes "));exit;
                }else{
                    $config->Preguntas=$preguntasConfig;
                    //se agregan en el array general de preguntas
                    foreach( $config->Preguntas as $key=>$pregunta){

                        $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPregunta($pregunta->IDPregunta);
                        
                        array_push($preguntasExamen,$pregunta);
                    }
                }
                
            }
        }
        $resultado=array();
        $resultado["asignaturas"]=$asignaturas;
        $resultado["errores"]=$errores;
        $resultado["preguntas"]=$preguntasExamen;
        echo json_encode($resultado);
        //echo json_encode($preguntasExamen);




        
    }

 

    public function generarExamenConfiguradoPDF($IDTitulo){
        header('Content-Type: application/json');
        #se pide el titulo
        $preguntasExamen=array();
        $asignaturas =($this->Model->pa_BConfiguracionesPorTitulo($IDTitulo));
        
        foreach ($asignaturas as $key=>$asignatura){
            
            //se traen las configuraciones (TituloPregunta)
            $asignatura->configuraciones=$this->Model->Pa_BTituloPreguntaPorIDAsignaturaIDTitulo($asignatura->IDAsignatura,$IDTitulo);
            //por cada configuración se traen la spreguntas
            foreach( $asignatura->configuraciones as $key=>$config){
                //se buscan las preguntas por cada configuración
               $preguntas= $this->Model->pa_BPreguntasPorAsignaturaNivelNr($config->CDTPNivel,$config->IDAsignatura,$config->NRPregunta);
                $config->Preguntas=$preguntas;
               //si las preguntas son mayores a lo que la configuración requiere se guarda
                if(!count($preguntas)<$config->NRPregunta){
                    array_push($preguntasExamen,$preguntas);
                }else{
                    array_push($preguntasExamen,array());
                }               
            }
        }
        echo json_encode($asignaturas);
        //echo json_encode($asignaturas);
        //echo json_encode($preguntasExamen);
        #la cantidad de pruebas a generar
        #
    }
    //recibe las asignaturas del calendario y el idtitulo
    public function buscarAsignaturasPorCalendarioExamen($IDCalendario,$IDTitulo,$iddetallecalendario=0){
       
       
        $preguntas=array();
        $errores=array();
       // echo json_encode($this->Model->buscarExamenCalendario());
       //aqui se traen las asignaturas con el id calendario de la tabla inicial
      $asignaturas =($this->Model->buscarCalendarioExamenesAreaAsignatura($IDCalendario));
           
      //se valida que la asignatura sea sin asignatura o con para el comportamiento según corresponda
      if($asignaturas[0]->IDAsignatura==0){
          //  echo "sin asignatura";exit;
            //se buscan todas las asignaturas por titulo
            $asignaturas=$this->Model->pa_BAsignaturaporTitulo($IDTitulo);
            foreach ($asignaturas as $key=>$asignatura){
                $asignatura->IDDetalleCalendario=$iddetallecalendario;
                $asignatura->configuraciones=$this->Model->Pa_BTituloPreguntaPorIDAsignaturaIDTitulo($asignatura->IDAsignatura,$IDTitulo);
                foreach($asignatura->configuraciones as $key =>$config){
                    //validar si las preguntas obtenidas son las mínimas para crear el examen
                    $preguntasConfig=$this->Model->PA_BPreguntasAsignaturas($config->IDAsignatura,$config->CDTPNivel, $config->NRPregunta);
                    if(count($preguntasConfig)<$config->NRPregunta){
                        //se manda un mensaje que esta asignatura no tiene suficiientes preguntas de tan nivel
                        array_push($errores,
                        "No hay suficientes (".$config->NRPregunta.") preguntas para la asignatura: ".$config->GLAsignatura." con el nivel ".$config->GLTPNivel." (".$config->TotalPreguntas.")"
                    );
                        //(array("Error"=>"No hay suficientes "));exit;
                    }else{
                        $config->Preguntas=$preguntasConfig;
                        //se agregan en el array general de preguntas
                        foreach( $config->Preguntas as $key=>$pregunta){
                            $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPregunta($pregunta->IDPregunta);
                            array_push($preguntas,$pregunta);
                        }
                    }
                    
                }
            }
    }else{
        foreach ($asignaturas as $key=>$asignatura){
            $asignatura->configuraciones=$this->Model->Pa_BTituloPreguntaPorIDAsignaturaIDTitulo($asignatura->IDAsignatura,$IDTitulo);
            foreach($asignatura->configuraciones as $key =>$config){
                //validar si las preguntas obtenidas son las mínimas para crear el examen
                $preguntasConfig=$this->Model->PA_BPreguntasAsignaturas($config->IDAsignatura,$config->CDTPNivel, $config->NRPregunta);
                if(count($preguntasConfig)<$config->NRPregunta){
                    //se manda un mensaje que esta asignatura no tiene suficiientes preguntas de tan nivel
                    array_push($errores,
                    "No hay suficientes (".$config->NRPregunta.") preguntas para la asignatura: ".$config->GLAsignatura." con el nivel ".$config->GLTPNivel." (".$config->TotalPreguntas.")"
                );
                    //(array("Error"=>"No hay suficientes "));exit;
                }else{
                    $config->Preguntas=$preguntasConfig;
                    //se agregan en el array general de preguntas
                    foreach( $config->Preguntas as $key=>$pregunta){
                        $pregunta->Respuestas=$this->Model->pa_BRespuestaPorIDPregunta($pregunta->IDPregunta);
                        array_push($preguntas,$pregunta);
                    }
                }
                
            }
        }
    }
 
    $resultado=array();
    $resultado["asignaturas"]=$asignaturas;
    $resultado["errores"]=$errores;
    $resultado["preguntas"]=$preguntas;
    // header('Content-Type: application/json');
    //echo json_encode($resultado);exit;
    $idpreguntas=array();
    foreach($preguntas as $key=>$pregunta){
        array_push($idpreguntas,$pregunta->IDPregunta);
    }
    $resultado["idpreguntas"]=$idpreguntas;



    $iddetallecalendario=array();
    foreach($asignaturas as $key=>$asignatura){
        array_push($iddetallecalendario,$asignatura->IDDetalleCalendario);
    }
    $resultado["iddetallecalendario"]=$iddetallecalendario;
    //echo json_encode($iddetallecalendario);exit;
    
    $data["preguntas"]=$preguntas;


    //echo json_encode($resultado);
    $resultado['vistapreguntas']=$this->load->view('Configuracion/getPreguntasIDFormatoExamen',$data,true);	
    $this->load->view('Evaluaciones/vistaExamen',$resultado);
    }
     
}
 