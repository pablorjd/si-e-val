 
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
            <li>Configuración Examen</li>
 
        </ol>
    </div>
 
    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa-fw fa fa-graduation-cap"></i>
                    Configuración Examen
                </h1>
 
            </div>
 
        </div>
 
        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2>Configuración Examen. <?=$TituloPreguntaConfiguracion[0]->NMTitulo?></h2>
 
                        </header>
                        <div>
                            <div class="widget-body" id="calendarioExamen">



                            <div>
                                    <h3>Generar Nueva Configuración para el Título / Matrícula <?=$TituloPreguntaConfiguracion[0]->NMTitulo?> de la asignatura <?=$TituloPreguntaConfiguracion[0]->GLAsignatura?>  </h3>
                                    <div>
                                        
                                    </div>
                                    
                                    <ul class="list-group">   
                                            <form id="formCrearConfiguracion">  
                                        <li class="list-group-item" id="asignatutaITEM">
                                            <div class="container-fluid">
                                                    <div class="row">
                                                        <input type="hidden" name="IDAsignatura"
                                                            value="">
                                                        <div class="col-md-4">
                                                            <span>Cantidad Preguntas</span>
                                                            <input type="number" class="form-control" min="1" max="100" required="true"
                                                                id="NRPregunta">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <span>Nivel</span>
                                                            <select class="select2" style="width: 100%" required="true"
                                                                id="CDTPNivel">
                                                                <option value=""></option>
                                                                <?php foreach ($getNivel as $key => $nivel): ?>
                                                                    <option value="<?=$nivel->CDTPNivel?>"><?=$nivel->GLTPNivel?></option>
                                                                <?php endforeach;?>
                                                                
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <span style="color: white">hola</span>
                                                            <button
                                                               type="submit"
                                                                style="margin: 20" type="button"
                                                                class="btn btn-danger form-control">Agregar/Modificar
                                                            </button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </li>
                                        </form>
                                        <script>
                                            $(document).ready(function() {
                                                $("#formCrearConfiguracion").submit(function(e){
                                                    e.preventDefault();
                                                    //console.log("valido")
                                                    //return;
                                                    generarCongifuracionTituloPregunta()
                                                });
                                            });
                                                

                                        </script>
                                    </ul>
                                </div>
                                <!--  -->


 
                                <div class="row visibleCalendarioExamen">
                                    <br>
                                    <hr>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
                                        <table id="tablaTituloExamen" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>    
                                                    <th>Nivel</th>
                                                    <th>Asignatura</th>
                                                    <th>Título</th>
                                                    <th>Titulo/Matrícula</th>
                                                    <th>Número de Preguntas</th>
                                                    <th>Acción</th>           
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!isset($TituloPreguntaConfiguracion)):?>
                                                    
                                                <?php else:?>
                                                <?php foreach($TituloPreguntaConfiguracion as $key=>$titulopregunta ):?>
                                                <tr>
                                                    <td><?=$titulopregunta->GLTPNivel?></td>
                                                    <td><?=$titulopregunta->GLAsignatura?></td>
                                                    <td><?=$titulopregunta->NMTitulo?></td>
                                                    <td><?=$titulopregunta->GLTPTitulo?></td>
                                                    <td><?=$titulopregunta->NRPregunta?> | <span class="text-danger"> <?=$titulopregunta->TotalPreguntas?> </span></td>
                                                    <td>
                                                        <?php if(count($TituloPreguntaConfiguracion)):?>
                                                    <button <?=(count($TituloPreguntaConfiguracion)==1)?'disabled':null?> type="button" value="<?=$titulopregunta->IDTituloPregunta?>"
                                                                onclick="Pa_ETituloPregunta(this.value)"
                                                                class="btn btn-danger btn-xs">
                                                                Eliminar
                                                    </button>
                                                        <?php endif;?>
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
    
    function modalAgregarAsignatura() {
        $("#modalAgregar").modal('show');
    }

    function generarCongifuracionTituloPregunta(){
        var CDTPNivel = $("#CDTPNivel").select2('val');
        var NRPregunta = $("#NRPregunta").val();

        var params = {
            'CDTPNivel' : CDTPNivel,
            'NRPregunta' :NRPregunta
        };
        //console.log(params,"parametros para el pa")
        $.ajax({
        type: "POST",
        url: "<?=base_url();?>AreaMantenedor/Pa_ITituloPregunta/<?=$TituloPreguntaConfiguracion[0]->IDTitulo?>/<?=$TituloPreguntaConfiguracion[0]->IDAsignatura?>",
        data: params,

        success: function(obj) {
            $.SmartMessageBox({
                title: 'Aviso',
                content: 'Cantidad de preguntas actualizada/ingresada con Éxito',
                buttons: '[Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Aceptar') {
                    location.reload();
                }
            });
        
        }
        });

    }

    function Pa_ETituloPregunta(IDTituloPregunta) {

                var ObjParam = {
                    'IDTituloPregunta': IDTituloPregunta,
                }
                //console.log(ObjParam, "id")

                $.SmartMessageBox({
                title:'Eliminar configuración Examen',
                content:'¿Está seguro que desea eliminar la configuración?',
                buttons:'[Cancelar][Eliminar]'  
                },function(ButtonPress,value){
                    if(ButtonPress=='Cancelar'){
                        //console.log('c')
                    }else if(ButtonPress=='Eliminar'){
                        //console.log('a')
                        $.ajax({
                        type: "POST",
                        url: "<?=base_url();?>AreaMantenedor/Pa_ETituloPregunta/"+IDTituloPregunta,
                        data: ObjParam,

                        success: function(obj){
                            //console.log(obj,"asignatura eliminada")
                            $.SmartMessageBox({
                                title:'Eliminación Exitosa',
                                content:'Se eliminó con éxito la configuración de examen',
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
