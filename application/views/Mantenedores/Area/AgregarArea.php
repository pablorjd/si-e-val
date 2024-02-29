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
            <li>Área / Personas</li>

        </ol>
    </div>

    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa-fw fa fa-graduation-cap"></i>
                    Áreas / Personas
                    <div class="btn-group">
                        <!-- <button type="button" value="6" onclick="" class="btn btn-success btn-xs">
                            Editar
                            <i class="fa fa-pencil"></i>
                        </button> -->

                        <span class="label label-primary badge-pill">ver Personas asociadas
                            <i class="fa fa-users"></i></span>
                            
                        
                        <!-- <button type="button" value="6" onclick="" class="btn btn-danger btn-xs">
                            Eliminar
                            <i class="fa fa-times"></i>
                        </button> -->
                    </div>
                </h1>

            </div>

        </div>

        <section id="widget-grid" class="">
            <div class="row">
                <div class="col-lg-3">
                    <br>
                    <input class="form-control" id="InputArea" type="text" placeholder="Buscar área..">
                    <br>
                    <ul class="list-group">
                        <table class=" table table-bordered table-hover table-striped">
                            <tbody class="" id="tablaArea">
                                <?php foreach($Areas as $key=>$Area):?>
                                <tr>
                                    <td>
                                        <?=$Area->GLTPArea?>
                                        <span class="pull-right">
                                            <div class="btn-group">
                                                <!-- <button type="button" value="6"
                                                    onclick="modalEditarArea('<?=$Area->GLTPArea?>')"
                                                    class="btn btn-success btn-xs">
                                                    <i class="fa fa-pencil">

                                                    </i>
                                                </button> -->
                                                <button area="<?=str_replace('"',"'",json_encode($Area))?>"
                                                    id="btnPersonas<?=$Area->CDTPArea?>" type="button" value="6"
                                                    onclick="accionArea(1,<?=$Area->CDTPArea?>)"
                                                    class="btn btn-primary btn-xs">
                                                    <i class="fa fa-users"></i> (<?=$Area->Personas?>)
                                                </button>
                                                <!-- <button type="button" id="btnEliminarArea" value="<?=$Area->CDTPArea?>" onclick="eliminarArea(this.value)"
                                                    class="btn btn-danger btn-xs"><i class="fa fa-times"></i>
                                                </button> -->

                                            </div>
                                        </span>
                                    </td>
                                </tr>


                                <?php endforeach;?>
                            </tbody>
                        </table>

                    </ul>
                </div>
                <div id="divContenedorRespuesta" class="col-lg-9">
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

<div id="modalEditarArea" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modalColorHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Área <span id="glarea"></span></h4>
            </div>
            <div class="modal-body">
                <form class="needs-validation">
                    <input type="hidden" name="IDAsignaturaActualizar" id="IDAsignaturaActualizar">
                    <div class="form-group">
                        <label for="GLAsignatura">Nombre Área</label>
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
                    <input type="button" onclick="" class="btn btn-primary" value="Actualizar"
                        style="margin-top:15px;" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
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
                    <input type="button" onclick="actualizarAsignatura();" class="btn btn-primary" value="Actualizar"
                        style="margin-top:15px;" />
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


function eliminarArea(item) {
    //console.log(item, "ideliminar")
    var CDTPArea = item;
    var objParams = {
			'CDTPArea' : CDTPArea
		}
		$.SmartMessageBox({
	       			title:'¡Eliminar Área!',
	       			content:'¿Está seguro que desea eliminar el Área?',
	       			buttons:'[Cancelar][Eliminar]'	
	       			},function(ButtonPress,value){
		       			if(ButtonPress=='Cancelar'){
		       				//console.log('c')
		       			}else if(ButtonPress=='Eliminar'){
							//console.log('a')
							$.ajax({
							type: "POST",
							url: "<?=base_url();?>AreaMantenedor/pa_UExpirarArea",
							data: objParams,

							success: function(obj){
                                location.reload();
								$.SmartMessageBox({
									title:'Eliminación Exitosa',
									content:'Se eliminó correctamente el Área ',
									buttons:'[Aceptar]'	
									},function(ButtonPress,value){
										if(ButtonPress=='Aceptar'){
											
										}
									}
								);

								
							}
						})
		       			}
	       			}
	       		);
}

    

  

function modalEditarArea(NMArea) {
    $("#modalEditarArea").modal('show');
    $("#glarea").html(NMArea);
}

function accionArea(opc, CDTPArea) {
    ////console.log( $("#btnPersonas"+CDTPArea).attr("area"))
    //return;
    //ver Personas
    if (opc == 1) {
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>AreaMantenedor/buscarPersonasPorArea/1/" + CDTPArea,
            data: {
                area: ($("#btnPersonas" + CDTPArea).attr("area"))
            },
            success: function(obj) {
                $("#divContenedorRespuesta").html(obj);
            },
            error: function(err) {
                alert("algo no funciona");
                //console.log(err, "Error al actualizar");
            }
        })


    }
}
$(document).ready(function() {

    $("#InputArea").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tablaArea tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
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

function actualizarAsignatura() {

    var IDAsignaturaActualizar = $("#IDAsignaturaActualizar").val();
    var GLAsignaturaActualizar = $("#GLAsignaturaActualizar").val();
    var NRRutUsuario = $("#NRRutUsuario").val();

    if (IDAsignaturaActualizar === "" || GLAsignaturaActualizar === '') {
        return null;
    }

    var ObjParam = {
        'IDAsignaturaActualizar': IDAsignaturaActualizar,
        'GLAsignaturaActualizar': GLAsignaturaActualizar,
        'NRRutUsuario': NRRutUsuario
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