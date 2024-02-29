<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
if(isset($_SERVER['HTTP_HOST'])){
	$config['base_url'] .= "://".$_SERVER['HTTP_HOST'];
	if (!isset($_SERVER['ORIG_SCRIPT_NAME'])){
  		$config['base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	}else{
  	$config['base_url'] .= str_replace(basename($_SERVER['ORIG_SCRIPT_NAME']),"",$_SERVER['ORIG_SCRIPT_NAME']);
	}
}

//$config['base_url'] = "https://sieval-cert.dgtm.cl/sieval/";
$config['base_url'] = "http://dev1.dgtm.cl/sieval2/";
//$config['base_url'] = "https://sieval.dgtm.cl/sieval";
//ruta produccion 1

date_default_timezone_set('America/Santiago');

$config['index_page'] = '';
//usuario pruebas localesddfddffff
$config['usuarioBD'] = 'Pjimenez.';
//$config['usuarioBD3'] = 'freyesv.';

//usuario pruebas locales
$config['usuarioBD1'] = 'Calvarez';

//usuario solo de uso para el PA_BPermisosAplicacion
//$config['usuarioBD3'] = 'mfigueroa';

/*Estos son los usuarios de conexion a base de datos para poinke*/ 
//usuario base de datos
$config['usuarioBD1'] = 'dbo';
$config['usuarioBD2'] = 'Calvarez';
$config['usuarioBD3'] = 'dbo.';
//usuario base de datos
$config['usuarioBD'] = 'dbo.';
/*Estos son los usuarios de conexion a base de datos para poinke*/ 

$config['uri_protocol']	= 'REQUEST_URI';
$config['url_suffix'] = '';
$config['language']	= 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['composer_autoload'] = FALSE;
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_()@&\-!';
$config['allow_get_array'] = TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';

$config['log_threshold'] = 0;
$config['log_path'] = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['error_views_path'] = '';

$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;
$config['encryption_key'] = '';

$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7;
$config['sess_save_path'] = NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= FALSE;

$config['standardize_newlines'] = FALSE;

$config['global_xss_filtering'] = FALSE;

$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();

$config['compress_output'] = FALSE;


$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;

$config['proxy_ips'] = '';


$config['GetFechaUTC']=date("d M Y G:i:s");
/*
if(strpos($config['base_url'] ,'localhost')){

	$arrContextOptions=array(
			    "ssl"=>array(
			        "verify_peer"=>false,
			        "verify_peer_name"=>false,
			    ),
			); 
	$getHoraUTC=file_get_contents('https://atenea.directemar.cl/tiempo/horautc', false, stream_context_create($arrContextOptions));
			
	list($Hra,$Min,$Seg,$Dia,$Mes,$Anio,$a)=explode(':',$getHoraUTC);
	$Utc=$Hra.':'.$Min.':'.$Seg;
	$FechaUtc=$Anio.'-'.$Mes.'-'.$Dia;
	$dt = new DateTime($FechaUtc.' '.$Utc, new DateTimeZone('UTC'));
	// change the timezone of the object without changing it's time
	$dt->setTimezone(new DateTimeZone('BOT'));
	// format the datetime


	$config['GetFechaUTC']=$dt->format('d M Y G:i:s');

	/*
		1=Tecmar;
		2=Directemar ;
		3=Dirsomar ;
		4=Dirinmar ;
	

}*/
$config['CodLugar']=1;