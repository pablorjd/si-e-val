 
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
            <li>Asignaturas</li>
 
        </ol>
    </div>
 
    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa-fw fa fa-graduation-cap"></i>
                    Asignaturas | <button class="btn btn-xs btn-success" onclick="modalAgregarArea()">Agregar Nueva Área</button>
                </h1>
 
            </div>
 
        </div>
 
        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2>Asignaturas.</h2>
                            
                        </header>
                        <div>
                            <div class="widget-body" id="calendarioExamen">
 
                                <div class="row visibleCalendarioExamen">
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-md-offset-8">
                                        <button class="btn btn-success pull-rigth" style="margin-bottom: 20px;" onclick="modalAgregarAsignatura()">Agregar
                                            Asignatura
                                        </button>
                                    </div>
                                    <br>
 
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
 
                                        <table id="tablaTituloExamen" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Listado de Asignaturas</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($asignaturas as $key => $item ) { ?>
                                                <tr>
                                                    <td><?=($key+1)?></td>
                                                    <td><?=$item->GLAsignatura?></td>
                                                    <td>
                                                        <button type="button" value="<?=$item->GLAsignatura?>"
                                                                onclick="modalActualizarAsignatura(this.value,<?=$item->IDAsignatura?>)"
                                                                class="btn btn-primary btn-xs"><i
                                                                class="fa fa-pencil"></i>
                                                        </button> 
                                                        <button type="button" value="<?=$item->IDAsignatura?>"
                                                                onclick="eliminarAsignatura(this.value)"
                                                                class="btn btn-danger btn-xs"><i
                                                                class="fa fa-times"></i>
                                                        </button>
                                                        <a class="btn btn-success btn-xs"
                                                             href="<?=base_url()?>Asignaturas/reportePreguntasAsignatura/<?=$item->IDAsignatura?>">
                                                             <i class="fa fa-eye"></i>
                                                         </a>
                                                    </td>
                                                    
 
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Listado de Asignaturas</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
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
                <form class="needs-validation" id="formCrearAsignatura" method="POST">
                    
                     <div class="form-group">
                <span>Área</span>
                  						<select class="select2" style="width: 100%" id="area">
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
 
                    <div class="form-group">
                        <label for="GLAsignatura">Nombre Asignatura</label>
                        <input type="text" name="asignatura" class="form-control" id="GLAsignatura"
                            placeholder="Ingrese la nueva Asignatura" required pattern="[A-Za-z0-9 ]+{4,20}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="NRRutUsuario" style="display:none" class="form-control"
                            id="NRRutUsuario" value="<?=$_SESSION["NRRutUsuario"]?>" required="true">
                    </div>
                    <!-- <div class="alert alert-danger" role="alert" id="alerta" style="display:none;margin-bottom:15px;">
                        ¡Todos los campos deben ser completados!
                        <br>
                    </div> -->
                    <input type="submit"  class="btn btn-primary"
                        value="Ingrese la Nueva Asignatura" style="margin-top:15px;" />
                </form>
 
                <script>
                    $(document).ready(function () {
                    $("#formCrearAsignatura").submit(function (e) {
                            e.preventDefault();
                            agregraAsignatura();
                            return;
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
<!--  inicio Modal actualizar nuevas alternativas  -->
 
<div id="modalActualizar" class="modal fade" role="dialog">
    <div class="modal-dialog">
 
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modalColorHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Actualizar Nombre Asignatura</h4>
            </div>
            <div class="modal-body">
                <form id="actualizarAsignatura" method="POST">
                     <input type="hidden" name="IDAsignaturaActualizar" id="IDAsignaturaActualizar">                               
                    <div class="form-group">
                        <label for="GLAsignatura">Glosa Asignatura</label>
                        <input type="text" name="GLAsignaturaActualizar" class="form-control" id="GLAsignaturaActualizar"
                                required pattern="[A-Za-z0-9 ]+{4,20}">
                               <input type="hidden" name="IDAsignaturaActualizar">
                    </div>
                    <div class="form-group">
                        <input type="text" name="NRRutUsuario" style="display:none" class="form-control"
                            id="NRRutUsuario" value="<?=$_SESSION["NRRutUsuario"]?>" required="true">
                    </div>
                    <!-- <div class="alert alert-danger" role="alert" id="alerta" style="display:none;margin-bottom:15px;">
                        ¡Todos los campos deben ser completados!
                    </div> -->
                    <input type="submit" class="btn btn-primary"
                        value="Actualizar" style="margin-top:15px;" />
                </form>
                <script>
                    $(document).ready(function () {
                    $("#actualizarAsignatura").submit(function (e) {
                            e.preventDefault();
                            actualizarAsignatura();
                            return;
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


<!-- Modal agregar Area -->

 
<div id="modalAgregarArea" class="modal fade" role="dialog">
    <div class="modal-dialog">
 
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modalColorHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Área</h4>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id="formCrearArea" method="POST">
                    <div class="form-group">
                        <label for="GLTPArea">Nombre Área</label>
                        <input type="text" name="area" class="form-control" id="GLTPArea"
                            placeholder="Ingrese la nueva Área" required>
                    </div>
                 
                    <input type="submit"  class="btn btn-primary"
                        value="Ingrese la Nueva Área" style="margin-top:15px;" />
                </form>
 
                <script>
                    $(document).ready(function () {
                    $("#formCrearArea").submit(function (e) {
                            e.preventDefault();
                            crearArea();
                            return;
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



<!-- fin modal -->
 
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
            "info": "Mostrando _START_ de _END_ de _TOTAL_ Asignaturas",
            "infoEmpty": "Mostrando 0 de 0 de 0 Asignaturas",
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
 
function modalAgregarAsignatura() {
    $("#modalAgregar").modal('show');
}
function modalAgregarArea() {
    $("#modalAgregarArea").modal('show');
}

function crearArea(){


    var GLTPArea = $('#GLTPArea').val();
    var objParams = {
        'GLTPArea': GLTPArea,
       
    };
 
    //console.log(objParams,"datos");return
 
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>AreaMantenedor/PA_IArea",
        data: objParams,
        success: function(obj) {
            ////console.log(obj);
            $.SmartMessageBox({
                title: 'Asignatura Creada',
                content: 'Se creó con éxito la nueva Área',
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
            //console.log(err, "Error");
        }
    })

}
function modalActualizarAsignatura(GLAsignatura,IDAsignatura) {
    $("#modalActualizar").modal('show');
    $("#GLAsignaturaActualizar").val(GLAsignatura);
    $("#IDAsignaturaActualizar").val(IDAsignatura);
 
    return;
 
    ////console.log(item, "item")
    if (item === "") {
        return null;
    }
 
    var ObjParam = {
        'IDAsignatura': item,
    }
    ////console.log(ObjParam, "id")
 
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Asignaturas/getAsignatura",
        data: ObjParam,
        success: function(obj) {
            ////console.log(obj)
            $("#GLAsignaturaActualizar").val(obj.getAsignaturas.GLAsignatura);
            $("#IDAsignaturaActualizar").val(obj.getAsignaturas.IDAsignatura);
            $("#modalActualizar").modal('show');
           
        },
        error: function(err) {
            alert("algo no funciona");
            ////console.log(err, "Error al actualizar");
        }
    })
 
    
}
 
function agregraAsignatura() {
 
    var GLAsignatura = $('#GLAsignatura').val();
    var NRRutUsuario = $('#NRRutUsuario').val();
    var CDTPArea = $("#area option:selected").val();
 
    if (GLAsignatura === '' || NRRutUsuario === '') {
        $("#alerta").css("display", "inline");
        $("#GLAsignatura").css("border-color", "#d33724");
        $('#NRRutUsuario').css("border-color", "#d33724");
        return;
    }
    var objParams = {
        'GLAsignatura': GLAsignatura,
        'NRRutUsuario': NRRutUsuario,
        'CDTPArea' : CDTPArea
    };
 
    ////console.log(objParams,"datos");
 
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Asignaturas/agregarAsignatura",
        data: objParams,
        success: function(obj) {
            ////console.log(obj);
            $.SmartMessageBox({
                title: 'Asignatura Creada',
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
            //alert("algo no funciona");
            //console.log(err, "Error");
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
 
    $.SmartMessageBox({
                    title:'Eliminar Asignatura',
                    content:'¿Está seguro que desea eliminar la Asignatura?',
                    buttons:'[Cancelar][Eliminar]'  
                    },function(ButtonPress,value){
                        if(ButtonPress=='Cancelar'){
                            //console.log('c')
                        }else if(ButtonPress=='Eliminar'){
                            //console.log('a')
                            $.ajax({
                            type: "POST",
                            url: "<?=base_url();?>Asignaturas/eliminarAsignatura",
                            data: ObjParam,
 
                            success: function(obj){
                                //console.log(obj,"asignatura eliminada")
                                $.SmartMessageBox({
                                    title:'Eliminación Exitosa',
                                    content:'Se eliminó con éxito la asignatura',
                                    buttons:'[Aceptar]' 
                                    },function(ButtonPress,value){
                                        if (ButtonPress == 'Aceptar') {
                                            location.reload();
                                        } 
                                    });
                                    location.reload();
                            }
                        })
                        }
                    }
                );
 
}
 
function actualizarAsignatura(){
    var IDAsignaturaActualizar = $("#IDAsignaturaActualizar").val();
    var GLAsignaturaActualizar = $("#GLAsignaturaActualizar").val();
    //var NRRutUsuario = $("#NRRutUsuario").val();
 
    var ObjParam = {
        'IDAsignaturaActualizar' : IDAsignaturaActualizar,
        'GLAsignaturaActualizar' : GLAsignaturaActualizar,
        
    }
    //console.log(ObjParam, "id")
//return;
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Asignaturas/pa_MAsignatura",
        data: ObjParam,
        success: function(obj) {
            //console.log(obj);
            $.SmartMessageBox({
                title: 'Aviso',
                content: 'Se Actualizó la Asignatura',
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
 
 