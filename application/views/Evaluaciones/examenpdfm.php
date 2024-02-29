<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style>

body{
        font-size: 12px;;
    }
footer {
    position: fixed;
    bottom: -20px;
    left: 0px;
    right: 0px;
    height: 60px;
    font-size: 12px !important;

    /** Extra personal styles **/
    background-color: #FFFF;
    color: black;
    text-align: center;
    line-height: 25px;
}
p {
  /* border: black 1px solid; */
  width: 70%;
  position: relative;
  justify-content: right;
  /* Los navegadores no hacen caso de esta propiedad */
}
.ali{
    text-decoration: none;
    align-content: center;
    font-size: 15px;
    text-align: center;
    width: 100%;
    margin-left: 7.5px;
}
</style>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>SIEVAL</title>
</head>
<!-- < json_encode($listaExamen[9]);exit;?> -->
<body>


    <div style="border: salmon">
    <div style="border: salmon">
        <table style="width:100%" class="titulo">
            <tr>
                <th></th>
            </tr>
            <tr>
                <td style=" border: 1px solid black; border-collapse: collapse;">
                    <!-- <div> -->
                        <p class="ali" align="center" style="text-align: center !important;"> ARMADA DE CHILE
                            DIRECCIÓN GENERAL DEL TERRITORIO MARÍTIMO Y DE MARINA MERCANTE
                            DIRECCIÓN DE INTERESES MARÍTIMOS Y MEDIO AMBIENTE ACUÁTICO
                            CENTRO DE INSTRUCCIÓN Y CAPACITACIÓN MARÍTIMA
                            <br>
                            EXAMEN
                        </p>
                    <!-- </div> -->
                </td>

            </tr>
        </table>
    </div>

        <p align="center" style="text-align: center !important;">
           <center> EJECUCIÓN DE LA EVALUACIÓN DE COMPETENCIA E X A M E N </center><br><center><h3> <?=$NMTitulo?></h3></center><hr>
        </p>
    </div>
    <div>
    </div>
    <div>
        <p>
            INSTRUCCIONES
        </p>

        <p>Lea atentamente las instrucciones que a continuacion se indican.</p>

        <ol style="text-align:justify">
            <li>Este examen consta de <?=count($listaExamen)?> preguntas y Ud. dispone de <?=$listaExamen[0]->NRDuracionminuto?> minutos para responderlo.</li>
            <li>No raye el cuestionario de preguntas, debe devolverlo al término de la evaluación. Utilice la hoja de
                respuestas, escribiendo su nombre en está y dejando registrados todos los cálculos. Use lápiz pasta azul
                o negro.</li>
            <!--li>El Patrón de Rendimiento Mínimo Aceptable (PREMA) es de <?=$listaExamen[0]->NRPuntajeAprueba?>%. El postulante aprueba con <?=count($listaExamen)/$listaExamen[0]->NRPuntajeAprueba?> puntos como
                mínimo. La escala de notas es de 1,0 a 10,0. Se aprueba con nota mínima 3,0.</li-->
            <li>El Patrón de Rendimiento Mínimo Aceptable (PREMA) es de <?=$listaExamen[0]->NRPuntajeAprueba?>%.</li>
            <li>Los formularios de papel están permitidos previa revisión del evaluador. No se permite el uso de
                notebooks o similares, tales como tablets, smartphones, smartwatches y/o dispositivos electrónicos
                similares.</li>
            <li>Los teléfonos celulares deberán permanecer apagados y en el lugar que se indique hasta el término del
                examen. Está prohibida la reproducción total o parcial de este contenido por cualquier medio, por lo que
                esta estrictamente prohibido utilizar cualquier dispositivo electrónico para obtener fotografías o
                grabaciones, tales como: celulares, relojes inteligentes, cámaras fotográficas, grabadoras de sonido,
                etc.</li>
            <li>Utilizar solo calculadoras científicas básicas.</li>
            <li>No se permite salir de la sala, durante la evaluación</li>
        </ol>


    </div>

    <div>

        <P>
            Preguntas  
        </P>

        <!-- <div style="width: 80%;"> -->

        <div style="border: salmon">
        <div style="border: salmon">

            <table id="tablaTituloExamen">
                <thead>
                    <tr>
                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php $variable = array('a)','b)','c)','d)');?>
                
                  

                    <?php foreach($listaExamen as $key => $item ) { 
                            $Cadena=trim(str_replace("\n", '',trim($item->GLPregunta)));
                            
                            $Cadena = str_replace("&nbsp;", " ", $Cadena);
                            $Cadena = preg_replace('/\s+/', ' ',$Cadena);
                            $Cadena = trim($Cadena);

                            $Cadena = trim($Cadena, " \t\n\r\0\x0B\xC2\xA0");
                            $Cadena = trim(html_entity_decode($Cadena), " \t\n\r\0\x0B\xC2\xA0");


                            //$Cadena= str_replace(base_url(),'',$Cadena);//=strip_tags($Cadena,'<p><img><table><tr><td><th><tbody><tfoot><strong><u>');
                        ?>
                    <tr>
                        
                        <?php if ($item->CDTPPregunta == 1) : ?>
                            <td>
                                <p style="background-color:#D1C3C1;"> <?=($key+1).' )'?> Pregunta de la Asignatura <?=$item->Asignaturas[0]->GLAsignatura?></p>
                                <p><?=$Cadena?></p>
                                
                                <?php foreach($item->Respuestas as $key=>$respuesta): ?>
                                
                                <p>  
                                        <?=$variable[$key]?>
                                    <?=(trim(str_replace("\n", '',trim($respuesta->GLRespuesta))))?>

                                    
                                </p>
                                
                                <?php endforeach; ?>
                                
                            </td>
                        <?php else:?>
                            <td>
                                <p style="background-color:#D1C3C1;"> <?=($key+1).' )'?> Pregunta de la Asignatura <?=$item->Asignaturas[0]->GLAsignatura?></p>
                                <p><?=$Cadena?></p>
                                
                                <!-- <img src="<?= $item->GLRutaIMGPregunta?>" alt=""> -->
<!--                                 
                                <php foreach($item->Respuestas as $key=>$respuesta): ?>
                                
                                <p><(trim(str_replace(base_url(),'',str_replace("\n", '',trim($respuesta->GLRespuesta)))))?></p>
                                
                                <php endforeach; ?> -->
                            </td>
                        <?php endif;?>
                    </tr>
                    <?php }
                    ?>

                </tbody>
            </table>
            <div style="page-break-after:always;"></div>
            <?php 
  //echo json_encode($listaExamen[0]->IDFormatoExamen);
// Store a string into the variable which 
// need to be Encrypted 
$simple_string =$listaExamen[0]->IDFormatoExamen; 
  
// Display the original string 
//echo "Original String: " . $simple_string; 
  
// Store the cipher method 
$ciphering = "AES-128-CTR"; 
  
// Use OpenSSl Encryption method 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 
  
// Non-NULL Initialization Vector for encryption 
$encryption_iv = '1234567891011121'; 
  
// Store the encryption key 
$encryption_key = "GeeksforGeeks"; 
  
// Use openssl_encrypt() function to encrypt the data 
$encryption = openssl_encrypt($simple_string, $ciphering, 
            $encryption_key, $options, $encryption_iv); 
            // Display the encrypted string 
//echo  $encryption; 

// Non-NULL Initialization Vector for decryption 
$decryption_iv = '1234567891011121'; 
  
// Store the decryption key 
$decryption_key = "GeeksforGeeks"; 
  
// Use openssl_decrypt() function to decrypt the data 
$decryption=openssl_decrypt ($encryption, $ciphering,  
        $decryption_key, $options, $decryption_iv); 
  
// Display the decrypted string 
//echo "<br><br><br>" . $decryption; 
            ?>

        </div>
    </div>

    <!-- <footer>

        <hr>
        <p style="size: 25px;margin: 3px 0;font-size: 15px"> Armada de Chile - Dirección del Territorio Marítimo y
            Marina Mercante &copy; <?php echo date("Y");?>

            <p style="margin: 3px 0;font-size: 12px"><b>Código de validación: <?=$encryption?></b> / Para validar examen
                visitar sieval.dgtm.cl/validar</p>
        </p>
    </footer> -->
</body>

</html>