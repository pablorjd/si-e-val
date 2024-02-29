

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
            <li>Exámenes</li>

        </ol>
    </div>

    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa-fw fa fa-graduation-cap"></i>
                    Exámenes
                    |<a  class="btn btn-success btn-xs"  href="<?=base_url()?>Evaluaciones/listaExamenes">
                             Ver lista de Exámenes
                    </a>
                </h1>

            </div>

        </div>

        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2>Exámenes.</h2>
                        </header>
                        <div>
                            <div class="widget-body" id="calendarioExamen">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-md-offset-7">
                                        <a class="btn btn-success pull-right" href="<?=base_url();?>Evaluaciones/examensinAgendaPrevia" >
                                            Crear Examen sin agenda previa
                                        </a>
                            </div>
                             <br><br><br><br>

                                <div class="row visibleCalendarioExamen">


                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">

                                        <table id="tablaTituloExamen" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Fecha</th>
                                                    <th>Título Calendario Examen</th>
                                                    <th>Repartición</th>
                                                    <th>Examen por Asignatura</th>
                                                    <th>Examen Consolidado</th>
                                                    <!-- <th>Examen Configuracion Personalizada</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php json_encode($buscarExamenCalendario[0])?>
                                                <?php if ($buscarExamenCalendario == 0): ?>
                                                    <h3>No se registra agenda con examenes</h3>
                                                <?php else: ?>
                                                    <?php foreach($buscarExamenCalendario as $key => $item ) { ?>
                                                        <?php if(isset($item->Calendarios[0]->LGBorrador)):?>

                                                        <?php else:?>
                                                            <tr>
                                                                
                                                                <td><?=($key+1)?></td>
                                                                <td><?= date("d/m/Y H:i", strtotime($item->FCAsignaturaMin))?>
                                                                    </td>
                                                                <td><?=$item->NMTitulo?></td>
                                                                <input type="checkbox" style="display: none" disabled="true" name="idTitulos[]" id="idTitulos" checked=true value="<?=$item->IDTitulo?>">
                                                                <td><?=$item->Glreparticion?></td>
                                                                <td>
                                                                    <?php if($item->DetalleCalendarios[0]->IDAsignatura !=0):?>
                                                                        <form action="<?=base_url();?>Evaluaciones/generarExamenConAsignaturasEdumar" method="POST">
                                                                        <a  class="btn btn-default btn-block" href="<?=base_url()."Configuracion/buscarAsignaturasPorCalendarioExamen/".$item->IDCalendario."/".$item->IDTitulo?>">Generar</a>
                                                                        </form>
                                                                    <?php else:?>
                                                                        <button disabled class="btn btn-default btn-block">Sin Examenes</button>
                                                                    <?php endif;?>
                                                                </td>
                                                                <td>
                                                                    <?php if($item->DetalleCalendarios[0]->IDAsignatura == 0):?>
                                                                        <a  class="btn btn-default btn-block" href="<?=base_url()."Configuracion/buscarAsignaturasPorCalendarioExamen/".$item->IDCalendario."/".$item->IDTitulo."/".$item->DetalleCalendarios[0]->IDDetalleCalendario?>">Generar</a>
                                                                    <?php else:?>
                                                                        <button disabled class="btn btn-default btn-block">Sin Examenes</button>
                                                                    <?php endif;?>
                                                                </td>
                                                               

                                                            </tr>
                                                         <?php endif;?>
                                                    <?php } ?>
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
            "info": "Mostrando _START_ de _END_ de _TOTAL_ Exámenes",
            "infoEmpty": "Mostrando 0 de 0 de 0 Exámenes",
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

    var idTitulos = []
    $('input[name="idTitulos[]"]:checked').each(function(index, item) {
        if (this.checked) {
            idTitulos.push(item.value);
            //result2 = item.value;
           // //console.log(idTitulos,"id de los titulos")
        }
    });
    //preguntas(idTitulos);
});

// function preguntas(IDTitulo){
//     //console.log(idTitulos, " de la funcion ")
//     varObjParam = {
//         'IDTitulo' : IDTitulo
//     }
//     //console.log(varObjParam,"paametro idcalendario")

//     $.ajax({
//              type: "POST",
//              url: "<?=base_url();?>Evaluaciones/test2",
//              data: varObjParam,

//              success: function(obj){
//                     //console.log(obj)
//                 },
//                 error : function(error){
//                     //console.error("Problemas con la creación  ",error);

//                 }
//      })


// }

function selectorExamen(item){
    ////console.log(JSON.parse(item),"este es el item del btn")
    //buscarExamenCalendarioID
    var IDCalendario =  item
    //console.log(IDCalendario)
    if (IDCalendario == '') {
        $.SmartMessageBox({
                        title:'Error!',
                        content:'Error',
                        buttons:'[Aceptar]'
                        },function(ButtonPress,value){
                            if(ButtonPress=='Aceptar'){
                                location.reload();
                            }
                        }
                    );
    }


    varObjParam = {
        'IDCalendario' : IDCalendario
    }
    //console.log(varObjParam,"paametro idcalendario")

    $.ajax({
                type: "POST",
                url: "<?=base_url();?>Evaluaciones/buscarExamenCalendarioID",
                data: varObjParam,

                success: function(obj){
                    //console.log(obj)
                    if (obj.buscarExamenCalendarioID.length >= 1) {
                        $("#calendarioExamen").css("display","none")
                        $("#creacionExamen").removeAttr('style')

                        $("#datetimepicker1").val(obj.buscarExamenCalendarioID.FCAsignaturaMin);
                        $("#").val();
                        $("#").val();
                        $("#").val();
                    }

                },
                error : function(error){
                    //console.error("Problemas con la creación  ",error);

                }
        })
}
</script>
<script src="<?=base_url();?>assets/js/moment.min.js"></script>