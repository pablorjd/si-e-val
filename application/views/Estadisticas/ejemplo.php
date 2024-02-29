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
                                            <li><a href="#2" data-toggle="tab">Exámenes realizados</a>
                                            </li>
                                            <li><a href="#3" data-toggle="tab">Solution</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content ">
                                            <div class="tab-pane active" id="1">
                                                <h3>Standard tab panel created on bootstrap using nav-tabs</h3>
                                                    <div class="row">
                                                        
                                                        <div class="col-md-6">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Estadísticas información Preguntas
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


<!--

 <div class="widget-body" style="display: none">
                                <div class="row visibleCreacionExamen">
                                    <div class="col-md-3">
                                        <span>Fecha</span>
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='date' id='calendario' class="form-control" onchange="" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <span>Repartición</span>
                                        onchange="LoaderAsignaturas(this.value)" 
                                        <select class="select2" style="width: 100%" id="reparticion">
                                            <option value="-1"></option>
                                            <?php
												if(isset($getReparticiones)){
													
                                                    foreach ($getReparticiones as $key => $s) {
                                                        ?>

                                            <option value="<?=$s->CDRepPersonal;?>"><?=$s->Glreparticion;?></option>
                                            <?php
                                                        }
												}
											?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <span>Prema</span>
                                        <input type="number" class="form-control" id="premaS" min="10" max="100"
                                            onchange="validarNumero(this.value)" required pattern="^[0-9]+">
                                    </div>

                                    <div class="col-md-3">
                                        <span>Duración Exámen</span>
                                        <input type="number" class="form-control" id="duracionExamen" min="10" max="120"
                                            onchange="validarNumero2(this.value)" required pattern="^[0-9]+">
                                    </div>

                                    <div class="col-md-3">
                                        disabled="true"
                                        <button class="btn btn-primary btn-block" style="margin-top: 15px;"
                                            onclick="validarCampos();" id="continuar">Continuar</button>
                                    </div>

                                </div>
                                <br>
                                <div class="row row-siguiente" id="visible" style="display:none">
                                    <div class="col-md-3">
                                        <span>Área</span>
                                        <select class="select2" style="width: 100%" id="area"
                                            onchange="LoaderAsignaturas(this.value),LoaderTitulos(this.value),validarSeleccionado(this.value)">
                                            <option value="-1"></option>
                                            <?php
												if(isset($getAreas)){
													foreach ($getAreas as $key => $s) {
													?>

                                            <option value="<?=$s->CDTPArea;?>"><?=$s->GLTPArea;?></option>
                                            <?php
													}

												}
											?>
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <span>Nivel</span>
                                        <select class="select2" style="width: 100%" id="nivel" required>
                                            <option value="-1"></option>

                                            <?php
												if(isset($getNivel)){
													foreach ($getNivel as $key => $s) {
													?>

                                            <option value="<?=$s->CDTPNivel;?>"><?=$s->GLTPNivel;?></option>
                                            <?php
													}
												}
											?>
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <span>Titulo</span>
                                        <div id="carga-titulo">
                                            <select class="select2" style="width: 100%" id="titulo" disabled="true">
                                                <option value="-1"></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <span>Puntaje</span>
                                        <input type="number" class="form-control" id="puntaje" disabled="true">
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary btn-block" style="margin-top: 15px;"
                                            onclick="getPreguntasExamen();">Buscar preguntas Exámen</button>
                                    </div>
                                </div>

                                <div class="row row-asignatura" style="display:none">
                                    <div class="col-md-12" style="margin-top:20px;">
                                        <span>Asignatura</span>
                                        <div id="carga-asignatura">

                                        </div>
                                    </div>
                                </div>

                                <hr style="height: 2px;">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Visualización</h3>
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <iframe src="<base_url();?>Preguntas/SetPreguntaPDF/<(isset($getPregunta)?$getPregunta[0]->IDPregunta:'');?>" frameborder="0" style="width: 100%; height: 590px;"></iframe>
                                                <table class="table ">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Pregunta</th>
                                                            <th scope="col">Puntaje</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody id="pregunta">
                                                    </tbody>
                                                </table>

                                                <button type="button" class="btn btn-default"
                                                    onclick="generarPDF();">Generar PDF</button>
                                                <button type="button" class="btn btn-default"
                                                    onclick="crearExamen()">Generar Examén</button>


                                            </div>
                                            <div class="col-md-6">

                                                 <iframe
                                                    src="http://localhost/pabloj/sieval/Evaluaciones/vistaPreviaActivaciontest"
                                                    frameborder="0" style="width: 100%; height: 590px;"></iframe> 
                                                 <iframe src="<base_url();?>Preguntas/SetPreguntaPDF/<(isset($getPregunta)?$getPregunta[0]->IDPregunta:'');?>" frameborder="0" style="width: 100%; height: 590px;"></iframe> 

                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>


                                            -->


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





var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var MONTHS1 = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var color = Chart.helpers.color;
		var horizontalBarChartData = {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			datasets: [{
				label: 'Dataset 1',
				backgroundColor:['rgba(255, 99, 132, 0.2)'],
				borderColor:[
                            'rgba(255, 99, 132, 1)',
                            ],
				borderWidth: 1,
				data: [MONTHS1]
			}, {
				label: 'Dataset 2',
				backgroundColor: color('#3368FF').alpha(0.5).rgbString(),
				borderColor: '#3368FF',
				data: [MONTHS1]
			}]

		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myHorizontalBar = new Chart(ctx, {
				type: 'horizontalBar',
				data: horizontalBarChartData,
				options: {
					// Elements options apply to all of the options unless overridden in a dataset
					// In this case, we are setting the border of each horizontal bar to be 2px wide
					elements: {
						rectangle: {
							borderWidth: 2,
						}
					},
					responsive: true,
					legend: {
						position: 'right',
					},
					title: {
						display: true,
						text: 'Chart.js Horizontal Bar Chart'
					}
				}
			});

		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			var zero = Math.random() < 0.2 ? true : false;
			horizontalBarChartData.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return zero ? 0.0 : randomScalingFactor();
				});

			});
			window.myHorizontalBar.update();
		});

		var colorNames = Object.keys(window.chartColors);

		document.getElementById('addDataset').addEventListener('click', function() {
			var colorName = colorNames[horizontalBarChartData.datasets.length % colorNames.length];
			var dsColor = window.chartColors[colorName];
			var newDataset = {
				label: 'Dataset ' + (horizontalBarChartData.datasets.length + 1),
				backgroundColor: color(dsColor).alpha(0.5).rgbString(),
				borderColor: dsColor,
				data: []
			};

			for (var index = 0; index < horizontalBarChartData.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());
			}

			horizontalBarChartData.datasets.push(newDataset);
			window.myHorizontalBar.update();
		});

		document.getElementById('addData').addEventListener('click', function() {
			if (horizontalBarChartData.datasets.length > 0) {
				var month = MONTHS[horizontalBarChartData.labels.length % MONTHS.length];
				horizontalBarChartData.labels.push(month);

				for (var index = 0; index < horizontalBarChartData.datasets.length; ++index) {
					horizontalBarChartData.datasets[index].data.push(randomScalingFactor());
				}

				window.myHorizontalBar.update();
			}
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			horizontalBarChartData.datasets.pop();
			window.myHorizontalBar.update();
		});

		document.getElementById('removeData').addEventListener('click', function() {
			horizontalBarChartData.labels.splice(-1, 1); // remove the label first

			horizontalBarChartData.datasets.forEach(function(dataset) {
				dataset.data.pop();
			});

			window.myHorizontalBar.update();
		});
</script>
<script src="<?=base_url();?>assets/js/moment.min.js"></script>