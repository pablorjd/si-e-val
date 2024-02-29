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
                            <div class="widget-body">


                                <div>
                                    <h3>Generar Examen 
                                    <?php foreach($asignaturas as $key=>$asignatura):?>
                                                <h4><?=$asignatura->GLAsignatura?></h4>
                                    <?php endforeach;?>
                                    </h3>
                                    <div>
                                        <?php if(count($errores)>0):?>
                                            <div class="alert alert-danger" role="alert">
                                        <?php foreach($errores as $key=>$error):?>
                                            <p><?=$error?></p>
                                        <?php endforeach;?>
                                        </div>
                                        <?php endif;?>
                                   
                                       
                                        

                                        
                                            
                                        <!-- <ul class="list-group">
                                            <?php foreach($reparticiones as $key => $reparticion):?>
                                               
                                                
                                            <li class="list-group-item">
                                                <input type="hidden" name="" id="<?=$reparticion['Glreparticion']?>">
                                                <h4><b><?=$reparticion['Glreparticion']?></b>
                                                <?php foreach ($asignaturas as $key => $asignatura):?>

                                                    <?php endforeach;?>
                                                    <?=date_format(new DateTime($reparticion['FCAsignatura']),'d,m,Y');?>
                                                    <!-- <input type="hidden" name="IDDetalleCalendario" id="IDDetalleCalendario"
                                                            value="<$reparticion['IDDetalleCalendario']?>"> -->
                                                    <input type="hidden" name="FCAsignatura" id="FCAsignatura"
                                                            value="<?=$reparticion['FCAsignatura']?>">
                                                </h4>
                                            </li>
                                               
                                            <?php endforeach;?>
                                        </ul> -->
                                    </div>
                                    <?=$vistapreguntas?>

                                    <ul class="list-group">
                                            <form id="formCrearExamen">
                                        <li class="list-group-item" id="asignatutaITEM">
                                            <div class="container-fluid">
                                                
                                                    <div class="row">
                                                        <input type="hidden" name="IDAsignatura"
                                                            value=">">
                                                        <div class="col-md-4">
                                                            <span>Prema</span>
                                                            <input type="number" class="form-control" id="NRPuntajeAprueba"
                                                                min="10" max="100" 
                                                                required="true" pattern="^[0-9]+">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <span>Puntaje</span>
                                                            <input type="number" class="form-control"
                                                                id="NRPuntaje" min="10" max="100"
                                                                required="true"
                                                                pattern="^[0-9]+">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <span>Duración en Minutos</span>
                                                            <input type="number" class="form-control"
                                                                id="NRDuracionminuto" min="10" max="100"
                                                                required="true"
                                                                pattern="^[0-9]+">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 offset">
                                                            <span style="color: white">hola</span>
                                                            <button
                                                               type="submit"
                                                                style="margin: 20" type="button"
                                                                class="btn btn-danger form-control"
                                                                <?=(count($errores)>0)?"disabled":null?>
                                                                >Generar
                                                                Examen 
                                                            </button>
                                                        </div>
                                                        <!--div class="col-md-4 offset">
                                                            <button
                                                               type="submit"
                                                                style="margin: 20" type="button"
                                                                class="btn btn-success form-control">Vista Previa
                                                            </button>
                                                        </div-->
                                                        </div>
                                                    </div>

                                            </div>
                                        </li>
                                        </form>
                                                        
                                       

                                        <script>
                                            $(document).ready(function() {
                                                $("#formCrearExamen").submit(function(e){
                                                    e.preventDefault();
                                                    console.log("valido")
                                                    //return;
                                                    crearExamenEdumar();
                                                    
                                                });
                                            });
                                        </script>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
            </div><?php json_encode($asignaturas)?>
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

<script>



function crearExamenEdumar(IDAsignatura) {

var puntajeTotalGlobal =$("#NRPuntaje").val();
var NRDuracionminuto = $("#NRDuracionminuto").val(); //ok
var LGBorrador = '1';
var NRRutUsuario = <?=$_SESSION["NRRutUsuario"]?>;
//ok
var prema = $("#NRPuntajeAprueba").val();
var i = 0;

varObjParam = {
    'IDDetalleCalendario': <?= json_encode($iddetallecalendario)?>,
    'puntajeTotalGlobal': puntajeTotalGlobal,
    'NRDuracionminuto': NRDuracionminuto,
    'LGBorrador': LGBorrador,   
    'NRRutUsuario': NRRutUsuario,
    'IDAsignatura': IDAsignatura,
    'idPreguntas': <?= json_encode($idpreguntas)?>,
    'prema': prema,
    'preguntasOrdenadas' : JSON.parse(JSON.stringify(preguntasOrdenadas))
};
console.log(varObjParam)
//return;
$.ajax({
    type: "POST",
    url: "<?=base_url();?>Evaluaciones/crearExamenEdumar",
    data: varObjParam,

    success: function(obj) {
        console.log(obj);
        $.SmartMessageBox({
            title: 'Aviso',
            content: 'Creación realizada con Éxito',
            buttons: '[Aceptar]'
        }, function(ButtonPress, value) {
            location.href = "<?=base_url();?>Evaluaciones/listaExamenes";
           
        });
    },
    error: function(error) {
        console.error("Problemas con la creación  ", error);
         
    }
})
}

function getPreguntasExamen() {

    var result = [];
    //var result2 = {};
    var i = 0;
    var nivel = $("#nivel").select2('val');
    var puntajeTotalGlobal = $("#puntaje").val();

    $("input[type=checkbox]").each(function(index, item) {
        if (this.checked) {
            result.push(item.value);
            //result2 = item.value;
        }
    });
    ObjParam = {
        'result': result,
        'nivel': nivel
    };
    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Evaluaciones/getPreguntasExamen",
        // data: {'ObjParam': JSON.stringify(result)},
        data: ObjParam,

        success: function(obj) {
            console.log(obj, "objeto")
            var puntajeTotal = puntajeTotalGlobal / obj.preguntas.length
            $.each(obj.preguntas, function(i, item) {
                $("#pregunta").append("<tr>" +
                    "<td>" + (i + 1) + "</td>" +
                    "<td>" + item.GLPregunta + "</td>" +
                    "<td>" +
                    "<input type='number' disabled='true'  idPregunta='" + item.IDPregunta +
                    "' class='form-control' value='" + puntajeTotal + "'>" +
                    "<input type='checkbox' checked='true' name='preguntas[]' style='display:none' value='" +
                    item.IDPregunta + "'>" +
                    "</td>" +
                    "</tr>" +
                    "<tr>" +

                    "</tr>");
                puntajeTotalGlobal = puntajeTotalGlobal - puntajeTotal;

            });

            localStorage.setItem("preguntas", obj)
            console.log(puntajeTotalGlobal, "puntaje despues del descuento");


        },
        error: function(error) {
            console.error("Problemas  ", error);

            $.SmartMessageBox({
                title: 'Error!',
                content: 'Problemas al cargar los datos',
                buttons: '[Volver][Aceptar]'
            }, function(ButtonPress, value) {
                if (ButtonPress == 'Volver') {
                    location.href = "<?=base_url();?>Evaluaciones/evaluaciones";
                }
            });

        }
    })

}
</script>