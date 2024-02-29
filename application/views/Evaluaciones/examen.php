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
                            <h2> Listado-Evaluaciones.</h2>

                        </header>
                        <div>
                            <div class="widget-body" id="calendarioExamen">
                            <form action="<?=base_url()?>/Evaluaciones/generarExamenPDF" method="post" target="_blank">
                                <input type="hidden" name="IDFormatoExamen" value="<?=$listaExamen[0]->IDFormatoExamen?>">
                                <button type="submit" class="btn btn-danger pull-right">Ver PDF</button>
                            </form>
                            
                                <div class="row visibleCalendarioExamen">
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">

                                        <table id="tablaTituloExamen" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Pregunta </th>
                                                    <th>Respuesta</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($listaExamen as $key => $item ) { ?>
                                                <tr>
                                                    <td><?=($key+1)?></td>
                                                    <td>
                                                        <?=$item->GLPregunta?>
                                                        <?=$item->IDPregunta?>
                                                    </td>
                                                    <td>
                                                        <?php foreach($item->Respuestas as $key=>$respuesta): ?>
                                                        <p><?=$respuesta->GLRespuesta?></p>
                                                        <?php endforeach; ?>
                                                    </td>

                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Pregunta</th>
                                                    <th>Respusta</th>
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
</script>
<script src="<?=base_url();?>assets/js/moment.min.js"></script>