<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Guia extends CI_Controller {

    public function index()
    {
        $this->load->view('guiaUsuario/index');
    }


	public function test(){

        header("Access-Control-Allow-Origin: *");  
        header("Access-Control-Allow-Methods: PUT, GET, POST");  
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  


		$folderPath = "assets/Uploads";  
        $postdata = file_get_contents("php://input");  
        $request = json_decode($postdata);  

        //echo json_encode(($request->fileSource));exit;
            
        foreach ($request->file as $key => $value) {  

            //echo json_encode($request);exit;
            
            $image_parts = explode(";base64,", $value);  
            
            $image_type_aux = explode("image/", $image_parts[0]);  
            
            $image_type = $image_type_aux[1];  
            
            $image_base64 = base64_decode($image_parts[1]);  
            
            $file = $folderPath . uniqid() . '.'.$image_type;  
            
            file_put_contents($file, $image_base64);  

	}
    }

}

/* End of file Guia.php */