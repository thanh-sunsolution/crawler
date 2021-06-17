<?php

    $id = $_GET['id'];
    $url = 'https://moveek.com/api/v2/cinema?region='.$id.'&ticketing=0';

    $content = file_get_contents($url);

    $data = json_decode($content, true);
    

?>
<select name="result" id="">

    <option>Chọn rạp</option>

        <?php foreach ($data['data']['cinemas'] as $key => $d) { ?>

        <optgroup value="<?php echo $d['data']['name'];?>">

            <option class="strong"><?php echo $d['data']['name'];?></option>

            <?php foreach ($d['cinemas'] as $key => $d) { ?>

                <option value="<?php echo $d['id'];?>"><?php echo $d['name'] ;?></option>

            <?php }; ?>

        </optgroup>

    <?php }; ?>

</select> 




<div id="result-display"></div>
<script>

    $(document).ready(function(){
       loadData(); //call the function
    });

    $('select[name="result"]').on('change',loadData); //assign the function to the change event

    function loadData(){
        var url='include/result.php?id='+$('select[name="result"] option:selected').val();
        $("#result-display").load(url,function(){
           //Anything you want do after contents are loaded
        });
    }

    
       
</script>




