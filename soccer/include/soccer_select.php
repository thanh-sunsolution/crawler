<?php 

    $giaidau = $_GET["giaidau"];
    $link = "https://laban.vn/ajax/getScore?id=".$giaidau;
    
    $content = get_web_page($link);
    $content = $content['content'];

    $content = json_decode($content, TRUE);
    $content = str_get_html($content['result_html']);
    
    // $giaidau = array(
    //     0 => "engpremierleague",
    //     1 => "spainlaliga",
    //     2 => "italyseriea", 
    //     3 => "germanybundesliga", 
    //     4 => "franceleague1", 
    //     5 => "vietnamsuperleague", 
    //     6 => "uefachampion", 
    //     7 => "uefaeuropa", 
    //     8 => "engfacup", 
    // )

    
   foreach($content->find('table') as $datatb){
        echo $datatb;
        
   }
    
    
     

?>
<select id="sport_football_select" class="fr sl_football_league" style="width: 200px; margin-top: -8px;">

    <option value="engpremierleague">Premier League</option>

    <option value="spainlaliga">LA Liga</option>

    <option value="italyseriea">Serie A</option>

    <option value="germanybundesliga">Bundes Liga</option>

    <option value="franceleague1">Ligue 1</option>

    <option value="vietnamsuperleague">V-League</option>

    <option value="uefachampion">UEFA Champion League</option>

    <option value="uefaeuropa">UEFA Europa League</option>

    <option value="engfacup">FA Cup</option>
</select>

<script>
    
</script>
