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

            <div class="row">
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2>Evaluaciones.</h2>
                        </header>
                        <div>
                            <div class="widget-body">

                                <div id="exTab2" class="container">
                                    <ul class="nav nav-tabs">
                                        <li id="navGenerarExamen" class="active">
                                            <a href="#1" data-toggle="tab">Generar Examen</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content ">
                                        <div class="tab-pane active" id="1"  style="width:auto">
                                            <h3>Seleccione los criterios para generar un examen</h3>
                                            
                                            <div class="row visibleCreacionExamen"  style="width:auto">
                                            <form id="formCrearExamenFacil" method="POST">
                                                <div class="col-md-3">
                                                    <span>Fecha</span>
                                                    <div class='input-group date' id='datetimepicker1'>
                                                        <input type='date' id='calendario' class="form-control" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <span>Repartición</span>

                                                    <select class="select2" style="width: 100%" id="reparticion" required="true">
                                                        <option value=""></option>
                                                        <?php
												            if(isset($getReparticiones)){
                                                                 foreach ($getReparticiones as $key => $s) {
                                                            ?>
                                                                <option value="<?=$s->CDRepPersonal;?>"><?=$s->Glreparticion;?></option>
                                                                <?php
                                                                }
												            }
											            ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <span>Prema</span>
                                                    <input type="number" class="form-control" id="premaS" min="10"
                                                        max="100" onchange="validarNumero(this.value)" required="true"
                                                        pattern="^[0-9]+">
                                                </div>

                                                <div class="col-md-3">
                                                    <span>Duración Examen Minutos</span>
                                                    <input type="number" class="form-control" id="duracionExamen"
                                                        min="10" max="120" onchange="validarNumero2(this.value)"
                                                        required="true" pattern="^[0-9]+">
                                                </div>
                                                </div>
                                                <br>
                                                <!-- style="display:none" -->
                                                <div class="row row-siguiente" id="visible">
                                                    <div class="col-md-3">
                                                        <span>Área</span>
                                                        <select class="select2" style="width: 100%" id="area"
                                                            onchange="LoaderAsignaturas(this.value),LoaderTitulos(this.value),validarSeleccionado(this.value)" required="true">
                                                            <option value=""></option>
                                                            <?php
                                                    if(isset($getAreas)){
                                                        foreach ($getAreas as $key => $s) {
                                                        ?>

                                                            <option value="<?=$s->CDTPArea;?>">
                                                                <?=$s->GLTPArea;?>
                                                            </option>
                                                            <?php
                                                        }

                                                    }
                                                ?>
                                                        </select>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <span>Nivel</span>
                                                        <select class="select2" style="width: 100%" id="nivel" required=true>
                                                            <option value=""></option>

                                                            <?php
                                                    if(isset($getNivel)){
                                                        foreach ($getNivel as $key => $s) {
                                                        ?>

                                                            <option value="<?=$s->CDTPNivel;?>">
                                                                <?=$s->GLTPNivel;?>
                                                            </option>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                                        </select>

                                                    </div>
                                                    <div class="col-md-3" onmouseover="oculta()">
                                                        <span>Titulo</span>
                                                        <div id="carga-titulo">
                                                            <select class="select2" onclick="oculta()" onchange="oculta()" style="width: 100%" id="titulo" required="true">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <span>Puntaje <span style="font-size: 9px;">(El puntaje no debe ser  mayor a 120 ptos.)</span></span>
                                                        <input type="number" class="form-control" id="puntaje" required="true" pattern="^[0-9]+"
                                                            disabled="true" min="30" max="120" size="3" title="El puntaje no debe superar los 120 ptos.">
                                                    </div>
                                                </div>

                                                <div class="row row-asignatura" style="display:none">
                                                    <div class="col-md-12" style="margin-top:20px;">
                                                        <span>Asignatura</span>
                                                        <div id="carga-asignatura">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3" id="buscarpregunta">
                                                    <!-- onclick="getPreguntasExamen();" -->
                                                        <button type="submit"  class="btn btn-primary btn-block" style="margin-top: 15px;"
                                                            >Buscar preguntas Examen</button>
                                                    </div>
                                                    <div class="col-md-3" style="display: none" id="refrescar">
                                                    <!-- onclick="getPreguntasExamen();" -->
                                                        <button type="button" id="nuevaBusqueda" class="btn btn-primary btn-block" style="margin-top: 15px;"
                                                            >Recargar</button>
                                                    </div>
                                                </div>
                                            </form>
                                                <script>
                                                        $(document).ready(function() {
                                                            $(".select2-hidden-accessible").hide()
                                                            $("#formCrearExamenFacil").submit(function(e){
                                                                e.preventDefault();
                                                                //console.log("valido")
                                                                //return;
                                                                getPreguntasExamen()
                                                            });
                                                        });
                                                </script>
                                            <hr style="height: 2px;">

                                            <div class="row">
                                                <div class="col-md-12" style="display:none" id="listadoPreguntasParaExamen">
                                                    <h3>Visualización</h3>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <!-- <iframe src="<base_url();?>Preguntas/SetPreguntaPDF/<(isset($getPregunta)?$getPregunta[0]->IDPregunta:'');?>" frameborder="0" style="width: 100%; height: 590px;"></iframe> -->
                                                            <table class="table">
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

                                                            <!-- <button type="button" class="btn btn-default"
                                                    onclick="generarPDF();">Generar PDF</button> -->
                                                            <button type="button" class="btn btn-default"
                                                                onclick="crearExamen()">Generar Examen</button>

                                                        </div>
                                                        <div class="col-md-6">

                                                            <!-- <iframe
                                                    src="http://localhost/pabloj/sieval/Evaluaciones/vistaPreviaActivaciontest"
                                                    frameborder="0" style="width: 100%; height: 590px;"></iframe> -->
                                                            <!-- <iframe src="<base_url();?>Preguntas/SetPreguntaPDF/<(isset($getPregunta)?$getPregunta[0]->IDPregunta:'');?>" frameborder="0" style="width: 100%; height: 590px;"></iframe> -->

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="2"  style="width:auto">
                                            <h3>Listado Exámenes</h3>
                                            <table id="tablaTituloExamen" class="table table-striped table-bordered"
                                            style="width:auto">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Título</th>
                                                    <th>Asignatura</th>
                                                    <th>Area</th>
                                                    <th>Fecha</th>
                                                    <th>Ver Examen</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            <?php if($listaExamenes == 0):?>
                                                <h5>Sin Resultados para mostrar</h5>
                                            <?php else:?> 
                                                <?php foreach($listaExamenes as $key => $item ) { ?>
                                                <tr>
                                                    <td><?=($key+1)?></td>
                                                    <td><?=$item->NMTitulo?></td>
                                                    <td><?=$item->GLAsignatura?></td>
                                                    <td><?=$item->GLTPArea?></td>
                                                    <td><?=$item->FCAsignatura?></td>

                                                    <!--td><($item->LGBorrador == 0)?"Borrador":"Listo"?></td>
                                                    <!-- <td>
                                                    <form action="<?=base_url();?>Evaluaciones/verExamen" method="POST">
                                           
                                                    <input name="NMTitulo" type="text" hidden="true" value="<?=$item->NMTitulo?>">
                                                    <input name="IDFormatoExamen" type="text" hidden="true" value="<?=$item->IDFormatoExamen?>">
                                                    <button  type="submit" class="btn btn-default btn-block">Ver Examen</button>
                                                    </form>
                                                       
                                                    </td> -->
                                                    <!-- <td>
                                                        <form  target="_blank"  action="<?=base_url();?>Evaluaciones/generarExamenPDF" method="POST">
                                                        <input name="IDFormatoExamen" type="text" hidden="true" value="<?=$item->IDFormatoExamen?>">
                                                            <button type="submit" class="btn btn-danger">Ver PDF</button>
                                                        </form>
                                                    </td> -->
                                                    <td>
                                                        <form  target="_blank"  action="<?=base_url();?>Evaluaciones/SetPreguntaPDF/<?=$item->NMTitulo?>" method="POST">
                                                        <input name="NMTitulo" type="text" hidden="true" value="<?=$item->NMTitulo?>">
                                                        <input name="IDFormatoExamen" type="text" hidden="true" value="<?=$item->IDFormatoExamen?>">
                                                            <button type="submit" class="btn btn-danger">Ver PDF</button>
                                                        </form>
                                                    </td>

                                                </tr>
                                                <?php } ?>
                                                <?php endif;?>
                                            </tbody>
                                        </table>
                                            

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
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>


<script type="text/javascript">

function oculta(){
    setTimeout(function(){
        $(".select2-hidden-accessible").hide() 
    },100)
    
}
$(document).ready(function() {
    
    $('#tablaTituloExamen').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ de _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 de 0 de 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
    });
    $(".select2-hidden-accessible").hide()

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
    var duracionExamen1 = $("#duracionExamen1").val();

    if (calendario1 == '' || premaS1 == '' || duracionExamen1 == '') {
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
        //$("#titulo").removeAttr("style")
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


    var puntajeTotalGlobal = $("#puntaje").val();
    var NRDuracionminuto = $("#duracionExamen").val();
    var LGBorrador = '1'
    var FCIngreso = $('#calendario').val()
    var NRRutUsuario = <?=$_SESSION["NRRutUsuario"]?>;
    var CDReparticion = $("#reparticion").select2('val');
    var IDTitulo = $("#titulo").select2('val')
    var NRMinAlumno = '0'
    var NRMaxAlumno = '0'
    var FCInicio = $('#calendario').val()
    var FCTermino = $('#calendario').val()
    var FCAsignatura = $('#calendario').val() //consultar las fechas de creacion de cada uno de los insert 
    NRPuntajeporPregunta = $('#').val()
    var prema = $("#premaS").val();
    var i = 0;
    var nivel = $("#nivel").select2('val');
    var IDAsignatura = [];
    $("input[name='asignaturas[]']:checked").each(function(index, item) {
        if (this.checked) {
            IDAsignatura.push(item.value);
            //result2 = item.value;
        }
    });
    var idPreguntas = [];
    $('input[name="preguntas[]"]:checked').each(function(index, item) {
        if (this.checked) {
            idPreguntas.push(item.value);
            //result2 = item.value;
        }
    });
    varObjParam = {
        'puntajeTotalGlobal': puntajeTotalGlobal,
        'NRDuracionminuto': NRDuracionminuto,
        'LGBorrador': LGBorrador,
        'FCIngreso': FCIngreso,
        'NRRutUsuario': NRRutUsuario,
        'CDReparticion': CDReparticion,
        'IDTitulo': IDTitulo,
        'NRMinAlumno': NRMinAlumno,
        'NRMaxAlumno': NRMaxAlumno,
        'FCInicio': FCInicio,
        'FCTermino': FCTermino,
        'IDAsignatura': IDAsignatura,
        'idPreguntas': idPreguntas,
        'prema': prema

    };
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Evaluaciones/crearExamen",
        data: varObjParam,

        success: function(obj) {

            //console.log(obj, "respuesta del servidor")
            mensajeExamenCreado();
            return;

        },
        error: function(error) {
            //console.error("Problemas con la creación  ", error);

        }
    })
}


//aca quede 
function mensajeExamenCreado(){

    $.SmartMessageBox({
            title: 'Aviso',
            content: 'Examen creado con éxito',
            buttons: '[Aceptar]'
        }, function(ButtonPress, value) {
            if (ButtonPress == 'Aceptar') {
                location.href="<?=base_url();?>Evaluaciones/listaExamenes"
            }
        });
}

function generarPDF() {

    varObjParam = {
        'preguntas': localStorage.getItem("preguntas")

    };
    //console.log(varObjParam, ":sdkomcsdocksmdcsodmcsdocsdmcsodmcdoicm")
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Evaluaciones/vistaPreviaActivaciontest",
        data: varObjParam,

        success: function(obj) {
            //console.log(obj)

        },
        error: function(error) {
            //console.error("Problemas con la creación  ", error);

        }
    })
}



function LoaderAsignaturas(Iden) {
    var idArea = Iden
    //console.log(idArea, "ide del area")
    $("#carga-asignatura").html('<i class="fa  fa-spin fa-refresh"></i>');
    var ObjParam = {
        'IdArea': idArea
    }
    //console.log(idArea,"pablo jiemenz")

    var result = [];
    var i = 0;
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Evaluaciones/getAsignaturas",
        data: ObjParam,

        success: function(obj) {
            //console.log(obj.getAsignaturas, "ver el arreglo este llega vacio");
            var Options = '<div class="row">';
            if (obj.getAsignaturas) {
                $.each(obj.getAsignaturas, function(i, item) {
                    Options += '<div class="col-md-3"><div class="checkbox">' +
                        '<label>' +
                        '  <input type="checkbox" name="asignaturas[]" class="checkbox style-0" value="' +
                        item.IDAsignatura + '">' +
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
    var i = 0;
    var nivel = $("#nivel").select2('val');
    var puntajeTotalGlobal = $("#puntaje").val();
    $("input[type=checkbox]").each(function(index, item) {
        if (this.checked) {
            result.push(item.value);
            //result2 = item.value;
        }
    });
    if (result.length == 0) {
        mensajeselect();
        
    }
    ObjParam = {
        'result': result,
        'nivel': nivel
    };
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Evaluaciones/getPreguntasExamen",
        data: ObjParam,

        success: function(obj) {
            //console.log(obj, "objeto")
            $("#pregunta").empty()
            if (obj.preguntas.length == 0) {
                mensaje($("#area option:selected").text().trim(),$("#nivel option:selected").text().trim());
            }
            var puntajeTotal = puntajeTotalGlobal / obj.preguntas.length
            $.each(obj.preguntas, function(i, item) {
                
                $("#pregunta").append("<tr>" +
                    "<td>" + (i + 1) + "</td>" +
                    "<td>" + item.GLPregunta + "</td>" +
                    "<td>" +
                    "<input type='number' disabled='true'  idPregunta='" + item.IDPregunta +
                    "' class='form-control' value='" + Math.trunc(puntajeTotal) + "'>" +
                    "<input type='checkbox' checked='true' name='preguntas[]' style='display:none' value='" +
                    item.IDPregunta + "'>" +
                    "</td>" +
                    "</tr>" +
                    "<tr>" +

                    "</tr>");
                puntajeTotalGlobal = puntajeTotalGlobal - puntajeTotal;

               
            });
            $("#listadoPreguntasParaExamen").removeAttr('style');
            $("#refrescar").removeAttr('style');
            $("#buscarpregunta").css('display','none');    
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

    $("#nuevaBusqueda").click(function(){
        $("#pregunta").empty()
        getPreguntasExamen();
    })


    function mensajeselect(){
        $.SmartMessageBox({
                title: '¡Debe seleccionar una asignatura!',
                content: 'Debe seleccionar una asignatura como mínimo',
                buttons: '[Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Aceptar') {
                    return;
                }
            });
    }

   

    function mensaje(nombreArea, nivel){

        $.SmartMessageBox({
                title: 'Sin preguntas para esa área '+nombreArea,
                content: 'El área: '+nombreArea+' no tiene preguntas del nivel '+nivel+' para las asignaturas seleccionadas',
                buttons: '[Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Aceptar') {
                    location.reload();
                }
            });

    }

}
</script>
<script src="<?=base_url();?>assets/js/moment.min.js"></script>