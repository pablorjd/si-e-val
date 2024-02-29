<select  id="preguntas" name="preguntas"  name="preguntas[]" multiple="multiple">
    <?php foreach($preguntas as $key=>$pregunta):?>
        <option value="<?=$pregunta->IDPregunta?>">
        1
        <?php strip_tags($pregunta->GLPregunta)?>
    </option>
    <?php endforeach;?>

</select>
<script>
   setTimeout(function(){
      // $('#preguntas').select2();
    },1000);
       // 
     
</script>