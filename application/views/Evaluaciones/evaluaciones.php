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
            <li>Evaluaciones</li>

        </ol>
    </div>

    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa-fw fa fa-graduation-cap"></i>
                    Evaluaciones
                </h1>

            </div>

        </div>
        <section id="widget-grid" class="">
            <!-- <br><br>
             <?php json_encode($examenhoraCalendario).'  ids examenhoraCalendario'?>
         <br><br>
         <?php json_encode($examenhoraTituloArea).'  ids examenhoraTituloArea'?>
         <br><br>
         <?php json_encode($examenhoraSinAsignatura).'  ids examenhoraSinAsignatura'?>
         <br><?php json_encode($examenhoraAsignatura).'  ids examenhoraAsignatura'?>  -->
            <br><br>
            <div class="row">
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2>Evaluaciones.</h2>
                        </header>
                        <div>
                            <div class="widget-body">
                                <div class="row visibleCreacionExamen">
                                    <!-- ACA esta el id del calendario cuando ya existe en edumar -->
                                    <input type="hidden" id="IDDetalleCalendario"
                                        value="<?= $examenhoraCalendario[0]->IDDetalleCalendario?>">
                                    <!-- ACA esta el id del calendario cuando ya existe en edumar -->
                                    <div class="col-md-3">
                                        <span>Fecha</span>
                                        <div class='input-group date' id='datetimepicker1'>
                                            <!-- value="2020-04-02" <var_dump($buscarExamenCalendarioID)?> -->
                                            <input type='datetime' disabled="true" id='calendario' class="form-control"
                                                value="<?=$examenhoraCalendario[0]->FCAsignatura?>" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <span>Repartición</span>
                                        <input type="text" class="form-control" id="reparticion1" disabled="true"
                                            idReparticion="<?=$examenhoraCalendario[0]->CDReparticion;?>"
                                            value="<?=$examenhoraCalendario[0]->Glreparticion;?>" />
                                    </div>
                                    <div class="col-md-3">
                                        <span>Prema</span>
                                        <input type="number" class="form-control" id="prema1" min="10" max="100"
                                            onchange="validarNumero(this.value)" required pattern="^[0-9]+">
                                    </div>

                                    <div class="col-md-3">
                                        <span>Duración Examen</span>
                                        <input type="number" class="form-control" id="duracionExamen" min="10" max="120"
                                            onchange="validarNumero2(this.value)" required pattern="^[0-9]+">
                                    </div>

                                    <div class="col-md-3">
                                    </div>

                                </div>
                                <br>
                                <div class="row row-siguiente" id="visible">
                                    <div class="col-md-3">
                                        <span>Área</span>
                                        <input type="text" hidden="true" id="idArea" disabled="true"
                                            value="<?=$examenhoraTituloArea[0]->CDTPArea?>"
                                            onchange="validarSeleccionado(this.value)">
                                        <input type="text" class="form-control" id="reparticion1" disabled="true"
                                            value="<?=$examenhoraTituloArea[0]->GLTPArea?>"
                                            idArea="<?=$examenhoraTituloArea[0]->CDTPArea?>" />
                                    </div>
                                    <div class="col-md-3">
                                        <span>Nivel</span>
                                        <select class="select2" style="width: 100%" id="nivel" required>
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
                                    <div class="col-md-3">
                                        <span>Titulo</span>
                                        <input type="text" class="form-control" id="reparticion1" disabled="true"
                                            idReparticion="<?=$examenhoraTituloArea[0]->IDTitulo;?>"
                                            value="<?=$examenhoraTituloArea[0]->NMTitulo;?>" />

                                    </div>

                                    <div class="col-md-3">
                                        <span>Puntaje</span>
                                        <input type="number" class="form-control" id="puntaje">
                                    </div>

                                    <div class="col-md-3">
                                    <span>Asignatura</span>
                                    <input type="text" hidden="true" id="asignatura" disabled="true"
                                            value="<?=$examenhoraAsignatura[0]->IDAsignatura;?>">
                                    <input type="text" class="form-control"  disabled="true"
                                            idReparticion="<?=$examenhoraAsignatura[0]->IDAsignatura;?>"
                                            value="<?=$examenhoraAsignatura[0]->GLAsignatura;?>" />
                                    </div>

                                    <div class="col-md-3">
                                        <button class="btn btn-primary btn-block" style="margin-top: 15px;"
                                            onclick="getPreguntasExamen();">Buscar preguntas Examen</button>
                                    </div>
                                </div>
                               


                            </div>

                            <hr style="height: 2px;">

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Visualización</h3>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <!-- <iframe src="<base_url();?>Preguntas/SetPreguntaPDF/<(isset($getPregunta)?$getPregunta[0]->IDPregunta:'');?>" frameborder="0" style="width: 100%; height: 590px;"></iframe> -->
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Pregunta</th>
                                                        <th scope="col">Puntaje</th>
                                                    </tr>

                                                </thead>
                                                <tbody id="pregunta">
                                                </tbody>
                                            </table>
                                            <button type="button" class="btn btn-default"
                                                onclick="crearExamen()">Generar Examén</button>


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
<script src="<?=base_url();?>assets/js/plugin/ckeditor/ckeditor.js"></script>
<script src="<?=base_url();?>assets/js/libs/AjaxUpload.2.0.min.js"></script>


<script type="text/javascript">
$(document).ready(function() {
    
    setTimeout(function() {
        LoaderAsignaturas();
    }, 3000)
});

let today = new Date(),
    day = today.getDate() + 1,
    month = today.getMonth() + 1, //January is 0
    year = today.getFullYear();
if (day < 10) {
    day = '0' + day
}
if (month < 10) {
    month = '0' + month
}
today = year + '-' + month + '-' + day;

document.getElementById("calendario").setAttribute("min", today);
document.getElementById("calendario").setAttribute("value", today);
const horaHoy = $('#calendario').val();
$('#calendario').change(function() {
    var dt = new Date();
    var dt3 = new Date($('#calendario').val());
    if (dt3 < dt) {

        $.SmartMessageBox({
            title: 'Aviso',
            content: 'Fecha no permitida ',
            buttons: '[Aceptar]'
        }, function(ButtonPress, value) {
            if (ButtonPress == 'Aceptar') {
                $('#calendario').val(horaHoy);
            }
        });
        $('#calendario').val(horaHoy);
    }
});

function validarCampos() {

    var calendario1 = $("#calendario1").val();
    var reparticion1 = $("#reparticion1").val();
    var premaS1 = $("#premaS1").val();
    var duracionExamen1 = $("#duracionExamen").val();
    //console.log(reparticion);
    if (calendario1 == '' || reparticion1 == -1 || premaS1 == '' || duracionExamen1 == '') {
        $.SmartMessageBox({
            title: 'Aviso',
            content: 'Debe completar todos los campos',
            buttons: '[Aceptar]'
        }, function(ButtonPress, value) {
            if (ButtonPress == 'Aceptar') {
                if ($("#premaS1").val() == '') {
                    $("#premaS1").focus();
                    return;
                }
                if ($("#reparticion1").val() == '') {
                    $("#reparticion1").focus();
                    return;
                }
                if ($("#duracionExamen1").val() == '') {
                    $("#duracionExamen1").focus();
                    return;
                }
            }
        });
    } else {
        //dej 
        // remote gategay  == tt.directemar.cl a los campos disabled hasta que se complete la creción del Examen o se genere uno nuevo 
        $("#continuar").attr("style", "display:none");
        $("#calendario1").attr("disabled", "true");
        $("#reparticion1").prop("disabled", true);
        $("#premaS1").attr("disabled", "true");
        $("#duracionExamen1").attr("disabled", "true");
        $(".row-siguiente").removeAttr('style');
        $(".row-siguiente").fadeIn(100);

    }
}

function validarSeleccionado(item) {

    var nivel = $("#nivel").select2('val');
    //console.log(nivel, "ver1")
    //console.log(item, "ver")
    if (item == '' || nivel == '' || nivel !== -1) {
        $("#titulo").removeAttr("style")
        $("#puntaje").removeAttr("disabled")
    }
}

function validarNumero(numero) {

    if (numero < 0) {
        $("#premaS").css("background-color", "#ffdddd;");
        $("#premaS").attr("placeholder", "El número debe ser mayor a 0");
        $("#premaS").focus();
        $("#premaS").val('');
    }
    if (numero > 0) {
        $("#premaS").removeAttr("style");
        $("#premaS").removeAttr("placeholder");
    }
}

function validarNumero2(numero) {
    if (numero < 0) {
        $("#duracionExamen").css("background-color", "#ffdddd;")
        $("#duracionExamen").attr("placeholder", "El número debe ser mayor a 0")
        $("#duracionExamen").focus();
        $("#duracionExamen").val('');
    }
    if (numero > 0) {
        $("#duracionExamen").removeAttr("style")
        $("#duracionExamen").removeAttr("placeholder")
    }
}


function crearExamen() {

    var IDDetalleCalendario = $("#IDDetalleCalendario").val()

    var puntajeTotalGlobal = $("#puntaje").val(); //ok
    var NRDuracionminuto = $("#duracionExamen").val(); //ok
    var LGBorrador = '0'
    var FCIngreso = $('#calendario').val()
    var NRRutUsuario = <?=$_SESSION["NRRutUsuario"]?>;
    //ok
    var prema = $("#prema1").val();
    var i = 0;
    var nivel = $("#nivel").select2('val');
    var idPreguntas = [];
    var IDAsignatura = $("#asignatura").val();
    $('input[name="preguntas[]"]:checked').each(function(index, item) {
        if (this.checked) {
            idPreguntas.push(item.value);
            //result2 = item.value;
        }
    });
    varObjParam = {
        'IDDetalleCalendario': IDDetalleCalendario,
        'puntajeTotalGlobal': puntajeTotalGlobal,
        'NRDuracionminuto': NRDuracionminuto,
        'LGBorrador': LGBorrador,
        'FCIngreso': FCIngreso,
        'NRRutUsuario': NRRutUsuario,
        'IDAsignatura': IDAsignatura,
        'idPreguntas': idPreguntas,
        'prema': prema
    };
    //console.log(varObjParam)
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Evaluaciones/crearExamenEdumar",
        data: varObjParam,

        success: function(obj) {
            $.SmartMessageBox({
                title: 'Aviso',
                content: 'Creación realizada con éxito',
                buttons: '[Volver][Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Volver') {
                    location.href = "<?=base_url();?>Evaluaciones/evaluaciones";
                } else if (ButtonPress == 'Aceptar') {
                    location.reload();
                }
            });
        },
        error: function(error) {
            //console.error("Problemas con la creación  ", error);
            // $.SmartMessageBox({
            //     title: 'Error',
            //     content: 'Problemas con la Creación errorrrrrrrrrr',
            //     buttons: '[Aceptar]'
            // }, function(ButtonPress, value) {
            //     if (ButtonPress == 'Aceptar') {
            //         location.reload();
            //     }
            // });
        }
    })
}


function LoaderAsignaturas(Iden) {
    var idArea = $("#idArea").val();
    //console.log(idArea, "ide del area")
    $("#carga-asignatura").html('<i class="fa  fa-spin fa-refresh"></i>');
    var ObjParam = {
        'IdArea': idArea
    }

    var result = [];
    var i = 0;

    // //console.log(ObjParam,"parametro para el getAsignatura")
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Evaluaciones/getAsignaturas",
        data: ObjParam,

        success: function(obj) {
            //pablojimenez conectado 
            // //console.log(obj);
            //var Option='<select class="select2" style="width: 100%" id="asignatura" ><option value="-1"></option>';
            //console.log(obj.getAsignaturas, "ver el arreglo");
            var Options = '<div class="row">';
            if (obj.getAsignaturas) {
                $.each(obj.getAsignaturas, function(i, item) {

                    //Option+='<option value="'+item.IDAreaAsignatura+'">'+item.GLAsignatura+'</option>';
                    //Option+='<option value="'+item.IDAreaAsignatura+'">'+item.GLAsignatura+'</option>';
                    Options += '<div class="col-md-3"><div class="checkbox">' +
                        '<label>' +
                        '  <input type="checkbox" name="asignaturas[]" class="checkbox style-0" value="' +
                        item.IDAreaAsignatura + '">' +
                        '  <span>' + item.GLAsignatura + '</span>' +
                        '</label>' +
                        '</div></div>';
                });
            }
            //Option+='</select>';
            Options += '</div>';
            $("#carga-asignatura").html(Options)
            $(".row-asignatura").fadeIn();
            //$("#asignatura").select2();
        }
    })
}

function LoaderTitulos(Iden) {
    $("#carga-titulo").html('<i class="fa  fa-spin fa-refresh"></i>');
    var ObjParam = {
        'IdArea2': Iden
    }

    // //console.log(ObjParam,"parametro para el getAsignatura")
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Evaluaciones/getTitulosporArea",
        data: ObjParam,

        success: function(obj) {
            // //console.log(obj);
            // //console.log(obj.getTitulosporArea, "algo:)");
            var Option =
                '<select class="select2" style="width: 100%" id="titulo" ><option value="-1"></option>';
            if (obj) {
                $.each(obj.getTitulosporArea, function(i, item) {
                    Option += '<option value="' + item.IDTitulo + '">' + item.NMTitulo +
                        '</option>';

                });
            }

            Option += '</select>';
            $("#carga-titulo").html(Option)
            $("#titulo").select2();


        }
    })
}

function getPreguntasExamen() {

    var result = [];
    //var result2 = {};
    var i = 0;
    var nivel = $("#nivel").select2('val');
    var asignatura = $("#asignatura").val();
    var puntajeTotalGlobal = $("#puntaje").val();

    // $("input[type=checkbox]").each(function(index, item) {
    //     if (this.checked) {
    //         result.push(item.value);
    //         //result2 = item.value;
    //     }
    // });
    ObjParam = {
        'result': asignatura,
        'nivel': nivel
    };

    //console.log(ObjParam,"datos para traer las preguntas")
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Evaluaciones/getPreguntasExamen2",
        data: ObjParam,
        success: function(obj) {
            //console.log(obj, "objeto")
            var puntajeTotal = puntajeTotalGlobal / obj.preguntas.length
            $.each(obj.preguntas, function(i, item) {
                $("#pregunta").append("<tr>" +
                    "<td>" + (i + 1) + "</td>" +
                    "<td>" + item.GLPregunta + "</td>" +
                    "<td>" +
                    "<input type='number' disabled='true'  idPregunta='" + item.IDPregunta +
                    "' class='form-control' value='" + puntajeTotal + "'>" +
                    "<input type='checkbox' checked='true' name='preguntas[]' style='display:none' value='" +
                    item.IDPregunta + "'>" +
                    "</td>" +
                    "</tr>" +
                    "<tr>" +

                    "</tr>");
                puntajeTotalGlobal = puntajeTotalGlobal - puntajeTotal;

            });

            //console.log(puntajeTotalGlobal, "puntaje despues del descuento");


        },
        error: function(error) {
            //console.error("Problemas  ", error);

            $.SmartMessageBox({
                title: 'Error!',
                content: 'Problemas al cargar los datos',
                buttons: '[Volver][Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Volver') {
                    location.href = "<?=base_url();?>Evaluaciones/evaluaciones";
                }
            });

        }
    })

}
</script>
<script src="<?=base_url();?>assets/js/moment.min.js"></script>