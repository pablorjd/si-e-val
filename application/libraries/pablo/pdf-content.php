<!DOCTYPE html>
<html>

<head>


    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>HTML Table</h2>

    <table id="reporte" class="table table-sm table-striped table-bordered table-hover display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th title="Número">N°</th>
                    <th title="">N° SAR</th>               
                    <th title="">Ingreso</th>
                    <th title="">Fase</th>
                    <th title="">Estado</th>
                    <th>Etapa</th>
                    <th>R. Responsable</th>
                    <th>R. Activa</th>
                    <th>Cambio Control</th>
                    <th>Nave/Artefacto/Aereonave</th>
                    <th>Persona(s)</th>
                    <th>R. Desactiva</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 1; $i <= 100; $i++):?>
                <tr>
                    <td><?=$i++?></td>
                    <td>aaaaaa</td>
                    <td>ta helao Juan</td>
                    <td>aaaaaa</td>
                    <td>aaaaaa</td>
                    <td>aaaaaa</td>
                    <td>aaaaaa</td>
                    <td>aaaaaa</td>
                    <td>aaaaaa</td>
                    <td>aaaaaa</td>
                    <td>aaaaaa</td>
                    <td>aaaaaa</td>
                    
                    <td>
                        <select class="form-control-sm"> 
                            <option>Seleccione</option>
                            <option> Ver ficha actual</option>                 
                                <option>Ver ficha histórica</option>                 
                                <option>Ver ficja nave</option>                 
                                <option>Ver información</option>                 
                                <option>Ver Cambio de control</option>                 
                                <option>Ver Zona naval asume control</option>                 
                                <option>Ver anulación</option>                 
                                <option>Obtener reporte</option>                 
                                <option>Limpiar</option>                 
                                              
                        </select>
                        
                    </td>
                    
                </tr>
                <?php endfor;?>
                
                
                
                </tr>
    
            
            </tbody>
          
        </table>
    

</body>

</html>