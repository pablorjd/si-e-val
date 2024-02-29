<?php json_encode($configuraciones)?>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<?php foreach($configuraciones as $key=>$asignatura):?>
    <table class="tg">
<thead>
  <tr>
    <th class="tg-0lax" colspan="2"><?=$asignatura->GLAsignatura?></th>
  </tr>
</thead>
<tbody>
    <?php foreach($asignatura->configuraciones as $key=>$config):?>
        <tr>
            <td class="tg-0lax">Nivel: <?=($config->GLTPNivel)?></td>
            <td class="tg-0lax">Cant. Preguntas: <?=($config->NRPregunta)?></td>
        </tr>
    <?php endforeach;?>

</tbody>
</table><br>
<?php endforeach;?>
