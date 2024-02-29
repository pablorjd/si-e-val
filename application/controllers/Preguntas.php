<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Preguntas extends CI_Controller {
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

	public function index(){
		$data=[];
		$Where['1']='1';
		$data['getAreas']=$this->Model->Pa_BTPArea();
		$data['getNivel']=$this->Model->Pa_BNivel();
		$data['getAreas']=$this->Model->Pa_BTPArea();
		$this->load->view('Preguntas/index',$data);		
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
	public function getAsignaturasJSON($IdArea){
		
		$getAsignaturas=$this->Model->getAsignaturas($IdArea);
		echo json_encode($getAsignaturas);
	}

	public function GestorIMG(){
		$data=[];
		$this->load->view('Preguntas/GestorIMG',$data);	
	}
	public function GestorIMGRespuesta(){
		$data=[];
		$this->load->view('Preguntas/GestorIMGRespuesta',$data);	
	}
	public function GestorIMGAlternativa(){
		$data=[];
		$this->load->view('Preguntas/GestorIMGAlternativa',$data);	
	}

	public function CrearDirectorio(){
		$PosicionActual=$this->input->post("PosicionActual");
		$DirectorioNuevo=$this->input->post("DirectorioNuevo");

		$PathDirectorio='assets/Uploads/'.$PosicionActual.'/'.$this->funciones->SeteaNombreCategoria($DirectorioNuevo);
		$PathDirectorio=str_replace('//', '/', $PathDirectorio);

		mkdir($PathDirectorio,0777,true);
		$this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                			//'getPreguntas'=>$getPreguntas,
                			'PathDirectorio'=>$PathDirectorio,
                			'DirectorioSlug'=>$this->funciones->SeteaNombreCategoria($DirectorioNuevo)
                			))
            	);		
		
	}


	public function EliminarFile(){
		unlink($this->input->post('Path'));
		}

	public function getIDFormatoExamenPregunta()
	{
		echo json_encode($this->Model->getIDFormatoExamenPregunta());
	}
	public function UPDateFormatoExamenRespuesta()
	{
		echo json_encode($this->Model->UPDateFormatoExamenRespuesta());
	}
	public function selectMaxIDFormatoExamenPregunta()
	{
		$v=($this->Model->selectMaxIDFormatoExamenPregunta(1,2));
		echo $v->IDFormatoExamenPregunta;
	}
	public function getPreguntaFormatoExamen()
	{
		echo json_encode($this->Model->getPreguntaFormatoExamen(17002));
	}





	public function PA_MPreguntaFormatoExamen(){
		$GLPregunta=$this->input->post("GLPregunta");
		$IDFormatoExamen=$this->input->post("IDFormatoExamen");
		$IDPregunta=$this->input->post("IDPregunta");
		$this->Model->PA_MPreguntaFormatoExamen ($IDPregunta,$IDFormatoExamen,$GLPregunta,$_SESSION['NRRutUsuario'] ,0);	
	}
	public function editarPreguntaFormatoExamen($IDPregunta,$IDFormatoExamen){
		$data=[];

		//echo "pablo";

		$Where['1']='1';
		//$data['getAreas']=$this->Model->_sql("TPArea",$Where,'','default');
		$data["IDFormatoExamen"]=$IDFormatoExamen;
		$data["IDPregunta"]=$IDPregunta;
		$data['getAreas']=$this->Model->Pa_BTPArea();
		//$data['getNivel']=$this->Model->_sql("TPNivel",$Where,'','default');
		$data['getNivel']=$this->Model->Pa_BNivel();
		$data['getTPPregunta']=$this->Model->_sql("TPPregunta",$Where,'','default');	
		$data['IDAsignatura'] = $this->uri->segment('4');
		if($this->uri->segment('3')){
			$data['getPregunta']=$this->Model->PA_BPreguntasPorID($IDPregunta);
			$WhereRespuesta['IDPregunta']=$this->uri->segment('3');
			$WhereRespuesta[]='FCExpiracion is null';
			$data['getRespuestas']=$this->Model->_sql("Respuesta",$WhereRespuesta,'','default');
			//respuestas según el id 
			$data['getRespuestasAlternativa']=$this->Model->getRespuestas($WhereRespuesta['IDPregunta']);
		}	
		// $data['getAreas']=$this->Model->_sql("TPArea",$Where,'','default');		
		//echo '<pre>'.var_dump($data).'</pre>';exit;
		$this->load->view('Preguntas/editarPreguntasIDFormato',$data);	
	}

	public function editarPreguntaTexto()
	{
		$idpregunta = 10963;
		$texto =  "editando pregunta";

		$this->Model->editandoPregunta($idpregunta,$texto);


	}
	public function getPregunta(){
		$data=[];

		$Where['1']='1';
		//$data['getAreas']=$this->Model->_sql("TPArea",$Where,'','default');
		$data['getAreas']=$this->Model->Pa_BTPArea();
		//$data['getNivel']=$this->Model->_sql("TPNivel",$Where,'','default');
		$data['getNivel']=$this->Model->Pa_BNivel();
		$data['getTPPregunta']=$this->Model->_sql("TPPregunta",$Where,'','default');	
		$IDAsignatura = $this->uri->segment('4');
		$data['asignatura']=$this->Model->pa_BAsignaturasPorID($IDAsignatura)[0];
		
		if($this->uri->segment('3')){
			$data['getPregunta']=$this->Model->getPreguntas($this->uri->segment('3'));
			$data['estadorespuesta']=$this->Model->PA_BEstadoRespuestaPregunta($this->uri->segment('3'));
			$WhereRespuesta['IDPregunta']=$this->uri->segment('3');
			$WhereRespuesta[]='FCExpiracion is null';
			$data['getRespuestas']=$this->Model->_sql("Respuesta",$WhereRespuesta,'','default');
			//respuestas según el id 
			$data['getRespuestasAlternativa']=$this->Model->getRespuestas($WhereRespuesta['IDPregunta']);
			$data['revisada'] = $this->Model->Pa_BPreguntaRevisada($this->uri->segment('3'));

		}	
			
		$this->load->view('Preguntas/getPregunta',$data);	
	}
	public function mantenedorPreguntaRespuesta(){
		$data=[];

		$Where['1']='1';
		//$data['getAreas']=$this->Model->_sql("TPArea",$Where,'','default');
		$data['getAreas']=$this->Model->Pa_BTPArea();
		//$data['getNivel']=$this->Model->_sql("TPNivel",$Where,'','default');
		$data['getNivel']=$this->Model->Pa_BNivel();
		$data['getTPPregunta']=$this->Model->_sql("TPPregunta",$Where,'','default');
		$this->load->view('Preguntas/mantenedorPreguntaRespuesta',$data);

	}
	//3196
	public function getPreguntasPorIDFormatoExamen($IDFormatoExamen){
		//echo var_dump($this->Model->verExamen($IDFormatoExamen));exit;
		$data["preguntas"]=$this->Model->verExamen($IDFormatoExamen);
		$data["IDFormatoExamen"]=($IDFormatoExamen);
		$this->load->view('Preguntas/getPreguntasIDFormatoExamen',$data);	
	}

	

	public function SavePregunta(){
		
		$IDPregunta=$this->input->post("IDPregunta");
		$TipoPregunta=$this->input->post("TipoPregunta");
		$Pregunta=$this->input->post("Pregunta");
		$asignatura=$this->input->post("asignatura");
		$nivel=$this->input->post("nivel");
		$area=$this->input->post("area");
		$GLRutaImagen = $this->input->post("GLRutaImagen");

		$WheregetRespuesta['IDPregunta']=$IDPregunta;
		$WheregetRespuesta[]='FCExpiracion is null';
		$getRespuestasMigra=$this->Model->_sql("Respuesta",$WheregetRespuesta,'','default');

		$WhereRespuesta['IDPregunta']=$IDPregunta;
		$UpdateRespuesta['FCExpiracion']=date('Y-m-d h:i:s');
		$this->Model->_SaveData('Respuesta',$UpdateRespuesta,$WhereRespuesta,2,'','');

		$WherePregunta['IDPregunta']=$IDPregunta;
		$UpdatePregunta['FCExpiracion']=date('Y-m-d h:i:s');
		$this->Model->_SaveData('Pregunta',$UpdatePregunta,$WherePregunta,2,'','');

		$InsertPregunta['CDTPPregunta']=$TipoPregunta;
		$InsertPregunta['IDAsignatura']=$asignatura;
		$InsertPregunta['CDTPNivel']=$nivel;
		$InsertPregunta['FCIngreso']=date('Y-m-d h:i:s');
		$InsertPregunta['GLPregunta']=$Pregunta;
		//$InsertPregunta['NRRutUsuario']=16812706;
		$InsertPregunta['NRRutUsuario']=$_SESSION['NRRutUsuario'];
		$InsertPregunta['GLRutaImagen']=$GLRutaImagen;
		$IdPreguntaNew=$this->Model->_SaveData('Pregunta',$InsertPregunta,'',1,'',''); 
		
		if(isset($getRespuestasMigra)){
			foreach ($getRespuestasMigra as $key => $m) {
			
				$InsertRespuesta['IDPregunta']=$IdPreguntaNew ;
				$InsertRespuesta['GLRespuesta']=$m->GLRespuesta ;
				$InsertRespuesta['FCIngreso']=$m->FCIngreso ;
				$InsertRespuesta['LGCorrecta']=$m->LGCorrecta ;
				$InsertRespuesta['NRRutUsuario']=$m->NRRutUsuario ;
				$this->Model->_SaveData('Respuesta',$InsertRespuesta,'',1,'',''); 
			}
		}
		$this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                			//'getPreguntas'=>$getPreguntas,
                			'IdPreguntaNew'=>$IdPreguntaNew
                			))
            	);		
		
		/*$UpdateRespuesta['FCExpiracion']=date('Y-m-d h:i:s');
		$WhereUpdate['IDPregunta']=$IDPregunta;
		$this->Model->_SaveData('getRespuestas',$UpdateRespuesta,$WhereUpdate,2,'',''); 
		*/

	}

	public function SaveRespuesta(){
		$IDPregunta=$this->input->post("IDPregunta");
		$Respuesta=$this->input->post("Respuesta");
	
		$UpdateRespuesta['FCExpiracion']=date('Y-m-d h:i:s');
		$WhereUpdate['IDPregunta']=$IDPregunta;
		$this->Model->_SaveData('Respuesta',$UpdateRespuesta,$WhereUpdate,2,'',''); 

		$InsertRespuesta['IDPregunta']=$IDPregunta;
		$InsertRespuesta['GLRespuesta']=$Respuesta;

		$InsertRespuesta['FCIngreso']=date('Y-m-d h:i:s');
		$InsertRespuesta['LGCorrecta']=1;
		//$InsertRespuesta['NRRutUsuario']=16812706;//$_SESSION['NRRutUsuario'];
		$InsertRespuesta['NRRutUsuario']=$_SESSION['NRRutUsuario'];
		$this->Model->_SaveData('Respuesta',$InsertRespuesta,'',1,'',''); 


	}
	// inicio funciones de prueba eliminarAlternativa
	// function getPreguntas($idpregunta){
	// 	echo json_encode($this->Model->getPreguntas($idpregunta));
	// }
	// function getRespuestas2($idpregunta){
	// 	echo json_encode($this->Model->getRespuestas($idpregunta));
	// }
	// fin funciones de prueba 
public function curltest($path){
	//$path="http://10.16.153.89/pabloj/pablo/sievalCompletoQA/assets/Uploads/TZ2eQaZRzSkzWXCPpcrGtqS4NkJF8JBMO.png";


		$cURLConnection = curl_init();

		curl_setopt($cURLConnection, CURLOPT_URL, $path);
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

		$respuesta = curl_exec($cURLConnection);
		curl_close($cURLConnection);

		return ($respuesta);
}
	public function SetPreguntaPDF(){
		$this->load->library('fpdf');
        $this->load->library('PDF_MC_Table');
                
        $this->pdf = new PDF_MC_Table();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        $this->pdf->SetAutoPageBreak(true, 0);


        $this->pdf->SetTitle(utf8_decode("Sieval Preguntas."));
        $this->pdf->SetFillColor(224,236,255);
		
        $hei=8;
        $DS = DIRECTORY_SEPARATOR;
        $ubicacionImg = getcwd(). $DS . 'img'.$DS;
        
        $Border=0;    
        
		$this->pdf->Image(base_url().'assets/img/logo_tecmar_azul.png',10, 7, 80,20,'PNG');
		$this->pdf->Image(base_url().'assets/img/logo_tecmar_azul.png',10, 7, 80,20,'JPG');


		$this->pdf->Ln('25');
        $this->pdf->SetTextColor(69, 69, 69);

        $this->pdf->SetFont('Arial', 'B', 16);
        $this->pdf->Cell(0,$hei,utf8_decode('S I E V A L  P R E G U N T A S.'),1, 1 , 'C',false);
        $this->pdf->Ln('10');
        $IDPregunta=$this->uri->segment('3');
		$getPregunta=$this->Model->getPreguntas($IDPregunta);
		$getRespuestas = $this->Model->getRespuestas($IDPregunta);
		
		
        if(isset($getPregunta)){
			$p=$getPregunta[0];
			$this->pdf->SetFont('Arial', 'B', 13);
			$i = null;	
			if(strpos($p->GLPregunta,'<img src="'))	{

				$posicionInicial  = strpos($p->GLPregunta,'<img src="')+10; // posicion inicio 70;
				$posicionFinal  = strpos($p->GLPregunta,'/>'); // posicion final
				$largo = $posicionFinal -$posicionInicial;
				$imgInicio = substr($p->GLPregunta,$posicionInicial,$largo);
				//																						//http://10.16.153.81/sievalcompleto/sieval/
				//$i = str_replace('"<img src="','',str_replace('"/>"','',str_replace('"','',str_replace('http://10.16.153.81/sievalcompleto/sieval/assets/Uploads/','',$imgInicio))));
				$i = str_replace('"<img src="','',str_replace('"/>"','',str_replace('"','',str_replace(base_url().'assets/Uploads/','',$imgInicio))));
			}else{
				$i = null;
			}	
			//$tagPermitidos = '<table><thead><tbody><tr><td><th>';
			$this->pdf->Write(4,utf8_decode(str_replace("'\'","",str_replace("&oacute;","",str_replace("&nbsp;","",strip_tags($p->GLPregunta))))),0, 1 , 'L',false);
			//$this->pdf->Ln('8');
			foreach ($getRespuestas as $key => $value) {
				$this->pdf->SetFont('Arial', '', 13);
				$this->pdf->Cell(0,$hei,utf8_decode(($key+1).")  ".strip_tags($value->GLRespuesta)),0, 1 , 'L',false);				
			}
		
			$array = explode('.', $i);
			$ext = end($array);
			if ($i != null) {
			
				$path = base_url()."assets/Uploads/$i";
				//echo $ext;
				//exit;
            // Extensión de la imagen
            	$type = pathinfo($path, PATHINFO_EXTENSION);
            // Cargando la imagen
					//$data = file_get_contents($path);
					$path = base_url()."assets/Uploads/EQXj9FDJN2FLbhBknF320wXvVvKGnAf6O.1.jpg";
					$data = $this->curltest($path);
					//return;
            // Decodificando la imagen en base64
				$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
				$this->pdf->Image($path, 100, 70, 100,20,"jpg");
				//echo $base64."imagen";
				
					//$this->pdf->Image($base64, 100, 70, 100,20,'');
					//$this->pdf->Image(base_url()."assets/Uploads/$i", 100, 70, 100,20,'JPG');
			
				
			}
		}
		//bloque que pone el numero de pie de pagina
		$this->pdf->SetY(-10);
		$this->pdf->SetFont('Arial','I',8);
		$this->pdf->Cell(0,10,utf8_decode('página ').$this->pdf->PageNo().'/{nb}',0,0,'C');

        $this->pdf->Output("InformeControlAcceso.pdf",'i');
	
	}

	public function UploadImgenesPreguntas(){
		$DirUpload='assets/Uploads/'.$this->input->post("img-subir");

		$NombreArchivo=$_FILES['img-subir']['name'];
		$NombreTemporal=$_FILES['img-subir']['tmp_name'];

		$aux = explode(".",$NombreArchivo);
		$extension = strtolower(trim($aux[(count($aux)-1)]));
		

		$RutaFile=$DirUpload.$this->funciones->RandomCaracteres(32).'.'.$extension;
		move_uploaded_file($NombreTemporal, $RutaFile);

		
		
		echo $RutaFile;

	}
	public function UploadImgenesRespuesta(){
		$DirUpload='assets/Uploads/'.$this->input->post("img-subirrespuesta");

		$NombreArchivo=$_FILES['img-subirrespuesta']['name'];
		$NombreTemporal=$_FILES['img-subirrespuesta']['tmp_name'];

		$aux = explode(".",$NombreArchivo);
		$extension = strtolower(trim($aux[(count($aux)-1)]));
		

		$RutaFile=$DirUpload.$this->funciones->RandomCaracteres(32).'.'.$extension;
		move_uploaded_file($NombreTemporal, $RutaFile);

		
		
		echo $RutaFile;

	}

	public function PA_BPreguntasPorIdPregunta(){
		$resultado = $this->Model->PA_BPreguntasPorIdPregunta(5848);

		echo json_encode($resultado);
	}

	public function getPreguntasParam(){
		ini_set('memory_limit', '2048M');
		ini_set('max_execute_time', '0');
		ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
		ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); // Setting to 512M - for pdo_sqlsrv


		$IdArea=$this->input->post('area');
		$IdAsignatura=$this->input->post('asignatura');
		$IdNivel=$this->input->post('nivel');
		$IdAlternativa=$this->input->post('alternativa');
		$Pregunta=$this->input->post('texto');
		$IDPregunta=$this->input->post('IDPregunta');
		//echo $IdArea;exit;
		$getPreguntas=$this->Model->getPreguntas('',$IdArea,$IdNivel,$IdAsignatura,$Pregunta,$IdAlternativa,$IDPregunta);
		//$getPreguntas=$this->Model->Pa_BPreguntasPorFiltro($IdArea,$IdNivel,$IdAsignatura,$Pregunta,$IdAlternativa);
		$Tbody='';
		//echo json_encode($getPreguntas);exit;
		$preguntaPorExamen=[];
		if (isset($getPreguntas)) {
			
			foreach($getPreguntas as $key=>$pregunta){
				$pregunta->PreguntasPorExamen = $this->Model->PA_BPreguntasPorIdPregunta(intval($pregunta->IDPregunta));
				$pregunta->PreguntaRevisada = $this->Model->PA_BRevisada(intval($pregunta->IDPregunta));
			}

			$data['preguntas'] = $getPreguntas;
			$getView=$this->load->view('Preguntas/tablaPregunta',$data,true);

		} else {

			$data['preguntas'] = NULL;
			$getView='<div class="alert alert-danger" role="alert">Sin Preguntas para esta Área!</div>';
			
		}
		$this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                			//'getPreguntas'=>$getPreguntas,
                			'getView'=>$getView
                			))
            	);
	}
	public function filtroIDPregunta(){
		ini_set('memory_limit', '2048M');
		ini_set('max_execute_time', '0');
		ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
		ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); // Setting to 512M - for pdo_sqlsrv


		$idpregunta=$this->input->post('idpregunta');
		$Tbody='';
		$getPreguntas=[$idpregunta];
		if (isset($idpregunta)) {
			
			foreach($getPreguntas as $key=>$pregunta){
				echo $pregunta;
				// $pregunta->PreguntasPorExamen = $this->Model->PA_BPreguntasPorIdPregunta(intval($idpregunta));
				// $pregunta->PreguntaRevisada = $this->Model->PA_BRevisada(intval($idpregunta));
			}

			$data['preguntas'] = $getPreguntas;
			$getView=$this->load->view('Preguntas/tablaPregunta',$data,true);

		} else {

			$data['preguntas'] = NULL;
			$getView='<div class="alert alert-danger" role="alert">Sin Preguntas para esta Área!</div>';
			
		}
		$this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                			//'getPreguntas'=>$getPreguntas,
                			'getView'=>$getView
                			))
            	);
	}
	
	//getRespuestaEditar
	public function getRespuestaEditar(){

		$MensajeError = array(
			"error" => true,
			"Mensaje" => "Error al crear la alternativa",
		);
		$IDRespuesta = $this->input->post('IDRespuesta');
		//echo $IDRespuesta."  id respuesta en el buscar para editar";
		//exit;
		if ($IDRespuesta == '') {return $MensajeError;}
		$resultado = $this->Model->getRespuestaEditar($IDRespuesta);
		//echo json_encode($resultado);
		//exit;
		echo json_encode($resultado);
	}
	//agregar alternativa
	public function agregarAlternativa(){

		$MensajeError = array(
			"error" => true,
			"Mensaje" => "Error al crear la alternativa",
		);

		$IDPregunta = $this->input->post('IDPregunta');
		$GLRespuesta = $this->input->post('GLRespuesta');
		$LGCorrecta = $this->input->post('LGCorrecta');
		$NRRutUsuario = $this->input->post('NRRutUsuario');
		if ($IDPregunta == '' && $GLRespuesta == '' && $LGCorrecta == '' && $NRRutUsuario == '') {
			# code...
			return $MensajeError;
		}

		//echo var_dump($GLRespuesta);exit;
		# code...
		$resultado = $this->Model->agregarAlternativa($IDPregunta,$GLRespuesta,$LGCorrecta,str_replace("-","",$NRRutUsuario));
		return $resultado;
	}
	//eliminar alternativa
	public function eliminarAlternativa(){

		$IdAlternativa = $this->input->post('IDRespuesta');
		if ($IdAlternativa == '') {
			return null;
		}
		$eliminado =$this->Model->eliminarAlternativa($IdAlternativa);

		return $eliminado;
	}

	//editar alternativa
	public function editarAlternativa(){
	
		$IDRespuestaEditar = $this->input->post('IDRespuestaEditar');
		$GLRespuestaEditar = $this->input->post('GLRespuestaEditar');
		$resultado = $this->Model->editarAlternativa($IDRespuestaEditar,$GLRespuestaEditar);
		return $resultado;
	}

	public function pa_UExpirarPregunta(){
		$MensajeError = array(
			"error" => true,
			"Mensaje" => "Error al crear la alternativa",
		);
		$IDPregunta = $this->input->post('IDPregunta');
		if ($IDPregunta == '' ) {
			return $MensajeError;
		}
		// echo $IDPregunta."id de la pregunta";
		// exit;
		$resultado = $this->Model->pa_UExpirarPregunta($IDPregunta);

		return $resultado;
	}

	public function pa_IPreguntaRevisada($IDPregunta)
	{
		$this->Model->pa_IPreguntaRevisada( $IDPregunta,1,$_SESSION['NRRutUsuario']);
	}
	public function pa_UPreguntaRevisada($IDPregunta)
    {
		$resultado = $this->Model->pa_UPreguntaRevisada($IDPregunta,$_SESSION['NRRutUsuario']);
		
	}

	public function subirImg()
	{
		$this->load->view('Preguntas/SubirImg');
	}

	public function marcarrevisada(){
	
			//echo $IDPregunta."controller";exit;
			$this->Model->marcarrevisada(11567);
		
	}
	

	
public function UploadFilesMails(){
	$data=array();
	if (empty($_FILES['file-es'])) {
	   $OpcUpload=json_encode(array('error'=>'No se seleccionaron archivos para subir!.'));
	   return;
	}
	
	$Uploads = $_FILES['file-es'];
	$TotalSize = 0;
	foreach ($_FILES['file-es']['size'] as $s) {
	$TotalSize+=$s;
	}
	$success = null;
	$paths= array();
	$filenames = $Uploads['name'];
	
	
	
	
	for($i=0; $i < count($filenames); $i++){
	   $ext = explode('.', basename($filenames[$i]));
	   $md5=md5(uniqid());
	   $Ruta=$this->input->post('DirectorioUpload');
	$target = $Ruta . $md5.'.'.end($ext);
	
	   if(move_uploaded_file($Uploads['tmp_name'][$i], $target)) {
		   $success = true;
		   $paths[] = $target;
		   #$TamanoArchivos=$Uploads['size'][$i];
		 
	   
	   } else {
		   $success = false;
		   break;
	   }
	}
	
	
	if ($success === true) {
	$output = array(
	  'uploaded' => 'Subio',
	  'OpcUpload'=>1,
	  'Status'=>1,
	  );
	}elseif ($success === false) {
	  $output = array(
	  'uploaded' => 'No subio',
	  'OpcUpload'=>0,
	  'Status'=>-1,  
	  );
	   foreach ($paths as $file) {
		   unlink($file);
	   }
	}else {
	  $output = array(
	  'uploaded' => 'No Subieron archivos ',
	  'OpcUpload'=>0,
	  'Status'=>-1,  
	  );
	}
	}




	
}