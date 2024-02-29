<?php 
	$this->load->view('Complement/header');
?>

<div id="main" role="main">
	<div id="ribbon">
		<span class="ribbon-button-alignment"> 
			<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"   data-placement="bottom" data-html="true">
				<i class="fa fa-refresh"></i>
			</span> 
		</span>

		<ol class="breadcrumb">
			<li>PA_MPreguntaFormatoExamen</li>
		</ol>
	</div>

	<div id="content">
		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark">
					<i class="fa-fw fa fa-graduation-cap"></i> 
					Preguntas
				</h1>

			</div>
			
			
		</div>
		
		<section id="widget-grid" class="">
			<div class="row">
				<article class="col-lg-12">
					<div class="jarviswidget jarviswidget-color-darken" >
						<header>
							<span class="widget-icon"> </span>
							<h2>Detalle de Pregunta.</h2>
						</header>
						
						<div>
							<div class="widget-body">

								<div class="row">


									<div>
										<h3>&nbsp;</h3>	


										<div class="row">
											<div class="col-md-12">
												<!-- <input id="Pregunta" style="width: 400px;" value="<?=(isset($getPregunta)?strip_tags($getPregunta[0]->GLPregunta):'');?>">
												<br> -->
												<!-- <textarea name="ckeditor" id="Pregunta"><=(isset($getPregunta)?$getPregunta[0]->GLPregunta:'');?></textarea> -->
												<!-- <input style="display: none" id="pregunta-buk" value="<?=(isset($getPregunta)?$getPregunta[0]->GLPregunta:'');?>"> -->
												<textarea name="ckeditor" id="Pregunta"><?=(isset($getPregunta)?$getPregunta[0]->GLPregunta:'');?></textarea>
												<textarea style="display: none" id="pregunta-buk"><?=(isset($getPregunta)?$getPregunta[0]->GLPregunta:'');?></textarea>



											</div>
											<div class="col-md-6 text-left">
												<br>
												<button class="btn btn-primary " onclick="actualizarPregunta()" id="almacenar-pregunta"> <span class="btn-carga"></span> Actualizar pregunta</button>
											</div>	
											<div class="col-md-6 text-right">

												<!-- <button class="btn btn-primary " id="img-subir">Subir imagen</button> -->
												<!-- <button class="btn btn-primary " onclick="createFrame('<?=base_url();?>Preguntas/GestorIMG','Gestor de imagenes')">Gestor de imagen</button> -->
											
											</div>
											<div class="col-md-12"><hr></div>
										</div>


										<div class="row form-respuesta" id="form-respuesta-2" style="display: none">
											<div class="col-md-12">
												<h3>Respuesta</h3>
												
												<textarea name="ckeditor-respuesta" id="ckeditor-respuesta"><?=(isset($getRespuestas)?$getRespuestas[0]->GLRespuesta:'');?></textarea>
												<button class="btn btn-carga btn-primary " id="almacenar-respuesta" onclick="AlmacenraRespuesta()">Almacenar respuesta. <span class="carga"></span></button>


											</div>
										</div>


										

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

<!--  inicio Modal agregar nuevas alternativas  -->

	<div id="modalAgregar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header modalColorHeader">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Crear Alternativa</h4>
		</div>
		<div class="modal-body">	
			<form id="formAlternativa" method="POST">
				<div class="form-group" style="display:none;">
					<label for="IDPregunta">IDPregunta</label>
					<input type="text" disabled="true" class="form-control" id="IDPregunta" value="<?= $getPregunta[0]->IDPregunta ?>">
				</div>
				<div class="form-group">
					<label for="GLRespuesta">Glosa Pregunta</label>
					<input type="text" class="form-control" id="GLRespuesta" placeholder="Ingrese la pregunta" required="true" >
				</div>
				<div class="form-group">
<!-- 					
					 <php foreach($getRespuestasAlternativa as $key => $item ) { ?>
						
						<php if (!$item[$key]->LGCorrecta===1): ?>  -->
							<span>Correcta/Incorrecta</span>
							<div id="alternativa-correcta">
								<select class="select2" style="width: 100%" id="correcta" required="true">
									<option value="" selected>Seleccione</option>
									<option value="1">Correcta</option>
									<option value="0">Incorrecta</option>
								</select>		
							</div>
<!-- 
						 <php endif; ?>
						
					<php } ?>  -->
				<div class="form-group" style="display: none">
					<label  for="NRRutUsuario">RUN</label>
					<input type="text" class="form-control" disabled id="NRRutUsuarioEditar" required/>	
				</div>					
					
				</div>
				
				<br>
				<input 
					type="submit" 
					
					class="btn btn-primary" 
					value="Crear Alternativa"
					style="margin-top:15px;"/>
			</form>

			<script>
				$(document).ready(function() {
					$("#formAlternativa").submit(function(e){
						e.preventDefault();
						//console.log("valido")
						agregarAlternativa()
					});
				});
			</script>




		</div>
		<div class="modal-footer">
			<button type="button"  class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		</div>
		</div>

	</div>
	</div>

<!--  fin Modal agregar nuevas alternativas  -->


<!--  inicio Modal Editar alternativas  -->

	<div id="modalEditar" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header modalColorHeader">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Actualizar Alternativa</h4>
		</div>
		<div class="modal-body">	
			<form class="needs-validation" novalidate>
				<div class="form-group" style="display:none;">
					<label for="IDPregunta">IDPregunta</label>
					<input type="text" disabled="true" class="form-control" id="IDPreguntaEditar" value="">
				</div>
				<div class="form-group">
					<label for="GLRespuesta">Glosa Pregunta</label>
					<input type="text" class="form-control" id="GLRespuestaEditar" placeholder="Ingrese la pregunta" required="true" >
				</div>
				<div class="form-group">
<!-- 					IDPreguntaEditar
GLRespuestaEditar
NRRutUsuarioEditar
					 <php foreach($getRespuestasAlternativa as $key => $item ) { ?>
						
						<php if (!$item[$key]->LGCorrecta===1): ?>  -->
							<span>Correcta/Incorrecta</span>
							<div id="alternativa-correcta">
								<select class="select2" style="width: 100%" id="correcta" required="true"  >
									<option value="-1">Selección</option>
									<option value="1">Correcta</option>
									<option value="0">Incorrecta</option>
								</select>		
							</div>
<!-- 
						 <php endif; ?>
						
					<php } ?>  -->
					
					
				</div>
				<div class="form-group">
					<label for="NRRutUsuario">RUN</label>
					<input type="text" class="form-control" oninput="checkRut(this)" id="NRRutUsuarioEditar" required/>	
				</div>

				<div class="alert alert-danger" role="alert" id="alerta" style="display:none;margin-bottom:15px;">
  						¡Todos los campos deben ser completados!
				</div>
				<br>
				<input 
					type="button" 
					onclick="editarAlternativa();" 
					class="btn btn-primary" 
					value="Editar Alternativa"
					style="margin-top:15px;"/>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button"  class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		</div>
		</div>

	</div>
	</div>

<!--  fin Modal Editar alternativas  -->


<!-- NAV VAR -->
<?php $this->load->view('Complement/footer');?>
<script src="<?=base_url();?>assets/js/plugin/ckeditor/ckeditor.js"></script>
<script src="<?=base_url();?>assets/js/libs/AjaxUpload.2.0.min.js"></script>


<script type="text/javascript">

	$(document).ready(function(){
		CKEDITOR.replace('ckeditor',{height:'400px',startupFocus:true});
		CKEDITOR.replace('ckeditor-respuesta',{height:'300px',startupFocus:true});

		//config.removePlugins = 'blockquote,save,flash,iframe,tabletools,pagebreak,templates,about,showblocks,newpage,language,print,div';
		CKEDITOR.config.removeButtons = 'Print,Form,TextField,Textarea,Button,CreateDiv,PasteText,PasteFromWord,Select,HiddenField,Radio,Checkbox,ImageButton,Anchor,BidiLtr,BidiRtl,Font,Format,Styles,Preview,Indent,Outdent';
		CKEDITOR.config.removePlugins = 'elementspath,save,image,flash,iframe,link,smiley,tabletools,find,pagebreak,templates,about,maximize,showblocks,newpage,language';

		CKEDITOR.config.removeButtons = 'elementspath,save,font,Copy,Html,Cut,Paste,Undo,Redo,Print,Form,TextField,Textarea,Button,SelectAll,NumberedList,BulletedList,CreateDiv,Table,PasteText,PasteFromWord,Select,HiddenField';
		var button = $('#img-subir'), interval;
		new AjaxUpload(button, {
	  		action: '<?=base_url();?>Preguntas/UploadImgenesPreguntas', 
	  		name: 'img-subir',
	  		onSubmit : function(file, ext){
	    		if (! (ext && /^(jpg|png|gif|jpeg)$/.test(ext))){
	      			alerta('Error ','Error: Solo se permiten archivos con extención <b>jpg</b>, <b>png</b>, <b>gif</b>, <b>jpeg</b>.')
	      			return false;
	    		}
	    		
	    		
	  		},
	  	
	  		onComplete: function(file, response){
	    		var Img='<img src="<?=base_url();?>'+response+'">';
	    		var Actual=CKEDITOR.instances['Pregunta'].getData()
	    		CKEDITOR.instances['Pregunta'].setData(Actual+Img)
	  		}	
		});
	})

	function abrirModal(){
		$('#modalAgregar').modal('show');
	}

	function checkRut(rut) {
		var valor = rut.value.replace('.','');
		valor = valor.replace('-','');
		cuerpo = valor.slice(0,-1);
		dv = valor.slice(-1).toUpperCase();
		rut.value = cuerpo + '-'+ dv
		if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
		suma = 0;
		multiplo = 2;
		for(i=1;i<=cuerpo.length;i++) {
			index = multiplo * valor.charAt(cuerpo.length - i);
			suma = suma + index;
			if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
		}
		dvEsperado = 11 - (suma % 11);
		dv = (dv == 'K')?10:dv;
		dv = (dv == 0)?11:dv;
		if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
		rut.setCustomValidity('');
	}

	function editarAlternativa(){	
		var IDPreguntaEditar = $("#IDPreguntaEditar").val();
		var GLRespuestaEditar  = $('#GLRespuestaEditar').val();
		var correcta = $('#correcta').select2('val');
		var NRRutUsuarioEditar = $('#NRRutUsuarioEditar').val();
		
		if(IDPreguntaEditar === '' || GLRespuestaEditar === '' || correcta === '' || NRRutUsuarioEditar === '' ){
			$("#alerta").css("display","inline");
			$("#IDPregunta").css("border-color", "#d33724");
			$('#GLRespuesta').css("border-color", "#d33724");
			//$('#correcta').select2('css').("border-color", "#d33724");
			$('#NRRutUsuario').css("border-color", "#d33724");
			return; 	
		}
		var objParams = {
			'IDPreguntaEditar' : IDPreguntaEditar,
			'GLRespuestaEditar' : GLRespuestaEditar,
			'correcta' : correcta,
			'NRRutUsuarioEditar' : NRRutUsuarioEditar
		};

		//console.log(objParams,"parametros");

		$.ajax({
	        type: "POST",
	        url: "<?=base_url();?>Preguntas/editarAlternativa",
			data: objParams,
	        success: function(obj){
	       		//console.log(obj);
	       		// $.SmartMessageBox({
	       		// 	title:'Alternativa Creada',
	       		// 	content:'Se creo con exito la nueva alternativa',
	       		// 	buttons:'[Volver al listado de preguntas][Aceptar]'	
	       		// 	},function(ButtonPress,value){
		       	// 		if(ButtonPress=='Volver al listado de preguntas'){
		       	// 			location.href="<=base_url();?>Preguntas";
		       	// 		}else if(ButtonPress=='Aceptar'){
		       	// 			location.reload();
		       	// 		}
	       		// 	}
	       		// );
	       		// $(".btn-carga").prop('disabled',false);
				// $(".carga").html('');
				// //alert('funciona'+ obj);
	        },
			error : function(err){
				alert("algo no funciona");
				//console.log(err, "Error al actualizar");
			}
	    })

	}

	function agregarAlternativa(){	
		var IDPregunta = $("#IDPregunta").val();
		var GLRespuesta  = $('#GLRespuesta').val();
		var LGCorrecta = $('#correcta').select2('val');
		var NRRutUsuario = <?=$_SESSION["NRRutUsuario"]?>;
		
		if(IDPregunta === '' || GLRespuesta === '' || LGCorrecta === '' || NRRutUsuario === '' ){
			$("#alerta").css("display","inline");
			$("#IDPregunta").css("border-color", "#d33724");
			$('#GLRespuesta').css("border-color", "#d33724");
			//$('#correcta').select2('css').("border-color", "#d33724");
			$('#NRRutUsuario').css("border-color", "#d33724");
			return; 	
		}
		var objParams = {
			'IDPregunta' : IDPregunta,
			'GLRespuesta' : GLRespuesta,
			'LGCorrecta' : LGCorrecta,
			'NRRutUsuario' : NRRutUsuario
		};

		//console.log(objParams);

		$.ajax({
	        type: "POST",
	        url: "<?=base_url();?>Preguntas/agregarAlternativa",
			data: objParams,
	        success: function(obj){
	       		//console.log(obj);
	       		$.SmartMessageBox({
	       			title:'Alternativa Creada',
	       			content:'Se creó con éxito la nueva alternativa',
	       			buttons:'[Volver al listado de preguntas][Aceptar]'	
	       			},function(ButtonPress,value){
		       			if(ButtonPress=='Volver al listado de preguntas'){
		       				location.href="<?=base_url();?>Preguntas";
		       			}else if(ButtonPress=='Aceptar'){
		       				location.reload();
		       			}
	       			}
	       		);
	       		$(".btn-carga").prop('disabled',false);
				$(".carga").html('');
				//alert('funciona'+ obj);
	        },
			error : function(err){
				alert("algo no funciona");
				//console.log(err, "Error al actualizar");
			}
	    })

	}
	function eliminarAlternativa(item) {

		//console.log(item,"item")
		if (item === "") {
			return null;
		}

		var ObjParam ={
			'IDRespuesta':item,
		}
		//console.log(ObjParam,"id")

		$.ajax({
	        type: "POST",
	        url: "<?=base_url();?>Preguntas/eliminarAlternativa",
			data: ObjParam,
	        success: function(obj){
	       		//console.log(obj);
	       		$.SmartMessageBox({
	       			title:'Aviso',
	       			content:'Se eliminó la respuesta',
	       			buttons:'[Volver al listado de preguntas][Aceptar]'	
	       			},function(ButtonPress,value){
		       			if(ButtonPress=='Volver al listado de preguntas'){
		       				location.href="<?=base_url();?>Preguntas";
		       			}else if(ButtonPress=='Aceptar'){
		       				location.reload();
		       			}
	       			}
	       		);
	       		$(".btn-carga").prop('disabled',false);
				$(".carga").html('');
				//alert('funciona'+ obj);
	        },
			error : function(err){
				alert("algo no funciona");
				//console.log(err, "Error al actualizar");
			}
	    })
		
	}
	function getRespuestaEditar(item){	
		var IDRespuesta = item;
		if(IDRespuesta === ''){
			return; 	
		}
		var objParams = {
			'IDRespuesta' : IDRespuesta,
		};


		
		//console.log(JSON.stringify(objParams,"  alternativa"));

		$.ajax({
	        type: "POST",
	        url: "<?=base_url();?>Preguntas/getRespuestaEditar",
			data: objParams,
	        success: function(obj){
	       		////console.log(obj,"q :)");
				  // //console.log(JSON.parse(obj))
				   var dato = JSON.parse(obj);
				//console.log(dato, "  datos")
				$("#IDPreguntaEditar").val(dato[0].IDRespuesta);
				$('#GLRespuestaEditar').val(dato[0].GLRespuesta);
				$('#correcta').select2('val');
				$('#NRRutUsuarioEditar').val(dato[0].NRRutUsuario);
				$('#modalEditar').modal('show');
	       		
	        },
			error : function(err){
				alert("algo no funciona");
				//console.log(err, "Error al actualizar");
			}
	    })

	}


	var IDPregunta='<?=$this->uri->segment('3');?>';
	

	function actualizarPregunta(){
		/*mfigueroa.PA_MPreguntaFormatoExamen (
@IDPregunta int,
@IDFormatoExamen int,
@GLPregunta varchar(200)
,@NRRutUsuario int,
@Resultado  int OUTPUT)*/

		var ObjParam ={
			'IDFormatoExamen':<?=$IDFormatoExamen?>,		
			'IDPregunta':<?=$IDPregunta?>,
			'GLPregunta':CKEDITOR.instances['Pregunta'].getData()
		}
		////console.log(ObjParam);return;
		$.ajax({
	        type: "POST",
	        url: "<?=base_url();?>Preguntas/PA_MPreguntaFormatoExamen",
	        data: ObjParam,
	        success: function(obj){
	       		//console.log(obj);

	       		$.SmartMessageBox({
	       			title:'Aviso',
	       			content:'Se actualizó la pregunta',
	       			buttons:'[Aceptar]'	
	       			},function(ButtonPress,value){
		       			if(ButtonPress=='Aceptar'){
							//http://10.16.153.89/pabloj/pablo/sievalCompletoQA/Preguntas/getPreguntasPorIDFormatoExamen/3196
		       				location.href="<?=base_url();?>Preguntas/getPreguntasPorIDFormatoExamen/<?=$IDFormatoExamen?>";
		       			}
	       			}
	       		);
	       		$(".btn-carga").prop('disabled',false)
				$(".carga").html('');



	        }
	    })
	}


	function strip_tag(text){
		
		text=remplaza_cadena( text, '&nbsp;', '' );

		return text.replace(/(<([^>]+)>)/ig,""); // Returns: bar
	}


	function AlmacenraRespuesta(){
		var TipoPregunta=$("#tipo-pregunta").select2('val');
		$(".btn-carga").prop('disabled',true)
		$(".carga").html('<i class="fa  fa-spin fa-refresh"></i>');


		if(TipoPregunta==2){
			var Respuesta=CKEDITOR.instances['ckeditor-respuesta'].getData();	
		}
		
		var ObjParam={
			'IDPregunta':IDPregunta,
			'Respuesta':Respuesta,
		}
		//console.log(ObjParam)


		$.ajax({
	        type: "POST",
	        url: "<?=base_url();?>Preguntas/SaveRespuesta",
	        data: ObjParam,

	        success: function(obj){
	       		//console.log(obj);

	       		$.SmartMessageBox({
	       			title:'Aviso',
	       			content:'Se almacano la respuesta',
	       			buttons:'[Volver al listado de preguntas][Aceptar]'	
	       			},function(ButtonPress,value){
		       			if(ButtonPress=='Volver al listado de preguntas'){
		       				location.href="<?=base_url();?>Preguntas";
		       			}else if(ButtonPress=='Aceptar'){
		       				location.reload();
		       			}
	       			}
	       		);


	       		$(".btn-carga").prop('disabled',false)
				$(".carga").html('');



	        }
	    })

	}
	
	function getTipoRespuesta(){
		var Iden=$("#tipo-pregunta").select2('val');
		$(".form-respuesta").hide();	
		
		if(Iden!=-1){
			$("#form-respuesta-"+Iden).fadeIn();	
		}

		
	}

	function getFiltro(){
		var area=$("#area").select2('val');
		var nivel=$("#nivel").select2('val');
		var asignatura=$("#asignatura").select2('val');
		var texto=$("#texto-pregunta").val();

		var ObjParam={
			'area':area,
			'nivel':nivel,
			'asignatura':asignatura,
			'texto':texto,
		}

		$("#result-preguntas").html('<h1><i class="fa  fa-spin fa-refresh"></i></h1>');

		//console.log(ObjParam)
		$.ajax({
	        type: "POST",
	        url: "<?=base_url();?>Preguntas/getPreguntasParam",
	        data: ObjParam,

	        success: function(obj){
	       		//console.log(obj);

	       		$("#result-preguntas").html(obj.getView);


	        }
	    })

	}


	function LoaderAsignaturas(Iden){
		$("#carga-asignatura").html('<i class="fa  fa-spin fa-refresh"></i>');
		var ObjParam={
			'IdArea':$("#area").select2('val')
		}
		//console.log(ObjParam)
		$.ajax({
	        type: "POST",
	        url: "<?=base_url();?>Preguntas/getAsignaturas",
	        data: ObjParam,

	        success: function(obj){
	       		//console.log(obj);
	       		var Option='<select class="select2" style="width: 100%" id="asignatura" ><option value="-1"></option>';
	       		if(obj.getAsignaturas){
		       		$.each(obj.getAsignaturas, function(i, item) {  
		       			Option+='<option value="'+item.IDAreaAsignatura+'">'+item.GLAsignatura+'</option>';

		       		});
	       		}

	       		Option+='</select>';
	       		$("#carga-asignatura").html(Option)
	       		$("#asignatura").select2();


	        }
	    })
	}

	

	$("#Preguntas").addClass('active open');


</script>

		