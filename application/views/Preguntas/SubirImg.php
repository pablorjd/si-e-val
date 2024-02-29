<?php
	$this->load->view('Complement/headerFrame');

	$now=date('U');
	// echo var_dump($getArchivos);
	

?>
<!---LLAMADAS DE CSS Externo-->
<style>
	
	.border-file{
		border:1px solid #f0f1f1
	}
</style>
	<link rel="stylesheet" href="<?=base_url();?>assets/css/editor.css">

<div id="ribbon" style="border-bottom: 1px solid #dddddd; background-color: #f2f2f2">
	<ol class="breadcrumb">
		<li>Biblioteca de imagenes</li>
		
	</ol>
</div>
		

<div id="content">
	<!-- <div class="row" style="margin-bottom: 5px; margin-top: -5px;">
		<div class="col-md-12 text-right">
			<button class="btn btn-primary">
				Ingresar nuevo correo masivo
			</button>


		</div>
	</div> -->
	<section id="widget-grid" class="">
		<div class="row">
			<article class="col-xs-12  col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="jarviswidget jarviswidget-color-darken " id="wid-id-0"  >
							
							<header style="background-color: #0B3580">
								<span class="widget-icon"> <i class="fa fa-comments"></i> </span>
								<h2></h2>
			
							</header>

							
							<div class="widget-body" style="min-height: 500px;">

								



								
								<div class="row">
								
									<div class="col-md-12" style="margin-bottom: -20px;">
										<h3>Subir imagenes.</h3>
									</div>
									<div class="col-md-12" style="margin-bottom: 25px;">
						                <form enctype="multipart/form-data">
						                    <input id="file-es" name="file-es[]" type="file" multiple class="file-loading file-es"> 
						                </form>  

						               
						            </div>
						             <div class="col-md-12 text-right" style="display: none" id="panel-comentario-btn-subir">
						                	<button class="btn btn-success" onclick="UploadImg()">Subir archivos.</button>	
						                </div>  

									
									
								</div>	

								

								
								
							</div>
						</div>
					</div>
				</div>
			</article>
			
		</div>
	</section>
	
	
</div>

<?php
	$this->load->view('Complement/footerIframe');
?>
<link href="<?=base_url();?>assets/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="<?=base_url();?>assets/js/plugin/fileinput/fileinput.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/js/plugin/fileinput/fileinput_locale_es.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/js/plugin/bootstrap-tags/bootstrap-tagsinput.min.js"></script>


<script type="text/javascript">
	$(document).ready(function(){
		
		


		$('#file-es').fileinput({
	        language: 'es',
	        uploadUrl: '<?=base_url();?>Preguntas/UploadFilesMails',
	        uploadAsync: true,
	        initialCaption: "Seleccione el o los archivos a subir.",
	        allowedFileExtensions: ["jpg", "gif", "png","jpeg"],
	        uploadExtraData: function (previewId, index) {
	            var info = {
	                'DirectorioUpload': 'assets/Uploads/',
	                'OpcNoGuarda': 1,
	            };
	            return info;
	            
	        }
	    }).on('filebatchpreupload', function(event, data, jqXHR) {
        	
	        // if($("#IdProducto").val()==''){
	        //      return {
	        //         message: "Favor de Almacenar la informacion del producto", // upload error message
	        //         data:{} // any other data to send that can be referred in `filecustomerror`
	        //     };
	        // }
	        
	        var n = data.files.length, files = n > 1 ? n + ' archivos' : 'un archivo';

	    
	    }).on('filebatchuploadcomplete', function(event, data, previewId, index) {
	        $('#file-es').fileinput('clear');
	       
	        // CargaImagenProducto()
	        
	    }).on('fileselect', function(event, numFiles, label) {
	        if(numFiles>0){

	        	// UploadImg();
	            $("#panel-comentario-btn-subir").fadeIn();    
	          
	        }else{
	            $("#panel-comentario-btn-subir").hide();
	           
	        }
	    }).on('filecleared', function(event) {
	        // $("#panel-comentario-btn-subir").hide();

	    })
				
	});


	function UploadImg(){
		$('#file-es').fileinput('upload');	

	}
	

    

</script>
