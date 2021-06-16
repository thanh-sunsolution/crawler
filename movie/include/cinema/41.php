<?php 
    
    $url = 'https://moveek.com/api/v2/cinema?region=41&ticketing=0';

    $content = file_get_contents($url);

    $data = json_decode($content, true);

    // foreach ($data['data']['cinemas'] as $key => $d) {
    //     echo $d['data']['name'].'<br>';

    //     foreach ($d['cinemas'] as $key => $d) {
    //         echo $d['name'].'<br>';
    //     }
    // }
    

?>
<select name="" id="">
    <option>Chọn rạp</option>
        <?php foreach ($data['data']['cinemas'] as $key => $d) { ?>
        <optgroup value="<?php echo $d['data']['name'];?>">
            <option class="strong"><?php echo $d['data']['name'];?></option>
            <?php foreach ($d['cinemas'] as $key => $d) { ?>
                <option value="<?php echo $d['name'];?>"><?php echo $d['name'] ;?></option>
            <?php }; ?>
        </optgroup>
    <?php }; ?>
</select> 

