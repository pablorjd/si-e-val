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
                            <h2>Detalle de Pregunta | <a class="btn btn-success  btn-xs"
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
                                                <select disabled class="select2" style="width: 100%" id="tipo-pregunta"
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
                                                <select class="select2" style="width: 100%" id="area"
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
                                                <select class="select2" style="width: 100%" id="nivel">
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

                                            <!-- <div class="col-md-12" style="margin-top: 10px;">
												<span>Revisado </span>
												<select disabled class="select2" style="width: 100%" id="nivel" >
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

													<option value="<?=$s->CDTPNivel;?>" <?=$Selected;?>><?=$s->GLTPNivel;?></option>	
															<?php
															}
														}
													?>
		                  						</select>	
		                  
											</div> -->


                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <span>Asignatura</span>

                                                <div id="carga-asignatura">
                                                    <select class="select2" style="width: 100%" id="asignatura">
                                                        <option value="<?=$asignatura->IDAsignatura?>">
                                                            <?=$asignatura->GLAsignatura?></option>
                                                    </select>
                                                </div>

                                            </div>

                                        </div>


                                    </div>

                                    <div class="col-md-7">
                                        <h3>&nbsp;</h3>
                                        <div class="row">

                                            <!-- <?php if($revisada->TextoP != 'Revisada'):?>
											<div class="col-md-12">
											 <button type="button" onclick="levantarmodal()" class="btn  btn-danger">Confirmar Revisión</button>
											</div>
										<?php else:?>
											<div class="col-md-12">
											 <button type="button" onclick="levantarmodal()" class="btn  btn-success">Revisada</button>
											</div>
										<?php endif;?> -->
                                            <div class="col-md-12">
                                                <!-- <input id="Pregunta" style="width: 400px;" value="<?=(isset($getPregunta)?strip_tags($getPregunta[0]->GLPregunta):'');?>">
												<br> -->
                                                <!-- <textarea name="ckeditor" id="Pregunta"><=(isset($getPregunta)?$getPregunta[0]->GLPregunta:'');?></textarea> -->
                                                <!-- <input style="display: none" id="pregunta-buk" value="<?=(isset($getPregunta)?$getPregunta[0]->GLPregunta:'');?>"> -->
                                                <textarea name="ckeditor"
                                                    id="Pregunta"><?=(isset($getPregunta)?$getPregunta[0]->GLPregunta:'');?></textarea>
                                                <textarea style="display: none"
                                                    id="pregunta-buk"><?=(isset($getPregunta)?$getPregunta[0]->GLPregunta:'');?></textarea>



                                            </div>
                                            <div class="col-md-4 text-left">
                                                <br>
                                                <button class="btn btn-primary " onclick="AlmacenraPregunta()"
                                                    id="almacenar-pregunta"> <span class="btn-carga"></span> Almacenar
                                                    pregunta</button>
                                            </div>

                                            <div class="col-md-4 text-left">
                                                <br>
                                                <?php if($revisada->TextoP != 'Revisada'):?>
                                                <div class="col-md-12">
                                                    <button type="button" onclick="levantarmodal()"
                                                        class="btn  btn-danger">Confirmar Revisión</button>
                                                </div>
                                                <?php else:?>
                                                <div class="col-md-12">
                                                    <button type="button" onclick="levantarmodal()"
                                                        class="btn  btn-success">Revisada</button>
                                                </div>
                                                <?php endif;?>

                                            </div>
                                            <div class="col-md-4 text-right">
                                                <br>
                                                <?php if(isset($getPregunta[0]->GLRutaImagen)):?>
                                                <button class="btn btn-primary" onclick="verimagen()" id="verimg">Ver
                                                    Imagen</button>
                                                <?php endif;?>
                                                <!-- <button class="btn btn-primary " onclick="subirImagen()" id="img-subir">Agregar imagen (opcional)</button> -->
                                                <button class="btn btn-primary "
                                                    onclick="createFrame('<?=base_url();?>Preguntas/GestorIMG','Gestor de imagenes')">Gestor
                                                    de imagen</button>

                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                        </div>


                                        <div class="row form-respuesta" id="form-respuesta-2"
                                            style="display: none; margin-bottom: 10px;">
                                            <div class="col-md-12" style="margin: 10px,10px,10px,10px;">
                                                <h3>Respuesta</h3>

                                                <textarea name="ckeditor-respuesta"
                                                    id="ckeditor-respuesta"><?=(isset($getRespuestas)?$getRespuestas[0]->GLRespuesta:'');?></textarea>
                                                <button class="btn btn-carga btn-primary " id="almacenar-respuesta"
                                                    onclick="AlmacenraRespuesta()">Almacenar respuesta. <span
                                                        class="carga"></span></button>
                                                <button class="btn btn-primary pull-right"
                                                    onclick="createFrameRespuesta('<?=base_url();?>Preguntas/GestorIMGRespuesta','Gestor de imagenes')">Gestor
                                                    de imagen Respuesta</button>


                                            </div>
                                        </div>


                                        <div class="row form-respuesta" id="form-respuesta-1" style="display: none">
                                            <div class="col-md-12">

                                                <div class="row">
                                                    <h3>Alternativas</h3>
                                                    <?php json_encode($estadorespuesta)?>
                                                    <div class="col-md-12">

                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Correcta / Incorrecta</th>
                                                                    <th scope="col">Respuesta</th>
                                                                    <th scope="col"></th>
                                                                    <th scope="col">

                                                                        <button
                                                                            <?=(count($getRespuestasAlternativa)>=4)?"disabled='true'":null?>
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Ingresar alternativa!"
                                                                            class="btn btn-primary btn-xs"
                                                                            onclick="abrirModal()">
                                                                            <i class="fa fa-plus">(Agregar
                                                                                Alternativa)</i>
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php 
															$SwCorrecta=0;
															foreach($getRespuestasAlternativa as $key => $item ) {
																if($item->LGCorrecta==1){
																	$SwCorrecta=1; 
																}
															?>

                                                                <tr
                                                                    <?=($item->LGCorrecta==1)?"class='success'":"class='danger'"?>>

                                                                    <th scope="row"><?php echo $key+1?></th>
                                                                    <?php if($item->LGCorrecta==1):?>
                                                                    <th>Correcta</th>
                                                                    <?php else:?>
                                                                    <th>Incorrecta</th>
                                                                    <?php endif;?>
                                                                    <td>
                                                                        <div id="divRadios" class="radio">
                                                                            <!-- <input <?=($item->LGCorrecta==1)?"checked='true'":null?> disabled="true" type="radio" name="optradio" id="optradio" value="<?= $item->LGCorrecta ?>"> -->
                                                                            <label><?php echo $item->GLRespuesta?>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-primary btn-xs"
                                                                            onclick="getRespuestaEditar(<?= $item->IDRespuesta?>)"><i
                                                                                class="fa fa-pencil"></i></button>

                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-danger btn-xs"
                                                                            onclick="eliminarAlternativa(<?= $item->IDRespuesta?>)"><i
                                                                                class="fa fa-times"></i></button>

                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>

                                    <!-- 
									<div class="col-md-3">
										<h3>Visualización</h3>	


										<div class="row">
											<div class="col-md-12">
												<iframe src="<?=base_url();?>Preguntas/SetPreguntaPDF/<?=(isset($getPregunta)?$getPregunta[0]->IDPregunta:'');?>" frameborder="0" style="width: 100%; height: 590px;"></iframe>
												<!--<?=base_url();?>Preguntas/SetPreguntaPDF/<?=(isset($getPregunta)?$getPregunta[0]->IDPregunta:'');?>
														-->
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
                        <input type="text" disabled="true" class="form-control" id="IDPregunta"
                            value="<?= $getPregunta[0]->IDPregunta ?>">
                    </div>
                    <div class="form-group">
                        <label for="GLRespuesta">Glosa Respuesta</label>
                        <!-- <input type="text" class="form-control" id="GLRespuesta" placeholder="Ingrese la pregunta" required="true" > -->
                        <textarea name="ckeditorAlternativa" id="GLRespuesta"></textarea>
                    </div>
                    <div class="form-group">
                        <?
						$JsonPreguntas=	json_encode($getRespuestasAlternativa);
						
						
					?>
                        <?php if($estadorespuesta->NRRespuestas==3 && $estadorespuesta->NRCorrecta == 0 ):?>
                        <span>Correcta/Incorrecta</span>
                        <div id="alternativa-correcta">
                            <select disabled class="select2" style="width: 100%" id="correcta" required="true">
                                <option value="">Seleccione</option>
                                <option value="1" selected>Correcta</option>
                                <option value="0">Incorrecta</option>
                            </select>
                        </div>

                        <?php else: ?>
                        <span>Correcta/Incorrecta</span>
                        <div id="alternativa-correcta">
                            <select class="select2" style="width: 100%" id="correcta" required="true">
                                <option value="" selected>Seleccione</option>
                                <option value="1">Correcta</option>
                                <option value="0">Incorrecta</option>
                            </select>
                        </div>
                        <?php endif; ?>


                        <div class="form-group" style="display: none">
                            <label for="NRRutUsuario">RUN</label>
                            <input type="text" class="form-control" disabled id="NRRutUsuarioEditar" required />
                        </div>


                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Crear Alternativa" style="margin-top:15px;" />
                    <!-- <button class="btn btn-primary pull-right" onclick="createFrameAlternativa('<?=base_url();?>Preguntas/GestorIMGAlternativa','Gestor de imagenes Alternativa')">Gestor de imagen Alternativa</button> -->
                </form>
                <!-- <button class="btn btn-primary" id="img">Agregar imagen alternativa(opcional)</button> -->

                <script>
                $(document).ready(function() {
                    $("#formAlternativa").submit(function(e) {
                        e.preventDefault();
                        //console.log("valido")
                        agregarAlternativa()
                    });
                });
                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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
                        <label for="GLRespuesta">Glosa Alternativa</label>
                        <textarea name="ckeditorAlternativaEditar" id="GLRespuestaEditar"></textarea>
                        <!-- <input type="text" class="form-control" id="GLRespuestaEditar" placeholder="Ingrese la pregunta"
                            required="true"> -->
                    </div>
                    <br>
                    <input type="button" onclick="editarAlternativa();" class="btn btn-primary"
                        value="Editar Alternativa" style="margin-top:15px;" />
                </form>
                <!-- <button class="btn btn-primary pull-right" onclick="createFrameAlternativa('<?=base_url();?>Preguntas/GestorIMGAlternativa','Gestor de imagenes Alternativa')">Gestor de imagen Alternativa</button> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

<!--  fin Modal Editar alternativas  -->

<div id="modalImagen" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modalColorHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Imagen de la Pregunta</h4>
            </div>
            <div class="modal-body">
                <div>
                    <?=str_replace(">","",$getPregunta[0]->GLRutaImagen).'class="img-responsive center">'?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

<div id="modalconfirm" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modalColorHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmar Revisión</h4>
            </div>
            <div class="modal-body">
                <div>
                    <p>¿Está seguro que desea confirmar esta Pregunta?</p>
                    <b>
                        <?=(isset($getPregunta)?$getPregunta[0]->GLPregunta:'');?>
                    </b>
                    <div class="alert alert-success" role="alert">

                        <p>Si realizo alguna modificación primero debe "Almacenar la Pregunta"</p>
                    </div>


                </div>
                <br>
                <input type="button" onclick="pa_IPreguntaRevisada(<?=$getPregunta[0]->IDPregunta?>);"
                    class="btn btn-primary" value="Confirmar Revisión" style="margin-top:15px;" />

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>


<!-- NAV VAR -->
<?php $this->load->view('Complement/footer');?>
<script src="<?=base_url();?>assets/js/plugin/ckeditor/ckeditor.js"></script>
<!-- <script src="<base_url();?>assets/js/plugin/ckeditor/ckeditor.js"></script> -->
<!-- <script src="<?=base_url();?>assets/js/plugin/ckeditor/ckeditor.js"></script> -->
<!--script src="https://ckeditor.com/docs/vendors/4.16.0/ckeditor/ckeditor.js"></script-->
<!-- <script src="<base_url();?>assets/js/plugin/ckeditor3/ckeditor.js"></script> -->
<!-- <script src="<base_url();?>assets/js/plugin/ckeditor4/ckeditor.js"></script> -->

<script src="<?=base_url();?>assets/js/libs/AjaxUpload.2.0.min.js"></script>


<script type="text/javascript">
function verimagen() {
    $("#modalImagen").modal('show');
}

function levantarmodal() {
    $("#modalconfirm").modal('show')
}

function pa_IPreguntaRevisada(IDPregunta) {
    //var IDPregunta = $("#IDPregunta").val();
    console.log(IDPregunta)
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Preguntas/pa_IPreguntaRevisada/" + IDPregunta,
        success: function(obj) {
            location.reload();
        },
        error: function(err) {
            alert("algo no funciona");
            //console.log(err, "Error al actualizar");
        }
    })

}

function pa_UPreguntaRevisada(IDPregunta) {
    //var IDPregunta = $("#IDPregunta").val();
    console.log(IDPregunta)
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Preguntas/pa_UPreguntaRevisada/" + IDPregunta,
        success: function(obj) {

        },
        error: function(err) {
            alert("algo no funciona");
            //console.log(err, "Error al actualizar");
        }
    })

}

$(document).ready(function() {
    CKEDITOR.replace('ckeditor', {
        height: '400px',
        startupFocus: true,
        language: 'es',
        uiColor: '#9AB8F3',



        // toolbar: [
        //     { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
        //     { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        //     { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
        //     { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
        //     '/',
        //     { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
        //     { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
        //     { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        //     { name: 'insert', items: [ 'Table', 'HorizontalRule','SpecialChar', 'PageBreak', 'Iframe' ] },
        //     '/',
        //     { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
        //     { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        //     { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
        //     { name: 'others', items: [ '-' ] },
        //     { name: 'about', items: [ 'About' ] }
        // ]

    });


    CKEDITOR.replace('ckeditorAlternativa', {
        height: '200px',
        startupFocus: true,
        // toolbar: [
        //     { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
        //     { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        //     { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
        //     { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
        //     '/',
        //     { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
        //     { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
        //     { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        //     { name: 'insert', items: [ 'Table', 'HorizontalRule','SpecialChar', 'PageBreak', 'Iframe' ] },
        //     '/',
        //     { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
        //     { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        //     { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
        //     { name: 'others', items: [ '-' ] },
        //     { name: 'about', items: [ 'About' ] }
        // ]
    });
    CKEDITOR.replace('ckeditorAlternativaEditar', {
        height: '200px',
        startupFocus: true,
        // toolbar: [
        //     { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
        //     { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        //     { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
        //     { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
        //     '/',
        //     { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
        //     { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
        //     { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        //     { name: 'insert', items: [ 'Table', 'HorizontalRule','SpecialChar', 'PageBreak', 'Iframe' ] },
        //     '/',
        //     { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
        //     { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        //     { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
        //     { name: 'others', items: [ '-' ] },
        //     { name: 'about', items: [ 'About' ] }
        // ]

    });
    CKEDITOR.replace('ckeditor-respuesta', {
        height: '300px',
        startupFocus: true
    });




    var button = $('#img-subir'),
        interval;
    new AjaxUpload(button, {
        action: '<?=base_url();?>Preguntas/UploadImgenesPreguntas',
        name: 'img-subir',
        onSubmit: function(file, ext) {
            if (!(ext && /^(jpg|jpeg|png)$/.test(ext))) {
                alerta('Error ',
                    'Error: Solo se permiten archivos con extención <b>jpg</b>, <b>jpeg</b>,<b>png</b>.'
                    )
                return false;
            }


        },

        onComplete: function(file, response) {
            //console.log(response)
            var Img = '<img src="<?=base_url();?>' + response + '">';

            imgGrabar = '<img src="<?=base_url();?>' + response + '">';

            var Actual = CKEDITOR.instances['Pregunta'].getData()
            CKEDITOR.instances['Pregunta'].setData(Actual + '<br>' + Img)
            var Actual2 = CKEDITOR.instances['Pregunta'].getData()
            console.log(Actual2, "contenido del terarea")
        }
    });


    var boton = $('#img');
    //console.log(boton);
    new AjaxUpload(boton, {
        action: '<?=base_url();?>Preguntas/UploadImgenesRespuesta',
        name: 'img-subirrespuesta',
        onSubmit: function(file, ext) {
            if (!(ext && /^(jpg|jpeg|png)$/.test(ext))) {
                alerta('Error ',
                    'Error: Solo se permiten archivos con extención <b>jpg</b>, <b>jpeg</b>,<b>png</b>.'
                    )
                return false;
            }


        },

        onComplete: function(file, response) {
            //console.log(response)
            var Img = '<img src="<?=base_url();?>' + response + '">';

            imgGrabar = '<img src="<?=base_url();?>' + response + '">';

            var Actual = CKEDITOR.instances['GLRespuestaEditar'].getData()
            CKEDITOR.instances['GLRespuestaEditar'].setData(Actual + '<br>' + Img)
            var Actual2 = CKEDITOR.instances['GLRespuestaEditar'].getData()
            console.log(Actual2, "contenido del terarea")
        }
    });

    //config.removePlugins = 'blockquote,save,flash,iframe,tabletools,pagebreak,templates,about,showblocks,newpage,language,print,div';
    // CKEDITOR.config.removeButtons = 'Print,Form,TextField,Textarea,Button,CreateDiv,PasteText,PasteFromWord,Select,HiddenField,Radio,Checkbox,ImageButton,Anchor,BidiLtr,BidiRtl,Font,Format,Styles,Preview,Indent,Outdent';
    // CKEDITOR.config.removePlugins = 'elementspath,save,image,flash,iframe,link,smiley,tabletools,find,pagebreak,templates,about,maximize,showblocks,newpage,language';

    // CKEDITOR.config.removeButtons = 'elementspath,save,font,Copy,Html,Cut,Paste,Undo,Redo,Print,Form,TextField,Textarea,Button,SelectAll,NumberedList,BulletedList,CreateDiv,Table,PasteText,PasteFromWord,Select,HiddenField';
    // var button = $('#img-subir'), interval;
    // new AjaxUpload(button, {
    // 	action: '<?=base_url();?>Preguntas/UploadImgenesPreguntas', 
    // 	name: 'img-subir',
    // 	onSubmit : function(file, ext){
    // 		if (! (ext && /^(jpg|png|gif|jpeg)$/.test(ext))){
    //   			alerta('Error ','Error: Solo se permiten archivos con extención <b>jpg</b>, <b>png</b>, <b>gif</b>, <b>jpeg</b>.')
    //   			return false;
    // 		}


    // 	},

    // 	onComplete: function(file, response){
    // 		var Img='<img src="<?=base_url();?>'+response+'">';
    // 		var Actual=CKEDITOR.instances['Pregunta'].getData()
    // 		CKEDITOR.instances['Pregunta'].setData(Actual+Img)
    // 	}	
    // });
})

function abrirModal() {
    $('#modalAgregar').modal('show');
}



function editarAlternativa() {
    var IDPreguntaEditar = $("#IDPreguntaEditar").val();
    //var GLRespuestaEditar = $('#GLRespuestaEditar').val();
    var GLRespuestaEditar = CKEDITOR.instances['GLRespuestaEditar'].getData();

    var objParams = {
        'IDRespuestaEditar': IDPreguntaEditar,
        'GLRespuestaEditar': GLRespuestaEditar,
    };

    console.log(objParams, "parametros");

    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Preguntas/editarAlternativa",
        data: objParams,
        success: function(obj) {
            console.log(obj);
            $.SmartMessageBox({
                title: 'Alternativa Creada',
                content: 'Se creo con exito la nueva alternativa',
                buttons: '[Volver al listado de preguntas][Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Volver al listado de preguntas') {
                    location.href = "<=base_url();?>Preguntas";
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

function agregarAlternativa() {
    var IDPregunta = $("#IDPregunta").val();
    var GLRespuesta = $('#GLRespuesta').val();
    var LGCorrecta = $('#correcta').select2('val');
    var NRRutUsuario = <?=$_SESSION["NRRutUsuario"]?>;

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

    //console.log(objParams);return;

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
            console.log(err, "Error al actualizar");
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
            CKEDITOR.instances['GLRespuestaEditar'].setData(dato[0].GLRespuesta)
            //$('#GLRespuestaEditar').val(dato[0].GLRespuesta);
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
    var TipoPregunta = $("#tipo-pregunta").select2('val');

    $(".btn-carga").prop('disabled', true)
    $(".carga").html('<i class="fa  fa-spin fa-refresh"></i>');

    var area = $("#area").select2('val');
    var nivel = $("#nivel").select2('val');
    var asignatura = $("#asignatura").select2('val');
    var Pregunta = CKEDITOR.instances['Pregunta'].getData();
    //var Pregunta=$("#Pregunta").val();	

    var ObjParam = {
        'area': area,
        'nivel': nivel,
        'asignatura': asignatura,
        'Pregunta': Pregunta,
        'TipoPregunta': TipoPregunta,
        'IDPregunta': IDPregunta
    }

    //console.log(ObjParam);return;

    pa_UPreguntaRevisada(IDPregunta);


    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Preguntas/SavePregunta",
        data: ObjParam,
        success: function(obj) {
            //console.log(obj);

            $.SmartMessageBox({
                title: 'Aviso',
                content: 'Se almacenó la pregunta',
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

<?php
	if($SwCorrecta==1){
		?>
$("#correcta").val(0);
$("#correcta").prop('disabled', true);

<?php
	}

	?>


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
        $("#form-respuesta-" + Iden).fadeIn();
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
                    Option += '<option value="' + item.IDAreaAsignatura + '">' + item.GLAsignatura +
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