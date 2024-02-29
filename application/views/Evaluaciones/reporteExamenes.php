<?php
	$this->load->view('Complement/header');
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div id="main" role="main">
    <div id="ribbon">
        <span class="ribbon-button-alignment">
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"
                data-placement="bottom" data-html="true">
                <i class="fa fa-refresh"></i>
            </span>
        </span>

        <ol class="breadcrumb">
            <li>Exámenes</li>

        </ol>
    </div>

    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa-fw fa fa-graduation-cap"></i>
                    Exámenes
                </h1>

            </div>

        </div>

        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2> Listado-Exámenes.</h2>


                        </header>
                        <div>
                            <div class="widget-body" id="calendarioExamen">
                                <div class="row visibleCalendarioExamen">
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">

                                        <h3>Listado Exámenes</h3>
                                        <div class="table-responsive">
                                            <table id="tablaTituloExamen" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Titulo</th>
                                                        <th>Asignatura</th>
                                                        <th>Fecha</th>
                                                        <th>Ver Preguntas</th>
                                                        <th>Ver Examen</th>
                                                        <!-- <th>Hoja de Respuesta</th> -->
                                                        <th>Pauta de Corrección</th>
                                                        <th>Pauta de Corrección Desarrollo</th>
                                                        <th>Eliminar</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach($listaExamenes as $key => $item ) { ?>
                                                    <tr>
                                                        <td><?=($key+1)?></td>
                                                        <td><?=$item->NMTitulo?></td>
                                                        <td><?=$item->GLAsignatura?></td>

                                                        <td><?= date("d/m/Y", strtotime($item->FCAsignatura))?></td>
                                                        <!-- <td><=$item->FCAsignatura?></td> -->

                                                        <!-- <td><($item->LGBorrador == 0)?"Borrador":"Listo"?></td> -->
                                                        <!-- <td>
                                                        <form action="<?=base_url();?>Evaluaciones/verExamen" method="POST">
                                            
                                                        <input name="NMTitulo" type="text" hidden="true" value="<?=$item->NMTitulo?>">
                                                        <input name="IDFormatoExamen" type="text" hidden="true" value="<?=$item->IDFormatoExamen?>">
                                                        <button  type="submit" class="btn btn-default btn-block">Ver Examen</button>
                                                        </form>
                                                        
                                                        </td> -->

                                                        <td>

                                                            <a href="<?=base_url()?>Preguntas/getPreguntasPorIDFormatoExamen/<?=$item->IDFormatoExamen?>"
                                                                class="btn btn-danger">Ver</a>


                                                        </td>
                                                        <td>
                                                            <form style="display: inline;" target="_blank"
                                                                action="<?=base_url();?>Evaluaciones/generarExamenPDF"
                                                                method="POST">
                                                                <input name="IDFormatoExamen" type="text" hidden="true"
                                                                    value="<?=$item->IDFormatoExamen?>">
                                                                <input name="NMTitulo" type="text" hidden="true"
                                                                    value="<?=$item->NMTitulo?>">
                                                                <button type="submit" class="btn btn-danger btn-sm">Ver
                                                                    PDF</button>
                                                            </form>
                                                        </td>

                                                        <!-- <td>
                                                            <form  style="display: inline;" target="_blank"  action="<?=base_url();?>Evaluaciones/SetPreguntaPDF/<?=$item->NMTitulo?>" method="POST">
                                                            <input name="NMTitulo" type="text" hidden="true" value="<?=$item->NMTitulo?>">
                                                            <input name="IDFormatoExamen" type="text" hidden="true" value="<?=$item->IDFormatoExamen?>">
                                                                <button type="submit" class="btn btn-danger">Ver PDF</button>
                                                            </form>
                                                        </td> -->
                                                        <!-- <td>
                                                            <form  style="display: inline;" target="_blank"  action="<?=base_url();?>Evaluaciones/generarHojaRespuesta" method="POST">
                                                            <input name="IDFormatoExamen" type="text" hidden="true" value="<?=$item->IDFormatoExamen?>">
                                                            <input name="NMTitulo" type="text" hidden="true" value="<?=$item->NMTitulo?>">
                                                                <button type="submit" class="btn btn-danger btn-sm">Hoja de Respuesta</button>
                                                            </form>
                                                        </td> -->
                                                        <td>
                                                            <form style="display: inline;" target="_blank"
                                                                action="<?=base_url();?>Evaluaciones/generarPautaCorreccion"
                                                                method="POST">
                                                                <input name="IDFormatoExamen" type="text" hidden="true"
                                                                    value="<?=$item->IDFormatoExamen?>">
                                                                <input name="NMTitulo" type="text" hidden="true"
                                                                    value="<?=$item->NMTitulo?>">
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Pauta de
                                                                    Corrección</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form style="display: inline;" target="_blank"
                                                                action="<?=base_url();?>Evaluaciones/generarPautaCorreccionDesarrollo"
                                                                method="POST">
                                                                <input name="IDFormatoExamen" type="text" hidden="true"
                                                                    value="<?=$item->IDFormatoExamen?>">
                                                                <input name="NMTitulo" type="text" hidden="true"
                                                                    value="<?=$item->NMTitulo?>">
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Pauta de Corrección
                                                                    Desarrollo</button>
                                                            </form>
                                                        </td>
                                                        <td>

                                                            <button type="button"
                                                                onclick="seguro('<?=$item->IDFormatoExamen?>')"
                                                                class="btn btn-danger btn-sm">Eliminar Examen</button>

                                                        </td>

                                                    </tr>
                                                    <?php } ?>
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
        responsive: true
    });
});

function seguro(IDExamene) {
    console.log(IDExamene);


    var ObjParam = {
        'IDFormatoExamen': IDExamene,
    }
    //console.log(ObjParam, "id")

    $.SmartMessageBox({
        title: 'Eliminar Examen',
        content: '¿Está seguro que desea eliminar el Examen?',
        buttons: '[Cancelar][Eliminar]'
    }, function(ButtonPress, value) {
        if (ButtonPress == 'Cancelar') {
            //console.log('c')
        } else if (ButtonPress == 'Eliminar') {
            //console.log('a')
            $.ajax({
                type: "POST",
                url: "<?=base_url();?>Evaluaciones/eliminarExamen",
                data: ObjParam,

                success: function(obj) {
                    //console.log(obj,"asignatura eliminada")
                    $.SmartMessageBox({
                        title: 'Eliminación Exitosa',
                        content: 'Se eliminó con éxito el Examen',
                        buttons: '[Aceptar]'
                    }, function(ButtonPress, value) {
                        if (ButtonPress == 'Aceptar') {
                            location.reload();
                        }
                    });
                    location.reload();
                }
            })
        }
    });

}
</script>
<script src="<?=base_url();?>assets/js/moment.min.js"></script>