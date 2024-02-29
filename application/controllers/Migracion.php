<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migracion extends CI_Controller {
	public function __construct (){
		parent::__construct ();
		$this->load->model('Model');
		$this->load->library('funciones');
		if (!isset($_SESSION['NRRutUsuario']) ) {
            # code...
            redirect(base_url().'Login/','refresh');
            
        }
	}

	public $getPreguntas = array();
	public $getRespuestas = array();

	
	private function ExplodeCadena($Explode,$Iden,$OpcTipo){
		$Pal=explode($Explode,$this->getPreguntas[$Iden]);
		if(isset($Pal[$OpcTipo])){
			

			if($OpcTipo==1){
				$this->getRespuestas[$Iden]=$Explode.$Pal[$OpcTipo];	
			}else{
				$this->getPreguntas[$Iden]=$Pal[$OpcTipo];		
			}
			
		}
		
	}


	public function index(){
		$ArrCadenaSepara=['<p>a)','a)','<p>A)','A) ','A)   ','<p>a<span style="font-family:arial,helvetica,sans-serif">)','a.-','a.','a )'];

		$WhereTipo['1']=1;
		$getPreguntas=$this->Model->_sql('preguntas',$WhereTipo,'IDPregunta');
		if(isset($getPreguntas)){
			$getResultArr=[];
			foreach ($getPreguntas as $key => $p) {
				$this->getPreguntas[$p->IDPregunta]=$p->GLPregunta;
				$getResultArr[$p->IDPregunta]=(object)$p;
				foreach ($ArrCadenaSepara as $key => $v) {
					
					$this->ExplodeCadena($v,$p->IDPregunta,1);
					if($p->IDTPPregunta==1){
						$this->ExplodeCadena($v,$p->IDPregunta,0);
					}else{
						$this->getRespuestas[$p->IDPregunta]=$p->GLRespuesta;
					}
				}
			}


		}

		
		// echo '<h1>'.sizeof($this->getPreguntas).'</h1>';
		foreach ($this->getPreguntas as $key => $pr) {
			

			$Insert['GLPregunta']=$pr;
			$Insert['IDAsignatura']=$getResultArr[$key]->IDAsignatura;
			$Insert['CDTPPregunta']=$getResultArr[$key]->IDTPPregunta;
			$Insert['NRRutUsuario']=$getResultArr[$key]->IDUsuario;
			$Insert['FCIngreso']=$getResultArr[$key]->FCPregunta;
			$Insert['CDTPNivel']=$getResultArr[$key]->IDNVPregunta;
			$IDPregunta=$this->Model->_SaveData('Pregunta_sql',$Insert,'',1,'');
			echo $IDPregunta.') '.$pr.':<hr>';	
			
			if(isset($this->getRespuestas[$key])){
				$Sep=explode('</p>',$this->getRespuestas[$key]);
				foreach ($Sep as $key2 => $s) {
					$Cadena = trim(preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, trim(strip_tags($s))));
					$CadenaCompara =$this->funciones->SeteaNombreCategoria($Cadena);
					$CadenaCorrecta = trim(preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, trim(strip_tags($getResultArr[$key]->GLRespuesta))));
					$CadenaCorrectaCompara =$this->funciones->SeteaNombreCategoria($CadenaCorrecta);

					if(trim(str_replace(' ', '', $Cadena))!=''){
						echo '<textarea>'.trim(str_replace(' ', '', $CadenaCompara)).'</textarea><textarea>'.trim(str_replace(' ', '', trim($CadenaCorrectaCompara))).'</textarea>';

						$SwCorrecta=0;
						if($getResultArr[$key]->IDTPPregunta==1){
							if(trim($CadenaCompara)===trim($CadenaCorrectaCompara)){
								$SwCorrecta=1;
								echo 'OK<br>';

							}else{
								echo '<br>';
							}
						}else{
							$SwCorrecta=1;	
							echo '<br>';
						}
						$InsertAl['GLRespuesta']=trim($Cadena);
						$InsertAl['IDPregunta']=$IDPregunta;
						$InsertAl['FCIngreso']=$getResultArr[$key]->FCPregunta;
						$InsertAl['NRRutUsuario']=$getResultArr[$key]->IDUsuario;
						$InsertAl['LGCorrecta']=$SwCorrecta;
						$this->Model->_SaveData('Respuesta_sql',$InsertAl,'',1,'');
					}
				}
				
			}

		}
		
	}
}
