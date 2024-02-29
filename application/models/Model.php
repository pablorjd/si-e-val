<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct(); 
    }

    //busca las asignaturas con el codigo del area
    public function getAsignaturas($IdArea)
    {
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "El id .$IdArea. no se pudo Cargar",
        );
        if (!isset($IdArea)) {
            return $MensajeError;
        }
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . ' pa_BAsignaturasID ' . $IdArea);
        
        return $query->result();
    }
    //busca las asignaturas con el codigo del area
    public function getAsignatura($IdArea)
    {
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "El id .$IdArea. no se pudo Cargar",
        );
        if (!isset($IdArea)) {
            return $MensajeError;
        }
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . ' pa_BAsignaturasIDAsignatura ' . $IdArea);
        return $query->result()[0];
    }
    //busca todas las asignaturas
    public function getAllAsignaturas()
    {
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . ' pa_BAllAsignaturas ');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    } 
    //agregar asignatura
    public function agregarAsignatura($GLAsignatura, $NRRutUsuario,$CDTPArea)
    {

        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Error al crear la Asignatura",
        );
        if ($GLAsignatura == '' || $NRRutUsuario == '') {
            return $MensajeError;
        }

        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . ' pa_IAsignatura ' .'"'. $GLAsignatura.'"' . ',' . $NRRutUsuario. ',0');
        $ultimoId = $this->db->insert_id();
        //echo $ultimoId;exit;
        $this->Pa_IAreaAsignatura($ultimoId,$CDTPArea,$NRRutUsuario);
        return $query->result();
    }

    //agregar area asignatura
    public function Pa_IAreaAsignatura($IDAsignatura,$CDTPArea,$NRRutUsuario){
        $query = $this->db->query(
            "exec EvaluacionCompetencias.".$this->config->item("usuarioBD1").".Pa_IAreaAsignatura 
            $IDAsignatura,$CDTPArea,$NRRutUsuario,0 ");
        return $query->result();
	}
    //elimina Asignaturas (update campo fecha)
    public function eliminarAsignatura($IDAsignatura)
    {
        # code...
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Error al crear la Asignatura",
        );
        if ($IDAsignatura == '') {
            return $MensajeError;
        }

        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'pa_EAsignaturaID ' . $IDAsignatura . ',0');

        return $query->result();
    }

    public function Pa_BPreguntasPorFiltro($IdArea = '', $CDTPNivel = '', $IDAsignatura = '', $Pregunta = '', $Alternativa = ''){
       
        $resultado = $this->db->query('exec ' . $this->config->item("usuarioBD") . ' Pa_BPreguntasPorFiltro' .$IdArea.','.$Alternativa.','.  $IDAsignatura .','.$CDTPNivel.','.$Pregunta);
        return $resultado->result();

    }
    /**
     * funcion que va a buscar la preguntas que se encuentran en la tabla examen pregunta 
     */
    public function PA_BPreguntasPorIdPregunta($IDPreguntas){
        $this->db->select('*');
        $this->db->from('FormatoExamenPregunta');
        $this->db->where('IDPregunta',$IDPreguntas);
        $this->db->where('FCExpiracion',NULL);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
    
    public function getPreguntas($IdPregunta = '', $IdArea = '', $CDTPNivel = '', $IDAsignatura = '', $Pregunta = '', $Alternativa = '',$IDPregunta= '')
    {
        //$dbConeccion = $this->load->database($Conn ,TRUE);
        //query lista para pasar a PA
        if ($IdArea != -1 && $IdArea != '') {
            $this->db->where('ar.CDTPArea', $IdArea);
        }

        if ($IdPregunta) {
            $this->db->where('p.IdPregunta', $IdPregunta);
        }

        if ($CDTPNivel != -1 && $CDTPNivel != '') {
            $this->db->where('n.CDTPNivel', $CDTPNivel);
        }

        if ($IDAsignatura != -1 && $IDAsignatura != '') {
            $this->db->where('aa.IDAsignatura', $IDAsignatura);
        }
        if ($Alternativa != -1 && $Alternativa != '') {
            $this->db->where('p.CDTPPregunta', $Alternativa);
        }

        if ($Pregunta) {
            $this->db->like('p.GLPregunta', $Pregunta);
        }
        if ($IDPregunta) {
            $this->db->where('p.IDPregunta', $IDPregunta);
        }
        $this->db->join('TPNivel n', 'n.CDTPNivel=p.CDTPNivel', '', false);
        $this->db->join('Asignatura aa', 'aa.IDAsignatura=p.IDAsignatura', '', false);
        $this->db->join('AreaAsignatura asi', '(aa.IDAsignatura=asi.IDAsignatura and aa.FCExpiracion is null)', '', false);
        $this->db->join('TPArea ar', 'ar.CDTPArea=asi.CDTPArea', '', false);
        //$this->db->join('PreguntaRevisada pr', 'pr.IDPregunta=p.IDPregunta and pr.FCExpiracion is null', '', false);
        $this->db->where('p.FCExpiracion is null');
        // $this->db->order_by('IDPregunta','random');
        $this->db->order_by('IDPregunta');
        $query = $this->db->get('Pregunta p');
        //echo $this->LastQuery();
        //echo $this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->result();
            //echo $this->LastQuery();
            // echo "query";
        }
    }

    public function PA_BRevisada($IDPregunta){
        $query = $this->db->get_where('PreguntaRevisada', array('IDPregunta' => $IDPregunta,'FCExpiracion' => NULL));
        return $query->result();
    }

    public function crearActualizarAsignatura($IDAsignaturaActualizar, $GLAsignaturaActualizar, $NRRutUsuario)
    {
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'Pa_IAsignaturaActualiza ' . $IDAsignaturaActualizar . ',' . $GLAsignaturaActualizar . ',' . $NRRutUsuario . ',0');
        return $query->result();
    }

    #################################
    #    Funciones Pablo Jiménez Dinamarca (06-03-2020)....
    #    Descripcion: Funciones
    #################################
    public function totalPreguntas()
    {

        $resultado = $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_BTotalPreguntas ");
        return $resultado->result();
    }
    public function Asignaturacount()
    {

        $resultado = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BAsignaturacount ");
        return $resultado->result();
    }

    public function getReparticiones()
    {
        //[Sgonzalez].[pa_BReparticionesAgregar]
        $resultado = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BReparticionesAgregar ");
        return $resultado->result();
    }
    public function getTitulosporArea($CDTPArea)
    {
        
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Al crear la alternativa",
        );
       

        if ($CDTPArea) {
            $resultado = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_btitulosymatriculasByID " . $CDTPArea);
            $ObjSend = array(
                'success' => 1,
                'Result' => $resultado->result(),
            );
        } else {
            $ObjSend = array(
                'success' => 0,
            );
        }
        return $ObjSend;

        //return $resultado;
    }
    public function bPreguntasPorAsignaturaPorNivel($IDAsignatura, $nivel)
    {
        if ($IDAsignatura) {
            for ($i = 0; $i < count($IDAsignatura); ++$i) {
            $resultado = $this->db->query('exec ' . $this->config->item("usuarioBD") . ' bPreguntasPorAsignaturaPorNivel ' . $IDAsignatura[$i] . ',' . $nivel);
            }
        }
        return $resultado->result_array();
    }

    public function getPreguntasExamen($resultadoPreguntasExamen, $nivel)
    {

        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Al crear la alternativa",
        );
        if ($resultadoPreguntasExamen == '') {
            return $MensajeError;
        }
        if ($resultadoPreguntasExamen) {
            
            $resultado = $this->db->query('exec ' . $this->config->item("usuarioBD") . ' pa_bPreguntasExamen ' . ($resultadoPreguntasExamen) . ',' . $nivel);
        }
        return $resultado->result_array();
    }
    public function getPreguntasExamen2($resultadoPreguntasExamen, $nivel)
    {
        $resultado = $this->db->query('exec ' . $this->config->item("usuarioBD") . ' pa_bPreguntasExamen ' . '"'.$resultadoPreguntasExamen.'"' . ',' . $nivel);
       
        return $resultado->result_array();
    }
    public function getRespuestas($IdPregunta)
    {

        $MensajeError = array(
            "error" => true,
            "Mensaje" => "El id .$IdPregunta. no se pudo Cargar",
        );
        if (isset($IdAlternativa)) {
            return $MensajeError;
        }
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . ' pa_BAlternativasID ' . $IdPregunta);
        return $query->result();
    }

    //pa_BAlternativaIDRespuesta
    public function getRespuestaEditar($IDRespuesta)
    {

        $MensajeError = array(
            "error" => true,
            "Mensaje" => "El id .$IDRespuesta. no se pudo Cargar",
        );
        if (!isset($IDRespuesta)) {
            return $MensajeError;
        }
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . ' pa_BAlternativaIDRespuesta ' . $IDRespuesta . ',0');
        return $query->result();
    }

    //eliminar respuesta
    public function eliminarAlternativa($IdAlternativa)
    {
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "El id .$IdAlternativa. no se pudo eliminar",
        );
        if (!isset($IdAlternativa)) {
            return $MensajeError;
        }
        if ($IdAlternativa == -1) {
            return $MensajeError;
        }
        //actualiza la fecha de nulll a la fecha actual para deshabilitar
        $resultado = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'pa_EAlternativaporID ' . $IdAlternativa . ',0');
        return $resultado;
    }
    //agregar respuesta
    public function agregarAlternativa($IDPregunta, $GLRespuesta, $LGCorrecta, $NRRutUsuario)
    {
        //echo $GLRespuesta;exit;
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Al crear la alternativa",
        );
        if (!isset($IDPregunta, $GLRespuesta, $LGCorrecta, $NRRutUsuario)) {
            return $MensajeError;
        }
        if ($IDPregunta == '' && $GLRespuesta == '' && $LGCorrecta == '' && $NRRutUsuario) {
            return $MensajeError;
        }
        
        $data = array(
            'IDPregunta' => $IDPregunta,
            'GLRespuesta' => $GLRespuesta,
            'FCIngreso' => '2021-02-08 14:41:49.990',
            'LGCorrecta' => $LGCorrecta,
            'NRRutUsuario' => $NRRutUsuario,
            'FCExpiracion' => NULL
        );
    
    $this->db->insert('Respuesta', $data);

    echo $this->db->last_query();
    }

    public function editarAlternativa($IDRespuestaEditar,$GLRespuestaEditar){
        $this->db->set('GLRespuesta', $GLRespuestaEditar);
        $this->db->where('IDRespuesta', $IDRespuestaEditar);
        $this->db->update('Respuesta');
        echo $this->db->last_query();
    }
  


    public function agregarAlternativa1($IDPregunta, $GLRespuesta, $LGCorrecta, $NRRutUsuario){
        //echo $GLRespuesta;exit;
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Al crear la alternativa",
        );
        if (!isset($IDPregunta, $GLRespuesta, $LGCorrecta, $NRRutUsuario)) {
            return $MensajeError;
        }
        if ($IDPregunta == '' && $GLRespuesta == '' && $LGCorrecta == '' && $NRRutUsuario) {
            return $MensajeError;
        }
        //Crea una nueva alternativa para la pregunta
        $resultado = $this->db->query('exec ' . $this->config->item("usuarioBD") . "pa_IAlternativa " . $IDPregunta . ',' . '"' . $GLRespuesta . '"' . ',' . $LGCorrecta . ',' . $NRRutUsuario . ',0');
        return $resultado;
        echo $this->db->last_query();exit;
    }
    //editar respuesta
   

    public function editarAlternativa1($IDRespuestaEditar,$GLRespuestaEditar)
    {
        //EDITA LA ALTERNATIVA MANDANDO POR EL ID DE LA MISMA. ','.$_SESSION["NRRutUsuario"].
        $resultado = $this->db->query("exec EvaluacionCompetencias.dbo.Pa_UAlternativaporID " . $IDRespuestaEditar.','.'"'.$GLRespuestaEditar.'"'.',0');
        return $resultado;
    }
    public function cargarTitulosConTarifa()
    {
        
        //$query = $this->db->query("exec EvaluacionCompetencias.Sgonzalez.pa_BTitulosconTarifa ");
        $query = $this->db->query("exec EvaluacionCompetencias.dbo.pa_BTitulosconTarifa ");
        return $query->result();
    }
    public function buscarTodoTitulos()
    {
        //$query = $this->db->query("exec EvaluacionCompetencias.Sgonzalez.pa_btitulosymatriculas");
        $query = $this->db->query("exec EvaluacionCompetencias.dbo.pa_btitulosymatriculas");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    // public function crearExamen($prema, $NRDuracionminuto, $LGBorrador, $FCIngreso, $NRRutUsuario, $puntajeTotalGlobal, $idPreguntas, $CDReparticion, $IDTitulo, $IDAsignatura)
    // {

	// 	$IDDetalleCalendario = $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_BlastIDDetalleCalendario ");
	// 	$IDDetalleCalendario = $IDDetalleCalendario->result()[0];
    //     $idFormatoExamenPrimero = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BUltimoIDFormatoExamenCreacion ");
    //     $idFormatoExamenPrimer = $idFormatoExamenPrimero->result()[0];
    
    //     $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenCreacion " . $prema . ',' . $NRDuracionminuto . ',' . $LGBorrador . ',' . $NRRutUsuario . ',0');

    //     $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_ICalendarioInscripcionCreacion " . '"' . $FCIngreso . '"' . ',' . $CDReparticion . ',' . $IDTitulo . ',' . $NRRutUsuario . ',0');

    //     $idtablaCalendarioInscripcion = $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_BlastIDCalendarioInscripcion ");
    //     $idtablaCalendarioInscripcion = $idtablaCalendarioInscripcion->result()[0];
    //     for ($i = 0; $i < count($IDAsignatura); ++$i) {
    //         $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IDetalleCalendarioCreacion  $idtablaCalendarioInscripcion->IDCalendario,$IDAsignatura[$i],'$FCIngreso', $NRRutUsuario ,0");
    //     }

    //     //IDDetalleCalendario Pa_BlastIDDetalleCalendario
    //     $IDDetalleCalendario = $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_BlastIDDetalleCalendario ");
    //     $IDDetalleCalendario = $IDDetalleCalendario->result()[0];
    //     $idFormatoExamenSegundo = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BUltimoIDFormatoExamenCreacion ");
    //     $idUltimo = $idFormatoExamenSegundo->result()[0];
    //     $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_IDetalleFormatoCalendarioCreacion ".$IDDetalleCalendario->IDDetalleCalendario.','.$idUltimo->IDFormatoExamen.','.$NRRutUsuario.',0');

    //     $puntajeTotal = $puntajeTotalGlobal / count($idPreguntas);
    //     for ($i = 0; $i < count($idPreguntas); ++$i) {
    //         $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenPreguntaCreacion " . $idPreguntas[$i] . ',' . $idUltimo->IDFormatoExamen . ',' . $puntajeTotal . ',' . $NRRutUsuario . ',0');
    //     }
    // }


    /**
     * funcion de creacion de examen nueva pablo jimenez
     */
    public function crearExamen($prema, $NRDuracionminuto, $LGBorrador, $FCIngreso, $NRRutUsuario, $puntajeTotalGlobal, $idPreguntas, $CDReparticion, $IDTitulo, $IDAsignatura,$preguntasOrdenadas)
    {
        //echo json_encode($preguntasOrdenadas['preguntas'][0]);exit;exit;


		$IDDetalleCalendario = $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_BlastIDDetalleCalendario ");
		$IDDetalleCalendario = $IDDetalleCalendario->result()[0];
        $idFormatoExamenPrimero = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BUltimoIDFormatoExamenCreacion ");
        $idFormatoExamenPrimer = $idFormatoExamenPrimero->result()[0];
    
        $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenCreacion " . $prema . ',' . $NRDuracionminuto . ',' . $LGBorrador . ',' . $NRRutUsuario . ',0');

        $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_ICalendarioInscripcionCreacion " . '"' . $FCIngreso . '"' . ',' . $CDReparticion . ',' . $IDTitulo . ',' . $NRRutUsuario . ',0');

        $idtablaCalendarioInscripcion = $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_BlastIDCalendarioInscripcion ");
        $idtablaCalendarioInscripcion = $idtablaCalendarioInscripcion->result()[0];
        for ($i = 0; $i < count($IDAsignatura); ++$i) {
            $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IDetalleCalendarioCreacion  $idtablaCalendarioInscripcion->IDCalendario,$IDAsignatura[$i],'$FCIngreso', $NRRutUsuario ,0");
        }

        //IDDetalleCalendario Pa_BlastIDDetalleCalendario
        $IDDetalleCalendario = $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_BlastIDDetalleCalendario ");
        $IDDetalleCalendario = $IDDetalleCalendario->result()[0];
        $idFormatoExamenSegundo = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BUltimoIDFormatoExamenCreacion ");
        $idUltimo = $idFormatoExamenSegundo->result()[0];
        $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_IDetalleFormatoCalendarioCreacion ".$IDDetalleCalendario->IDDetalleCalendario.','.$idUltimo->IDFormatoExamen.','.$NRRutUsuario.',0');

        $puntajeTotal = $puntajeTotalGlobal / count($idPreguntas);
        // for ($i = 0; $i < count($idPreguntas); ++$i) {
        //     $this->db->query('exec ' ."Pjimenez." . "Pa_IFormatoExamenPreguntaCreacion " . $idPreguntas[$i] . ',' . $idUltimo->IDFormatoExamen . ',' . $puntajeTotal .','.($i+1). ',' . $NRRutUsuario . ',0');
        // }

        foreach($preguntasOrdenadas['preguntas'] as $key=>$pregunta){
            //echo ($pregunta['IDPregunta']);
            //$this->db->query('exec ' ."dbo." . "Pa_IFormatoExamenPreguntaCreacion " . $pregunta['IDPregunta'] . ',' . $idUltimo->IDFormatoExamen . ',' . $puntajeTotal .','.($key+1). ',' . $NRRutUsuario . ',0');
            $data = array(
                'IDPregunta'        =>     $pregunta['IDPregunta'],
                'IDFormatoExamen'   =>     $idUltimo->IDFormatoExamen,
                'FCIngreso'         =>     date('Y-m-d H:i:s'),
                'NRPuntaje'         =>     $puntajeTotal,
                'NRPosicion'        =>     $key+1,
                'NRRutUsuario'      =>     $NRRutUsuario,
                'FCExpiracion'      =>     NULL
            );
            //echo json_encode($data);exit;
            $this->db->insert('FormatoExamenPregunta', $data);
            $insert_id = $this->db->insert_id();
            if(isset($pregunta['Respuestas'])){
                foreach($pregunta['Respuestas'] as $key=>$respuesta){
                    //echo json_encode($respuesta['IDRespuesta']);
                     $this->db->query('exec ' ."dbo." . "Pa_IFormatoExamenRespuesta " . $insert_id . ',' . $respuesta['IDRespuesta'].',' .($key+1). ',' . $NRRutUsuario . ',0');
                }
            }
            
        }
    }



    public function crearExamenEdumarSinAsignatura($prema,$NRDuracionminuto,$LGBorrador,$FCIngreso,$NRRutUsuario,$puntajeTotalGlobal,$idPreguntas,$IDAsignatura,$IDDetalleCalendario){

        
    
        $idFormatoExamenPrimero = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BUltimoIDFormatoExamenCreacion ");
        $idFormatoExamenPrimer = $idFormatoExamenPrimero->result()[0];
        $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenCreacion " . $prema . ',' . $NRDuracionminuto . ',' . $LGBorrador . ',' . $NRRutUsuario . ',0');
        
        $idFormatoExamenSegundo = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BUltimoIDFormatoExamenCreacion ");
        $idUltimo = $idFormatoExamenSegundo->result()[0];
        for ($i = 0; $i < count($IDDetalleCalendario); ++$i) {
        $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_IDetalleFormatoCalendarioCreacion ".$IDDetalleCalendario[$i].','.$idUltimo->IDFormatoExamen.','.'"'.$FCIngreso.'"'.','.$NRRutUsuario.',0');
        }
        $puntajeTotal = $puntajeTotalGlobal / count($idPreguntas);
        for ($i = 0; $i < count($idPreguntas); ++$i) {
            $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenPreguntaCreacion " . $idPreguntas[$i] . ',' . $idUltimo->IDFormatoExamen . ',' . $puntajeTotal . ',' . $NRRutUsuario . ',0');
        }
    }


    public function buscarExamenCalendario(){
        //Pa_BbuscarCalendarioExamenes
        //$query = $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_BCalendarioExamenes ");
        //$query = $this->db->query('exec EvaluacionCompetencias.pjimenez.Pa_BbuscarCalendarioExamenesFiltro ');
        $query = $this->db->query('exec EvaluacionCompetencias.dbo.Pa_BbuscarCalendarioExamenesFiltro ');
        //$query = $this->db->query('exec dbo.Pa_BbuscarCalendarioExamenes ');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }
    public function buscarExamenCalendarioID($IDCalendario)
    {
        # code... BbuscarCalendarioExamenesIDcalendario
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Al crear la alternativa",
        );
        if (!isset($IDCalendario)) {
            return $MensajeError;
        }
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'Pa_BbuscarCalendarioExamenesIDcalendario ' . $IDCalendario);
        if ($query->num_rows() > 0) {
            return $query->result()[0];
        } else {
            return 0;
        }
    }
    public function buscarCalendarioExamenesAreaAsignatura($IDCalendario)
    {
        # code... BbuscarCalendarioExamenesIDcalendario
        //pa_BAsignaturaXCalendarioconGlosa
        //$query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'BbuscarCalendarioExamenesIDcalendario ' . $IDTitulo);
        $query = $this->db->query('exec EvaluacionCompetencias.dbo.pa_BAsignaturaXCalendarioconGlosa ' . $IDCalendario);
        return $query->result();    
    }

    //FUNCION NUMERO 1
    public function buscarDatoCalendario($IDDetalleCalendario)
    {
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Al crear la alternativa",
        );
        if (!isset($IDDetalleCalendario)) {
            return $MensajeError;
        }
        $queryDetalleCalendario = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'pa_BDetallePreECalendario ' . $IDDetalleCalendario);
        if ($queryDetalleCalendario->num_rows() > 0) {
            return $queryDetalleCalendario->result();
        } else {
            return 0;
        }
    }
    //FUNCION 2
    public function buscarDatoTituloArea($IDTitulo)
    {
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Al crear la alternativa",
        );
        if (!isset($IDTitulo)) {
            return $MensajeError;
        }
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'pa_BDetallePreETituloArea ' . $IDTitulo);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }
    //FUNCION 3
    public function buscarSinAsignatura($IDTitulo)
    {
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Al crear la alternativa",
        );
        if (!isset($IDTitulo)) {
            return $MensajeError;
        }
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'pa_BDetalleSinAsig ' . $IDTitulo);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }
    //FUNCION 4
    public function buscarAsignatura($IDAsignatura)
    {
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Al crear la alternativa",
        );
        if (!isset($IDAsignatura)) {
            return $MensajeError;
        }
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'pa_BDetalleAsig ' . $IDAsignatura);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    public function buscarCalendarioExamenesReparticion($IDTitulo, $IDAsignatura)
    {
        # code... BbuscarCalendarioExamenesIDcalendario
        $MensajeError = array(
            "error" => true,
            "Mensaje" => "Al crear la alternativa",
        );
        if (!isset($IDTitulo, $IDAsignatura)) {
            return $MensajeError;
        }
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'Pa_BbuscarCalendarioExamenesReparticion ' . $IDTitulo . ',' . $IDAsignatura);
            return $query->result_array();
     
    }
    public function listaExamenes()
    {

        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'Pa_BListadoExamenes ');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }
    public function verExamen($IDFormatoExamen){
        
        $this->db->select('*');
        $this->db->from('FormatoExamen FE');
        $this->db->join("FormatoExamenPregunta FEP", "FE.IDFormatoExamen = FEP.IDFormatoExamen");
        $this->db->join("Pregunta P", "FEP.IDPregunta = P.IDPregunta");
        $this->db->where('FE.FCExpiracion',NULL);
        $this->db->where('FEP.FCExpiracion',NULL);
        $this->db->where('P.FCExpiracion',NULL);
        $this->db->where('FE.IDFormatoExamen',$IDFormatoExamen);
        $this->db->order_by('FEP.NRPosicion', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function pautaCorreccionDesarrollo($IDFormatoExamen)
    {
        $this->db->select('FormatoExamen.IDFormatoExamen, 
        FormatoExamenPregunta.IDFormatoExamenPregunta, 
        FormatoExamenPregunta.NRPosicion, 
        FormatoExamenRespuesta.NRPosicion AS NRPosicionRespuesta, 
        Respuesta.IDRespuesta, 
        Respuesta.GLRespuesta, 
        Respuesta.LGCorrecta, 
        Respuesta.FCExpiracion,
        pregunta.CDTPPregunta, 
        FormatoExamenPregunta.IDPregunta');
        $this->db->from('FormatoExamen');
        $this->db->join("FormatoExamenPregunta", "FormatoExamen.IDFormatoExamen = FormatoExamenPregunta.IDFormatoExamen");
        $this->db->join("Pregunta", "pregunta.IDPregunta = FormatoExamenPregunta.IDPregunta");
        $this->db->join("FormatoExamenRespuesta", "FormatoExamenPregunta.IDFormatoExamenPregunta = FormatoExamenRespuesta.IDFormatoExamenPregunta");
        $this->db->join("Respuesta", "FormatoExamenRespuesta.IDRespuesta = Respuesta.IDRespuesta");
        $this->db->where('FormatoExamen.IDFormatoExamen',$IDFormatoExamen);
        $this->db->where('Pregunta.CDTPPregunta',2);
        $this->db->order_by('FormatoExamenRespuesta.NRPosicion', 'ASC');
        $query = $this->db->get();
        return $query->result();
       
    //    $this->db->query("SELECT        
    //     *
    //     FROM  FormatoExamen INNER JOIN
    //           FormatoExamenPregunta ON FormatoExamen.IDFormatoExamen = FormatoExamenPregunta.IDFormatoExamen INNER JOIN
    //           FormatoExamenRespuesta ON FormatoExamenPregunta.IDFormatoExamenPregunta = FormatoExamenRespuesta.IDFormatoExamenPregunta INNER JOIN
    //           Respuesta ON FormatoExamenRespuesta.IDRespuesta = Respuesta.IDRespuesta
    //     WHERE        (FormatoExamen.IDFormatoExamen = 653)
    //     order by FormatoExamenRespuesta.NRPosicion asc");

    //     $query = $this->db->get();
    //     return $query->result();


    }




    public function verExamen1($IDFormatoExamen){
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'Pa_BExamenPregunta '.$IDFormatoExamen);

        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    public function pa_UExpirarPregunta($IDPregunta){
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'pa_UExpirarPregunta '.$IDPregunta);
        return $query->result();
    }

    public function Pa_BNivel(){
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'Pa_BNivel ');
        return $query->result();
    }
    public function Pa_BTPArea(){
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'Pa_BTPArea ');
        return $query->result();
    }
    public function pa_UExpirarArea($CDTPArea){
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'pa_UExpirarArea '.$CDTPArea);
        return $query->result();
    }

    /**
     * Se actualiza la funcion dado que no se habìa expirado los registros en la tabla FormatoExamenRespuesta
     */
    public function PA_MPreguntaFormatoExamen ($IDPregunta,$IDFormatoExamen,$GLPregunta,$NRRutUsuario ,$Resultado){ 
        $datoFormatoExamenPregunta = $this->getIDFormatoExamenPregunta($IDPregunta,$IDFormatoExamen);
        // echo $this->db->last_query();
        if (isset($datoFormatoExamenPregunta)) {
            $this->db->query('exec ' . $this->config->item("usuarioBD3") . "PA_MPreguntaFormatoExamen $IDPregunta,$IDFormatoExamen,'$GLPregunta',$NRRutUsuario ,$Resultado");
            // echo $this->db->last_query();
            //se expiran las respuestas de un formato examen que fue actualizado
            $this->UPDateFormatoExamenRespuesta($datoFormatoExamenPregunta->IDFormatoExamenPregunta);
            // echo $this->db->last_query();
            //se busca la nueva pregunta insertada en el formato examenPregunta para asociar las respuestas
            $IDFormatoExamenPregunta = $this->selectMaxIDFormatoExamenPregunta($IDFormatoExamen,$NRRutUsuario);
            // echo $this->db->last_query();
            //se buscan las respuestas de una nueva pregunta que fue asociada al FormatoExamenPregunta
            $respuestas = $this->getPreguntaRespuestasFormatoExamen($IDFormatoExamenPregunta->IDFormatoExamenPregunta);
            // echo $this->db->last_query();
            //con las respuestas q se encontraron se insertan los registros correspondientes en la tabla formatoexamenrespuesta
            foreach($respuestas as $key=>$respuesta){
                $this->InsertFormatoExamenRespuesta($IDFormatoExamenPregunta->IDFormatoExamenPregunta,$respuesta->IDRespuesta,($key+1),$NRRutUsuario);
                // echo $this->db->last_query();
            }

        }
    }
    public function getIDFormatoExamenPregunta($IDPregunta,$IDFormatoExamen){
        $this->db->select('*');
        $this->db->from('FormatoExamen FE');
        $this->db->join('FormatoExamenPregunta FEP', 'FE.IDFormatoExamen = FEP.IDFormatoExamen');
        $this->db->where('FE.IDFormatoExamen',$IDFormatoExamen);
        $this->db->where('FEP.IDPregunta', $IDPregunta);
        $query = $this->db->get();
        return $query->result()[0];
    }
    public function UPDateFormatoExamenRespuesta($IDFormatoExamenPregunta = ''){
        $FCExpiracion = date('Y-m-d H:i:s');
        $data = array(
            'FCExpiracion' => $FCExpiracion,
        );
        $this->db->where('FormatoExamenRespuesta.IDFormatoExamenPregunta', $IDFormatoExamenPregunta);
        $this->db->update('FormatoExamenRespuesta', $data);
    }

    public function selectMaxIDFormatoExamenPregunta($IDFormatoExamen,$NRRutUsuario){
        // $IDFormatoExamen = 478;
        // $NRRutUsuario = 7187031;
        $this->db->select_max('IDFormatoExamenPregunta');
        $this->db->where(array('IDFormatoExamen' => $IDFormatoExamen,'NRRutUsuario'=> $NRRutUsuario));
        $query = $this->db->get('FormatoExamenPregunta');
        return $query->result()[0];
    }
    //funcion que busca la pregunta de un FormatoExamenPregunta con IDFormatoExamenPregunta y filtra las repuestas que se asocian a esa pregunta.
    public function getPreguntaRespuestasFormatoExamen($IDFormatoExamenPregunta = ''){
        $this->db->select('*');
        $this->db->where(array('IDFormatoExamenPregunta' => $IDFormatoExamenPregunta));
        $query = $this->db->get('FormatoExamenPregunta');
        $respuestas = $this->pa_BRespuestaPorIDPregunta($query->result()[0]->IDPregunta);
        return $respuestas;
    }
    public function InsertFormatoExamenRespuesta($IDFormatoExamenPregunta,$IDRespuesta,$iterator,$NRRutUsuario){
        $data = array(
                'IDFormatoExamenPregunta' => $IDFormatoExamenPregunta,
                'IDRespuesta' => $IDRespuesta,
                'FCIngreso' => date('Y-m-d H:i:s'),
                'NRPosicion' => $iterator,
                'NRRutUsuario' => $NRRutUsuario,
                'FCExpiracion' => NULL,
        );
        $this->db->insert('FormatoExamenRespuesta', $data);
    }















    public function PA_BContadorAsignatura(){
        
        //$query = $this->db->query('EvaluacionCompetencias.freyesv.PA_BContadorAsignatura');
        $query = $this->db->query('EvaluacionCompetencias.dbo.PA_BContadorAsignatura');
        return $query->result();
    }
    //mantenedor PERSONA MAURICIO
    public function PA_IAreaPersona($IDPersona, $CDTPArea, $NRRutUsuario){
        $query = $this->db->query("EvaluacionCompetencias." . $this->config->item("usuarioBD") . "PA_IAreaPersona $IDPersona, $CDTPArea, $NRRutUsuario");
        return $query->result();
    }
    public function PA_BUltimoValorDolar(){
        $query = $this->db->query("EvaluacionCompetencias." . $this->config->item("usuarioBD1") . ".PA_BUltimoValorDolar");
        return $query->result();
    }
 
  

    #################################
    #    Creado Por Carlos Alvarez (05-08-2015)....
    #    Descripcion: Funciones Estandar para optimizar el tiempo de Desarrollo.
    #
    #
    #################################

    public function _sql($Table, $Where = '', $Orden = '', $Limit = '', $Conn = 'default')
    {

        $dbConeccion = $this->load->database($Conn, true);

        if ($Orden) {
            $dbConeccion->order_by($Orden);
        }

        if ($Limit) {
            $dbConeccion->limit($Limit);
        }

        if ($Where) {
            foreach ($Where as $key => $w) {
                if ($key) {
                    $dbConeccion->where($key, $w);
                } else {
                    $dbConeccion->where($w);
                }
            }
        }

        $query = $dbConeccion->get($Table);
        //echo '<br>'. $dbConeccion->last_query();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function _select($Table, $Where, $Conn = 'ControlAccesoEscritura', $Orden = '')
    {
        $dbConeccion = $this->load->database($Conn, true);
        if ($Where) {
            foreach ($Where as $key => $w) {
                if ($key) {
                    $dbConeccion->where($key, $w);
                } else {
                    $dbConeccion->where($w);
                }
            }
        }
        if ($Orden) {
            $dbConeccion->order_by($Orden);
        }
        $query = $dbConeccion->get($Table);
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function _selectCount($Table, $Where, $Conn = 'ControlAccesoEscritura')
    {

        $dbConeccion = $this->load->database($Conn, true);
        if ($Where) {
            foreach ($Where as $key => $w) {
                if ($key) {
                    $dbConeccion->where($key, $w);
                } else {
                    $dbConeccion->where($w);
                }
            }
        }
        $dbConeccion->select('count(*) as Cont');
        $query = $dbConeccion->get($Table);
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function _selectMax($Table, $IdCampo)
    {
        $this->db->select_max($IdCampo, 'MaximoId');
        $query = $this->db->get($Table);
        $this->LastQuery();

        if ($query->num_rows() > 0) {
            return $query->row()->MaximoId;
        }
    }

    public function _Correlativo($Table, $IdCampo)
    {
        $this->db->select_max($IdCampo, 'Correlativo');
        $query = $this->db->get($Table);
        $this->LastQuery();

        if ($query->num_rows() > 0) {
            return $query->row()->Correlativo + 1;
        }
    }

    public function _SaveData($Table, $Array, $Where, $opc, $MaxChange = '', $Conn = 'default')
    {

        $dbConeccion = $this->load->database($Conn, true);

        if ($opc == 1) {
            //echo var_dump($Array);
            $dbConeccion->insert($Table, $Array);
            // echo $dbConeccion->last_query();
            return $dbConeccion->insert_id();
        } else {
            //$dbConeccion->where($Where);
            if ($Where) {
                foreach ($Where as $key => $w) {
                    if ($key) {
                        $dbConeccion->where($key, $w);
                    } else {
                        $dbConeccion->where($w);
                    }
                }
            }

            $dbConeccion->update($Table, $Array);
            // echo $dbConeccion->last_query();
            if ($MaxChange) {
                return $MaxChange;
            } else {
                return '';
            }
        }
    }

    public function _Delete($table, $where, $Conn)
    {
        $dbConeccion = $this->load->database($Conn, true);
        $dbConeccion->where($where);
        $dbConeccion->delete($table);
    }

    private function LastQuery()
    {
        return $this->db->last_query();
    }
    #####Pablo
    //Traer areas por titulo
    //Traer asignaturas por areas
    ##### Mauricio
    public function getTarifas($IDTarifa){
        //$DB2 = $this->load->database('Tarificador', TRUE); 
        $DBRanokaut = $this->load->database('Tarificador', TRUE);
        $query = $DBRanokaut->query('exec Tarificador.dbo.Pa_BTarifas '.$IDTarifa);
        if($query){
            return $query->result();
        }else{
            return array();
        }
        
	}
	public function pa_BAsignaturasPorID($IDAsignatura){
        $query = $this->db->query("exec EvaluacionCompetencias.".$this->config->item("usuarioBD1").".[pa_BAsignaturasPorID] $IDAsignatura ");
        return $query->result();
	}
	public function PA_BTitulosPorID($IDTitulo){
        $query = $this->db->query("exec EvaluacionCompetencias.".$this->config->item("usuarioBD1").".[PA_BTitulosPorID] $IDTitulo ");
        return $query->result();
	}
	public function pa_BRestriccionesPorTitulo($IDTitulo){
        $query = $this->db->query("exec EvaluacionCompetencias.".$this->config->item("usuarioBD1").".[pa_BRestriccionesPorTitulo] $IDTitulo ");
        return $query->result();
	}
	public function pa_EAreaAsignatura($CDTPArea,$IDAsignatura){
        $query = $this->db->query("exec EvaluacionCompetencias.".$this->config->item("usuarioBD1").".[pa_EAreaAsignatura] $CDTPArea,$IDAsignatura,0 ");
        return $query->result();
	}
	public function pa_MAsignatura($IDAsignatura,$GLAsignatura){
        $resultado = $this->db->query('exec ' . $this->config->item("usuarioBD") . "pa_MAsignatura " . $IDAsignatura . ',' . '"' . $GLAsignatura . '"');
        //$resultado = $this->db->query("exec ".$this->config->item("usuarioBD")."pa_MAsignatura $IDAsignatura".'"'.$GLAsignatura.'"');
        //$query = $this->db->query("exec EvaluacionCompetencias.".'dbo'.".pa_MAsignatura $IDAsignatura,'$GLAsignatura',".$_SESSION["NRRutUsuario"].",0");
        return $resultado->result();
	}



    /*PABLO JIMENEZ PERMISOS APLICACION*/
	public function PA_BPermisoAplicacion($NRRut,$CDAplicacion){
        //se agregaron la conexion directo a eta ya que el PA no se encuentra en ranokau
        $DBSQL = $this->load->database('sql', TRUE);
        //$query = $this->db->query("exec EvaluacionCompetencias.".$this->config->item("usuarioBD1").".[PA_BPermisoAplicacion] $NRRut,$CDAplicacion ");
        $query = $DBSQL->query("exec AccesoAp.dbo.[PA_BPermisoAplicacionSieval] $NRRut,$CDAplicacion ");
        //$query = $DBSQL->query("exec EvaluacionCompetencias.".$this->config->item("usuarioBD1").".[PA_BPermisoAplicacion] $NRRut,$CDAplicacion ");
        //$query = $DBETA->query("exec EvaluacionCompetencias.".$this->config->item("usuarioBD2").".[PA_BPermisoAplicacion] $NRRut,$CDAplicacion ");
        return $query->result();
	}
	public function PA_BTPAreas(){
        $query = $this->db->query("exec EvaluacionCompetencias.".$this->config->item("usuarioBD1").".PA_BTPAreas ");
        return $query->result();
	}
	public function PA_BTPTitulo(){
        $query = $this->db->query("exec EvaluacionCompetencias.".$this->config->item("usuarioBD1").".[PA_BTPTitulo] ");
        return $query->result();
	}
	
	public function VI_TituloMatricula (){
        $query = $this->db->query("select * from EvaluacionCompetencias.".$this->config->item("usuarioBD1").".[VI_TituloMatriculaDetalle ] ");
        return $query->result();
    }
	public function VI_TarifaTitulo (){
        //$query = $this->db->query("select * from EvaluacionCompetencias.".$this->config->item("usuarioBD2").".[VI_TarifaTitulo ] ");
        $query = $this->db->query("select * from EvaluacionCompetencias.".$this->config->item("usuarioBD1").".[VI_TarifaTitulo ] ");
        return $query->result();
    }
	public function VI_PersonaSieval ($CDTPArea){
        $query = $this->db->query("select * from EvaluacionCompetencias.".$this->config->item("usuarioBD1").".[VI_PersonasSieval] where CDTPArea= $CDTPArea");
        //$query = $this->db->query("select * from EvaluacionCompetencias.dbo.[VI_PersonaGeneral] where CDTPArea= $CDTPArea");
        return $query->result();
    }
    public function VI_TituloMatriculaPorIDTitulo ($IDTitulo){
        $query = $this->db->query("select * from EvaluacionCompetencias.".$this->config->item("usuarioBD1").".[VI_TituloMatriculaDetalle ] where IDTitulo =$IDTitulo ");
        return $query->result();
    }
    public function PA_UAreaAsignatura($ID){
        //$this->db->query('EvaluacionCompetencias.freyesv.PA_UAreaAsignatura '.$ID);
        //$this->db->query('EvaluacionCompetencias.'.$this->config->item("usuarioBD3").'PA_UAreaAsignatura '.$ID);
        $this->db->query('EvaluacionCompetencias.dbo.PA_UAreaAsignatura '.$ID);
    }


    /*funcion que trae los titulos con ensayo*/ 
    public function Pa_BEnsayoTitulo(){
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'Pa_BEnsayoTitulo ');
        return $query->result();
    }
    /*funcion que trae los titulos con ensayo*/
    public function PA_UTituloPregunta($ID){
        //$this->db->query('EvaluacionCompetencias.freyesv.PA_UTituloPregunta '.$ID);
        $this->db->query('EvaluacionCompetencias.'.$this->config->item("usuarioBD3").'PA_UTituloPregunta '.$ID);
        //$this->db->query('EvaluacionCompetencias.dbo.PA_UTituloPregunta '.$ID);
    }
    public function PA_UTarifaTitulo($ID){
        $this->db->query('EvaluacionCompetencias.'.$this->config->item("usuarioBD3").'PA_UTarifaTitulo '.$ID);
        //$this->db->query('EvaluacionCompetencias.dbo.PA_UTarifaTitulo '.$ID);
    }
    public function pa_BPreguntasPorAsignaturaPorNivel($IDAsignatura, $IDNivel){       
            $query = $this->db->query('exec ' . $this->config->item("usuarioBD1") . ".pa_BPreguntasPorAsignaturaPorNivel $IDAsignatura, $IDNivel" );
            return $query->result();
    }
    public function PA_UAreaPersona($ID){
        //$this->db->query('EvaluacionCompetencias.freyesv.PA_UAreaPersona '.$ID);
        $this->db->query('EvaluacionCompetencias.'.$this->config->item("usuarioBD3").'PA_UAreaPersona '.$ID);
        //$this->db->query('EvaluacionCompetencias.dbo.PA_UAreaPersona '.$ID);
    }
    public function PA_EAreaPersona($IDPersona,$CDTPArea,$NRRutUsuario){
        $this->db->query("EvaluacionCompetencias.".$this->config->item("usuarioBD1").".PA_EAreaPersona $IDPersona,$CDTPArea");
        //,$NRRutUsuario");
    }

    public function pa_BAsignaturasIDCDTPArea($CDTPArea)
    {
        
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'pa_BAsignaturasIDCDTPArea ' . $CDTPArea);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function pa_BAsignaturaporTitulo1($CDTitulo)
    {
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'pa_BAsignaturaporTitulo ' . $CDTitulo);
        return $query->result();
    }

   /* public function pa_IAreaAsignatura($CDTPArea, $NRRutUsuario)
    {  
         //$query = $this->db->query('exec Evaluacioncompetencias.dbo.pa_BAsignaturaporTitulo ' . $CDTitulo);
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'pa_IAreaAsignatura ' . $CDTPArea.','.$NRRutUsuario);
        return $query->result();        
    }*/

    public function pa_BAsignaturaNOTitulo($CDTitulo)
    {
         //$query = $this->db->query('exec Evaluacioncompetencias.dbo.pa_BAsignaturaporTitulo ' . $CDTitulo);
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD1") . '.pa_BAsignaturaNOTitulo ' . $CDTitulo);
        return $query->result();
        
    }
    public function PA_BPreguntasPorID($IDPregunta){
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD1") . '.PA_BPreguntasPorID ' . $IDPregunta);
        return $query->result();
    }
    public function Pa_BPersonaNOAreaPorRut($CDTPArea,$NRRut){
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD1") . ".Pa_BPersonaNOAreaPorRut $CDTPArea,$NRRut");
        return $query->result();
    }

    

    //Mauricio Mantenedor persona
    public function PA_BAreaPersona($ID , $tipo){
        //$query = $this->db->query('EvaluacionCompetencias.freyesv.PA_BAreaPersona '.$ID.','.$tipo);
        $query = $this->db->query('EvaluacionCompetencias.dbo.PA_BAreaPersona '.$ID.','.$tipo);
        return $query->result();
    }
    public function PA_BPreguntasExamen($ID,$CDTPNivel){
        //$query = $this->db->query("EvaluacionCompetencias.freyesv.PA_BPreguntasExamen $ID,$CDTPNivel");
        $query = $this->db->query("EvaluacionCompetencias.dbo.PA_BPreguntasExamen $ID,$CDTPNivel");
        return $query->result();
    }
    //funcion de contador 
    public function PA_BContadores($op, $ID){
        //$query = $this->db->query("EvaluacionCompetencias.freyesv.PA_BContadores $op,$ID");
        $query = $this->db->query("EvaluacionCompetencias.dbo.PA_BContadores $op,$ID");
        return $query->result();
    }

    public function Pa_UHabilitarEnsayo($opc,$IDTituloPractica)
    {
        # code...
        $this->db->query('exec ' . $this->config->item("usuarioBD") . 'Pa_UHabilitarEnsayo ' . $opc.','.$IDTituloPractica);
    }
    public function pa_IPregunta($CDTPPregunta,$IDAsignatura,$CDTPNivel,$GLPregunta,$GLRutaImagen,$NRRutUsuario){
        $cadena = strip_tags($GLPregunta);
        if (isset($GLRutaImagen)) {
            $ruta = null;
        }
        $ruta = $GLRutaImagen;
        echo $CDTPPregunta.'cdtpre    '.$IDAsignatura.' idas   '.$CDTPNivel.'nivel    '.$GLPregunta.'glosa    '.$ruta.'ruta    '.$NRRutUsuario;
        $this->db->query('exec ' . $this->config->item("usuarioBD") . 'pa_IPregunta ' . $CDTPPregunta.','.$IDAsignatura.','.$CDTPNivel,','.'"'.$cadena.'"'.','.$ruta.','.$NRRutUsuario);
    }


    public function PA_BEstadoRespuestaPregunta($IDPregunta)
    {
        # code...
        return $this->db->query('exec ' . $this->config->item("usuarioBD1") . '.PA_BEstadoRespuestaPregunta ' . $IDPregunta)->result()[0];
    }
    //Pa_BTituloPregunta
    public function Pa_BTituloPreguntaReporte()
    {
      $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'Pa_BTituloPreguntaReporte ');
      return $query->result();
    }
    //Pa_ETituloPregunta
    public function Pa_ETituloPregunta($IDTituloPregunta)
    {
      $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'Pa_ETituloPregunta '.$IDTituloPregunta);
      return $query->result();
    }
    
    
    public function asignaturasportitulo($IDTituloPregunta)
    {
      $query = $this->db->query('exec ' . $this->config->item("usuarioBD1") . '.pa_BAsignaturaPorTitulo '.$IDTituloPregunta);
      return $query->result();
    }

    public function Pa_BTituloPreguntaPorIDAsignaturaIDTitulo($IDAsignatura,$IDTitulo)
    {
        
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'Pa_BTituloPreguntaPorIDAsignaturaIDTitulo '.$IDAsignatura.','.$IDTitulo);
        return $query->result();
    }

    public function Pa_ITituloPregunta($IDTitulo,$CDTPNivel,$IDAsignatura,$NRPregunta)
    {
        $query = $this->db->query('exec ' . $this->config->item("usuarioBD") . 'Pa_ITituloPregunta '.$IDTitulo.','.$CDTPNivel.','.$IDAsignatura.','.$NRPregunta.','.$_SESSION["NRRutUsuario"].',0');
    }

    public function pa_BConfiguracionesPorTitulo($IDTitulo){
        $query = $this->db->query("exec EvaluacionCompetencias.". $this->config->item("usuarioBD1") .".[pa_BConfiguracionesPorTitulo] $IDTitulo ");
        return $query->result();
    }
    
    public function Pa_UTituloPreguntaActualizado($IDTitulo,$IDAsignatura){
        $query = $this->db->query("exec EvaluacionCompetencias.". $this->config->item("usuarioBD") ."[Pa_UTituloPregunta] $IDTitulo,$IDAsignatura,0 ");
        return $query->result();
    }

    public function Pa_ETitulo($IDTitulo)
    {
        $query = $this->db->query("exec EvaluacionCompetencias.". $this->config->item("usuarioBD") ."[Pa_ETitulo] $IDTitulo, 0");
        return $query->result();
    }
    //Pa_UTitulo
    public function Pa_UTitulo($IDTitulo)
    {
        $query = $this->db->query("exec EvaluacionCompetencias.". $this->config->item("usuarioBD") ."[Pa_UTitulo] $IDTitulo ");
        return $query->result();
    }


    public function funcionagenerarexamen($prema,$NRDuracionminuto,$LGBorrador,$FCIngreso,$NRRutUsuario,$puntajeTotalGlobal,$idPreguntas,$IDAsignatura,$IDDetalleCalendario){	
        $idFormatoExamenPrimero = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BUltimoIDFormatoExamenCreacion ");
        $idFormatoExamenPrimer = $idFormatoExamenPrimero->result()[0];
        $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenCreacion " . $prema . ',' . $NRDuracionminuto . ',' . $LGBorrador . ',' . $NRRutUsuario . ',0');
        
        $idFormatoExamenSegundo = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BUltimoIDFormatoExamenCreacion ");
        $idUltimo = $idFormatoExamenSegundo->result()[0];
        for ($i = 0; $i < count($IDDetalleCalendario); ++$i) {
        $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_IDetalleFormatoCalendarioCreacion ".$IDDetalleCalendario[$i].','.$idUltimo->IDFormatoExamen.','.$NRRutUsuario.',0');
        }
        $puntajeTotal = $puntajeTotalGlobal / count($idPreguntas);
        for ($i = 0; $i < count($idPreguntas); ++$i) {
            $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenPreguntaCreacion " . $idPreguntas[$i] . ',' . $idUltimo->IDFormatoExamen . ',' . $puntajeTotal . ',' . $NRRutUsuario . ',0');
        }
    }









    //insert en la tabla FormatoExamen
    public function Pa_IFormatoExamenCreacion($NRPuntajeAprueba,$NRDuracionminuto,$LGBorrador,$NRRutUsuario)
    {
        $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenCreacion " . $NRPuntajeAprueba . ',' . $NRDuracionminuto . ',' . $LGBorrador . ',' . $NRRutUsuario . ',0');
        return $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BUltimoIDFormatoExamenCreacion ")->result()[0];
    }
    //insert en la Tabla DetalleFormatoCalendario
    public function Pa_IDetalleFormatoCalendarioCreacion($IDDetalleCalendario,$NRRutUsuario,$IDFormatoExamen)
    {
        for ($i = 0; $i < count($IDDetalleCalendario); ++$i) {
            $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_IDetalleFormatoCalendarioCreacion ".$IDDetalleCalendario[$i].','.$IDFormatoExamen->IDFormatoExamen.','.$NRRutUsuario.',0');
        }
    }
    //insert en la tabla FormatoExamenPregunta
    public function Pa_IFormatoExamenPreguntaCreacion($puntajeTotalGlobal,$IDPregunta,$NRRutUsuario)
    {
        $IDFormatoExamen = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BUltimoIDFormatoExamenCreacion ")->result()[0];
        $puntajeTotal = $puntajeTotalGlobal / count($IDPregunta);
        for ($i = 0; $i < count($IDPregunta); ++$i) {
            $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenPreguntaCreacion " . $IDPregunta[$i] . ',' . $IDFormatoExamen ->IDFormatoExamen . ',' . $puntajeTotal . ',' . $NRRutUsuario . ',0');
        }
        
    }

    // public function crearExamenEdumar($prema,$NRDuracionminuto,$LGBorrador,$NRRutUsuario,$puntajeTotalGlobal,$idPreguntas,$IDDetalleCalendario){
        
      
    //     $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenCreacion " . $prema . ',' . $NRDuracionminuto . ',' . $LGBorrador . ',' .  $_SESSION["NRRutUsuario"]. ',0');
        
    //     $idFormatoExamen = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BUltimoIDFormatoExamenCreacion ");
    //     $idUltimo = $idFormatoExamen->result()[0];



    //     //echo json_encode($idUltimo);exit;
    //     foreach($IDDetalleCalendario as $key=>$detalleCalendario){
    //         $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_IDetalleFormatoCalendarioCreacion ".$detalleCalendario.','.$idUltimo->IDFormatoExamen.','.$_SESSION["NRRutUsuario"].',0');
    //     }
    //     /*for ($i = 0; $i < count($IDDetalleCalendario); ++$i) {
    //     $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_IDetalleFormatoCalendarioCreacion ".$IDDetalleCalendario[$i].','.$idUltimo->IDFormatoExamen.','.$_SESSION["NRRutUsuario"].',0');
    //     }*/
    //     $puntajeTotal = $puntajeTotalGlobal / count($idPreguntas);
    //     for ($i = 0; $i < count($idPreguntas); ++$i) {
    //         $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenPreguntaCreacion " . $idPreguntas[$i] . ',' . $idUltimo->IDFormatoExamen . ',' . $puntajeTotal . ',' . $_SESSION["NRRutUsuario"] . ',0');
    //     }
    // }

    public function pa_BRespuestaPorIDPregunta($IDPregunta){
        $query = $this->db->query("exec EvaluacionCompetencias.".$this->config->item("usuarioBD1").".[Pa_BRespuestaporidpregunta] $IDPregunta ");
        //$query = $this->db->query("exec EvaluacionCompetencias.dbo.[pa_BRespuestaPorIDPregunta] $IDPregunta ");
        return $query->result();
    }
    
    public function pa_BRespuestaPorIDPreguntaFormatoExamen($IDPregunta){
        //$query = $this->db->query("exec EvaluacionCompetencias.".$this->config->item("usuarioBD1").".[pa_BRespuestaPorIDPregunta] $IDPregunta ");
        //pa_BRespuestaPorIDFormatoExamenPreguntaIDPregunta
        $query = $this->db->query("exec EvaluacionCompetencias.dbo.[pa_BRespuestaPorIDFormatoExamenPreguntaIDPregunta] $IDPregunta ");
        //$query = $this->db->query("exec EvaluacionCompetencias.dbo.[pa_BRespuestaPorIDPregunta] $IDPregunta ");
        return $query->result();
    }

    public function crearExamenEdumar($prema,$NRDuracionminuto,$LGBorrador,$NRRutUsuario,$puntajeTotalGlobal,$idPreguntas,$IDDetalleCalendario,$preguntasOrdenadas){

        //echo var_dump($preguntasOrdenadas);exit;exit;
        
      
        $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenCreacion " . $prema . ',' . $NRDuracionminuto . ',' . $LGBorrador . ',' .  $_SESSION["NRRutUsuario"]. ',0');
        
        $idFormatoExamen = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BUltimoIDFormatoExamenCreacion ");
        $idUltimo = $idFormatoExamen->result()[0];



        //echo json_encode($idUltimo);exit;
        foreach($IDDetalleCalendario as $key=>$detalleCalendario){
            $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_IDetalleFormatoCalendarioCreacion ".$detalleCalendario.','.$idUltimo->IDFormatoExamen.','.$_SESSION["NRRutUsuario"].',0');
        }
        /*for ($i = 0; $i < count($IDDetalleCalendario); ++$i) {
        $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_IDetalleFormatoCalendarioCreacion ".$IDDetalleCalendario[$i].','.$idUltimo->IDFormatoExamen.','.$_SESSION["NRRutUsuario"].',0');
        }*/
        $puntajeTotal = $puntajeTotalGlobal / count($idPreguntas);
        // for ($i = 0; $i < count($idPreguntas); ++$i) {
        //     $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenPreguntaCreacion " . $idPreguntas[$i] . ',' . $idUltimo->IDFormatoExamen . ',' . $puntajeTotal . ',' . $_SESSION["NRRutUsuario"] . ',0');
        // }

        foreach($preguntasOrdenadas as $key=>$pregunta){
            //echo ($pregunta['IDPregunta']);
            $data = array(
                'IDPregunta'        =>     $pregunta['IDPregunta'],
                'IDFormatoExamen'   =>     $idUltimo->IDFormatoExamen,
                'FCIngreso'         =>     date('Y-m-d H:i:s'),
                'NRPuntaje'         =>     $puntajeTotal,
                'NRPosicion'        =>     $key+1,
                'NRRutUsuario'      =>     $NRRutUsuario,
                'FCExpiracion'      =>     NULL
            );
            //echo json_encode($data);exit;
            $this->db->insert('FormatoExamenPregunta', $data);
            $insert_id = $this->db->insert_id();


            //$this->db->query('exec ' ."dbo." . "Pa_IFormatoExamenPreguntaCreacion " . $pregunta['IDPregunta'] . ',' . $idUltimo->IDFormatoExamen . ',' . $puntajeTotal .','.($key+1). ',' . $NRRutUsuario . ',0');
            //$insert_id = $this->db->insert_id();
            if(isset($pregunta['Respuestas'])){
                foreach($pregunta['Respuestas'] as $key=>$respuesta){
                    //echo json_encode($respuesta['IDRespuesta']);
                     $this->db->query('exec ' ."dbo." . "Pa_IFormatoExamenRespuesta " . $insert_id . ',' . $respuesta['IDRespuesta'].',' .($key+1). ',' . $NRRutUsuario . ',0');
                }
            }
            
        }


    }

    public function crearExamenEdumar1($prema,$NRDuracionminuto,$LGBorrador,$FCIngreso,$NRRutUsuario,$puntajeTotalGlobal,$idPreguntas,$IDAsignatura,$IDDetalleCalendario){	
        $idFormatoExamenPrimero = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BUltimoIDFormatoExamenCreacion ");
        $idFormatoExamenPrimer = $idFormatoExamenPrimero->result()[0];
        $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenCreacion " . $prema . ',' . $NRDuracionminuto . ',' . $LGBorrador . ',' . $NRRutUsuario . ',0');
        
        $idFormatoExamenSegundo = $this->db->query('exec ' . $this->config->item("usuarioBD") . " pa_BUltimoIDFormatoExamenCreacion ");
        $idUltimo = $idFormatoExamenSegundo->result()[0];
        for ($i = 0; $i < count($IDDetalleCalendario); ++$i) {
        $this->db->query('exec ' . $this->config->item("usuarioBD") . " Pa_IDetalleFormatoCalendarioCreacion ".$IDDetalleCalendario[$i].','.$idUltimo->IDFormatoExamen.','.$NRRutUsuario.',0');
        }
        $puntajeTotal = $puntajeTotalGlobal / count($idPreguntas);
        for ($i = 0; $i < count($idPreguntas); ++$i) {
            $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_IFormatoExamenPreguntaCreacion " . $idPreguntas[$i] . ',' . $idUltimo->IDFormatoExamen . ',' . $puntajeTotal . ',' . $NRRutUsuario . ',0');
        }
    }
    //
    public function PA_BPreguntasAsignaturas($IDAsignatura,$CDTPNivel, $NRPregunta ){
        //$query = $this->db->query("EvaluacionCompetencias.calvarez.PA_BPreguntasAsignaturas $IDAsignatura,$CDTPNivel, $NRPregunta");
        $query = $this->db->query("EvaluacionCompetencias.dbo.PA_BPreguntasAsignaturas $IDAsignatura,$CDTPNivel, $NRPregunta");
        return $query->result();
    }
    public function pa_BAsignaturaporTitulo($IDTitulo)
    {
        //$query = $this->db->query('exec EvaluacionCompetencias.calvarez.pa_BAsignaturaporTitulo ' . $IDTitulo);
        $query = $this->db->query('exec EvaluacionCompetencias.dbo.pa_BAsignaturaporTitulo ' . $IDTitulo);
        return $query->result();
       
    }
    public function pa_BPreguntasPorAsignaturaNivelNr($CDTPNivel,$IDAsignatura,$NRPreguntas){
        //$query = $this->db->query("exec EvaluacionCompetencias.calvarez.pa_BPreguntasPorAsignaturaNivelNr $CDTPNivel,$IDAsignatura,$NRPreguntas ");
        $query = $this->db->query("exec EvaluacionCompetencias.dbo.pa_BPreguntasPorAsignaturaNivelNr $CDTPNivel,$IDAsignatura,$NRPreguntas ");
        return $query->result();
    }

    public function VI_TitulosNOSieval (){
        $query = $this->db->query("select * from EvaluacionCompetencias.".$this->config->item("usuarioBD1").".[VI_TitulosNOSieval ] ");
        return $query->result();
    }

    public function Pa_ITitulo($CDTitulo,$CDTPTitulo,$CDTPArea)
    {
        $this->db->query('exec ' . $this->config->item("usuarioBD") . "Pa_ITitulo " . $CDTitulo . ',' . $CDTPTitulo. ',' . $CDTPArea . ',' . $_SESSION["NRRutUsuario"] . ',0');
    }

    public function Pa_UAreaTitulo($IDTitulo,$CDTPArea)
    {
        $this->db->query('exec ' . $this->config->item("usuarioBD1") . ".Pa_UAreaTitulo " . $IDTitulo . ',' . $CDTPArea. ',0');
    }
      //Pa_BAsignaturasPorIDPregunta
      public function Pa_BAsignaturasPorIDPregunta($IDAsignatura){
        //$query = $this->db->query("exec EvaluacionCompetencias.calvarez.pa_BPreguntasPorAsignaturaNivelNr $CDTPNivel,$IDAsignatura,$NRPreguntas ");
        $query = $this->db->query("exec EvaluacionCompetencias.dbo.Pa_BAsignaturasPorIDPregunta $IDAsignatura ");
        return $query->result();
    }
    // FUNCIONES NUEVAS SEGUN REQUIRIMIENTOS PLANTEADOS
    //Pa_BPreguntaPorAsignatura
    public function pa_BPreguntasPorAsignaturaPorNivelReporte($IDAsignatura,$CDTPNivel){
        //$query = $this->db->query("exec EvaluacionCompetencias.calvarez.pa_BPreguntasPorAsignaturaNivelNr $CDTPNivel,$IDAsignatura,$NRPreguntas ");
        $query = $this->db->query("exec EvaluacionCompetencias.[dbo].[pa_BPreguntasPorAsignaturaPorNivel]$IDAsignatura, $CDTPNivel ");
        return $query->result();
    }


    /*
    FUNCIONES PARA LA TABLA TITULOPRACTICA
    */
     //Pa_UTituloPracticaNRPuntaje
     public function Pa_UTituloPracticaNRPuntaje($IDTituloPractica, $NRPuntaje){
        //$query = $this->db->query("exec EvaluacionCompetencias.calvarez.pa_BPreguntasPorAsignaturaNivelNr $CDTPNivel,$IDAsignatura,$NRPreguntas ");
        $query = $this->db->query("exec EvaluacionCompetencias.[dbo].[Pa_UTituloPracticaNRPuntaje]$IDTituloPractica, $NRPuntaje ,0");
        return $query->result();
    }

    public function Pa_UTituloPracticaNRPregunta($IDTituloPractica, $NRPregunta){
        //$query = $this->db->query("exec EvaluacionCompetencias.calvarez.pa_BPreguntasPorAsignaturaNivelNr $CDTPNivel,$IDAsignatura,$NRPreguntas ");
        $query = $this->db->query("exec EvaluacionCompetencias.[dbo].[Pa_UTituloPracticaNRPregunta]$IDTituloPractica, $NRPregunta ,0");
        return $query->result();
    }
    //Pa_UTituloPracticaNRPrema
    public function Pa_UTituloPracticaNRPrema($IDTituloPractica, $NRPrema){
        //$query = $this->db->query("exec EvaluacionCompetencias.calvarez.pa_BPreguntasPorAsignaturaNivelNr $CDTPNivel,$IDAsignatura,$NRPreguntas ");
        $query = $this->db->query("exec EvaluacionCompetencias.[dbo].[Pa_UTituloPracticaNRPrema]$IDTituloPractica, $NRPrema ,0");
        return $query->result();
    }

    public function Pa_UTituloPracticaNRDuracion($IDTituloPractica, $NRDuracion){
        //$query = $this->db->query("exec EvaluacionCompetencias.calvarez.pa_BPreguntasPorAsignaturaNivelNr $CDTPNivel,$IDAsignatura,$NRPreguntas ");
        $query = $this->db->query("exec EvaluacionCompetencias.[dbo].[Pa_UTituloPracticaNRDuracion]$IDTituloPractica, $NRDuracion ,0");
        return $query->result();
    } 


    public function Pa_BCountPreguntasPorIDAsignaturas($IDAsignatura,$CDTPNivel)
    {
        # code...[Pjimenez].[Pa_BCountPreguntasPorIDAsignaturas]
        $query = $this->db->query("exec EvaluacionCompetencias.[dbo].[Pa_BCountPreguntasPorIDAsignaturas]$IDAsignatura,$CDTPNivel");
        return $query->result();
    }




    public function pa_IPreguntaRevisada( $IDPregunta,$LGAprobado,$NRRutUsuario)
    {
        //[Pjimenez].[pa_IPreguntaRevisada] $IDPregunta,$LGAprobado,$NRRutUsuario,0
        $query = $this->db->query("exec EvaluacionCompetencias.[dbo].[pa_IPreguntaRevisada] $IDPregunta,$LGAprobado,$NRRutUsuario,0");
        return $query->result();
    }

    public function Pa_BPreguntaRevisada($IDPregunta)
    {
        $query = $this->db->query("exec EvaluacionCompetencias.[dbo].[Pa_BPreguntaRevisada] $IDPregunta");
        return $query->result()[0];
    }

    //Pa_BTotalPreguntasRevisadas
    public function Pa_BTotalPreguntasRevisadas()
    {
        $query = $this->db->query("exec EvaluacionCompetencias.[dbo].[Pa_BTotalPreguntasRevisadas] ");
        return $query->result();
    }

    public function pa_UPreguntaRevisada($IDPregunta,$NRRutUsuario)
    {   


        echo $IDPregunta;
        $query = $this->db->query("exec EvaluacionCompetencias.[dbo].[pa_UPreguntaRevisada] $IDPregunta,$NRRutUsuario,0 ");
        return $query->result();
    }





    public function PA_IArea($GLTPArea){

        $this->db->select_max('CDTPArea');
        $result = $this->db->get('TPArea');
        $resultado_id = $result->result();

        // echo  $resultado_id[0]->CDTPArea;





        
        $hoy = date("Y-m-d H:i:s"); 
      
        $data = array(
            'CDTPArea' => $resultado_id[0]->CDTPArea+1,
            'GLTPArea' => $GLTPArea,
            'FCInicio' => $hoy,
            'FCTermino' => NULL,
            'NRRutUsuario' => $_SESSION["NRRutUsuario"]
        );
    
        $this->db->insert('TPArea', $data);

        echo $this->db->last_query();
    }

    public function editandoPregunta($i,$t)
    {
        $this->db->set('GLPregunta', $t);
        $this->db->where('IDPregunta', 10963);
        $this->db->update('Pregunta');

        echo $this->db->last_query();
    }


    public function marcarrevisada($IDPregunta){
        // $data = array(
        //     'IDPregunta' => $IDPregunta,
        //     'LGAprobado' => 1,
        //     'FCIngreso' => date('Y-m-d H:i:s'),
        //     'NRRutUsuario' => 7187031,
        //     'FCExpiracion' => NULL,
        // );
        // $this->db->insert('PreguntaRevisada', $data);

        $query = $this->db->query("exec EvaluacionCompetencias.[dbo].[pa_IPreguntaRevisada] $IDPregunta,1,7187031,0");

        echo $this->db->last_query();
    }

    public function eliminarExamen($IDFormatoExamen){

        $FCExpiracion = date('Y-m-d H:i:s');
        $_SESSION["NRRutUsuario"];
        $this->db->set('FCExpiracion',$FCExpiracion);
        $this->db->where('IDFormatoExamen', $IDFormatoExamen);
        $this->db->update('FormatoExamen');
        echo $this->db->last_query();
    }

}
?>