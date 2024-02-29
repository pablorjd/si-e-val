<?php
$time=time();
?>
<center><h4><b>Personas por Área <?=$Area->GLTPArea?> </b>
 <button type="button" value="6" onclick="modalAgregarPersona(<?=$Area->CDTPArea?>,'<?=$Area->GLTPArea?>')" class="btn btn-success btn-xs">                      Agregar Persona
                            <i class="fa fa-plus"></i>
                        </button> </h4></center>
            <table id="<?=$time?>" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>RUT</th>
                                                    <th>Nombre</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($PersonasSieval as $key=>$persona):?>
                                            <tr>
                                            <td><?=($key+1)?></td>
                                            <td><?=($persona->NRRut)?> - <?=($persona->DVerificador)?></td>
                                            <td><?=($persona->Nombre)?></td>
                                            <td>
                                            <div class="btn-group">
                                                        <button area="" id="" type="button" value="" title="Eliminar de esta Area" onclick="eliminarAreaPersona(<?=($persona->IDPersona)?>,<?=$Area->CDTPArea?>)" 
                                                        class="btn btn-danger btn-xs"><i class="fa fa-times"></i>
                                                    Eliminar  
                                                    </button>
                                                        <!--button area="" id="" type="button" value="" title="Ver Areas de esta persona" onclick="verAreasPersona(<?=($persona->IDPersona)?>)" class="btn btn-primary btn-xs"><i class="fa fa-list"></i>
                                                    Ver Areas asociadas   
                                                    </button-->
                                                       
</div>

                                            </td>
                                            </tr>
                                            <?php endforeach?>
                                            </tbody>
                                       
                                        </table>
                                
                                        
                                    </div>



                                </div>

                                <script>
                                     $('#<?=$time?>').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ de _END_ de _TOTAL_ Personas",
            "infoEmpty": "Mostrando 0 de 0 de 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total Personas)",
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
    function eliminarAreaPersona(IDPersona,CDTPArea){
        //modaleliminar
        $.SmartMessageBox({
	       			title:'Eliminar Persona del Área',
	       			content:'¿Está seguro que desea eliminar esta persona de esta Área?',
	       			buttons:'[Cancelar][Eliminar]'	
	       			},function(ButtonPress,value){
		       			if(ButtonPress=='Cancelar'){
		       				//console.log('c')
		       			}else if(ButtonPress=='Eliminar'){
                            //console.log('Eliminar persona')
                            //return;
							$.ajax({
							type: "POST",
							url: "<?=base_url();?>AreaMantenedor/PA_EAreaPersona/"+IDPersona+"/"+CDTPArea,
							

							success: function(obj){

								//console.log(obj,"Persona eliminada")
                                accionArea(1,CDTPArea);
                                location.reload();

								
							}
						})
		       			}
	       			}
	       		);



    }
    function verAreasPersona(IDPersona){
        $("#modalAreasPersona").modal('show');
    }
    function cerrarModalAgregarPersona(){
        $("#btnCerrarModalAgregarPersonaArea").click();
        setTimeout(function(){
            accionArea(1,<?=$Area->CDTPArea?>)
            //console.log("accion area")
            location.reload();

        }, 500);
         //accionArea(1,<?=$Area->CDTPArea?>)
    }
    function agregarPersonaArea(){
        var IDpersona =$("#IDPersonaEncontrada option:selected").val();
        
       
        $.ajax({
        type: "POST",
        url: "<?=base_url();?>AreaMantenedor/guardarAreaPersona/"+IDpersona+"/<?=$Area->CDTPArea?>",
        //data: ObjParam,
        success: function(obj) {
          
            $("#ModalAgregarPersonaContenido").html(obj)
            //opc, CDTPArea
            cerrarModalAgregarPersona();
           
           
           
        },
        error: function(err) {
            alert("algo no funciona");
            //console.log(err, "Error al actualizar");
        }
    })
    }

    
    $("#formBuscarRut").submit(function(e){
        e.preventDefault();
        $.ajax({
        type: "POST",
        url: "<?=base_url();?>AreaMantenedor/modalAgregarPersonaArea/"+$("#CDTPareaBuscado").val()+"/"+$("#rutBuscado").val(),
        //data: ObjParam,
        success: function(obj) {
            $("#ModalAgregarPersonaContenido").html(obj)           
           
        },
        error: function(err) {
            alert("algo no funciona");
            //console.log(err, "Error al actualizar");
        }
    })
    });
    function modalAgregarPersona(CDTPArea,GLTPArea){
        $("#modalAgregarPersona").modal('show');
        $("#GLTPAreaBuscada").html(GLTPArea);    
        $("#CDTPareaBuscado").val(CDTPArea);    

    }
                                </script>
    <div id="modalAgregarPersona" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modalColorHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Persona para <span id="GLTPAreaBuscada"></span></h4>
            </div>
            <br>
            <div class="container-fluid">
            <form id="formBuscarRut">
                
            <center><h4>Ingrese al menos los 4 primeros dígitos del rut sin Dígito verificador</h4></center>
            <hr>
                <input type="hidden" name="CDTPareaBuscado" id="CDTPareaBuscado">
            <input  required type="number" min="1000" max="99999999" name="rutBuscado" id="rutBuscado" minlength="4" class="form-control"
                               required="true">
                               <hr>
               <center> <button type="submit"> Buscar</button></center>
            </form>
               
            </div>
           
            
            <div id="ModalAgregarPersonaContenido" class="modal-body">
              
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCerrarModalAgregarPersonaArea" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
    <div id="modalAreasPersona" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modalColorHeader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Actualizar Asignatura</h4>
            </div>
            <div class="modal-body">
                <form class="needs-validation">
                     <input type="hidden" name="IDAsignaturaActualizar" id="IDAsignaturaActualizar">                               
                    <div class="form-group">
                        <label for="GLAsignatura">Glosa Asignatura</label>
                        <input type="text" name="asignatura" class="form-control" id="GLAsignaturaActualizar"
                               required="true">
                    </div>
                    <div class="form-group">
                        <input type="text" name="NRRutUsuario" style="display:none" class="form-control"
                            id="NRRutUsuario" value="<?=$_SESSION["NRRutUsuario"]?>" required="true">
                    </div>
                    <div class="alert alert-danger" role="alert" id="alerta" style="display:none;margin-bottom:15px;">
                        ¡Todos los campos deben ser completados!
                    </div>
                    <input type="button" onclick="actualizarAsignatura();" class="btn btn-primary"
                        value="Actualizar" style="margin-top:15px;" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

                            
           