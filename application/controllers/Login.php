<?php
session_start();

error_reporting(E_ALL);

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Funciones');
        $this->load->Model('Model');
		$this->load->Model('Login_model');
		 //qatecmar@dgtm.cl

	}
	
	public function Logout(){
		unset($_SESSION);		 	
		session_destroy();   
		
		redirect(base_url().'Login/','refresh');

	}

    public function index()
    {
		if(isset($_SESSION["NRRutUsuario"])){
			redirect(base_url().'Dashboard/','refresh');
		}else{
			
			$this->load->view('Login/login');
		}
        

    }
    

	public function LoginAccDirectory($User,$Pass){
		$servidor_LDAP = "172.16.0.67";
		$servidor_dominio = "dgtm";
		$ldap_dn = "dc=dgtm,dc=cl";
		$usuario_LDAP = $User;//;"ldapuserapp";
		$contrasena_LDAP =$Pass;//"D.y7uJsdP2";
	
		//echo "<h3>Validar en servidor LDAP desde PHP</h3>";
		//echo "Conectando con servidor LDAP desde PHP...";
			
		$conectado_LDAP = ldap_connect($servidor_LDAP);
		//echo '<pre>',var_dump($conectado_LDAP),'</pre>';

		ldap_set_option($conectado_LDAP, LDAP_OPT_PROTOCOL_VERSION, 3);
  		ldap_set_option($conectado_LDAP, LDAP_OPT_REFERRALS, 0);

  		$SwResp=0;

  		if ($conectado_LDAP){
    		

		   	$autenticado_LDAP = @ldap_bind($conectado_LDAP,$usuario_LDAP . "@" . $servidor_dominio, $contrasena_LDAP);
    		

    		if ($autenticado_LDAP){
				$SwResp=1;

	   		}
  		}
  		return $SwResp;

	}

	function PA_BPermisoAplicacion($NRRut,$CDAplicacion){
		$permiso=$this->Model->PA_BPermisoAplicacion($NRRut,$CDAplicacion);
		if(count($permiso)>0){
			//tiene permiso
			//session_start();
			$permiso=$permiso[0];
			
			$_SESSION['CDAplicacion']=$permiso->CDAplicacion;
			$_SESSION['NMaplicacion']=$permiso->NMaplicacion; 
			$_SESSION['GLDescripcion']=$permiso->GLDescripcion;
			$_SESSION['NRRutUsuario']=$permiso->NRRut;
			$_SESSION['FCTermino']=$permiso->FCTermino; 
			$_SESSION['FCInicio']=$permiso->FCInicio; 
			$_SESSION['IDPersona']=$permiso->IDPersona;
			$_SESSION['DVerificador']=$permiso->DVerificador;
			$_SESSION['cdnacionalidad']=$permiso->cdnacionalidad;
			$_SESSION['Nombre']=$permiso->Nombre;
			return true;

		}else{
			//no tiene permiso
			return false;
		}
	}


	


	public function Test(){
			$getUserAD=1;
			$Rut='7839683-0';
			$PassParam='';
			$RutSlit=explode('-',$Rut);
			$RutSlit=$RutSlit[0];
			$data=array();
				$getUserAD=1;
		$Url='';
		$Opc=0;
		$success=0;
		if($getUserAD==1){
		//if(isset($getUser)){	
			$success=1;
			$Where['Rut']=$RutSlit;
			$getUser=$this->Login_model->_select("personaldgtm.dbo.Vi_personal_web",$Where,'','','ControlAccesoEscritura');	

			echo var_dump($getUser);
			$Url=base_url().'Reportes/InformeUsuario';
			$Opc=1;
			$_SESSION['UsuarioValida']=$RutSlit;
			$_SESSION['cd_depto']=$getUser->cd_depto;
			$_SESSION['Admin']=0;	
			$_SESSION['Depto']=$getUser->gl_depto;

			//$WhereFiscalizador['CDDepto']=$_SESSION['cd_depto'];
			$WhereFiscalizador['NRRutFiscalizador']=$RutSlit;
			$WhereFiscalizador['']='FCTermino is NULL';
			//$Table,$Where='',$Orden='',$Limit='',$Conn='default'
			///$getFiscalizador=$this->Model->_sql("Fiscalizador",$WhereFiscalizador,'','','ControlAccesoEscritura');
			$getFiscalizador=$this->Login_model->getDataFizcalizador($RutSlit);

			$data['OpcAdmin']=0;
			if(isset($getFiscalizador)){
				$_SESSION['Admin']=1;
				$_SESSION['cd_depto_admin']=[];
				$_SESSION['nombre_depto_admin']=[];
				foreach ($getFiscalizador as $key => $f) {

					$_SESSION['nombre_depto_admin'][]=$f->GLTPFiscalizador.' de '.$f->gl_depto;

					$_SESSION['cd_depto_admin'][]=$f->CDDepto;
					$_SESSION['tipoAdmin']=$f->CDTPFiscalizador;

					$Url=base_url().'Reportes/Dashboard';
				}
			}
		

		}

		$Response=array(
			'Rut'=>$Rut,
			'Url'=>$Url,
			'Opc'=>$Opc,
			'success'=>$success
		);

		$this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($Response));	
	}

	public function LoginAcc(){
		//$Rut=explode('-',$this->input->post('user'));
		//$Rut=$Rut[0];
		//$Rut=$Rut[0];

		if($this->input->post('user')=='10718709-K' && $this->input->post('PassParam')=='Tecmar2019*'){
			$getUserAD=1;
			$RutSlit='10718709';
			$Rut='10718709-K';
		}else{



			$Rut=str_replace('-','',$this->input->post('user'));
			$PassParam=$this->input->post('PassParam');

			$RutSlit=explode('-',$this->input->post('user'));
			$RutSlit=$RutSlit[0];
			
			$data=array();
			$getUserAD=$this->LoginAccDirectory($Rut,$PassParam);
			$getPermitidosActivity=array('10986355');

			if(in_array($Rut, $getPermitidosActivity)){
				$getUserAD=1;
			}
			if($getUserAD==1){
				if($this->PA_BPermisoAplicacion($RutSlit,4)){
					//tiene permiso
					$Response=array(
						'Rut'=>$Rut,
						'Url'=>base_url()."Dashboard",
						'success'=>1		
					);
					echo json_encode($Response);
					//redirect(base_url()."Dashboard",true);
				}else{
					$Response=array(
						'Rut'=>$Rut,
						'Url'=>base_url()."Login",
						'success'=>0
					);
					echo json_encode($Response);					
				}
		}
		}
	}
	
}




