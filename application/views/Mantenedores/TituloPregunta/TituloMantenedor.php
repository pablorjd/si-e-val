 
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
            <li>Habilitar Títulos y Matrículas</li>
 
        </ol>
    </div>
 
    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa-fw fa fa-graduation-cap"></i>
                    Habilitar Títulos y Matrículas
                </h1>
 
            </div>
 
        </div>
 
        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2>Lista de Títulos y Matrículas para Habilitar / Deshabilitar |
                            <a class="btn btn-success btn-xs"  href="<?=base_url()?>AreaMantenedor/TituloPersonalMaritimo">
                             Agregar Título / Matrículas personal Marítimo
                            </a>
                            </h2>
 
                        </header>
                        <div>
                            <div class="widget-body" id="calendarioExamen">
 
                                <div class="row visibleCalendarioExamen">
                                    <!-- <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-md-offset-8">
                                        <a href="<?=base_url()?>AreaMantenedor/configurarTituloPregunta" class="btn btn-success pull-rigth" style="margin-bottom: 20px;">Agregar configuración Examen </a>
                                       
                                    </div> -->
                                    <br>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
                                    <table id="tablaTituloExamen" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tipo</th>
                                                    <th>Área</th>
                                                    <th>Nombre</th>
                                                    <th>Estado</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($titulopreguntas as $key => $titulo ) : ?>
                                                <tr>
                                                    
                                                    <td><?=($titulo->IDTitulo)?></td>
                                                    <td><?=$titulo->GLTPTitulo?></td>
                                                   
                                                    <td>
                                                    <select onchange="cambiararea(<?=$titulo->IDTitulo;?>,'area<?=$key?>')"  class="select2" style="width: 100%" name="area" id="area<?=$key?>" required>
                                                                    <option value="">Seleccione</option>	
                                                                    <?php if(isset($getAreas)):?>
                                                                        <?php foreach ($getAreas as $key => $area):?>
                                                                            <option <?=($area->CDTPArea==$titulo->CDTPArea)?"selected":null?> value="<?=$area->CDTPArea;?>"><?=$area->GLTPArea;?></option>	
                                                                        <?php endforeach;?>
                                                                    <?php endif;?>
                                                                </select>	
                                                    </td>
                                                    <td><?=$titulo->NMTitulo?></td>
                                                    <td>
                                                    <div class="btn-group">
                                                                <?php if(!isset($titulo->FCExpiracion)):?>
                                                                    <span class="label label-success badge-pill">Habilitado</span>
                                                                <?php else:?>
                                                                    <span class="label label-danger badge-pill">Deshabilitado</span>
                                                                <?php endif;?>
                                                    </div>
                                                    </td>
                                                    <td>
                                                    <div class="btn-group">
                                                        <?php if(isset($titulo->FCExpiracion)):?>
                                                            
                                                            <button class="btn btn-success btn-xs" onclick="habilitarTitulo(<?=$titulo->IDTitulo?>)">
                                                                    Habilitar Título
                                                                </button>
                                                            <?php else:?>
                                                                <button class="btn btn-danger btn-xs" onclick="eliminarTitulo(<?=$titulo->IDTitulo?>)">
                                                                    Deshabilitar Título
                                                                </button>
                                                            <?php endif;?>
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
                <form class="needs-validation" id="formCrearAsignatura" method="POST">
 
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




<div id="modalInformacion" class="modal fade" role="dialog">
    <div class="modal-dialog">
 
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modalColorHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">INFORMACIÓN</h4>
            </div>
            <div class="modal-body">

            <h2 class="text-center">Si desea Agregar un Nuevo Título o Matrícula, lo debe solicitar al departamento de Personal Marítimo</h2>
                
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
    $(".select2-hidden-accessible").hide()

    $("#modalInformacion").modal('show');
});
 
function modalAgregarAsignatura() {
    $("#modalAgregar").modal('show');
}
  
function cambiararea(IDTitulo,NombreSelect){
 //   $("#area85 option:selected").val()
    $.ajax({
                            type: "POST",
                            url: "<?=base_url();?>AreaMantenedor/Pa_UAreaTitulo/"+IDTitulo+"/"+$("#"+NombreSelect+" option:selected").val(),
                            success: function(obj){
                               location.reload();
                               
                            }
                        })
}
 
function eliminarTitulo(IDTitulo) {
    //console.log(IDTitulo)

    $.SmartMessageBox({
                    title:'Eliminar Título <?=$titulo->NMTitulo?>',
                    content:'¿Está seguro que desea eliminar el Título <?=$titulo->NMTitulo?> ? ',
                    buttons:'[Cancelar][Eliminar]'  
                    },function(ButtonPress,value){
                        if(ButtonPress=='Cancelar'){
                            //console.log('c')
                        }else if(ButtonPress=='Eliminar'){
                            //console.log('a')
                            $.ajax({
                            type: "POST",
                            url: "<?=base_url();?>AreaMantenedor/Pa_ETitulo/"+IDTitulo,
                            success: function(obj){
                                //console.log(obj,"asignatura eliminada")
                                $.SmartMessageBox({
                                    title:'Eliminación Exitosa',
                                    content:'Se eliminó con éxito el Título',
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

function habilitarTitulo(IDTitulo) {
    //console.log(IDTitulo)

    $.SmartMessageBox({
                    title:'Habilitar Título <?=$titulo->NMTitulo?>',
                    content:'¿Está seguro que desea habilitar el Título <?=$titulo->NMTitulo?> ? ',
                    buttons:'[Cancelar][Habilitar]'  
                    },function(ButtonPress,value){
                        if(ButtonPress=='Cancelar'){
                            //console.log('c')
                        }else if(ButtonPress=='Habilitar'){
                            //console.log('a')
                            $.ajax({
                            type: "POST",
                            url: "<?=base_url();?>AreaMantenedor/Pa_UTitulo/"+IDTitulo,
                            success: function(obj){
                                //console.log(obj,"asignatura eliminada")
                                $.SmartMessageBox({
                                    title:'Habilitación Exitosa',
                                    content:'Se habilito con éxito el Título',
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

</script>
<script src="<?=base_url();?>assets/js/moment.min.js"></script>
 
 