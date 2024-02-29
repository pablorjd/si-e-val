<?php foreach($prueba as $key=>$asignatura):?>
    <?=json_encode($prueba)?>
<div class="col-md-3">

    <div class="panel panel-info">
        <div class="panel-heading"><?=$asignatura['asignatura']['GLAsignatura']?> + <?=$asignatura["nivel"]["GLNivel"]?>
         <button type="button" id="btnEliminarArea" value="1" onclick="" class=" float-right btn btn-danger btn-xs"><i class="fa fa-times"></i>
                                                </button>
                                            </div>
        <div class="panel-body">
            <ul class="list-group">
                <?php foreach ($asignatura["asignatura"]["Preguntas"] as $key =>$pregunta):?>
                    <?=json_encode($pregunta)?>
                <li class="list-group-item">
                <button type="button" id="btnEliminarArea" value="1" onclick="" class=" float-rightbtn btn-danger btn-xs"><i class="fa fa-times"></i>
                                                </button></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<?php endforeach;?>