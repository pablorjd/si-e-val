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
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2>Listado de preguntas.</h2>
                        </header>
                        <div>
                            <div class="widget-body">

                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-md-offset-8">
                                    <a class="btn btn-success pull-right"
                                        href="<?=base_url();?>Preguntas/mantenedorPreguntaRespuesta"
                                        title="Estadisticas">Agregar Nueva Pregunta</a>



                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Area</span>
                                        <select class="select2" style="width: 100%" id="area"
                                            onchange="LoaderAsignaturas(this.value)">
                                            <option value="-1"></option>
                                            <?php
												if(isset($getAreas)){
													foreach ($getAreas as $key => $s) {
													?>

                                            <option value="<?=$s->CDTPArea;?>"><?=$s->GLTPArea;?></option>
                                            <?php
													}
												}
											?>
                                        </select>

                                    </div>

                                    <div class="col-md-3">
                                        <span>Nivel</span>
                                        <select class="select2" style="width: 100%" id="nivel">
                                            <option value="-1"></option>

                                            <?php
												if(isset($getNivel)){
													foreach ($getNivel as $key => $s) {
													?>

                                            <option value="<?=$s->CDTPNivel;?>"><?=$s->GLTPNivel;?></option>
                                            <?php
													}
												}
											?>
                                        </select>

                                    </div>

                                    <div class="col-md-2">
                                        <span>Asignatura</span>
                                        <div id="carga-asignatura">
                                            <select class="select2" style="width: 100%" id="asignatura">
                                                <option value="-1"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <span>Tipo Pregunta</span>
                                        <div id="carga-alternativa">
                                            <select class="select2" style="width: 100%" id="alternativa">
                                                <option value="-1">Todas</option>
                                                <option value="1">Alternativa</option>
                                                <option value="2">Desarrollo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <span>Texto</span>
                                        <input type="text" class="form-control" id="texto-pregunta">

                                    </div>

                                    <div class="col-md-2">
                                        <span>Identificador Interno</span>
                                        <input type="number" class="form-control" id="idpregunta">

                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-block" style="margin-top: 15px;"
                                                onclick="getFiltro()">Filtrar</button>
                                        </div>

                                    </div>
                                </div>
                                <!-- <div class="row">

                                    <div class="col-md-4">
                                        <span>Identificador Interno</span>
                                        <input type="number" class="form-control" id="idpregunta">

                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary btn-block" onclick="filtroIDPregunta()"
                                            style="margin-top: 15px;">Filtrar
                                            Por Identificador Interno</button>
                                    </div>

                                -->
                                <div class="row">
                                    <br>
                                    <center id="iconRecarga" style="display:none"> <i
                                            class="fa fa-spin fa-refresh fa-3x"></i>
                                        <h3>Cargando ...</h3>
                                    </center>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: -10px;">
                                        <hr>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="preguntas" style="display: none">
                                <div class="col-md-12">
                                    <h1>Preguntas</h1>
                                    <div id="result-preguntas" style="height: 100px;"></div>
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
$(document).ready(function() {
    var tpPregunta = $('#tpPregunta').val()
    //console.log( tpPregunta);
    $(".select2-hidden-accessible").hide()


});

function filtroIDPregunta() {
    var idpregunta = $("#idpregunta").val();
    var ObjParam = {
        'idpregunta': idpregunta,
    }
    $("#result-preguntas").html('<h1><i class="fa  fa-spin fa-refresh"></i></h1>');

    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Preguntas/filtroIDPregunta",
        data: ObjParam,
        beforeSend: function() {
            $("#iconRecarga").show();
        },

        success: function(obj) {
            //console.log(obj);
            $("#preguntas").removeAttr('style')
            $("#result-preguntas").html(obj.getView);
            $("#iconRecarga").hide();

        }
    })

}

function getFiltro() {

    var area = $("#area").select2('val');
    var nivel = $("#nivel").select2('val');
    var asignatura = $("#asignatura").select2('val');
    var alternativa = $("#alternativa").select2('val');
    var texto = $("#texto-pregunta").val();
    var IDPregunta = $("#idpregunta").val();

    var ObjParam = {
        'area': area,
        'nivel': nivel,
        'asignatura': asignatura,
        'alternativa': alternativa,
        'texto': texto,
        'IDPregunta': IDPregunta
    }
    //console.log(ObjParam);return;

    $("#result-preguntas").html('<h1><i class="fa  fa-spin fa-refresh"></i></h1>');
    //console.log(ObjParam)
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Preguntas/getPreguntasParam",
        data: ObjParam,
        beforeSend: function() {
            $("#iconRecarga").show();
        },

        success: function(obj) {
            //console.log(obj);
            $("#preguntas").removeAttr('style')
            $("#result-preguntas").html(obj.getView);
            $("#iconRecarga").hide();

        }
    })

}

function eliminarPregunta(idPregunta) {
    var IDPregunta = idPregunta
    //console.log(IDPregunta,"ide de la pregunta")

    var objParams = {
        'IDPregunta': IDPregunta
    }
    $.SmartMessageBox({
        title: 'Eliminar Pregunta',
        content: '¿Está seguro que desea eliminar la pregunta?',
        buttons: '[Cancelar][Eliminar]'
    }, function(ButtonPress, value) {
        if (ButtonPress == 'Eliminar') {
            $.ajax({
                type: "POST",
                url: "<?=base_url();?>Preguntas/pa_UExpirarPregunta",
                data: objParams,
                success: function(obj) {

                }
            })
            alertGeneral();
        } else if (ButtonPress == 'Cancelar') {


        }
        //alertGeneral();
    });
}

function alertGeneral() {

    $.SmartMessageBox({
        title: 'Eliminación Exitosa',
        content: 'Se eliminó de manera Exitosa la Pregunta',
        buttons: '[Aceptar]'
    }, function(ButtonPress, value) {
        if (ButtonPress == 'Aceptar') {
            location.reload();
        }
    });

}
// function LoaderAsignaturas(Iden){
// 	//$("#carga-asignatura").html('<i class="fa  fa-spin fa-refresh"></i>');
// 	var ObjParam={
// 		'IdArea':$("#area").select2('val')
// 	}
// 	//console.log(ObjParam,"parametro para el getAsignatura")
// 	$.ajax({
//         type: "POST",
//         url: "<?=base_url();?>Preguntas/getAsignaturas",
//         data: ObjParam,
// 		beforeSend:function(){
// 			$("#iconRecarga").show();
// 		},

//         success: function(obj){
//        		//console.log(obj);
//        		var Option='<select class="select2" style="width: 100%" id="asignatura" ><option value="-1"></option>';
//        		if(obj.getAsignaturas){
// 	       		$.each(obj.getAsignaturas, function(i, item) {  
// 	       			Option+='<option value="'+item.IDAreaAsignatura+'">'+item.GLAsignatura+'</option>';
// 	       		});
//        		}

//        		Option+='</select>';
//        		//$("#carga-asignatura").html(Option)
//        		$("#asignatura").select2();
// 			   $("#iconRecarga").hide();

//         }
//     })
// }

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

$("#Preguntas").addClass('active open')
</script>