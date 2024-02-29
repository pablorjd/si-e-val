<?php
  	if ( ! defined('BASEPATH')) exit('No se permite el acceso directo al script');
	class Funciones{
        function __construct (){
			$this->CI =& get_instance();
		}
		
		public function getMenu(){
			$data=array();
			#$data['getSecciones']=$this->CI->Model->getSecciones($_SESSION['IdUser']);

			// $data['getSecciones']=$this->CI->Model->getSecciones(9);
			$this->CI->load->view('common/nav-menu',$data);
		}




		public function getUsuarioNoConsidera(){
			$File='ConfigJson/PersonasNoIncluyen.json';
	        $Json = json_decode(file_get_contents($File));
			
	        $UsuarioNoConsidera=[];
			if(isset($Json)){
				// echo (var_dump($Json->PersonasNoCierre));
				if(($Json->PersonasNoIncluyen)){
					foreach ($Json->PersonasNoIncluyen as $key => $i) {
						$UsuarioNoConsidera[]=$i->Rut;
					}
				}
			}
			return $UsuarioNoConsidera;
		}

		
		public function IPPermitidas() { 
			$Obj=$this->getReporteIPPermitidas();
			$SwPermisitos=0;


			
			if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
				$IpLocal=$_SERVER["HTTP_X_FORWARDED_FOR"];
			}else{
				$IpLocal=$_SERVER["REMOTE_ADDR"];
			}

			foreach ($Obj->IPPermitidas as $key => $i) {
				//echo $_SERVER["REMOTE_ADDR"].' '.$i->IP.'<br>';
				
				
				if($IpLocal=='::1'){
					$IpLocal='10.16.153.81';
				}
				

				if($IpLocal==($i->IP)){
            		$SwPermisitos=1;
        		}                    
			}
			return $SwPermisitos;
        	    
		}



		public function getReporteIPPermitidas(){
            $File='ConfigJson/IPPermitidas.json';
            $Json = json_decode(file_get_contents($File));
			
            

            return($Json);
        }



		public function HorasTrabajadasPersona($Rut,$Fecha){

			$File='ConfigJson/SinHorario.json';
	        $Json = json_decode(file_get_contents($File));
			
	        $UsuarioNoIncluyen=[];
			if(isset($Json)){
				// if(sizeof($Json->PersonasNoCierre)>0){
					foreach ($Json->PersonasNoCierre as $key => $i) {
						$UsuarioNoIncluyen[]=$i->Rut;
					}
				// }
			}
			$getUsuarioNoIncluyen=($UsuarioNoIncluyen);
			


			$HorasTrabajadasPersona=$this->CI->Model->HorasTrabajadasPersona($Rut,$this->getDate($Fecha,'d-m-Y'),$getUsuarioNoIncluyen);
			return $HorasTrabajadasPersona;
		}


		public function HoraInicioFinUsuario($Rut,$Fecha){

			$WhereHraInicio['']="convert(varchar, FCIngreso, 105) = '".$this->getDate($Fecha,'d-m-Y')."' and FCExpiracion is null and NrRut=".$Rut;
			$VerificaIngreso=$this->CI->Model->_sql('EntradaSalida',$WhereHraInicio,'FCIngreso asc','','ControlAccesoEscritura');
			return $VerificaIngreso;
		}

		public function getSolicitudesAprobadas($Fecha,$Rut){
			$getSolicitudesAprobadas=$this->CI->Model->getSolicitudesAprobadas($Rut,$this->getDate($Fecha,'d-m-Y'));
			return $getSolicitudesAprobadas;

		}

		public function getUsuarioSistema(){
			$Where['cd_repar']=1034;
			$RutCondicion=array(10265065,19939776,16485442,10514027);

			$QueryNoInclude='';
			$getUsuarioNoConsidera=$this->getUsuarioNoConsidera();
			if(isset($getUsuarioNoConsidera)){
				$QueryNoInclude=' and rut not in ('.implode(',',$getUsuarioNoConsidera).')';
		
			}



			$Where['']='cd_depto in ('.implode(',',$_SESSION['cd_depto_admin']).') and (dvnpi=\'L\' or ab_grado like \'EC.%\' or (rut in('.implode(',',$RutCondicion).'))) '.$QueryNoInclude;

			$getUser=$this->CI->Model->_sql("personaldgtm.dbo.Vi_personal_web",$Where,'','','default');	



			return $getUser;	
		}

		public function NumeroSemanaMas($dateString) {
	  		list($year, $month, $mday) = explode("-", $dateString); 
	  		$firstWday = date("w",strtotime("$year-$month-1")); 
	  		return floor(($mday + $firstWday - 1)/7) + 1; 
	  } 

	public function beetweenFechas($ObjArr,$Fecha){
		$Result=[];
	
		$getPermisosMes=$ObjArr;
		if(isset($getPermisosMes)){
			foreach ($getPermisosMes as $key => $p) {
				//echo var_dump($p->FCInicioAutoriza);

				$FCInicioAutoriza=$this->getDate($p->FCInicioAutoriza,'Ymd');	
				$FCTerminoAutoriza=$this->getDate($p->FCTerminoAutoriza,'Ymd');
				$Fecha=$this->getDate($Fecha,'Ymd');
				
				#echo ' '.$FCInicioAutoriza=$this->funciones->getDate($p->FCInicioAutoriza,'Ymd');
				#echo ' '.$FCTerminoAutoriza=$this->funciones->getDate($p->FCTerminoAutoriza,'Ymd');
				#echo ' '.$FCInicioAutoriza.' '.$FCTerminoAutoriza.'<br>';
			
				if($Fecha>=$FCInicioAutoriza && $Fecha<=$FCTerminoAutoriza){
					$Result[]=(object)$p;
				}
			}
		}

		if(sizeof($Result)>0){
			return $Result;
		}

	}


		public function getPermisos($Fecha,$Rut){
			$Where['NRRut']=$Rut;
			//$Where['']="fcExpiracion is null and (convert(varchar, FCInicioAutoriza, 105) = '".$this->getDate($Fecha,'d-m-Y')."')    ";
			$Where['']="fcExpiracion is null and ('".$this->getDate($Fecha,'Ymd')."' BETWEEN (Convert(varchar, FCInicioAutoriza, 112)) and (Convert(varchar, FCTerminoAutoriza, 112)))";

			$getPermisos=$this->CI->Model->getDetailSolicitud('',$Where);
			//$getPermisos=$this->CI->Model->_select('Solicitud',$Where,'ControlAccesoEscritura');





			return $getPermisos;

		}

		public function CalcularDiferenciaHoras($HraInicio,$HraTermino){


			$strStart = $HraInicio; 
			$strEnd   = $HraTermino; 


			$dteStart = new DateTime($strStart); 
			$dteEnd   = new DateTime($strEnd); 

			$dteDiff  = $dteStart->diff($dteEnd); 


			$DiaaHras=$dteDiff->format("%d")*24; 
			$Hras=$dteDiff->format("%H")+$DiaaHras; 
			$HResto=$dteDiff->format(":%I:%S");
			return $Hras.$HResto;

		}
		
		public function conversorSegundosHoras($tiempo_en_segundos) {
		    $horas = floor($tiempo_en_segundos / 3600);
		    $minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
		    $segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);

		    if($minutos<10){
		    	$minutos='0'.$minutos;
		    }
		    if($segundos<10){
		    	$segundos='0'.$segundos;
		    }

		    return $horas . ':' . $minutos . ":" . $segundos;
		}

		public function getHoraInicioTermino($Fecha){
			
			if($Fecha){
				$WhereFecha['cdReparticion']=1034;
				$WhereFecha['']="fcExpiracion is null  and convert(varchar, fcInicio, 105) = '".$this->getDate($Fecha,'d-m-Y')."'";
				return $this->CI->Model->_select("Horario",$WhereFecha,'ControlAccesoEscritura');				
			}else{
				return '';
			}
		}


		public function getPermisoFechas($Fecha){
			if($Fecha){
				
				return $getPermisos=$this->CI->Model->getPermisosFechaCalendario($Fecha);
				#echo '<pre>',var_dump($getPermisos),'</pre>';
			}else{
				return '';
			}
		}
	

		public function MinifyHtml($Html) {
			$search = array(
			  	'/\>[^\S ]+/s', // strip whitespaces after tags, except space
			  	'/[^\S ]+\</s', // strip whitespaces before tags, except space
			  	'/(\s)+/s', // shorten multiple whitespace sequences
			  	'/<!--(.|\s)*?-->/'// Remove HTML comments
			);

			$replace = array(
				'>',
				'<',
				'\\1',
				''
			);

			$Html = preg_replace($search, $replace, $Html);
			$Html = str_replace("\n", "<br>", $Html);


		  	return $Html;
		}


		public function remarca($Cadena,$Param){
			$CadenaNew=str_replace(strtolower($Param), '<span style="font-size:20px; color:red">'.strtolower($Param).'</span>',strip_tags(strtolower($Cadena)) );
			$CadenaEnvia=ucfirst($CadenaNew);
			return ($CadenaEnvia);
		}



		public function getJson(){
			$File='Json/data.json';
			$Json = json_decode(file_get_contents($File));
			return($Json);
		}

		public function getModulosuser($Opc){
			$json=$this->getJson();	
			return $json->Seccion;
		}

		function validaRut($rut){
			$suma =0;
    		if(strpos($rut,"-")==false){
		        $RUT[0] = substr($rut, 0, -1);
		        $RUT[1] = substr($rut, -1);
		    }else{
		        $RUT = explode("-", trim($rut));
		    }
		    
		    $elRut = str_replace(".", "", trim($RUT[0]));
		    $factor = 2;
		    for($i = strlen($elRut)-1; $i >= 0; $i--):
		        $factor = $factor > 7 ? 2 : $factor;
		        $suma += $elRut{$i}*$factor++;
		    endfor;
		    $resto = $suma % 11;
		    $dv = 11 - $resto;
		    if($dv == 11){
		        $dv=0;
		    }else if($dv == 10){
		        $dv="k";
		    }else{
		        $dv=$dv;
		    }
		   if($dv == trim(strtolower($RUT[1]))){
		       return true;
		   }else{
		       return false;
		   }
		}



	
		
		
		
	
		public function RandomCaracteres($cant) {
		  	$salt = "abchefghjkmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		  	srand((double)microtime()*1000000);
			$i = 0;
			$pass ='';
			while ($i <= $cant) {
				$num = rand() % 59;
				$tmp = substr($salt, $num, 1);
				$pass = $pass . $tmp;
				$i++;
			}
			return $pass;
		}
		
		public function ArrDate($fecha){
			$fechaArr=$this->fecha_en(str_replace('/', '-', $fecha));
			return $fechaArr;
		}	

		public function validateSession(){
			if(!isset($_SESSION['IdPersona'])){
				redirect('IntelDialogoTi/index/3','refresh');
			}
		}
		
		private function getUrl(){
			$pageURL = 'http';
			$pageURL .= "://";
			if ($_SERVER["SERVER_PORT"] != "80") {
				$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
			}else {
				$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			}
			return $pageURL;	
		}
		
		
		
		public function getDate($fecha, $formato = 'Y-d-m'){
			if($fecha){
				$new = date($formato,strtotime($fecha));	
				return $new;
			}
		}
		
		
		public function cantidad(){
			
			$query = $this->CI->db->query ('SELECT FOUND_ROWS() as cant');	
			if(isset($query)){
				return $query->row()->cant;	
				
			}else{
				return 0;	
			}
		}
		
		public function dias_mes($mes,$ano){
			if( is_callable("cal_days_in_month")){
			   return cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
   			}else{
      			return date("d",mktime(0,0,0,$mes+1,0,$ano));
   			}
		}
		
		
		public function calcula_edad( $fecha ) {
                    if($fecha):
			list($Y,$m,$d) = explode("-",$fecha);
			return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );                        
                    else:    
                        return false;
                    endif;

		}
		
		
		public function puntos($num){
			if($num!=''){
				$sw = strpos($num,',');
				if($sw!==FALSE){
					list($numero,$decimal)=explode(',',$num);
					$numero= number_format($numero,0,",",".");
					return $numero.','.$decimal;
				}else{
					return trim(number_format((double)$num,0,",","."));
				}
			}else{
				return 0;	
			}
		}
		
		
		
			
        public function nombre_fecha($fecha) {
        	list($num_ano,$num_mes,$num_dia)=explode("-",$fecha);
            $dias = array('Dom.', 'Lun.', 'Mar.', 'Mie.', 'Jue.', 'Vie.', 'Sab.');
	        $nombre_dia=$dias[date("w", mktime(0, 0, 0, $num_mes, $num_dia, $num_ano))];
            $mes = array( 1 => "Ene", 2 => "Feb", 3 => "Mar", 4 => "Abr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Ago", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dic" ); 
            $nombre_mes=$mes[(int)$num_mes];
            $cadena= $nombre_dia." ".$num_dia." de ".$nombre_mes." del ". $num_ano;
            return $cadena;
        }



        public function NombreMes($NumeroMes) {
            $mes = array( 1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre" ); 
            $nombre_mes=$mes[(int)$NumeroMes];
           
            return $nombre_mes;
        }



			

			public function nombre_dia_abrieviacion($fecha) {
            	list($num_ano,$num_mes,$num_dia)=explode("-",$fecha);
                $dias = array('Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab');
    	        $nombre_dia=$dias[date("w", mktime(0, 0, 0, $num_mes, $num_dia, $num_ano))];
	            $cadena= $nombre_dia." ".$num_dia;
                return $cadena;
            }
			
			
			

			

				public function aumentar_dia ($fecha, $cuanto){
					$array_fecha = preg_split ("/-/", (string)$fecha);
					$anio = (int)$array_fecha[0];
					$mes = (int)$array_fecha[1];
					$dia = (int)$array_fecha[2] + ($cuanto);
					return date("Y-m-d", mktime(0, 0, 0, $mes, $dia, $anio));
				}
				
				public function aumentar_mes ($fecha, $cuanto){
					$array_fecha = preg_split ("/-/", (string)$fecha);
					$anio = (int)$array_fecha[0];
					$mes = (int)$array_fecha[1] + ($cuanto);
					$dia = (int)$array_fecha[2];
					return date("Y-m-d", mktime(0, 0, 0, $mes, $dia, $anio));
				}
				
				
				
				public function disminuye_dia ($fecha, $cuanto){
					$array_fecha = preg_split ("/-/", (string)$fecha);
					$anio = (int)$array_fecha[0];
					$mes = (int)$array_fecha[1];
					$dia = (int)$array_fecha[2] + ($cuanto);
					return date("Y-m-d", mktime(0, 0, 0, $mes, $dia, $anio));
				}
				
				
				public function fecha_es_ano($fecha){
					if(strlen($fecha)==10){
						if($fecha!=''){
							list($ano,$mes,$dia)=explode("-",$fecha);
							$ano=substr($ano,2,4);	
							return ($dia.'-'.$mes.'-'.$ano);
					}	else{
							return "";	
						}
					}
				}
				
				
				
				
				public function fecha_es($fecha){
					if(strlen($fecha)==10){
						if($fecha!=''){
							list($ano,$mes,$dia)=explode("-",$fecha);
							
							return ($dia.'-'.$mes.'-'.$ano);
					}	else{
							return "";	
						}
					}
				}
				
				public function fecha_en($fecha){
					if($fecha){
						$fecha=str_replace('/', '-', $fecha);
						list($dia,$mes,$ano)=explode("-",$fecha);	
						return ($ano.'-'.$mes.'-'.$dia);
					}else{
						return "";	
					}
				}
				
				public function corta_cadena($cadena,$cant){
					$cadena2=substr($cadena,0,(strlen($cadena)-$cant));	
					return $cadena2;
				}


				public function diferenciasHoras($HraInicio,$HraTermino){

					$strStart = $HraInicio; 
					$strEnd   = $HraTermino; 


				   	$dteStart = new DateTime($strStart); 
				   	$dteEnd   = new DateTime($strEnd); 

				   	$dteDiff  = $dteStart->diff($dteEnd); 

				   	

					$DiaaHras=$dteDiff->format("%d")*24; 
					$Hras=$dteDiff->format("%H")+$DiaaHras; 
					$HResto=$dteDiff->format(":%I:%S");

					return $HResto;

				}


				
				

				function getRealIP() {
					if (!empty($_SERVER['HTTP_CLIENT_IP']))
						return $_SERVER['HTTP_CLIENT_IP'];
					   
					if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
						return $_SERVER['HTTP_X_FORWARDED_FOR'];
				   
					return $_SERVER['REMOTE_ADDR'];
				}


				function suma_horas($hora1,$hora2){
     				$hora1=explode(":",$hora1);
    				$hora2=explode(":",$hora2);
    				$temp=0;
 
    				//sumo segundos 
    				$segundos=(int)$hora1[2]+(int)$hora2[2];
    				while($segundos>=60){
        				$segundos=$segundos-60;
        				$temp++;
    				}
     
     				//sumo minutos 
    				$minutos=(int)$hora1[1]+(int)$hora2[1]+$temp;
    				$temp=0;
    				while($minutos>=60){
        				$minutos=$minutos-60;
        				$temp++;
    				}
 
     				//sumo horas 
    				$horas=(int)$hora1[0]+(int)$hora2[0]+$temp;

    				if($horas<10)
        				$horas= '0'.$horas;
 

			    	if($minutos<10)
        				$minutos= '0'.$minutos;
 
    				if($segundos<10)
        				$segundos= '0'.$segundos;
		 
    				 $sum_hrs = $horas.':'.$minutos.':'.$segundos;
 	
    				return ($sum_hrs);
 
   		 		}
 
				
				
				public function suma_dos_horas($hora1,$hora2){
					$hora1=explode(":",$hora1);
					$hora2=explode(":",$hora2);
					$horas=(int)$hora1[0]+(int)$hora2[0];
					$minutos=(int)$hora1[1]+(int)$hora2[1];

					$Segundos=0;
					if(isset($hora1[2])){
						$Segundos=(int)$hora1[2]+(int)$hora2[2];
					}
					$horas+=(int)($minutos/60);
					$minutos=$minutos%60;


					if($minutos==0)$minutos="00";
					return  $horas.":".$minutos;
			
				}
				
				public function restar_dos_horas($horaini,$horafin){
					

					$horai=substr($horaini,0,2);
					$mini=substr($horaini,3,2);
					$segi=substr($horaini,6,2);
				 
					$horaf=substr($horafin,0,2);
					$minf=substr($horafin,3,2);
					$segf=substr($horafin,6,2);
				 
					$ini=((($horai*60)*60)+($mini*60)+$segi);
					$fin=((($horaf*60)*60)+($minf*60)+$segf);
				 
					$dif=$fin-$ini;
				 
					$difh=floor($dif/3600);
					$difm=floor(($dif-($difh*3600))/60);
					$difs=$dif-($difm*60)-($difh*3600);
					return date("H:i:s",mktime($difh,$difm,$difs));
			
				}
				
				public function primerDiaMes ($fecha, $cuanto){
					$array_fecha = preg_split ("/-/", (string)$fecha);
					$dia = 1;
					$mes = (int)$array_fecha[1] - ($cuanto);
					$anio = (int)$array_fecha[0];
					return date("Y-m-d", mktime(0, 0, 0, $mes, $dia, $anio));
				}
			
				public function ultimoDiaMes ($fecha, $cuanto){
					$array_fecha = preg_split ("/-/", (string)$fecha);
					$dia = 0;
					$mes = (int)$array_fecha[1] - ($cuanto - 1);
					$anio = (int)$array_fecha[0];
					return date("Y-m-d", mktime(0, 0, 0, $mes, $dia, $anio));
				}
				
				
				
				public function diasEntreFechas($fechainicio, $fechafin){
					if($fechainicio!='' && $fechafin!=''){
						return ((strtotime($fechafin)-strtotime($fechainicio))/86400);
					}else{
						return 0;
					}
				}
				
				
				public function mesesEntreFechas($fechafin,$fechainicio){
					$meses=0;
					while($fechainicio<=$fechafin){
						$meses++;
						$fechainicio=date("Y-m-d", strtotime("$fechainicio +1 month"));
					}
					return $meses;
				}

				
			}	
				

?>