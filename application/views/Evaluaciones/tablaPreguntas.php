<?php
$time=time();
?>

<table id="<?=$time?>"  class="table ">
      <thead>
   <tr>
  <th scope="col">#</th>
  <th scope="col">Pregunta</th>
  <!-- <th scope="col">Puntaje</th> -->
 </tr>
</thead>
<tbody id="pregunta">
     
        <?php foreach($preguntas as $key=>$pregunta):?>
            <tr>
                <td>
                    <h4><b><?=($key+1)?></b></h4>
                </td>
                <td>
                    <?=($pregunta->Detalle[0]->GLPregunta)?>
                    <?php json_encode($pregunta->Detalle[0])?>
                </td>
                <input type="checkbox"disabled="true" hidden="true" checked="true" name="preguntas[]" value="<?=$pregunta->Detalle[0]->IDPregunta?>">
                <!-- <input type="checkbox"disabled="true" hidden="true" checked="true" name="asignaturas[]" value="<?=$pregunta->Detalle[0]->IDPregunta?>"> -->
                <!-- <td>
                    <input type="text" disabled class="form-control" id="puntajePregunta">
                </td> -->
            </tr>
        <?php endforeach; ?>
    </tbody>
    
    </table>
    <script>

$(document).ready(function() {
    function desactivarBtnCrearExamen(){
        $("#btnCrearExamen").attr("disabled","disabled");
    }
    function desactivarBtnCrearExamenSinAsignatura(){
        $("#btnCrearExamenEdumarSinAsignatura").attr("disabled","disabled");
    }
    function activarBtnCrearExamenSinAsignatura(){
        $("#btnCrearExamenEdumarSinAsignatura").removeAttr("disabled");
    }
<?php if(count($preguntas)==0):?>
    desactivarBtnCrearExamen();
    //console.log(<?=count($preguntas)?>)
<?php endif;?>
<?php if($numPreguntas>count($preguntas)):?>
    desactivarBtnCrearExamenSinAsignatura();
    //console.log(<?=count($preguntas)?>)
 <?php else :?>
 activarBtnCrearExamenSinAsignatura()   
<?php endif;?>

    $('#<?=$time?>').DataTable({
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
   