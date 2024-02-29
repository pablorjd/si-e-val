<?php
$this->load->view('Complement/header');


$reparticiones = array();
foreach ($asignaturas as $key => $asignatura) {
    array_merge($reparticiones, $asignatura->Reparticiones);
}
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


                                <div>
                                    <h3>Reparticiones con Fecha Agendada </h3>
                                    <div>
                                        <!-- <p><= json_encode($reparticiones[0])?></p> -->
                                        <!-- <pre><=json_encode($sinAsignatura)?></pre> -->



                                        <ul class="list-group">
                                            <!-- <=var_dump($asignaturas)?> -->
<?php foreach ($reparticiones as $key => $reparticion): ?>
                                                ddfdsdsf

                                                <li class="list-group-item">
                                                    <input type="hidden" name="" id="<?= $reparticion['Glreparticion'] ?>">
                                                    <h4><b><?= $reparticion['Glreparticion'] ?></b>

    <?= date_format(new DateTime($reparticion['FCAsignatura']), 'd,m,Y'); ?>
                                                        <input type="hidden" name="IDDetalleCalendario" id="IDDetalleCalendario" value="<?= $reparticion['IDDetalleCalendario'] ?>">
                                                        dfdfdfdfd
                                                        <input type="hidden" name="FCAsignatura" id="FCAsignatura"
                                                               value="<?= $reparticion['FCAsignatura'] ?>">
                                                    </h4>
                                                </li>

<?php endforeach; ?>
                                        </ul>
                                    </div>

                                </div>

                                <div>
                                    <h4>Asignaturas para el Titulo <?= ($Titulo[0]->NMTitulo) ?> </h4>
                                    <hr>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <span>Seleccione Asignatura</span>
                                                <select onchange="buscarPreguntasPorAsignaturaNivel()" id="selectAsignatura" class="select2" id="select2Asignaturas" >
<?php foreach ($sinAsignatura as $key => $sinasignatura): ?>

                                                        <option value="<?= $sinasignatura->IDAsignatura ?>"><?= $sinasignatura->GLAsignatura ?> (<?= $sinasignatura->IDAsignatura ?>)</option> 

<?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <span>Nivel</span>

                                                <select id="selectNivel" onchange="buscarPreguntasPorAsignaturaNivel()" class="select2" style="width: 100%" required="true"
                                                        id="CDTPNivel<?= $asignatura->IDAsignatura ?>">
                                                    

<?php
if (isset($getNivel)) {
    foreach ($getNivel as $key => $s) {
        $Selected = '';
        if (isset($getPregunta)) {
            if ($getPregunta[0]->CDTPNivel == $s->CDTPNivel) {
                $Selected = 'selected="selected"';
            }
        }
        ?>

                                                            <option value="<?= $s->CDTPNivel; ?>" <?= $Selected; ?>>
        <?= $s->GLTPNivel; ?> (<?= $s->CDTPNivel; ?>)</option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                </select>

                                            </div>
                                            <div class="col-md-12">
                                                <br>
                                                <span>Preguntas <span id="numPreguntas"></span></span>
                                                <select class="select2" id="preguntas" name="preguntas"  name="preguntas[]" multiple="multiple">
                                                       
                                                    

                                                </select>
                                                <div id="resultadoSelectPreguntas">

                                                </div>
                                            </div>
                                            <div class="col-ms-3">
                                            <button onclick="guardarPreguntas()"
                                                                        type="button"
                                                                        style="margin: 20" type="button"
                                                                        class="btn btn-danger form-control">Guardar Preguntas</button>
                                            </div>
                                        </div>
                                        <hr>             
                                        <div class="container">
                                            <div id="tablaPreguntas" class="row">
                                                
                                            </div>
                                            
                                        </div>

                                        <!-- <ul class="list-group">
                                            <div class="row">
                                                <?php foreach ($sinAsignatura as $key => $sinasignatura): ?>
                                                    <div class="col-md-3" >
                                                        <li class="list-group-item">
                                                            <input type="checkbox" disabled="true" name="asignaturas[]" id="IDAsignatura" checked=true value="<?= $sinasignatura->IDAsignatura ?>">
                                                            <p><?= $sinasignatura->GLAsignatura ?></p>
                                                            <input type="number" id="IDAsignatura+<?= $sinasignatura->IDAsignatura ?>" checked=true value="">
                                                        </li>
                                                    </div>   
                                                <?php endforeach; ?>
                                            </div>
                                        </ul> -->
                                        </ul>
                                    </div>

                                </div>

                                <ul class="list-group">
                                    <?php foreach ($asignaturas as $key => $asignatura): ?>
                                        <input type="hidden" id="ReparticionesAsignatura"
                                               value='<?= (json_encode($asignatura->Reparticiones)) ?>'>
                                        <?php if ($asignatura->Reparticiones[0]["IDFormatoCalendario"] == 0 && $asignatura->IDAsignatura == 0): ?>
                                            <form id="formCrearExamen<?= $asignatura->IDAsignatura ?>">
                                                <li class="list-group-item" id="asignatutaITEM<?= $asignatura->IDAsignatura ?>">
                                                    <div class="container-fluid">
                                                        <h3><?= $asignatura->GLAsignatura ?> <?= $asignatura->IDAsignatura ?>
                                                            <!-- <?php json_encode($asignatura->Reparticiones) ?> -->
                                                            <!-- ?php foreach($asignatura->Reparticiones as $key => $reparticion):?>
                                                        <$reparticion->GLreparticion?>
                                                        IDFormatoCalendario
                                                    <php endforeach;?> -->
                                                            <div class="row">
                                                                <input type="hidden" name="IDAsignatura"
                                                                       value="><?= $asignatura->IDAsignatura ?>">
                                                                <div class="col-md-4">
                                                                    <span>Prema</span>
                                                                    <!-- onchange="validarNumero(this.value)" -->
                                                                    <input type="number" class="form-control" id="prema"
                                                                           min="10" max="100" 
                                                                           required="true" pattern="^[0-9]+">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <span>Puntaje</span>
                                                                    <!-- onchange="validarNumero(this.value)" -->
                                                                    <input type="number" class="form-control"
                                                                           id="NRPuntajeAprueba" min="10" max="100"
                                                                           required="true"
                                                                           pattern="^[0-9]+">
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <span>Cantidad Preguntas</span>
                                                                    <!-- onchange="validarNumero3(this.value)" -->
                                                                    <input type="number" class="form-control" min="10" max="100" required="true"
                                                                           id="numeroPreguntas<?= $asignatura->IDAsignatura ?>">
                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <span>Duración en Minutos</span>
                                                                    <!-- onchange="validarNumero2(this.value)" -->
                                                                    <input type="number" class="form-control"
                                                                           id="NRDuracionminuto" min="10" max="100"
                                                                           required="true"
                                                                           pattern="^[0-9]+">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <span>Nivel</span>

                                                                    <select class="select2" style="width: 100%" required="true"
                                                                            id="CDTPNivel<?= $asignatura->IDAsignatura ?>">
                                                                        <option value=""></option>

        <?php
        if (isset($getNivel)) {
            foreach ($getNivel as $key => $s) {
                $Selected = '';
                if (isset($getPregunta)) {
                    if ($getPregunta[0]->CDTPNivel == $s->CDTPNivel) {
                        $Selected = 'selected="selected"';
                    }
                }
                ?>

                                                                                <option value="<?= $s->CDTPNivel; ?>" <?= $Selected; ?>>
                <?= $s->GLTPNivel; ?></option>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                    </select>

                                                                </div>

                                                                <div class="col-md-4">
                                                                    <span style="color: white">hola</span>
                                                                    <button
                                                                        type="submit"
                                                                        style="margin: 20" type="button"
                                                                        class="btn btn-danger form-control">Generar
                                                                        Examen</button>
                                                                    <!--button
                                                                        onclick="generarPreguntasExamen(<?= $asignatura->IDAsignatura ?>,'<?= $asignatura->GLAsignatura ?>')"
                                                                        style="margin: 20" type="button"
                                                                        class="btn btn-danger form-control">Generar
                                                                        Examen</button-->

                                                                </div>
                                                            </div>

                                                    </div>
                                                </li>
                                            </form>
                                            <script>
                                                $(document).ready(function () {
                                                    $("#formCrearExamen<?= $asignatura->IDAsignatura ?>").submit(function (e) {
                                                        e.preventDefault();

                                                        var idsAsignaturas = '<?= json_encode($idsAsignaturas) ?>'
                                                        //console.log(typeof JSON.parse(idsAsignaturas));
                                                        //console.log(JSON.parse(idsAsignaturas));

                                                        //return;
                                                        generarPreguntasExamen(<?= $asignatura->IDAsignatura ?>, JSON.parse(idsAsignaturas));
                                                    });
                                                });


                                            </script>
    <?php endif; ?>
                                    <?php endforeach; ?>


                                </ul>
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
<div id="modalVistaPreviaExamenSinAsignatura" class="modal fade" role="dialog">
    <div class="modal-dialog" width="100%">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modalColorHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Vista previa Examen para <span id="GLAsignaturaModal"></span>
                    <input type="hidden" disabled="true" style="display: none" id="IDAsignaturaModal">
                    <span id="GLNivelModal" class="badge badge-primary">primary</span>

                    <!-- <button id="btnCambiarPreguntas" type="button" class="btn btn-primary btn-xs">Cambiar Preguntas
                        <i class="fa fa-refresh"></i>
                    </button> -->

                </h4>
            </div>
            <div class="alert alert-info" role="alert">
                Cuando las preguntas de la tabla son menos de las indicadas es producto de falta de información en la base de datos de las asignaturas.
            </div>
            <div id="tablaExamenPorAsignatura" class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" id="btnCrearExamenEdumarSinAsignatura" onclick="crearExamenEdumarSinAsignatura()" class="btn btn-success">Generar Examen</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

<!-- NAV VAR -->
<?php $this->load->view('Complement/footer'); ?>
<script src="<?= base_url(); ?>assets/js/plugin/ckeditor/ckeditor.js"></script>
<script src="<?= base_url(); ?>assets/js/libs/AjaxUpload.2.0.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

<script>
var prueba=[];
                    $(document).ready(function () {
                        $(".select2-hidden-accessible").hide()
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

                    })
    function guardarPreguntas(){
        $("#selectAsignatura option:selected").val();
                        $("#selectNivel option:selected").val();
        var asignatura = {
            "asignatura": {
            "IDAsignatura": $("#selectAsignatura option:selected").val(),
            "GLAsignatura":$("#selectAsignatura option:selected").text(),
            "Preguntas":{
                "GLPregunta":$("#preguntas option:selected").text(),
                "IDPregunta":$("#preguntas option:selected").val()
                }
            },
            "nivel":{
                "IDNivel":$("#selectNivel option:selected").val(),
                "GLNivel":$("#selectNivel option:selected").text()
            } 
        };
        prueba.push(asignatura);
        //aqui se limpia el selec 2
            $("#preguntas").val("");
            $("#preguntas").trigger("change");
        //console.log(prueba)
                    $("#tablaPreguntas").html('');
                      //  $.each( prueba, function( key, asignatura ) {
                            $.ajax({
                            type: "POST",
                            data:{prueba:prueba},
                            //se manda solo el titulo porque el buscar las asignaturas se hace en la nueva funcion
                            url: "<?= base_url(); ?>Evaluaciones/panelPreguntasSeleccionadas/",
                            success: function (response) {
                               // //console.log(response);
                                $("#tablaPreguntas").html(response);
                            }
                        })           
                     //   });
    }
                    function validarNumero(numero) {

                        if (numero < 0) {
                            $("#prema").css("background-color", "#ffdddd;");
                            $("#prema").attr("placeholder", "El número debe ser mayor a 0");
                            $("#prema").focus();
                            $("#prema").val('');
                        }
                        if (numero > 0) {
                            $("#prema").removeAttr("style");
                            $("#prema").removeAttr("placeholder");
                        }
                    }

                    function generarPreguntasExamen(IDAsignatura, idAsignaturas) {
                        $("#btnCrearExamen").attr("onclick", "crearExamenEdumar(" + IDAsignatura + ")");
                        //var IDDetalleCalendario = $("#IDDetalleCalendario").val()
                        var numeroPreguntas = $("#numeroPreguntas" + IDAsignatura).val();
                        var prema = $("#prema").val();
                        var NRPuntajeAprueba = $("#NRPuntajeAprueba").val();
                        var NRDuracionminuto = $("#NRDuracionminuto").val();
                        //var IDDetalleCalendario = $("#IDDetalleCalendario").val();
                        var puntajePregunta = NRPuntajeAprueba / numeroPreguntas;
                        //console.log(prema, NRPuntajeAprueba, NRDuracionminuto, "ultimos parametros ")
                        var nivel = $("#CDTPNivel" + IDAsignatura).val();
                        $("#GLNivelModal").html($("#CDTPNivel" + IDAsignatura + " option:selected").text());
                        //var nivel =1;
                        $("#modalVistaPreviaExamenSinAsignatura").modal('show');
                        //console.log(numeroPreguntas + 'nivel' + nivel, "numero de preguntas")
                        //+'/'+numeroPreguntas

                        $.ajax({
                            type: "POST",
                            //se manda solo el titulo porque el buscar las asignaturas se hace en la nueva funcion
                            url: "<?= base_url(); ?>AreaMantenedor/generarTablaPreguntasExamenSinAgnatura/<?= $IDTitulo ?>/" +
                                    numeroPreguntas + "/" + nivel,
                            success: function (response) {
                                ////console.log(response,"response")
                                $("#tablaExamenPorAsignatura").html(response);
                                $("#GLAsignaturaModal").html("Sin Asignatura");
                                $("#puntajePregunta").val(puntajePregunta);
                                $("#IDAsignaturaModal").val(IDAsignatura);
                                $("#btnCambiarPreguntas").attr("onclick", "generarPreguntasExamen(" + IDAsignatura + ",'" + $(
                                        "#GLAsignaturaModal").html() + "')");
                            }
                        })
                    }
                    function buscarPreguntasPorAsignaturaNivel() {
                        $("#selectAsignatura option:selected").val();
                        $("#selectNivel option:selected").val();
                        $.ajax({
                            type: "POST",
                            //se manda solo el titulo porque el buscar las asignaturas se hace en la nueva funcion
                            url: "<?= base_url(); ?>Evaluaciones/pa_BPreguntasPorAsignaturaPorNivel/" + $("#selectAsignatura option:selected").val() + "/" + $("#selectNivel option:selected").val(),
                            success: function (response) {
                                ////console.log(JSON.parse(response))
                                $("#numPreguntas").html("("+(JSON.parse(response).length)+")");
                                $("#preguntas").empty();
                                $.each(JSON.parse(response), function( index, pregunta ) {
                                    var data = {
                                        id: pregunta.IDPregunta,
                                        text: pregunta.GLPregunta.replace(/(<([^>]+)>)/ig,"").replace('\\n',"").replace('\\n',"").replace('\\n',"").replace('\\n',"").replace('\\n',"").replace(/[\ud800-\udfff]/g, "")+
                                        " "+pregunta.IDPregunta   
                                    };
                                        //&ldquo;D&rdquo;
                                    var newOption = new Option(data.text, data.id, false, false);
                                    $('#preguntas').append(newOption).trigger('change');
                                });
                               // $("#resultadoSelectPreguntas").html(response)
                            }
                        })
                    }

                    function crearExamenEdumarSinAsignatura(IDAsignatura) {
                        var datos = $("#ReparticionesAsignatura").val();
                        var datosJSON = JSON.parse(datos);
                        // var IDDetalleCalendario = [];
                        // $.each(datosJSON, function(index, value) {
                        //     IDDetalleCalendario.push(value.IDDetalleCalendario);

                        // });
                        // //console.log(IDDetalleCalendario)

                        var IDDetalleCalendario = $("#IDDetalleCalendario").val()
                        //console.log(IDDetalleCalendario, "detalle calendario generar Preguntas")
                        var puntajeTotalGlobal = $("#NRPuntajeAprueba").val();
                        var NRDuracionminuto = $("#NRDuracionminuto").val(); //ok
                        var LGBorrador = '1'
                        var FCIngreso = $("#FCAsignatura").val();
                        var NRRutUsuario = <?= $_SESSION["NRRutUsuario"] ?>;
                        //ok
                        var prema = $("#prema").val();
                        var i = 0;
                        var nivel = $("#CDTPNivel" + <?= $asignatura->IDAsignatura ?>).val();
                        var idPreguntas = [];
                        var IDAsignatura = $("#IDAsignatura").select2('val');
                        // var IDAsignatura = [];
                        // $("input[name='asignaturas[]']:checked").each(function(index, item) {
                        //     if (this.checked) {
                        //         IDAsignatura.push(item.value);
                        //         //result2 = item.value;
                        //     }
                        // });

                        $('input[name="preguntas[]"]:checked').each(function (index, item) {
                            if (this.checked) {
                                idPreguntas.push(item.value);

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
                        //console.log(varObjParam, "OBJ para prueba sin asignatura")
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url(); ?>Evaluaciones/crearExamenEdumarSinAsignatura",
                            data: varObjParam,

                            success: function (obj) {
                                $.SmartMessageBox({
                                    title: 'Aviso',
                                    content: 'Creación realizada con éxito',
                                    buttons: '[Volver][Aceptar]'
                                }, function (ButtonPress, value) {
                                    if (ButtonPress == 'Volver') {
                                        location.href = "<?= base_url(); ?>Evaluaciones";
                                    } else if (ButtonPress == 'Aceptar') {
                                        location.reload();
                                    }
                                });
                            },
                            error: function (error) {
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

                    function getPreguntasExamen() {

                        var result = [];
                        //var result2 = {};
                        var i = 0;
                        var nivel = $("#nivel").select2('val');
                        var puntajeTotalGlobal = $("#puntaje").val();

                        $("input[type=checkbox]").each(function (index, item) {
                            if (this.checked) {
                                result.push(item.value);
                                //result2 = item.value;
                            }
                        });
                        ObjParam = {
                            'result': result,
                            'nivel': nivel
                        };
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url(); ?>Evaluaciones/getPreguntasExamen",
                            // data: {'ObjParam': JSON.stringify(result)},
                            data: ObjParam,

                            success: function (obj) {
                                //console.log(obj, "objeto")
                                var puntajeTotal = puntajeTotalGlobal / obj.preguntas.length
                                $.each(obj.preguntas, function (i, item) {
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

                                localStorage.setItem("preguntas", obj)
                                //console.log(puntajeTotalGlobal, "puntaje despues del descuento");


                            },
                            error: function (error) {
                                //console.error("Problemas  ", error);

                                $.SmartMessageBox({
                                    title: 'Error!',
                                    content: 'Problemas al cargar los datos',
                                    buttons: '[Volver][Aceptar]'
                                }, function (ButtonPress, value) {
                                    if (ButtonPress == 'Volver') {
                                        location.href = "<?= base_url(); ?>Evaluaciones/evaluaciones";
                                    }
                                });

                            }
                        })

                    }


</script>