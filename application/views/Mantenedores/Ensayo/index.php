<?php
    $this->load->view('Complement/header');
    $time = time();
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
            <li>Habilitar Ensayos en Edumar</li>

        </ol>
    </div>

    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa-fw fa fa-graduation-cap"></i>
                    Habilitar Ensayos en Edumar
                </h1>

            </div>

        </div>

        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2>Lista Títulos y Matrículas | Para Ensayo</h2>
                        </header>
                        <div>
                            <div class="widget-body" id="calendarioExamen">

                                <div class="row visibleCalendarioExamen">
       
                                    <br>

                                    <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                                        <?php if(isset($_SESSION["mensaje"])):?>
                                        <li class="list-group-item list-group-item-success">
                                            <?=$_SESSION["mensaje"]?>
                                        </li>
                                        <br>
                                        <?php unset($_SESSION["mensaje"])?>
                                        <?php endif?>

                                        <table id="<?=$time?>" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre Título o Matricula</th>
                                                    <th>Tipo</th>
                                                    <th>Puntaje</th>
                                                    <th>Preguntas</th>
                                                    <th>Prema</th>
                                                    <th>Duracción en Minutos</th>
                                                    <th>Estado</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                                <?php foreach($Titulos as $key => $titulo ) : ?>
                                                <?php if(isset($titulo->NMTitulo)):?>
                                                <tr>
                                                    <td><?=($key+1)?></td>
                                                    <td><?=$titulo->NMTitulo?></td>
                                                    <td><?=$titulo->GLTPTitulo?></td>
                                                    <td>
                                                        <input type="number" value="<?=$titulo->NRPuntaje?>"  onchange="Pa_UTituloPracticaNRPuntaje(<?=($titulo->IDTituloPractica)?>, this.value)">
                                                    </td>
                                                    <td>
                                                        <input type="number" value="<?=$titulo->NRPregunta?>"  onchange="Pa_UTituloPracticaNRPregunta(<?=($titulo->IDTituloPractica)?>, this.value)">
                                                    </td>
                                                    <td>
                                                        <input type="number" value="<?=$titulo->NRPrema?>"  onchange="Pa_UTituloPracticaNRPrema(<?=($titulo->IDTituloPractica)?>, this.value)">
                                                    </td>
                                                    <td>
                                                        <input type="number" value="<?=$titulo->NRDuracion?>" onchange="Pa_UTituloPracticaNRDuracion(<?=($titulo->IDTituloPractica)?>, this.value)">
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <?php if(!isset($titulo->FCTermino)):?>
                                                            <span
                                                                class="label label-success badge-pill">Habilitado</span>
                                                            <!-- <button type="button" disabled value=""
                                                                            class="btn btn-success btn-xs">Habilitado
                                                                    </button> -->
                                                            <?php else:?>
                                                            <span
                                                                class="label label-danger badge-pill">Deshabilitado</span>
                                                            <!-- <button type="button" disabled value=""
                                                                        class="btn btn-danger btn-xs">Deshabilitado
                                                                </button> -->
                                                            <?php endif;?>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="btn-group">
                                                            <?php if(isset($titulo->FCTermino)):?>
                                                            <button type="button" value="1" id="habilitar"
                                                                onclick="habilitar('<?=($titulo->IDTituloPractica)?>','<?=$titulo->NMTitulo?>')"
                                                                class="btn btn-success btn-xs">Habilitar

                                                            </button>
                                                            <?php else:?>
                                                            <button type="button" value=""
                                                                onclick="deshabilitarEnsayo(<?=($titulo->IDTituloPractica)?>,'<?=$titulo->NMTitulo?>')"
                                                                class="btn btn-danger btn-xs">Deshabilitar
                                                            </button>
                                                            <?php endif;?>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <?php endif;?>
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

<!-- NAV VAR -->
<?php $this->load->view('Complement/footer');?>
<script src="<?=base_url();?>assets/js/plugin/ckeditor/ckeditor.js"></script>
<script src="<?=base_url();?>assets/js/libs/AjaxUpload.2.0.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#<?=$time?>').DataTable({
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
});
function Pa_UTituloPracticaNRDuracion(IDTituloPractica, NRDuracion){

$.ajax({
    type: "get",
    url: "<?=base_url();?>EnsayoController/Pa_UTituloPracticaNRDuracion/" + IDTituloPractica + "/" + NRDuracion,
    success: function(obj) {
        console.log(obj);
        // $.SmartMessageBox({
        //     title: 'Aviso',
        //     content: 'Acción realizada',
        //     buttons: '[Aceptar]'
        // }, function(ButtonPress, value) {

        // });
        location.reload();
    },
    error: function(err) {
        alert("algo no funciona");
        console.log(err, "Error al actualizar");
    }
})

}

function Pa_UTituloPracticaNRPrema(IDTituloPractica, NRPrema){

$.ajax({
    type: "get",
    url: "<?=base_url();?>EnsayoController/Pa_UTituloPracticaNRPrema/" + IDTituloPractica + "/" + NRPrema,
    success: function(obj) {
        console.log(obj);
        // $.SmartMessageBox({
        //     title: 'Aviso',
        //     content: 'Acción realizada',
        //     buttons: '[Aceptar]'
        // }, function(ButtonPress, value) {

        // });
        location.reload();
    },
    error: function(err) {
        alert("algo no funciona");
        console.log(err, "Error al actualizar");
    }
})

}
//Pa_UTituloPracticaNRPregunta
function Pa_UTituloPracticaNRPregunta(IDTituloPractica, NRPregunta){

$.ajax({
    type: "get",
    url: "<?=base_url();?>EnsayoController/Pa_UTituloPracticaNRPregunta/" + IDTituloPractica + "/" + NRPregunta,
    success: function(obj) {
        console.log(obj);
        // $.SmartMessageBox({
        //     title: 'Aviso',
        //     content: 'Acción realizada',
        //     buttons: '[Aceptar]'
        // }, function(ButtonPress, value) {

        // });
        location.reload();
    },
    error: function(err) {
        alert("algo no funciona");
        console.log(err, "Error al actualizar");
    }
})

}
function Pa_UTituloPracticaNRPuntaje(IDTituloPractica, NRPuntaje){

    $.ajax({
        type: "get",
        url: "<?=base_url();?>EnsayoController/Pa_UTituloPracticaNRPuntaje/" + IDTituloPractica + "/" + NRPuntaje,
        success: function(obj) {
            console.log(obj);
            // $.SmartMessageBox({
            //     title: 'Aviso',
            //     content: 'Acción realizada',
            //     buttons: '[Aceptar]'
            // }, function(ButtonPress, value) {

            // });
            location.reload();
        },
        error: function(err) {
            alert("algo no funciona");
            console.log(err, "Error al actualizar");
        }
    })

}

function habilitar(IDTituloPractica, NMTitulo) {

    var opc = $("#habilitar").val();
    $.SmartMessageBox({
        title: "¿Está seguro de habilitar ensayo para " + NMTitulo + "?",

        buttons: '[Cancelar][Habilitar]'
    }, function(ButtonPress, value) {
        if (ButtonPress == 'Habilitar') {
            Pa_UHabilitarEnsayo(opc, IDTituloPractica)
        }
    });
}

function Pa_UHabilitarEnsayo(opc, IDTituloPractica) {


    $.ajax({
        type: "get",
        url: "<?=base_url();?>EnsayoController/Pa_UHabilitarEnsayo/" + opc + "/" + IDTituloPractica,
        success: function(obj) {
            console.log(obj);
            $.SmartMessageBox({
                title: 'Aviso',
                content: 'Acción realizada',
                buttons: '[Aceptar]'
            }, function(ButtonPress, value) {

            });
            location.reload();
        },
        error: function(err) {
            alert("algo no funciona");
            console.log(err, "Error al actualizar");
        }
    })
}

function deshabilitarEnsayo(IDTituloPractica, NMTitulo) {


    $.SmartMessageBox({
        title: "¿Está seguro de deshabilitar ensayo para " + NMTitulo + "?",

        buttons: '[Cancelar][Deshabilitar]'
    }, function(ButtonPress, value) {
        if (ButtonPress == 'Deshabilitar') {
            Pa_UHabilitarEnsayo(0, IDTituloPractica)
        }
    });
}
</script>