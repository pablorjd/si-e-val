<?php

	$Iden=date('U');
?>

<div class="row" style="margin-top: 10px;">





    <button onclick="marcarTodas()" style="display: none;">marcar todas </button>
    <div class="col-md-12">



        <table class="table table-bordered" style="width: 100%" id="tablaPreguntas">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Pregunta</th>
                    <th>Area</th>
                    <th>Nivel</th>
                    <th>Asignatura</th>
                    <th>Tipo Pregunta</th>
                    <th>Pregunta Revisada</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($preguntas as $key=>$p):?>
                <tr <?=(count($p->PreguntaRevisada)>0)? 'class="success"' : NULL ?>>
                    <td><?=($key+1)?></td>
                    <td><?=str_replace('\n','',strip_tags($p->GLPregunta))?></td>
                    <td><?=$p->GLTPArea?></td>
                    <td><?=$p->GLTPNivel?></td>
                    <td><?=$p->GLAsignatura?></td>
                    <td id="tpPregunta"><?=(($p->CDTPPregunta==1)?"Alternativa":"Desarrollo")?></td>
                    <td id="preguntaRevisada"><?=(count($p->PreguntaRevisada)>0)? 'Revisada' : 'No Revisada' ?></td>

                    <td>
                        <a class="btn btn-primary btn-xs"
                            href="<?=base_url().'Preguntas/getPregunta/'.$p->IDPregunta.'/'.$p->IDAsignatura?>"><i
                                class="fa fa-pencil"></i>Actualizar</a>
                    </td>
                    <td>
                        <button onclick="eliminarPregunta(this.value)" value="<?=$p->IDPregunta?>"
                            class="btn btn-danger btn-xs"><i class="fa fa-times"></i>Eliminar</button>
                    </td>
                </tr>
                <?php endforeach;?>

            </tbody>
        </table>


    </div>
</div>

<script src="<?=base_url();?>assets/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

<script>
$(document).ready(function() {


    $('#tablaPreguntas').dataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ de _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 de 0 of 0 Entradas",
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
})
$(".select2-hidden-accessible").hide()





function marcarTodas() {
  
    var pregunta = (<?=json_encode($preguntas)?>);


    $.each(pregunta, function(index, item) {
        console.log(item.IDPregunta)
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>Preguntas/marcarrevisada/"+item.IDPregunta,
            beforeSend: function() {
                console.log(item.IDPregunta,"antes de almacenar")
            },

            success: function(obj) {
                console.log(obj);

            }
        })
    });




}
</script>