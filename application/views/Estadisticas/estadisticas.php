

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
            <li>Estadísticas</li>

        </ol>
    </div>

    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa-fw fa fa-graduation-cap"></i>
                    Estadísticas
                </h1>

            </div>

        </div>

        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2>Estadísticas.</h2>
                        </header>
                        <div>
                            <div class="widget-body">

                                <div class="row">

                                    <div class="container">
                                        <h2>Graficas Estadísticas</h2>
                                    </div>

                                    <div id="exTab2" class="container">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#1" data-toggle="tab">Preguntas</a>
                                            </li>
                                            <!-- <li><a href="#2" data-toggle="tab">Exámenes realizados</a>
                                            </li>
                                            <li><a href="#3" data-toggle="tab">Solution</a>
                                            </li> -->
                                        </ul>

                                        <div class="tab-content ">
                                            <div class="tab-pane active" id="1">
                                                <h3>Estadísticas información Preguntas</h3>
                                                    <div class="row">
                                                        
                                                        <div class="col-md-6">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                    </h5>
                                                                    <canvas id="myChart3" width="300" height="300"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Estadísticas información Preguntas
                                                                        por Asignatura
                                                                    </h5>
                                                                    <canvas id="myChart1" width="300" height="300"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="tab-pane" id="2">
                                                <h3>Notice the gap between the content and tab after applying a
                                                    background color
                                                </h3>
                                                <canvas id="canvas"></canvas>
                                                <button id="randomizeData">Randomize Data</button>
                                                    <button id="addDataset">Add Dataset</button>
                                                    <button id="removeDataset">Remove Dataset</button>
                                                    <button id="addData">Add Data</button>
                                                    <button id="removeData">Remove Data</button>
                                            </div>
                                            <div class="tab-pane" id="3">
                                                <h3>add clearfix to tab-content (see the css)</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    </hr>

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


<script type="text/javascript">
$(document).ready(function() {
    totalPreguntas();
    Asignaturacount();
});

function totalPreguntasAsignatura() {

}

function tipoPregunta() {

}

function totalPreguntas() {

    var titulos = ['Total Alternativa', 'Total Desarrollo', 'Total Activas', 'Total nivel Dificil', 'Total nivel Medio',
        'Total nivel Fácil', 'Total otro nivel', 'Total Preguntas'
    ];

    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Estadisticas/totalPreguntas",
        //data: ObjParam,

        success: function(obj) {
            //console.log(obj, "hola");

            var ctx1 = document.getElementById('myChart3').getContext('2d');
            var myChart3 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: titulos,
                    datasets: [{
                        label: 'Preguntas: ',
                        data: [obj.totalPreguntas[0].totalAlternativa,
                            obj.totalPreguntas[0].totalDesarrollo,
                            obj.totalPreguntas[0].totalActivas,
                            obj.totalPreguntas[0].niveldificiles,
                            obj.totalPreguntas[0].nivelmedio,
                            obj.totalPreguntas[0].nivelfacil,
                            obj.totalPreguntas[0].nivelotro,
                            obj.totalPreguntas[0].totalPreguntas
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    })
}

function Asignaturacount() {

    var asignatura = [];
    var cantidad = [];

    $.ajax({
        type: "POST",
        url: "<?=base_url();?>Estadisticas/Asignaturacount",
        //data: ObjParam,

        success: function(obj) {
            //console.log(obj)

            $.each(obj.Asignaturacount, function(i, item) {
                cantidad.push(item.cantidad)
                asignatura.push(item.asignatura)
            })
            var ctx = document.getElementById('myChart1').getContext('2d');
            var myChart1 = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: asignatura,
                    datasets: [{
                        label: 'Preguntas por Asignatura: (' + obj.Asignaturacount.length +
                            ' Total asignaturas)',
                        data: cantidad,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            // 'rgba(54, 162, 235, 0.2)',
                            // 'rgba(255, 206, 86, 0.2)',
                            // 'rgba(75, 192, 192, 0.2)',
                            // 'rgba(153, 102, 255, 0.2)',
                            // 'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            // 'rgba(54, 162, 235, 1)',
                            // 'rgba(255, 206, 86, 1)',
                            // 'rgba(75, 192, 192, 1)',
                            // 'rgba(153, 102, 255, 1)',
                            // 'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    })
}
</script>
<script src="<?=base_url();?>assets/js/moment.min.js"></script>