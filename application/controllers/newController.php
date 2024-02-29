<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class newController extends CI_Controller {

    // public function index()
    // {
    //     echo 'dfdff';
    // }


    // public function Pablo(){
	// 	$Global = fopen("assets/doc/123.txt", "r");
	// 	$TxtGlobal='';

	// 	$count=0;
	// 	$Preguntas=[];
	// 	$Alternativa=[];
	// 	$Respuestas=[];
	// 	$SwPregunta=1;

	// 	$indexPreguntas=0;
	// 	while(!feof($Global)) {
	// 		$linea = fgets($Global);
	// 		if(mb_strlen($linea)>2){
	// 			// echo 'LINEA::::'.mb_strlen($linea).'<br>';
	// 			if($SwPregunta==1){
	// 				// $fil=explode('.- ',$linea);
	// 				list($basura,$pre)=explode('.-',$linea);
	// 				$Preguntas[$indexPreguntas]=trim($pre);
	// 				$indexPreguntas++;
	// 				$SwPregunta=0;
	// 			}else{

	// 				if($SwPregunta==0){
	// 					$condicionRespuesta=strpos($linea,'Respuesta:');

	// 					if($condicionRespuesta!==false){
							
	// 						$resp=trim(trim(str_replace('Respuesta: ','',$linea)));;
							
	// 						$Respuestas[$indexPreguntas-1]=$this->sacaEspacio($resp);
	// 						$SwPregunta=1;
	// 					}else{
	// 						$Alternativa[$indexPreguntas-1][]=trim(substr(trim($linea),3));	
	// 					}
	// 				}
	// 			}
	// 		}
	// 	}	

	// 	foreach ($Preguntas as $key => $p) {
	// 		echo '<h1>'.$p.'</h1>';

	// 		echo $insert="<br><br>   
	// INSERT INTO [dbo].[Pregunta]
    //        ([CDTPPregunta]
    //        ,[IDAsignatura]
    //        ,[CDTPNivel]
    //        ,[FCIngreso]
    //        ,[GLPregunta]
    //        ,[GLRutaImagen]
    //        ,[NRRutUsuario]
    //        ,[FCExpiracion])
    //  VALUES
    //        (1
    //        ,119
    //        ,1
    //        ,getdate()
    //        ,'".$p."'
    //        ,null
    //        ,<NRRutUsuario, int,>
    //        ,null)";





	// 		foreach ($Alternativa[$key] as $key2 => $a) {
	// 			echo $a.'<br>';
	// 		}
	// 		echo '<h5>'.$Respuestas[$key].'</h5>';
	// 		# code...
	// 	}

	// 	// echo "<hr>";
	// 	// echo '<h1>Pregunta:</h1>'.'<pre>',var_dump($Preguntas).'</pre><br>';
	// 	// echo '<h1>Alternativas:</h1>'.'<pre>',var_dump($Alternativa),'</pre><br><br>';
	// 	// echo '<h1>Respuestas:</h1><pre>'.'<pre>',var_dump($Respuestas).'</pre><br><br>';
	// }

	// private function sacaEspacio($resp){
	// 	$cadena='';
	// 	$noconsidera=0;
	// 	for($i=0;$i<=strlen($resp);$i++){
	// 		if(isset($resp[$i])){
	// 			if($resp[$i]=='' && $noconsidera==0){

	// 			}else{
	// 				$cadena.=$resp[$i];
	// 				$noconsidera++;
					
	// 			}
	// 		}
	// 	}
	// 	return trim($cadena);
	// }





}

/* End of file newController.php */
