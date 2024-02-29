<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Guía Usuario Sieval</title>
        <link rel="icon" type="image/x-icon" href="<?=base_url()?>assets/guia/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <!-- <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script> -->
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?=base_url()?>assets/guia/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger">
                <span class="d-block d-lg-none">Guía Usuario Sieval</span>
                <span class="d-none d-lg-block"><img class="img-fluid mx-auto mb-2" src="<?=base_url()?>assets/img/logotecmar.png" alt="" /></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#examen">Examénes</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#preguntas">Preguntas</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#asignaturas">Asignaturas</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#tituloasignatura">Título / Asignatura</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#habilitartitulos">Habilitar Títulos</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#habilitarensayos">Habilitar Ensayos EDUMAR</a></li>
                    <li class="nav-item mt-4 mb-4"><a class="nav-link js-scroll-trigger btn btn-sm btn-danger" href="<?=base_url()?>">Iniciar Sesión</a></li>
                    <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#tarifa">Tarifa / Prerrequisito</a></li> -->
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        Guía Usuario 
                        <span class="text-primary">Sieval</span>
                    </h1>
                    <div class="subheading mb-1">
                        INICIO 
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Experience-->
            <section class="resume-section" id="examen">
                <div class="resume-section-content">
                    <h2 class="mb-5">Examénes</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Generación de exámenes</h3>    
                            <div class="subheading mb-3">En esta sección de la aplicación podrá ver:</div>
                            <ul class="list-group mb-4">
                                <li class="list-group-item">La gestión de exámenes con agenda realizada por medio de la aplicación EDUMAR</li>
                                <li class="list-group-item">El listado de exámenes realizados previamente </li>
                                <li class="list-group-item">Creación de exámenes sin previo agendamiento</li>
                            </ul>
                            <img src="<?=base_url()?>assets/guia/img/examenes.png" alt="" class="img-fluid">
                        </div>
                        
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Listado exámenes realizados</h3>
                            <div class="subheading mb-3">En esta sección se podrá la lista de exámenes realizados, ya sea con agenda previa o sin ella, además de imprimir los distintos reportes que son necesarios para el desarrollo del proceso de examinación.</div>
                            <img src="<?=base_url()?>assets/guia/img/listadoexamenes.png" alt="" class="img-fluid">
                        </div>        
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Exámenes sin agenda previa</h3>
                            <div class="subheading mb-3">En esta sección se podrá la realizar exámenes sin una agenda previa en la aplicación EDUMAR</div>
                            <img src="<?=base_url()?>assets/guia/img/sinagenda.PNG" alt="" class="img-fluid">
                        </div>        
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Education-->
            <section class="resume-section" id="preguntas">
                <div class="resume-section-content">
                    <h2 class="mb-5">Preguntas</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Mantenedor Preguntas</h3>    
                            <div class="subheading mb-3">En la sección de PREGUNTAS de la aplicación podrá ver:</div>
                            <ul class="list-group mb-4">
                                <li class="list-group-item">Reporte total Preguntas con filtro de búsqueda (Preguntas revisadas cuentan con marca de color verde)</li>
                                <li class="list-group-item">Actualización y/o Eliminación Preguntas </li>
                                
                            </ul>
                            <img src="<?=base_url()?>assets/guia/img/preguntasindex.PNG" alt="" class="img-fluid">
                        </div>
                        
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Actualización y/o Eliminación Preguntas </h3>
                            <div class="subheading mb-3">En esta sección se podrá actualizar la pregunta seleccionada.</div>
                            <img src="<?=base_url()?>assets/guia/img/preguntaeditar.PNG" alt="" class="img-fluid">
                        </div>  
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Generación nueva pregunta </h3>
                            <div class="subheading mb-3">En esta sección se podrá generar nuevas preguntas, ya sea de alternativa o desarrollo.</div>
                            <img src="<?=base_url()?>assets/guia/img/preguntanueva.PNG" alt="" class="img-fluid">
                        </div>  
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Edición Alternativa</h3>
                            <div class="subheading mb-3">En esta sección se podrá actualizar las alternativas, para las preguntas que son de desarrollo la edición es en un cuadro de iguales características en el cual se general las preguntas.</div>
                            <img src="<?=base_url()?>assets/guia/img/edicionPregunta.PNG" alt="" class="img-fluid">
                        </div>  
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Skills-->
            <section class="resume-section" id="asignaturas">
                <div class="resume-section-content">
                    <h2 class="mb-5">Asignaturas</h2>
                    <div class="subheading mb-3"></div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Reporte Asignatura</h3>    
                            <div class="subheading mb-3">En esta sección de la aplicación podrá ver:</div>
                            <ul class="list-group mb-4">
                                <li class="list-group-item">Actualización de las Asignaturas</li>
                                <li class="list-group-item">Eliminación Asignaturas </li>
                                <li class="list-group-item">Cantidad de preguntas por asignaturas</li>
                            </ul>
                            <img src="<?=base_url()?>assets/guia/img/asignatura/index.PNG" alt="" class="img-fluid">
                        </div>
                        
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Actualización de las Asignaturas</h3>
                            <div class="subheading mb-3">En este apartado de la aplicación se puede gestionar la actualización de la glosa de una asignatura, además de la creación de una nueva para fines del desarrollo de nuevos exámenes.</div>
                            <h4 class="mb-1">IMG 1 Nueva Asignatura</h4>
                            <img src="<?=base_url()?>assets/guia/img/asignatura/nuevaasignatura.PNG" alt="" class="img-fluid">
                            <h4 class="mb-1 mt-1">IMG 2 Edición Asignatura</h4>
                            <img src="<?=base_url()?>assets/guia/img/asignatura/edicionasig.PNG" alt="" class="img-fluid">
                        </div>
                        
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Cantidad de preguntas por asignaturas</h3>
                            <div class="subheading mb-3">Listado de preguntas en relación a una asignatura, donde además de eso se puede generar un reporte con las preguntas y respuestas respectivamente.</div>
                            <h4 class="mb-1 mt-1">IMG 1 Reporte</h4>
                            <img src="<?=base_url()?>assets/guia/img/asignatura/reportePreguntaPorAsignatura.PNG" alt="" class="img-fluid">
                        </div>
                        
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            
            <section class="resume-section" id="tituloasignatura">
                <div class="resume-section-content">
                    <h2 class="mb-5">Título / Asignatura</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Asignaturas por título y cantidad de preguntas y su nivel</h3>    
                            <div class="subheading mb-3">En esta sección de la aplicación podrá ver:</div>
                            <ul class="list-group mb-4">
                                <li class="list-group-item">Reporte de los títulos</li>
                                <li class="list-group-item">Configuración exámenes </li>
                            </ul>
                            <h4 class="mb-1 mt-1">IMG 1 Reporte</h4>
                            <img src="<?=base_url()?>assets/guia/img/tituloasignatura/index.PNG" alt="" class="img-fluid">
                        </div>
                        
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Configuración exámenes</h3>
                            <div class="subheading mb-3">Relación de las asignaturas con los títulos con la finalidad de la generación de los exámenes.</div>
                            <img src="<?=base_url()?>assets/guia/img/tituloasignatura/configuracionexamen.PNG" alt="" class="img-fluid">
                        </div>
                        
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Awards-->
          
            <section class="resume-section" id="habilitartitulos">
                <div class="resume-section-content">
                    <h2 class="mb-5">Habilitar Títulos (¡No se puede generar nuevos títulos en sieval!)</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <!-- <h3 class="mb-0">Habilitacion </h3>     -->
                            <div class="subheading mb-3">En esta sección de la aplicación podrá ver:</div>
                            <ul class="list-group mb-4">
                                <li class="list-group-item">La habilitación de títulos para la plataforma EDUMAR.</li>
                                <!-- <li class="list-group-item">El listado de exámenes realizados previamente </li>
                                <li class="list-group-item">Creación de exámenes sin previo agendamiento</li> -->
                            </ul>
                            <h4 class="mb-1 mt-1">IMG 1 Reporte</h4>
                            <img src="<?=base_url()?>assets/guia/img/habilitaciontitulos/index.PNG" alt="" class="img-fluid">
                            <h4 class="mb-1 mt-1">IMG 2 Edición Asignatura</h4>
                            <img src="<?=base_url()?>assets/guia/img/habilitaciontitulos/reportetitulo.PNG" alt="" class="img-fluid">
                        </div>
                        
                    </div>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Listado exámenes realizados</h3>
                            <div class="subheading mb-3">En esta sección se podrá la lista de exámenes realizados, ya sea con agenda previa o sin ella, además de imprimir los distintos reportes que son necesarios para el desarrollo del proceso de examinación.</div>
                            <img src="<?=base_url()?>assets/guia/img/listadoexamenes.png" alt="" class="img-fluid">
                        </div>
                        
                    </div>
                </div>
            </section>




          
            <section class="resume-section" id="habilitarensayos">
                <div class="resume-section-content">
                    <h2 class="mb-5">Habilitar ensayos Edumar</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <!-- <h3 class="mb-0">Generación de exámenes</h3>     -->
                            <div class="subheading mb-3">En esta sección de la aplicación podrá ver:</div>
                            <ul class="list-group mb-4">
                                <li class="list-group-item">La gestión de ensayos para la aplicación EDUMAR y la cantidad de preguntas, puntaje, Prema y duración en minutos de los ensayos</li>
                                <!-- <li class="list-group-item">El listado de exámenes realizados previamente </li>
                                <li class="list-group-item">Creación de exámenes sin previo agendamiento</li> -->
                            </ul>
                            <img src="<?=base_url()?>assets/guia/img/ensayos/index.PNG" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </section>


               
            <section class="resume-section" id="areapersona">
                <div class="resume-section-content">
                    <h2 class="mb-5">Área / Persona</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Gestión Personas SIEVAL</h3>    
                            <div class="subheading mb-3">En esta sección de la aplicación podrá ver:</div>

                            <h4 class="mb-1 mt-1">IMG 1 Gestión</h4>
                            <img src="<?=base_url()?>assets/guia/img/areapersona/index.PNG" alt="" class="img-fluid">

                            <h4 class="mb-1 mt-1">IMG 2 Agregar Persona</h4>
                            <img src="<?=base_url()?>assets/guia/img/areapersona/controlareapersona.PNG" alt="" class="img-fluid">
                        </div>
                        
                    </div>
                    <!-- <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Listado exámenes realizados</h3>
                            <div class="subheading mb-3">En esta sección se podrá la lista de exámenes realizados, ya sea con agenda previa o sin ella, además de imprimir los distintos reportes que son necesarios para el desarrollo del proceso de examinación.</div>
                            <img src="<?=base_url()?>assets/guia/img/listadoexamenes.png" alt="" class="img-fluid">
                        </div>
                        
                    </div> -->
                </div>
            </section>

            <!-- pablo-->
            <!-- <section class="resume-section" id="tarifa">
                <div class="resume-section-content">
                    <h2 class="mb-5">Tarifa / Prerrequisitos</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Generación de exámenes</h3>    
                            <div class="subheading mb-3">En esta sección de la aplicación podrá ver:</div>
                            <ul class="list-group mb-4">
                                <li class="list-group-item">La gestión de exámenes con agenda realizada por medio de la aplicación EDUMAR</li>
                                <li class="list-group-item">El listado de exámenes realizados previamente </li>
                                <li class="list-group-item">Creación de exámenes sin previo agendamiento</li>
                            </ul>
                            <img src="<?=base_url()?>assets/guia/img/examenes.png" alt="" class="img-fluid">
                        </div>
                        
                    </div> -->
                    <!-- <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Listado exámenes realizados</h3>
                            <div class="subheading mb-3">En esta sección se podrá la lista de exámenes realizados, ya sea con agenda previa o sin ella, además de imprimir los distintos reportes que son necesarios para el desarrollo del proceso de examinación.</div>
                            <img src="<?=base_url()?>assets/guia/img/listadoexamenes.png" alt="" class="img-fluid">
                        </div>
                        
                    </div> -->
                </div>
            </section>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?=base_url()?>assets/guia/js/scripts.js"></script>
    </body>
</html>
