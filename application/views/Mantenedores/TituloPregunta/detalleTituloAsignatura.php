 
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
            <li style="font-size: 15px;">Asignaturas por Título / Matrícula <?=$titulo[0]->NMTitulo?></li>
 
        </ol>
    </div>
 
    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark" style="font-size: 20px;">
                    <i class="fa-fw fa fa-graduation-cap"></i>
                    Asignaturas por Título / Matrícula <?=$titulo[0]->NMTitulo?>
                </h1>
 
            </div>
 
        </div>
 
        <section id="widget-grid" class="">
            
            <div class="row">
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2>Asignaturas por Título / Matrícula <?=$titulo[0]->NMTitulo?>|
                            
                            <button class="btn btn-success btn-xs" onclick="agregarAsignaturaPorTitulo()">Agregar Asignatura</button>
                             
                    </a></h2>
 
                        </header>
                        <div>
                            <div class="widget-body" id="calendarioExamen">
 
                                <div class="row visibleCalendarioExamen">
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-md-offset-8">
                                        
                                        <button class="btn btn-success pull-rigth"  style="margin-bottom: 20px;" onclick="mostrarConfiguraciones(<?=$titulo[0]->IDTitulo?>)">Ver configuración general del Examen</button>
                                    </div>
                                    <!-- <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-md-offset-8">
                                        <a href="<?=base_url()?>AreaMantenedor/configurarTituloPregunta" class="btn btn-success pull-rigth" style="margin-bottom: 20px;">Agregar Asignatura </a>
                                       
                                    </div> -->
                                    <br>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
                                    <table id="tablaTituloExamen" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Configuración para el Examen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php if(!isset($asignaturasTitulo[0]->GLAsignatura)):?>
                                                <?php else:?>
                                                <?php foreach($asignaturasTitulo as $key => $asignatura ) : ?>
                                                <tr>
                                                    <td><?=($key+1)?></td>
                                                    <td><?=$asignatura->GLAsignatura?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-success btn-xs" href="<?=base_url()?>AreaMantenedor/Pa_BTituloPreguntaPorIDAsignaturaIDTitulo/<?=$asignatura->IDAsignatura?>/<?=$IDTitulo?>">
                                                                Cantidad de preguntas y Nivel
                                                            </a>
                                                            <button class="btn btn-danger btn-xs" onclick="eliminarAsignaturaTituloPregunta(<?=$titulo[0]->IDTitulo?>,<?=$asignatura->IDAsignatura?>)">
                                                            Eliminar
                                                        </button>
                                                        </div>           
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                                <?php endif;?>
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



<div id="modalVerConfiguracion" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modalColorHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Configuración</h4>
            </div>
            <div id="ListaConfiguraciones" class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

<div id="agregarAsignaturaPorTitulo" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modalColorHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Asignatura al Título <?=$titulo[0]->NMTitulo?></h4>
            </div>
            <div class="container-fluid" style="margin-top: 10px;">
                                                    <div class="row">
                                                        <form id="agregarAsignatura">
                                                        <div class="col-md-4">
                                                            <span>Asignatura</span>
                                                            <select class="select2" style="width: 100%" required id="Asignatura">
                                                                <option value=""></option>
                                                                <?php foreach ($AsignaturasNoTitulos as $key => $AsignaturasNoTitulo): ?>
                                                                    <option value="<?=$AsignaturasNoTitulo->IDAsignatura?>"><?=$AsignaturasNoTitulo->GLAsignatura?></option>
                                                                <?php endforeach;?>
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <span style="color: white">hola</span>
                                                            <button
                                                               type="submit"
                                                                style="margin: 20"
                                                                class="btn btn-danger form-control">Agregar
                                                            </button>
                                                        </div>
                                                        </form>
                                                    </div>
                                            </div>

                                            <script>
                                            $(document).ready(function() {
                                                $("#agregarAsignatura").submit(function(e){
                                                    e.preventDefault();
                                                    //console.log("valido")
                                                    //return;
                                                    agregarAsignatura()
                                                });
                                            });
                                                

                                        </script>
            
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
});

function agregarAsignaturaPorTitulo(){
    $("#agregarAsignaturaPorTitulo").modal('show');
}

function mostrarConfiguraciones(IDTitulo){
        
    $("#modalVerConfiguracion").modal('show');
    
    $.ajax({

        type: "POST",
        url: "<?=base_url();?>Configuracion/pa_BConfiguracionesPorTitulo/"+IDTitulo,
        
        success: function(obj) {
            $("#ListaConfiguraciones").html(obj);
           
        },
        error: function(err) {
            alert("algo no funciona");
            //console.log(err, "Error");
        }
    })

    }

    function agregarAsignatura(){
        //var CDTPNivel = [1,2,3,4];/
        //var NRPregunta = $("#NRPregunta").val();
        var IDAsignatura = $("#Asignatura").select2('val');
        // var params = {
        //     'CDTPNivel' : CDTPNivel,
        //     'NRPregunta' :5
        // };
        ////console.log(params,"parametros para el pa")
        $.ajax({
        type: "POST",
        url: "<?=base_url();?>AreaMantenedor/agregarAsignatura/<?=$titulo[0]->IDTitulo?>/"+IDAsignatura,
        //data: params,

        success: function(obj) {
            $.SmartMessageBox({
                title: 'Aviso',
                content: 'Creación realizada con Éxito',
                buttons: '[Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Aceptar') {
                    location.href = '<?=base_url()?>AreaMantenedor/Pa_BTituloPreguntaPorIDAsignaturaIDTitulo/'+IDAsignatura+'/<?=$titulo[0]->IDTitulo?>'
                }
            });
        
        }
        });

    }
    function eliminarAsignaturaTituloPregunta(IDTitulo,IDAsignatura){
        $.SmartMessageBox({
                title:'Eliminar configuración Examen',
                content:'¿Está seguro que desea eliminar la configuración?',
                buttons:'[Cancelar][Eliminar]'  
                },function(ButtonPress,value){
                    if(ButtonPress=='Cancelar'){
                        //console.log('c')
                    }else if(ButtonPress=='Eliminar'){
                        $.ajax({
                            type: "POST",
                            url: "<?=base_url()?>AreaMantenedor/Pa_UTituloPreguntaActualizado/"+IDTitulo+"/"+IDAsignatura,
                            success: function(obj) {
                                    
                            
                            }
                            
                            });
                            mensaje()
                                        
                    }
                }
            );
    }

    function mensaje(){

        $.SmartMessageBox({
            title: 'Aviso',
            content: 'Eliminación realizada con Éxito',
            buttons: '[Aceptar]'
                }, function(ButtonPress, value) {
                    if (ButtonPress == 'Aceptar') {
                        location.reload();
                    }
            });

    }

</script>
<script src="<?=base_url();?>assets/js/moment.min.js"></script>
 
