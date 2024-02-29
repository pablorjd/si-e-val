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

#tablaTituloExamen {
    border-collapse: collapse !important;
}
</style>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>SIEVAL</title>
</head>
<!-- <var_dump($listaExamen[0]);exit;?> -->

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
                        EXAMEN </p>
                </td>

            </tr>
        </table>
    </div>


    <br>
    <h3 style="text-align: center;">HOJA DE RESPUESTA</h3>

    <br>

    <div style="border-bottom-width: thick;">
        <table align="left" border="1" cellpadding="1" cellspacing="0" style="width:100%;">
            <tbody>
                <tr>
                    <td>NOMBRE POSTULANTE:</td>

                </tr>
                <tr>
                    <td>RUN:</td>

                </tr>
                <tr>
                    <td>FECHA:</td>

                </tr>
                <tr>
                    <td>TIEMPO:</td>

                </tr>
            </tbody>
        </table>
    </div>
    <div><br>
    <br>
    <br>
    <br><br></div>
    <div>
        <table border="2" cellpadding="0" cellspacing="0" style="width:250px">

            <tbody>
                <?php $variable = array('A','B','C','D');?>

                <?php foreach($listaExamen as $key => $item ) { 
                            $Cadena=trim(str_replace("\n", '',trim($item->GLPregunta)));
                            $Cadena=strip_tags($Cadena);
                        ?>
                <?php if ($item->CDTPPregunta == 1) : ?>
                <tr>

                    <td>
                        <?=$key+1?>
                    </td>

                    <?php foreach($item->Respuestas as $key=>$respuesta): ?>
                    <td><?=$variable[$key]?></td>
                    <?php endforeach; ?>


                </tr>
                <?php endif;?>
                <?php }
                    ?>

            </tbody>
        </table>


        <table style="border: thin groove #000000; width: 100%; height: 163px;">
            <tr>
                <td style="height: 717px">



                    <table style="border: thin inset black; width: 100%; height: 74px">
                        <tr>
                            <td style="border:thin inset black; height: 176px;">

                                <p align="center" style="height: 159px">BUENA</p>

                            </td>
                            <td style="border:thin inset black; height: 176px;">
                                <p align="center" style="height: 167px">MALAS</p>
                            </td>
                            <td style="border:thin inset black; height: 176px;">
                                <p align="center" style="height: 178px">OMITIDAS</p>
                            </td>
                            <td style="border:thin inset black; height: 176px;">
                                <p align="center" style="height: 171px">NOTA FINAL</p>
                            </td>

                        </tr>
                    </table>


                    <table style="border: thin inset black; width: 100%; height: 74px">
                        <tr>
                            <td>
                                <p class="auto-style1" style="height: 21px">NOMBRE Y FIRMA DEL
                                    POSTULANTE:____________________________________________________________________ </p>
                            </td>
                        </tr>
                    </table>



                    <table style="border: thin inset black; width: 100%; height: 80px">
                        <tr>
                            <td style="height: 160px">
                                <p>CONFORME&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                                    <input name="Button2" type="text" value=""
                                        style="border-color: #000000; border-style: inset; border-width: thin; width: 189px; height: 49px;" />
                                    <p>NO CONFORME
                                        <input name="Button1" type="text" value=""
                                            style="border-color: #000000; border-style: inset; border-width: thin; width: 189px; height: 49px;" />
                                    </p>
                                    &nbsp;


                            </td>
                        </tr>
                    </table>

                    <br>

                    <table style="border: thin inset black; width: 100%; height: 74px">
                        <tr>
                            <td style="height: 146px">OBSERVACIONES DEL EVALUADOR<br />
                            <td style="height: 146px">

                                <input name="Button3" type="text" value="NOMBRE Y FIRMA DEL EVALUADOR"
                                    style="width: 302px; height: 49px; border-top-style: inset; border-top-width: thin; border-top-color: #000000;"
                                    class="auto-style2" /></td>
                </td>
            </tr>
        </table>

        <div>
            LOS EXAMENES DEBEN PERMANECER EN CUSTODIA POR LA AUTORIDAD MARÍTIMA AL MENOS POR UN AÑO.
        </div>

        </td>
        </tr>
        </table>
    </div>
    <footer>

        <hr>
        <p style="size: 25px;margin: 3px 0;font-size: 15px"> Armada de Chile - Dirección del Territorio Marítimo y
            Marina Mercante &copy; <?php echo date("Y");?>
        </p>
    </footer>
</body>

</html>