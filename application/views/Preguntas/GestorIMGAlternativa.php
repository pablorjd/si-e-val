<?php
	$this->load->view('Complement/headerFrame');
	$now=date('U');


?>

<style>
	.border-style{
		border: 1px solid #c9c9c9; 
	}
</style>
<div class="container">
	<div class="col-md-12 text-right" style="margin-top: 10px;">
		<button class="btn btn-primary" onclick="parent.AbrirBlank('<?=base_url();?>Preguntas/SubirImg');salirFrame();">Subir Imágenes</button>	
	</div>
</div>
<div class="container" style="background-color: #fff; margin-top: 10px;">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1>Imágenes</h1><hr>
		</div>
	</div>

	<div class="row">
		<?php
			$PathUpload='assets/Uploads/';
			$dir = opendir($PathUpload);
				
			while(false !== ( $file = readdir($dir)) ) {
				if (( $file != '.' ) && ( $file != '..' )) {
			?>

		<div class="col-md-4" style="margin-bottom: 20px;">
			<div class="row">
				<div class="col-md-11 col-centered border-style" style="height: 250px; overflow-y: scroll;">
					<img src="<?=base_url().$PathUpload.$file;?>" alt="" class="img-responsive">
				</div>
				<div class="col-md-11 col-centered text-center border-style">
					<button class="btn-primary" onclick="Seleccionar('<?=base_url().$PathUpload.$file;?>')">Seleccionar</button>
					<button class="btn-danger" onclick="Eliminar('<?=$PathUpload.$file;?>')">Eliminar</button>
				</div>
			</div>
			
		</div>

			<?php
				}
			}
			closedir($dir);


		?>
	</div>
</div>
<?php
	$this->load->view('Complement/footerIframe');
?>

<script>
	function Seleccionar(Path){
		var img='<img src="'+Path+'">';
		
		parent.$("#banner-loader").html('<img src="'+Path+'" class="img-responsive">');
		parent.BannerResponse=Path;

		
		var Actual=parent.CKEDITOR.instances['ckeditorAlternativaEditar'].getData();
		parent.CKEDITOR.instances['ckeditorAlternativaEditar'].setData(Actual+img);

		
		
		salirFrame();
	}

	function Eliminar(Path){
		$.ajax({
			type: "POST",
	        url: "<?=base_url();?>Preguntas/EliminarFile",
	        data: {'Path':Path},
	        success: function(obj){

	        	location.reload();


		
	        	
	        }

		});	

	}
</script>

<?php
	$this->load->view('Complement/headerFrame');
	$now=date('U');


?>

<style>
	.border-style{
		border: 1px solid #c9c9c9; 
	}
</style>
<div class="container">
	<div class="col-md-12 text-right" style="margin-top: 10px;">
		<!-- <button class="btn btn-primary" onclick="parent.AbrirBlank('<?=base_url();?>Preguntas/SubirImg');salirFrame();">Subir Imágenes</button>	 -->
	</div>
</div>
<div class="container" style="background-color: #fff; margin-top: 10px;">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1>Imágenes</h1><hr>
		</div>
	</div>

	<div class="row">
		<?php
			$PathUpload='assets/Uploads/';
			$dir = opendir($PathUpload);
				
			while(false !== ( $file = readdir($dir)) ) {
				if (( $file != '.' ) && ( $file != '..' )) {
			?>

		<div class="col-md-4" style="margin-bottom: 20px;">
			<div class="row">
				<div class="col-md-11 col-centered border-style" style="height: 250px; overflow-y: scroll;">
					<img src="<?=base_url().$PathUpload.$file;?>" alt="" class="img-responsive">
				</div>
				<div class="col-md-11 col-centered text-center border-style">
					<button class="btn-primary" onclick="Seleccionar('<?=base_url().$PathUpload.$file;?>')">Seleccionar</button>
					<button class="btn-danger" onclick="Eliminar('<?=$PathUpload.$file;?>')">Eliminar</button>
				</div>
			</div>
			
		</div>

			<?php
				}
			}
			closedir($dir);


		?>
	</div>
</div>
<?php
	$this->load->view('Complement/footerIframe');
?>

<script>
	function Seleccionar(Path){
		var img='<img src="'+Path+'">';
		
		parent.$("#banner-loader").html('<img src="'+Path+'" class="img-responsive">');
		parent.BannerResponse=Path;

		
		var Actual=parent.CKEDITOR.instances['ckeditorAlternativaEditar'].getData();
		parent.CKEDITOR.instances['ckeditorAlternativaEditar'].setData(Actual+img);

		
		
		salirFrame();
	}

	function Eliminar(Path){
		$.ajax({
			type: "POST",
	        url: "<?=base_url();?>Preguntas/EliminarFile",
	        data: {'Path':Path},
	        success: function(obj){

	        	location.reload();


		
	        	
	        }

		});	

	}
</script>

