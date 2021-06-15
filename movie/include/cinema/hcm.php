<?php 

    require_once('../simple_html_dom.php');
    
    $link = "https://moveek.com/api/v2/cinema?region=1&ticketing=0";
    
    $content = get_web_page($link);
    $content = $content['content'];

    

    $content = implode(',',$content);

    $content = json_decode($content, TRUE);
    
    $content = str_get_html($content['data']);
    var_dump($content);

    
    
    //$cinema = $content->find('select.btn-select-cinema',0);
    
    
   


?>