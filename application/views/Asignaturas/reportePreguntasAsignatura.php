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
             <li>Reporte de preguntas y respuestas por Asignatura</li>

         </ol>
     </div>

     <div id="content">
         <div class="row">
             <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                 <h1 class="page-title txt-color-blueDark">
                     <i class="fa-fw fa fa-graduation-cap"></i>
                     Reporte de preguntas y respuestas por Asignatura
                 </h1>

             </div>

         </div>


        
         <section id="widget-grid" class="">
             <div class="row">
                 <article class="col-lg-11">
                     <div class="jarviswidget jarviswidget-color-darken">
                         <header>
                             <span class="widget-icon"> </span>
                             <h2>Reporte de preguntas y respuestas por la Asignatura de <?=$asignatura[0]->GLAsignatura?></h2>

                         </header>
                         <div>
                             <div class="widget-body" id="calendarioExamen">

                                 <div class="row visibleCalendarioExamen">
                                     

                                     <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">

                                         <table id="tablaTituloExamen" class="table table-striped table-bordered"
                                             style="width:100%">
                                             <thead>
                                                 <tr>
                                                     <th>#</th>
                                                     <th>Nivel</th>
                                                     <th>Cantidad de Preguntas por Nivel</th>
                                                     <th>Ver PDF</th>
                                                     
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 
                                                 <?php foreach($getNivel as $key => $item ) { ?>
                                                 <tr>
                                                     <td><?=($key+1)?></td>
                                                     <td><?=$item->GLTPNivel?></td>
                                                     <td>
                                                        <?=$item->contador?> 
                                                     </td>
                                                     <td>
                                                         <?php if($item->contador == 0):?>
                                                         <a class="btn btn-success btn-xs" disabled
                                                             href="<?=base_url()?>Asignaturas/Pa_BPreguntaPorAsignatura/<?=$asignatura[0]->IDAsignatura?>/<?=$item->CDTPNivel?>">
                                                             Ver PDF
                                                         </a>
                                                        <?php else:?>
                                                            <a class="btn btn-success btn-xs" 
                                                             href="<?=base_url()?>Asignaturas/Pa_BPreguntaPorAsignatura/<?=$asignatura[0]->IDAsignatura?>/<?=$item->CDTPNivel?>">
                                                             Ver PDF
                                                         </a>
                                                        <?php endif;?>
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
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
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

 </script>
 <script src="<?=base_url();?>assets/js/moment.min.js"></script>