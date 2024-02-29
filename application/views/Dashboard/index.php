<?php 
	$this->load->view('Complement/header');
?>


<style>
.wrimagecard{	
	margin-top: 0;
    margin-bottom: 1.5rem;
    text-align: left;
    position: relative;
    background: #fff;
    box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
    border-radius: 4px;
    transition: all 0.3s ease;
}
.wrimagecard .fa{
	position: relative;
    font-size: 70px;
}


.wrimagecard-topimage_header{
padding: 20px;
}
a.wrimagecard:hover, .wrimagecard-topimage:hover {
    box-shadow: 2px 4px 8px 0px rgba(46,61,73,0.2);


}
.wrimagecard-topimage a {
    width: 100%;
    height: 100%;
    display: block;
}



.wrimagecard-topimage_title {
    padding: 20px 24px;
    height: 80px;
    padding-bottom: 0.75rem;
    position: relative;
}
.wrimagecard-topimage a {
    border-bottom: none;
    text-decoration: none;
    color: #525c65;
    transition: color 0.3s ease;
}


</style>
<div id="main" role="main">
	<div id="ribbon">
		<span class="ribbon-button-alignment"> 
			<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"   data-placement="bottom" data-html="true">
				<i class="fa fa-refresh"></i>
			</span> 
		</span>

		<ol class="breadcrumb">
			<li>Usuario <?=$_SESSION["NRRutUsuario"]?></li>
		</ol>
	</div>

	<div id="content">
		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark">
					<i class="fa-fw fa fa-home"></i> 
					Inicio
				</h1>

			</div>
			
			
		</div>
		
		<section id="widget-grid" class="">
			<div class="row">
				<article class="col-lg-9">
					<div class="jarviswidget jarviswidget-color-darken" >
						
						
						<div>
							<div class="widget-body">

								<div class="row">
									<div class="col-md-8 col-centered">
										

									
										<div class="row">

										<div class="col-md-4 ">
												<div class="wrimagecard wrimagecard-topimage">
		          									<a href="<?=base_url();?>Evaluaciones">
		          										<div class="wrimagecard-topimage_header" style="background-color:rgba(85, 116, 170) ">
		            										<center><i class="fa fa-calendar" style="color:#000066"></i></center>
		          										</div>
		          										<div class="wrimagecard-topimage_title">
		            										<h4>Exámenes
		            											<!-- <div class="pull-right badge"><?=($getCountPreguntas->Cont);?></div> -->
		            										</h4>
		          										</div>
		        									</a>
		      									</div>
											  </div>
											  
											<div class="col-md-4 ">
												<div class="wrimagecard wrimagecard-topimage">
		          									<a href="<?=base_url();?>Preguntas">
		          										<div class="wrimagecard-topimage_header" style="background-color:rgba(85, 116, 170) ">
		            										<center><i class="fa fa-graduation-cap" style="color:#000066"></i></center>
		          										</div>
		          										<div class="wrimagecard-topimage_title">
		            										<h4>Preguntas
		            											<div class="pull-right badge"><?=($getCountPreguntas->Cont);?></div>
		            										</h4>
		          										</div>
		        									</a>
		      									</div>
		      								</div>


		      							
		      								<div class="col-md-4 ">
												<div class="wrimagecard wrimagecard-topimage">
		          									<a href="<?=base_url();?>Asignaturas">
		          										<div class="wrimagecard-topimage_header" style="background-color:rgba(85, 116, 170) ">
		            										<center><i class="fa fa-book" style="color:#000066"></i></center>
		          										</div>
		          										<div class="wrimagecard-topimage_title">
		            										<h4>Asignaturas
		            											<div class="pull-right badge"><?=($getCountAsignaturas->cantidad);?></div>
		            										</h4>
		          										</div>
		        									</a>
		      									</div>
		      								</div>
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
</div>


<!-- NAV VAR -->
<?php $this->load->view('Complement/footer');?>



<script type="text/javascript">
	

</script>

		