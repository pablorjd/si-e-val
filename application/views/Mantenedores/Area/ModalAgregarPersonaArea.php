<form class="needs-validation">
    <center><h4>Seleccione de la lista de resultados</h4></center>
    <?php json_encode($personas)?>
    <hr>
                              <div class="form-group">
                                  
                                  <select style="width: 100%" type="text" name="IDPersonaEncontrada"  id="IDPersonaEncontrada"
                                         required="true">
                                         <?php foreach($personas as $key=>$persona):?>
                                            <option value="<?=$persona->IDPersona?>"> <?=$persona->Nombre?> (<?=$persona->NRRut?> - <?=$persona->DVerificador?>)</option>
                                         <?php endforeach;?>
                                       
                                          </select>
                                  <!--input style="margin-top:15px;"  type="text" disabled name="personaBuscada" class="form-control" id="personaBuscada"
                                         -->
                              </div>
                              <center>
                              <input type="button" onclick="agregarPersonaArea()" class="btn btn-primary"
                                  value="Agregar Persona" style="margin-top:15px;" />
                              </center>
                              
                          </form>
                          <script>
                              $('#IDPersonaEncontrada').select2();
                          </script>