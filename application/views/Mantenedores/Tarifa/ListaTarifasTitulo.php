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
            <li>Tarifas / Prerrequisitos</li>

        </ol>
    </div>

    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa-fw fa fa-graduation-cap"></i>
                    Tarifas / Prerrequisitos
                </h1>

            </div>

        </div>

        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2></h2>
                        </header>
                        <div>
                            <div class="widget-body" id="calendarioExamen">

                                <div class="row visibleCalendarioExamen">
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-md-offset-8">
                                        
                                    </div>
                                    <br>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

                                        <table id="tablaTituloExamen" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tipo</th>
                                                    <th>Valor Dólar (CLP)</th>
                                                    <th>Tarifa (CLP)</th>
                                                    <th>Tarifa (USD)</th>
                                                    <th>Nombre</th>
                                                    <th>Prerrequisitos</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($Titulos as $key => $titulo ) : 
                                                    $valorDolar =round(floatval($titulo->NRMontoBase)*(floatval($ValorDolar->NRValor)));
                                                    //echo $valorDolar."valo del dolar";exit;
                                                    $valorDolar = number_format($valorDolar, 0, ",", ".");
                                                    ?>
                                                <tr>
                                                    <td><?=($titulo->IDTitulo)?></td>
                                                    <td><?=($titulo->GLTPTitulo)?></td>
                                                    <td>$ <?=number_format(floatval ($ValorDolar->NRValor), 1, ",", ".")?></td>
                                                    <td><?=(count($titulo->Tarifa)>0)?"$".$valorDolar:"NA"?> </td>
                                                    <td><?=(round($titulo->NRMontoBase,2)==0)?"NA":"$".round($titulo->NRMontoBase,2)?> </td>
                                                    <td>
                                                        <!-- <a title="Ver detalle Título" href="<?=base_url()?>TituloMantenedor/detalleTitulo/<?=($titulo->IDTitulo)?>"> -->
                                                        <?=$titulo->NMTitulo?>
                                                    </a>
                                                        
                                                    
                                                    </td>
                                                    <td>
                                                    <div class="btn-group">
                                                    <button restricciones='<?=json_encode($titulo->Restricciones)?>' id="btnRestricciones<?=($titulo->IDTitulo)?>" onclick="verRestricciones(<?=($titulo->IDTitulo)?>)" class="btn btn-success btn-xs" >
                                                     Ver (<?=count($titulo->Restricciones)?>)
                                                    </button>
                                                    <!--a class="btn btn-danger btn-xs" href="<?=base_url()?>TituloMantenedor/detalleTitulo/<?=$titulo->IDTitulo?>">
                                                    <i
                                                                class="fa fa-times"></i>
                                                    </a--></div>
                                                      
                                                    </td>


                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                           
                                        </table>
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
                <h4 class="modal-title">Agregar Asignatura</h4>
            </div>
            <div class="modal-body">
                <form class="needs-validation">

                    <div class="form-group">
                        <label for="GLAsignatura">Glosa Asignatura</label>
                        <input type="text" name="asignatura" class="form-control" id="GLAsignatura"
                            placeholder="Ingrese la nueva Asignatura" required="true">
                    </div>
                    <div class="form-group">
                        <input type="text" name="NRRutUsuario" style="display:none" class="form-control"
                            id="NRRutUsuario" value="<?=$_SESSION["NRRutUsuario"]?>" required="true">
                    </div>
                    <div class="alert alert-danger" role="alert" id="alerta" style="display:none;margin-bottom:15px;">
                        ¡Todos los campos deben ser completados!
                    </div>
                    <input type="button" onclick="agregraAsignatura();" class="btn btn-primary"
                        value="Ingrese la Nueva Asignatura" style="margin-top:15px;" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

<!--  fin Modal agregar nuevas alternativas  -->
<!--  inicio Modal actualizar nuevas alternativas  -->

<div id="modalActualizar" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modalColorHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Actualizar Asignatura</h4>
            </div>
            <div class="modal-body">
                <form class="needs-validation">
                     <input type="hidden" name="IDAsignaturaActualizar" id="IDAsignaturaActualizar">                               
                    <div class="form-group">
                        <label for="GLAsignatura">Glosa Asignatura</label>
                        <input type="text" name="asignatura" class="form-control" id="GLAsignaturaActualizar"
                               required="true">
                    </div>
                    <div class="form-group">
                        <input type="text" name="NRRutUsuario" style="display:none" class="form-control"
                            id="NRRutUsuario" value="<?=$_SESSION["NRRutUsuario"]?>" required="true">
                    </div>
                    <div class="alert alert-danger" role="alert" id="alerta" style="display:none;margin-bottom:15px;">
                        ¡Todos los campos deben ser completados!
                    </div>
                    <input type="button" onclick="actualizarAsignatura();" class="btn btn-primary"
                        value="Actualizar" style="margin-top:15px;" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<div id="modalRestricciones" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modalColorHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Lista de prerrequisitos</h4>
            </div>
            <div class="modal-body">
                <form class="needs-validation">
                    <ul id="listaRestricciones" class="list-group">
  
                    </ul>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

<!--  fin Modal agregar nuevas alternativas  -->

<!-- NAV VAR -->
<?php $this->load->view('Complement/footer');?>
<script src="<?=base_url();?>assets/js/plugin/ckeditor/ckeditor.js"></script>
<script src="<?=base_url();?>assets/js/libs/AjaxUpload.2.0.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
function verRestricciones(IDTitulo){
        var restricciones = JSON.parse($("#btnRestricciones"+IDTitulo).attr("restricciones"));
        //console.log(restricciones);
        $("#modalRestricciones").modal('show');
        $("#listaRestricciones").empty();
        if(restricciones.length==0){
            $("#listaRestricciones").append(' <li class="list-group-item list-group-item-warning">Sin restricciones. Estos prerequisitos son ingresado en Aplicación Edumar por el Usuario Administrador</li>')
        }else{            
            $.each( restricciones, function( key, restriccion ) {
            $("#listaRestricciones").append(' <li class="list-group-item">'+restriccion.GLTPRestriccion+'</li>')
            });
        }


        
}
$(document).ready(function() {
    $('#tablaTituloExamen').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ de _END_ de _TOTAL_ Tarifas",
            "infoEmpty": "Mostrando 0 de 0 de 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total Tarifas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Tarifas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar Tarifas:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
    });
});

function modalAgregarAsignatura() {
    $("#modalAgregar").modal('show');
}
function modalActualizarAsignatura(item) {

    //console.log(item, "item")
    if (item === "") {
        return null;
    }

    var ObjParam = {
        'IDAsignatura': item,
    }
    //console.log(ObjParam, "id")

    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Asignaturas/getAsignatura",
        data: ObjParam,
        success: function(obj) {
            //console.log(obj)
            $("#GLAsignaturaActualizar").val(obj.getAsignaturas.GLAsignatura);
            $("#IDAsignaturaActualizar").val(obj.getAsignaturas.IDAsignatura);
            $("#modalActualizar").modal('show');
           
        },
        error: function(err) {
            alert("algo no funciona");
            //console.log(err, "Error al actualizar");
        }
    })

    
}

function agregraAsignatura() {

    var GLAsignatura = $('#GLAsignatura').val();
    var NRRutUsuario = $('#NRRutUsuario').val();

    if (GLAsignatura === '' || NRRutUsuario === '') {
        $("#alerta").css("display", "inline");
        $("#GLAsignatura").css("border-color", "#d33724");
        $('#NRRutUsuario').css("border-color", "#d33724");
        return;
    }
    var objParams = {
        'GLAsignatura': GLAsignatura,
        'NRRutUsuario': NRRutUsuario
    };

    //console.log(objParams);

    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Asignaturas/agregarAsignatura",
        data: objParams,
        success: function(obj) {
            //console.log(obj);
            $.SmartMessageBox({
                title: 'Alternativa Creada',
                content: 'Se creó con éxito la nueva asignatura',
                buttons: '[Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Aceptar') {
                    location.href = "<?=base_url();?>Asignaturas";
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

function eliminarAsignatura(item) {

    //console.log(item, "item")
    if (item === "") {
        return null;
    }

    var ObjParam = {
        'IDAsignatura': item,
    }
    //console.log(ObjParam, "id")

    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Asignaturas/eliminarAsignatura",
        data: ObjParam,
        success: function(obj) {
            //console.log(obj);
            $.SmartMessageBox({
                title: 'Aviso',
                content: 'Se eliminó la Asignatura',
                buttons: '[Volver al listado de preguntas][Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Volver al listado de preguntas') {
                    location.href = "<?=base_url();?>Asignaturas";
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

function actualizarAsignatura(){

    var IDAsignaturaActualizar = $("#IDAsignaturaActualizar").val();
    var GLAsignaturaActualizar = $("#GLAsignaturaActualizar").val();
    var NRRutUsuario = $("#NRRutUsuario").val();

    if (IDAsignaturaActualizar === "" || GLAsignaturaActualizar ==='') {
        return null;
    }

    var ObjParam = {
        'IDAsignaturaActualizar' : IDAsignaturaActualizar,
        'GLAsignaturaActualizar' : GLAsignaturaActualizar,
        'NRRutUsuario' : NRRutUsuario
    }
    //console.log(ObjParam, "id")

    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Asignaturas/actualizarAsignatura",
        data: ObjParam,
        success: function(obj) {
            //console.log(obj);
            $.SmartMessageBox({
                title: 'Aviso',
                content: 'Se Actualizo la Asignatura',
                buttons: '[Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Aceptar') {
                    location.href = "<?=base_url();?>Asignaturas";
                } else if (ButtonPress == 'Aceptar') {
                    location.reload();
                }
            });
            $(".btn-carga").prop('disabled', false);
            $(".carga").html('');
            //alert('funciona'+ obj);
        },
        error: function(err) {
            //alert("algo no funciona");
            //console.log(err, "Error al actualizar");
        }
    })

}

function selectorExamen(item) {
    ////console.log(JSON.parse(item),"este es el item del btn")
    //buscarExamenCalendarioID
    var IDCalendario = item
    //console.log(IDCalendario)
    if (IDCalendario == '') {
        $.SmartMessageBox({
            title: 'Error!',
            content: 'Error',
            buttons: '[Aceptar]'
        }, function(ButtonPress, value) {
            if (ButtonPress == 'Aceptar') {
                location.reload();
            }
        });
    }


    varObjParam = {
        'IDCalendario': IDCalendario
    }
    //console.log(varObjParam, "paametro idcalendario")

    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Evaluaciones/buscarExamenCalendarioID",
        data: varObjParam,

        success: function(obj) {
            //console.log(obj)
            if (obj.buscarExamenCalendarioID.length >= 1) {
                $("#calendarioExamen").css("display", "none")
                $("#creacionExamen").removeAttr('style')

                $("#datetimepicker1").val(obj.buscarExamenCalendarioID.FCAsignaturaMin);
                $("#").val();
                $("#").val();
                $("#").val();
            }

        },
        error: function(error) {
            //console.error("Problemas con la creación  ", error);

        }
    })
}
</script>
<script src="<?=base_url();?>assets/js/moment.min.js"></script>