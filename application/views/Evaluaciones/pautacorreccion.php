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
<!-- < var_dump($listaExamen);exit;?> -->

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
                        
                        EXAMEN
                    </p>
                </td>
            </tr>
        </table>
    </div>
  <h3 style="text-align: center;"><u>PAUTA DE CORRECCION</u></h3>
    <div>
        <table border="2" cellpadding="0" cellspacing="0" style="width:100%">
            <tbody>
                <?php $variable = array('A','B','C','D');?>
                <?php foreach($listaExamen as $key => $item ):?>
                    <?php if ($item->CDTPPregunta == 1) : ?>
                        <tr>
                            <td>
                                <?=$key+1?>
                            </td>
                            <?php foreach($item->Respuestas as $key=>$respuesta): ?>
                                <?php if($respuesta->LGCorrecta == 1):?>
                                    <td>
                                        <?=$variable[$key]?>
                                    </td>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </tr>
                    <?php endif;?>
                <?php endforeach;?>
            </tbody>
        </table>
        
    </div>
    <footer>
        <hr>
        <p style="size: 25px;margin: 3px 0;font-size: 10px"> Armada de Chile - Dirección del Territorio Marítimo y
            Marina Mercante &copy; <?php echo date("Y");?>
        </p>
    </footer>
</body>
</html>