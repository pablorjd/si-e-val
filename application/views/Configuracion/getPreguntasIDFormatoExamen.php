<table id="tablaTituloExamen" class="table table-striped table-bordered" style="width:auto">
     <thead>
         <tr>
             <th>#</th>
             <th>Pregunta</th>
             <th>Acción</th>
         </tr>
     </thead>
     <tbody>
         <h3>Preguntas
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"
                    data-placement="bottom" data-html="true">
                    <i class="fa fa-refresh"></i> Cargar Nuevas Preguntas
            </span>
        </h3>
         <?php foreach($preguntas as $key => $item ) { ?>
         <tr>
             <td><?=($key+1)?></td>
             <td><?=$item->GLPregunta?></td>
             <td>
             <!-- http://10.16.153.89/pabloj/pablo/sievalCompletoQA/Preguntas/getPregunta/13/1 -->
                 <a href="<?=base_url()?>Preguntas/getPregunta/<?=$item->IDPregunta?>/<?=$item->IDAsignatura?>"
                     class="btn btn-danger" target="_blank">Editar</a>
             </td>
         </tr>
         <?php } ?>
     </tbody>
 </table>
<script>
 var preguntasOrdenadas = <?= json_encode($preguntas)?>;
//console.log(preguntasOrdenadas)
 </script>