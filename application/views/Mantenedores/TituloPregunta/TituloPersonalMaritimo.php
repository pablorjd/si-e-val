 
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
            <li>Títulos y Matrículas / Personal Marítimo</li>
 
        </ol>
    </div>
 
    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa-fw fa fa-graduation-cap"></i>
                    Títulos y Matrículas / Personal Marítimo
                </h1>
 
            </div>
 
        </div>
 
        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2>Lista de Títulos y Matrículas / Personal Marítimo</h2>
 
                        </header>
                        <div>
                            <div class="widget-body" id="calendarioExamen">
 
                                <div class="row visibleCalendarioExamen">
                                    <!-- <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-md-offset-8">
                                        <a href="<?=base_url()?>AreaMantenedor/configurarTituloPregunta" class="btn btn-success pull-rigth" style="margin-bottom: 20px;">Agregar configuración Examen </a>
                                       
                                    </div> -->
                                    <?php json_encode($TitulosNOSieval[0])?>
                                    <br>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
                                    <table id="tablaTituloPersonalMaritimo" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre Título / Matrícula</th>
                                                    <th>Tipo</th>
                                                    <th>Área</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($TitulosNOSieval as $key => $Titulo ) : 
                                                    $nameForm=$key; ?>
                                                <tr>    
                                                
                                                    
                                                            <td><?=($key+1)?></td>
                                                            <td><?=($Titulo->NMTitulo)?></td>
                                                            <td><?=($Titulo->IDTPTitulo == 1)?'Título':'Matrícula'?></td>
                                                             <form id="agregarTitulo<?=($nameForm)?> method="POST" action="<?=base_url()?>AreaMantenedor/Pa_ITitulo/<?=$Titulo->CDTitulo?>/<?=$Titulo->IDTPTitulo?>">
                                                            
                                                            <td>
                                                               <select  class="select2" style="width: 100%" name="area" id="area<?=$area->CDTPArea?>" required>
                                                                    <option value="">Seleccione</option>	
                                                                    <?php if(isset($getAreas)):?>
                                                                        <?php foreach ($getAreas as $key => $area):?>
                                                                            <option value="<?=$area->CDTPArea;?>"><?=$area->GLTPArea;?></option>	
                                                                        <?php endforeach;?>
                                                                    <?php endif;?>
                                                                </select>	
                                                            </td>
                                                            <td><button type="submit" class="btn btn-primary btn-block">Agregar</button></td>
                                                            <script>
                                                                $(document).ready(function () {
                                                                $("#agregarTitulo<?=$nameForm?>").submit(function (e) {
                                                                        e.preventDefault();
                                                                        //agregarTituloMatricula(<?=$Titulo->CDTitulo?>,<?=$Titulo->IDTPTitulo?>,<?=$area->CDTPArea?>)
                                                                        //console.log("hola");return;
                                                                        
                                                                    });
                                                                });
                                                            </script>    
                                                        </form> 
                                                       
                                                    
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
<!-- NAV VAR -->
<?php $this->load->view('Complement/footer');?>
<script src="<?=base_url();?>assets/js/plugin/ckeditor/ckeditor.js"></script>
<script src="<?=base_url();?>assets/js/libs/AjaxUpload.2.0.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
 
<script type="text/javascript">
$(document).ready(function() {
    $('#tablaTituloPersonalMaritimo').DataTable({
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

function agregarTituloMatricula(CDTitulo,CDTPTitulo,CDTPArea){

    var area = $("#area"+CDTPArea).select2('val')
    var params = {
        'area' : area
    }
    console.log(CDTitulo,CDTPTitulo,CDTPArea,params);
    //return;

    // $.ajax({
    //     type: "POST",
    //     url: "<?=base_url();?>AreaMantenedor/Pa_ITitulo/"+CDTitulo+"/"+CDTPTitulo/Area,
    //     data: params,
    //         success: function(obj){
    //             console.log(obj,"parametros")
    //             location.reload();
                   
    //         }
    // })
}
 

</script>
<script src="<?=base_url();?>assets/js/moment.min.js"></script>
 
 