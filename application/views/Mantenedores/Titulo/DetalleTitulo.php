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
            <li> Manetendor Título</li>

        </ol>
    </div>

    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa-fw fa fa-graduation-cap"></i>
                    Detalle Título <?=$NMTitulo?>
                </h1>

            </div>

        </div>

        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2>Lista Asignaturas |
                             <a  class="btn btn-success btn-xs"  href="<?=base_url()?>TituloMantenedor/agregarAsignaturaTitulo/<?=$IDTitulo?>">
                             Agregar asignatura para <?=$NMTitulo?>
                             </a> </h2>
                        </header>
                        <div>
                            <div class="widget-body" id="calendarioExamen">

                                <div class="row visibleCalendarioExamen">
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-md-offset-8">
                                        
                                    </div>
                                    <br>

                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
                                    <?php if(isset($_SESSION["mensaje"])):?>
                                        <li class="list-group-item list-group-item-success">
                                        <?=$_SESSION["mensaje"]?>
                                    </li>
                                      <br>
                                      <?php unset($_SESSION["mensaje"])?>
                                    <?php endif?>
                                    
                                        <table id="tablaTituloExamen" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <!-- <th>Área</th> -->
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        
                                                <?php foreach($Asignaturas as $key => $asignatura ) : ?>
                                                <tr>
                                                <!--{"IDAsignatura":110,"GLAsignatura":"barco 1","CDTPTitulo":1}-->
                                                    <td><?=($asignatura->IDAsignatura)?></td>
                                                    <td><?=$asignatura->GLAsignatura?></td>
                                                    <!-- <td><$asignatura->GLTPArea?></td> -->
                                                    
                                                    <td>
                                                    <div class="btn-group">
                                                        <button type="button" value="<?=$asignatura->IDAsignatura?>"
                                                                onclick="eliminarAsignatura(<?=$asignatura->IDAsignatura?>,'<?=$asignatura->GLAsignatura?>','<?=$NMTitulo?>')"
                                                                class="btn btn-danger btn-xs"><i
                                                                class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                      
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

<!--  fin Modal agregar nuevas alternativas  -->

<!-- NAV VAR -->
<?php $this->load->view('Complement/footer');?>
<script src="<?=base_url();?>assets/js/plugin/ckeditor/ckeditor.js"></script>
<script src="<?=base_url();?>assets/js/libs/AjaxUpload.2.0.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
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

function eliminarAsignatura(item,asignatura,NMTitulo) {

    $.SmartMessageBox({
	       			title:'Eliminar Asignatura para '+NMTitulo,
	       			content:'¿Está seguro que desea eliminar la asignatura '+asignatura+'?',
	       			buttons:'[Cancelar][Eliminar]'	
	       			},function(ButtonPress,value){
		       			if(ButtonPress=='Cancelar'){
		       				//console.log('c')
		       			}else if(ButtonPress=='Eliminar'){
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
                            url: "<?=base_url();?>TituloMantenedor/pa_EAreaAsignatura/<?=$CDTPArea?>/"+item,
                            data: ObjParam,
                            success: function(obj) {
                            }
                            
                            
                        })
                        mensajeEliminacionExitosa();
		       			}
	       			}
	       		);
	
    function mensajeEliminacionExitosa(){
        $.SmartMessageBox({
                title: 'Aviso',
                content: 'Se eliminó la Asignatura',
                buttons: '[Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Aceptar') {
                    location.reload();  
                }
                location.reload();
            });
            $(".btn-carga").prop('disabled', false);
            $(".carga").html('');
            //alert('funciona'+ obj);
    }



  

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

function eliminarPregunta(idPregunta){
		var IDPregunta = idPregunta
		//console.log(IDPregunta,"ide de la pregunta")

		var objParams = {
			'IDPregunta' : IDPregunta
		}
		$.SmartMessageBox({
	       			title:'Eliminar Pregunta',
	       			content:'Esta seguro que desea eliminar la pregunta',
	       			buttons:'[Cancelar][Eliminar]'	
	       			},function(ButtonPress,value){
		       			if(ButtonPress=='Cancelar'){
		       				//console.log('c')
		       			}else if(ButtonPress=='Eliminar'){
							//console.log('a')
							$.ajax({
							type: "POST",
							url: "<?=base_url();?>Preguntas/pa_UExpirarPregunta",
							data: objParams,

							success: function(obj){
								//console.log(obj,"pregunta eliminada")
								$.SmartMessageBox({
									title:'Eliminación Exitosa',
									content:'Eliminación Exitosa',
									buttons:'[Aceptar]'	
									},function(ButtonPress,value){
										if(ButtonPress=='Aceptar'){
											location.reload();
										}
									}
								);

								
							}
						})
		       			}
	       			}
	       		);
	}

</script>
<script src="<?=base_url();?>assets/js/moment.min.js"></script>