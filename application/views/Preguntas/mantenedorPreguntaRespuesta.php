<?php 
	$this->load->view('Complement/header');
?>

<div id="main" role="main">
    <div id="ribbon">
        <span class="ribbon-button-alignment">
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"
                data-placement="bottom" data-html="true">
                <i class="fa fa-refresh"></i>
            </span>
        </span>

        <ol class="breadcrumb">
            <li>Preguntas</li>
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
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2>Generar Pregunta. |<a class="btn btn-success  btn-xs"
                                    href="<?=base_url();?>Preguntas/mantenedorPreguntaRespuesta"
                                    title="Estadisticas">Agregar Nueva Pregunta</a></h2>
                        </header>

                        <div>
                            <div class="widget-body">

                                <div class="row">

                                    <div class="col-md-2">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Preguntas</h3>
                                            </div>
                                            <div class="col-md-12">
                                                <span>Tipo Pregunta</span>
                                                <select class="select2" style="width: 100%" required id="tipo-pregunta"
                                                    onchange="getTipoRespuesta(this.value)">
                                                    <option value="-1"></option>
                                                    <?php
													
														if(isset($getTPPregunta)){
															$Selected='';
															foreach ($getTPPregunta as $key => $t) {
																$Selected='';
																if(isset($getPregunta)){
																	if($getPregunta[0]->CDTPPregunta==$t->CDTPPregunta){
																		$Selected='selected="selected"';
																	}
																}
															?>

                                                    <option value="<?=$t->CDTPPregunta;?>" <?=$Selected;?>>
                                                        <?=$t->GLTPPregunta;?></option>
                                                    <?php
															}
														}
													?>
                                                </select>

                                            </div>


                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <span>Area</span>
                                                <select class="select2" style="width: 100%" id="area" required
                                                    onchange="LoaderAsignaturas(this.value)">
                                                    <option value="-1"></option>
                                                    <?php
														if(isset($getAreas)){
															foreach ($getAreas as $key => $s) {
																$Selected='';
																if(isset($getPregunta)){
																	if($getPregunta[0]->CDTPArea==$s->CDTPArea){
																		$Selected='selected="selected"';
																	}
																}
															?>

                                                    <option value="<?=$s->CDTPArea;?>" <?=$Selected;?>>
                                                        <?=$s->GLTPArea;?></option>
                                                    <?php
															}
														}
													?>
                                                </select>

                                            </div>


                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <span>Nivel </span>
                                                <select class="select2" style="width: 100%" id="nivel" required>
                                                    <option value="-1"></option>

                                                    <?php
														if(isset($getNivel)){
															foreach ($getNivel as $key => $s) {
																$Selected='';
																if(isset($getPregunta)){
																	if($getPregunta[0]->CDTPNivel==$s->CDTPNivel){
																		$Selected='selected="selected"';
																	}
																}
															?>

                                                    <option value="<?=$s->CDTPNivel;?>" <?=$Selected;?>>
                                                        <?=$s->GLTPNivel;?></option>
                                                    <?php
															}
														}
													?>
                                                </select>

                                            </div>


                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <span>Asignatura</span>
                                                <div id="carga-asignatura">
                                                    <select class="select2" style="width: 100%" id="asignatura"
                                                        required>
                                                        <option value="-1"></option>
                                                    </select>
                                                </div>

                                            </div>

                                        </div>


                                    </div>

                                    <div class="col-md-7">
                                        <h3>&nbsp;</h3>
                                        <!-- <$getPregunta;exit;?> -->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- <input id="Pregunta" style="width: 400px;" value="<?=(isset($getPregunta)?strip_tags($getPregunta[0]->GLPregunta):'');?>"> -->
                                                <br>
                                                <textarea name="ckeditor"
                                                    id="Pregunta"><?=(isset($getPregunta)?$getPregunta[0]->GLPregunta:'');?></textarea>
                                                <!-- <input style="display: none" id="pregunta-buk" value="<?=(isset($getPregunta)?$getPregunta[0]->GLPregunta:'');?>"> -->
                                                <!-- <textarea name="ckeditor" id="Pregunta"><?=(isset($getPregunta)?$getPregunta[0]->GLPregunta:'');?></textarea>-->
                                                <textarea style="display: none"
                                                    id="pregunta-buk"><?=(isset($getPregunta)?$getPregunta[0]->GLPregunta:'');?></textarea>
                                            </div>
                                            <div class="col-md-6 text-left">

                                                <!-- disabled  -->
                                                <br>

                                                <button class="btn btn-primary" onclick="AlmacenraPregunta()"
                                                    id="almacenar-pregunta">
                                                    <span class="btn-carga"></span>Almacenar pregunta</button>
                                                <!-- 
													<button class="btn btn-primary" onclick="pa_IPregunta()" id="almacenar-pregunta"> 
													<span class="btn-carga"></span>Almacenar pregunta pa</button> -->

                                            </div>
                                            <div class="col-md-6 text-right">
                                                <br>
                                                <!-- <button class="btn btn-primary " onclick="subirImagen()" id="img-subir">Agregar imagen (opcional)</button> -->
                                                <button class="btn btn-primary "
                                                    onclick="createFrame('<?=base_url();?>Preguntas/GestorIMG','Gestor de imagenes')">Gestor
                                                    de imagen</button>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                        </div>

                                        <div class="row form-respuesta" id="form-respuesta-2" style="display: none">
                                            <div class="col-md-12">
                                                <h3>Respuesta</h3>
                                                <textarea name="ckeditor-respuesta"
                                                    id="ckeditor-respuesta"><?=(isset($getRespuestas)?$getRespuestas[0]->GLRespuesta:'');?></textarea>
                                                <button class="btn btn-carga btn-primary " id="almacenar-respuesta"
                                                    onclick="AlmacenraRespuesta()">Almacenar respuesta. <span
                                                        class="carga"></span></button>
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
<!-- <script src="<?=base_url();?>assets/js/plugin/ckeditorultimate/ckeditor.js"></script> -->
<script src="<?=base_url();?>assets/js/plugin/ckeditor/ckeditor.js"></script>
<script src="<?=base_url();?>assets/js/libs/AjaxUpload.2.0.min.js"></script>


<script type="text/javascript">
var imgGrabar;
$(document).ready(function() {

    CKEDITOR.replace('ckeditor', {
        height: '400px',
        startupFocus: true
    });
    CKEDITOR.replace('ckeditor-respuesta', {
        height: '300px'
    });
    //CKEDITOR.replace('ckeditor-alternativa',{height:'300px',startupFocus:true});

    // CKEDITOR.config.removeButtons = 'Print,Form,TextField,Textarea,Button,CreateDiv,PasteText,PasteFromWord,Select,HiddenField,Radio,Checkbox,ImageButton,Anchor,BidiLtr,BidiRtl,Font,Format,Styles,Preview,Indent,Outdent';
    // CKEDITOR.config.removePlugins = 'elementspath,save,flash,iframe,link,smiley,tabletools,find,pagebreak,templates,about,maximize,showblocks,newpage,language';

    // CKEDITOR.config.removeButtons = 'elementspath,save,font,Copy,Html,Cut,Paste,Undo,Redo,Print,Form,TextField,Textarea,Button,SelectAll,NumberedList,BulletedList,CreateDiv,Table,PasteText,PasteFromWord,Select,HiddenField';



    // var button = $('#img-subir'), interval;
    // new AjaxUpload(button, {
    // 	action: '<?=base_url();?>Preguntas/UploadImgenesPreguntas', 
    // 	name: 'img-subir',
    // 	onSubmit : function(file, ext){
    // 		if (! (ext && /^(jpg|jpeg)$/.test(ext))){
    // 			alerta('Error ','Error: Solo se permiten archivos con extención <b>jpg</b>, <b>jpeg</b>.')
    //   			return false;
    // 		}


    // 	},

    // 	onComplete: function(file, response){
    // 		  //console.log(response)
    // 		var Img='<img src="<?=base_url();?>'+response+'">';

    // 		imgGrabar='<img src="<?=base_url();?>'+response+'">';

    // 		var Actual=CKEDITOR.instances['Pregunta'].getData()
    // 		CKEDITOR.instances['Pregunta'].setData(Actual+'<br>'+Img)
    // 		var Actual2=CKEDITOR.instances['Pregunta'].getData()
    // 		console.log(Actual2,"contenido del terarea")
    // 	}	
    // });
})
/*	function subirImagen(){
		var button = $('#img-subir'), interval;
		new AjaxUpload(button, {
	  		action: '<?=base_url();?>Preguntas/UploadImgenesPreguntas', 
	  		name: 'img-subir',
	  		onSubmit : function(file, ext){
	    		if (! (ext && /^(jpg|jpeg)$/.test(ext))){
	      			alerta('Error ','Error: Solo se permiten archivos con extención <b>jpg</b>, <b>jpeg</b>.')
	      			return false;
	    		}
	    		
	    		
	  		},
	  	
	  		onComplete: function(file, response){
				var Img='<img src="<?=base_url();?>'+response+'">';
				//console.log(Img,"esta debe ser la ruta de la imagen")
				imgGrabar='<img src="<?=base_url();?>'+response+'">';
	    		var Actual=CKEDITOR.instances['Pregunta'].getData()
	    		CKEDITOR.instances['Pregunta'].setData(Actual+Img)
	  		}	
		});

	}*/

function checkRut(rut) {
    var valor = rut.value.replace('.', '');
    valor = valor.replace('-', '');
    cuerpo = valor.slice(0, -1);
    dv = valor.slice(-1).toUpperCase();
    rut.value = cuerpo + '-' + dv
    if (cuerpo.length < 7) {
        rut.setCustomValidity("RUT Incompleto");
        return false;
    }
    suma = 0;
    multiplo = 2;
    for (i = 1; i <= cuerpo.length; i++) {
        index = multiplo * valor.charAt(cuerpo.length - i);
        suma = suma + index;
        if (multiplo < 7) {
            multiplo = multiplo + 1;
        } else {
            multiplo = 2;
        }
    }
    dvEsperado = 11 - (suma % 11);
    dv = (dv == 'K') ? 10 : dv;
    dv = (dv == 0) ? 11 : dv;
    if (dvEsperado != dv) {
        rut.setCustomValidity("RUT Inválido");
        return false;
    }
    rut.setCustomValidity('');
}

function editarAlternativa() {
    var IDPreguntaEditar = $("#IDPreguntaEditar").val();
    var GLRespuestaEditar = $('#GLRespuestaEditar').val();
    var correcta = $('#correcta').select2('val');
    var NRRutUsuarioEditar = $('#NRRutUsuarioEditar').val();

    if (IDPreguntaEditar === '' || GLRespuestaEditar === '' || correcta === '' || NRRutUsuarioEditar === '') {
        $("#alerta").css("display", "inline");
        $("#IDPregunta").css("border-color", "#d33724");
        $('#GLRespuesta').css("border-color", "#d33724");
        //$('#correcta').select2('css').("border-color", "#d33724");
        $('#NRRutUsuario').css("border-color", "#d33724");
        return;
    }
    var objParams = {
        'IDPreguntaEditar': IDPreguntaEditar,
        'GLRespuestaEditar': GLRespuestaEditar,
        'correcta': correcta,
        'NRRutUsuarioEditar': NRRutUsuarioEditar
    };

    //console.log(objParams,"parametros");

    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Preguntas/editarAlternativa",
        data: objParams,
        success: function(obj) {
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
        error: function(err) {
            alert("algo no funciona");
            //console.log(err, "Error al actualizar");
        }
    })

}

function agregarAlternativa() {
    var IDPregunta = $("#IDPregunta").val();
    var GLRespuesta = $('#GLRespuesta').val();
    var LGCorrecta = $('#correcta').select2('val');
    var NRRutUsuario = $('#NRRutUsuario').val();

    if (IDPregunta === '' || GLRespuesta === '' || LGCorrecta === '' || NRRutUsuario === '') {
        $("#alerta").css("display", "inline");
        $("#IDPregunta").css("border-color", "#d33724");
        $('#GLRespuesta').css("border-color", "#d33724");
        //$('#correcta').select2('css').("border-color", "#d33724");
        $('#NRRutUsuario').css("border-color", "#d33724");
        return;
    }
    var objParams = {
        'IDPregunta': IDPregunta,
        'GLRespuesta': GLRespuesta,
        'LGCorrecta': LGCorrecta,
        'NRRutUsuario': NRRutUsuario
    };

    //console.log(objParams);

    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Preguntas/agregarAlternativa",
        data: objParams,
        success: function(obj) {
            //console.log(obj);
            $.SmartMessageBox({
                title: 'Alternativa Creada',
                content: 'Se creó con éxito la nueva alternativa',
                buttons: '[Volver al listado de preguntas][Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Volver al listado de preguntas') {
                    location.href = "<?=base_url();?>Preguntas";
                } else if (ButtonPress == 'Aceptar') {
                    location.reload();
                }
            });
            $(".btn-carga").prop('disabled', false);
            $(".carga").html('');
            //alert('funciona'+ obj);
        },
        error: function(err) {
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

    var ObjParam = {
        'IDRespuesta': item,
    }
    //console.log(ObjParam,"id")

    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Preguntas/eliminarAlternativa",
        data: ObjParam,
        success: function(obj) {
            //console.log(obj);
            $.SmartMessageBox({
                title: 'Aviso',
                content: 'Se eliminó la respuesta',
                buttons: '[Volver al listado de preguntas][Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Volver al listado de preguntas') {
                    location.href = "<?=base_url();?>Preguntas";
                } else if (ButtonPress == 'Aceptar') {
                    location.reload();
                }
            });
            $(".btn-carga").prop('disabled', false);
            $(".carga").html('');
            //alert('funciona'+ obj);
        },
        error: function(err) {
            alert("algo no funciona");
            //console.log(err, "Error al actualizar");
        }
    })

}

function getRespuestaEditar(item) {
    var IDRespuesta = item;
    if (IDRespuesta === '') {
        return;
    }
    var objParams = {
        'IDRespuesta': IDRespuesta,
    };



    //console.log(JSON.stringify(objParams,"  alternativa"));

    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Preguntas/getRespuestaEditar",
        data: objParams,
        success: function(obj) {
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
        error: function(err) {
            alert("algo no funciona");
            //console.log(err, "Error al actualizar");
        }
    })

}


var IDPregunta = '<?=$this->uri->segment('3');?>';




function AlmacenraPregunta() {
    //console.log(this.imgGrabar,"ruta de la imagen")
    var TipoPregunta = $("#tipo-pregunta").select2('val');

    $(".btn-carga").prop('disabled', true)
    $(".carga").html('<i class="fa  fa-spin fa-refresh"></i>');

    var area = $("#area").select2('val');
    var nivel = $("#nivel").select2('val');
    var asignatura = $("#asignatura").select2('val');
    var Pregunta = CKEDITOR.instances['Pregunta'].getData();
    //var Pregunta=$("#Pregunta").val();
    ////console.log(Pregunta.length,"pregunta");return;
    var ObjParam = {
        'area': area,
        'nivel': nivel,
        'asignatura': asignatura,
        'Pregunta': Pregunta,
        'TipoPregunta': TipoPregunta,
        'IDPregunta': IDPregunta,
        'GLRutaImagen': this.imgGrabar
    }
    if (TipoPregunta == -1 || area == -1 || nivel == -1 || asignatura == -1 || Pregunta.length == 0) {
        //alert("debe completar todos los campos")
        $.SmartMessageBox({
            title: 'Se deben seleccionar todos los campos ',
            buttons: '[OK]'
        }, function(ButtonPress, value) {
            if (ButtonPress == 'OK') {
                return;
            }
        });
        $(".btn-carga").prop('disabled', false);
        $(".carga").html('');
        return;

    }
    //console.log(ObjParam,"objeto preguntas")


    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Preguntas/SavePregunta/",
        data: ObjParam,
        success: function(obj) {
            //console.log(obj);

            $.SmartMessageBox({
                title: 'Aviso',
                content: 'Pregunta guardada',
                buttons: '[Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Aceptar') {
                    location.href = "<?=base_url();?>Preguntas/getPregunta/" + obj.IdPreguntaNew +
                        "/" + asignatura;
                }
            });
            $(".btn-carga").prop('disabled', false)
            $(".carga").html('');
        }
    })
}


function pa_IPregunta() {
    var TipoPregunta = $("#tipo-pregunta").select2('val');
    $(".btn-carga").prop('disabled', true)
    $(".carga").html('<i class="fa  fa-spin fa-refresh"></i>');
    var area = $("#area").select2('val');
    var nivel = $("#nivel").select2('val');
    var asignatura = $("#asignatura").select2('val');
    var Pregunta = CKEDITOR.instances['Pregunta'].getData();

    var ObjParam = {
        'area': area,
        'nivel': nivel,
        'asignatura': asignatura,
        'Pregunta': Pregunta,
        'TipoPregunta': TipoPregunta,
        'IDPregunta': IDPregunta
    }
    //console.log(ObjParam,"parametros")
    if (TipoPregunta == -1 || area == -1 || nivel == -1 || asignatura == -1 || Pregunta.length == 0) {
        //alert("debe completar todos los campos")
        $.SmartMessageBox({
            title: 'Se deben seleccionar todos los campos ',
            buttons: '[OK]'
        }, function(ButtonPress, value) {
            if (ButtonPress == 'OK') {
                return;
            }
        });
        $(".btn-carga").prop('disabled', false);
        $(".carga").html('');
        return;

    }
    //console.log(ObjParam,"objeto preguntas")


    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Welcome/pa_IPregunta",
        data: ObjParam,
        success: function(obj) {
            //console.log(obj);

            $.SmartMessageBox({
                title: 'Aviso',
                content: 'Pregunta guardada',
                buttons: '[Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Aceptar') {
                    return;
                }
            });
            $(".btn-carga").prop('disabled', false)
            $(".carga").html('');
        }
    })
}








function strip_tag(text) {

    text = remplaza_cadena(text, '&nbsp;', '');

    return text.replace(/(<([^>]+)>)/ig, ""); // Returns: bar
}


function AlmacenraRespuesta() {
    var TipoPregunta = $("#tipo-pregunta").select2('val');
    $(".btn-carga").prop('disabled', true)
    $(".carga").html('<i class="fa  fa-spin fa-refresh"></i>');


    if (TipoPregunta == 2) {
        var Respuesta = CKEDITOR.instances['ckeditor-respuesta'].getData();
    }

    var ObjParam = {
        'IDPregunta': IDPregunta,
        'Respuesta': Respuesta,
    }
    //console.log(ObjParam)


    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Preguntas/SaveRespuesta",
        data: ObjParam,

        success: function(obj) {
            //console.log(obj);

            $.SmartMessageBox({
                title: 'Aviso',
                content: 'Se almacenó la respuesta',
                buttons: '[Volver al listado de preguntas][Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Volver al listado de preguntas') {
                    location.href = "<?=base_url();?>Preguntas";
                } else if (ButtonPress == 'Aceptar') {
                    location.reload();
                }
            });


            $(".btn-carga").prop('disabled', false)
            $(".carga").html('');



        }
    })

}

function getTipoRespuesta() {
    var Iden = $("#tipo-pregunta").select2('val');
    $(".form-respuesta").hide();

    if (Iden != -1) {
        //$("#form-respuesta-"+Iden).fadeIn();	
    }


}

function getFiltro() {
    var area = $("#area").select2('val');
    var nivel = $("#nivel").select2('val');
    var asignatura = $("#asignatura").select2('val');
    var texto = $("#texto-pregunta").val();

    var ObjParam = {
        'area': area,
        'nivel': nivel,
        'asignatura': asignatura,
        'texto': texto,
    }

    $("#result-preguntas").html('<h1><i class="fa  fa-spin fa-refresh"></i></h1>');

    //console.log(ObjParam)
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Preguntas/getPreguntasParam",
        data: ObjParam,

        success: function(obj) {
            //console.log(obj);

            $("#result-preguntas").html(obj.getView);


        }
    })

}


function LoaderAsignaturas(Iden) {
    $("#carga-asignatura").html('<i class="fa  fa-spin fa-refresh"></i>');
    var ObjParam = {
        'IdArea': $("#area").select2('val')
    }
    //console.log(ObjParam)
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Preguntas/getAsignaturas",
        data: ObjParam,

        success: function(obj) {
            //console.log(obj);
            var Option =
                '<select class="select2" style="width: 100%" id="asignatura" ><option value="-1"></option>';
            if (obj.getAsignaturas) {
                $.each(obj.getAsignaturas, function(i, item) {
                    Option += '<option value="' + item.IDAsignatura + '">' + item.GLAsignatura +
                        '</option>';
                });
            }

            Option += '</select>';
            $("#carga-asignatura").html(Option)
            $("#asignatura").select2();


        }
    })
}


<?php
	if(isset($getPregunta)){
	?>
$(window).load(function() {
    LoaderAsignaturas(<?=$getPregunta[0]->CDTPArea;?>)
    setTimeout('$("#asignatura").select2("val",<?=$getPregunta[0]->IDAsignatura;?>)', 1000);
    getTipoRespuesta()
})

<?php	
	}
	?>


$("#Preguntas").addClass('active open');
</script>