<?php  
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
 class Excel{
	 public function __construct (){
		require_once ('Classes/PHPExcel.php');
		require_once ('Classes/PHPExcel/IOFactory.php');
		$this->CI =& get_instance();
	}
}
					
?>
