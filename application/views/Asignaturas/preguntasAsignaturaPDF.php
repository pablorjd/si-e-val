<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
footer {
    position: fixed;
    bottom: -20px;
    left: 0px;
    right: 0px;
    height: 60px;

    /** Extra personal styles **/
    background-color: #FFFF;
    color: black;
    text-align: center;
    line-height: 25px;
}
</style>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>SIEVAL</title>
</head>

<body>

    <div style="border: salmon">


        <table style="width:100%" class="titulo">
            <tr>

                <th></th>

            </tr>
            <tr>

                <td style=" border: 1px solid black; border-collapse: collapse;">
                    <p align="center"> ARMADA DE CHILE
                        DIRECCIÓN GENERAL DEL TERRITORIO MARÍTIMO Y DE MARINA MERCANTE
                        DIRECCIÓN DE INTERESES MARÍTIMOS Y MEDIO AMBIENTE ACUÁTICO
                        CENTRO DE INSTRUCCIÓN Y CAPACITACIÓN MARÍTIMA
                        <br>
                        EXAMEN
                    </p>
                </td>

            </tr>
        </table>
    </div>

    <div>

        <P>
            Preguntas
        </P>

        <div>

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
                            $Cadena=strip_tags($Cadena);

                        ?>
                    <tr>

                        <?php if ($item->CDTPPregunta == 1) : ?>
                        <td>

                            <p><?=($key+1).' )  '.$Cadena?></p>
                            <?php foreach($item->Respuestas as $key=>$respuesta): ?>

                            <p>
                                <?=$variable[$key]?>
                                <?=strip_tags(trim(str_replace("\n", '',trim($respuesta->GLRespuesta))))?>
                                <?=($respuesta->LGCorrecta == 1)?"( correcta )":"( incorrecta )"?>
                            </p>


                            <?php endforeach; ?>
                            <hr>
                        </td>
                        <?php else:?>
                        <td>
                            <p><?=($key+1).' )  '.stripslashes(str_replace(chr( 194 ) . chr( 160 ), ' ',(preg_replace("/[\r\n|\n|\r|\t]+/",'',str_replace('\n\n\n\t\n\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t','',trim(html_entity_decode(trim(trim(preg_replace('/\s+/', ' ',trim(str_replace("\n", '',trim($Cadena)))))," \t\n\r\0\x0B\xC2\xA0"))," \t\n\r\0\x0B\xC2\xA0"))))))?>
                            </p>
                            <?php foreach($item->Respuestas as $key=>$respuesta): ?>

                            <p> <?=stripslashes(str_replace(chr( 194 ) . chr( 160 ), ' ',(preg_replace("/[\r\n|\n|\r|\t]+/",'',str_replace('\n\n\n\t\n\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t\n\t\t\t','',trim(html_entity_decode(trim(trim(preg_replace('/\s+/', ' ',trim(str_replace("\n", '',trim($respuesta->GLRespuesta)))))," \t\n\r\0\x0B\xC2\xA0"))," \t\n\r\0\x0B\xC2\xA0"))))))?>
                            </p>

                            <?php endforeach; ?>
                            <hr>
                        </td>
                        <?php endif;?>
                    </tr>
                    <?php }
                    ?>

                </tbody>
            </table>



        </div>
    </div>

    <!-- <footer>

        <hr>
        <p style="size: 25px;margin: 3px 0;font-size: 15px"> Armada de Chile - Dirección del Territorio Marítimo y
            Marina Mercante &copy; <?php echo date("Y");?>
        </p>
    </footer> -->
</body>

</html>