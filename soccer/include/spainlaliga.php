<?php 
    require_once('simple_html_dom.php');
    $link = "https://laban.vn/ajax/getScore?id=spainlaliga";
    
    $content = get_web_page($link);
    $content = $content['content'];

    $content = json_decode($content, TRUE);
    $content = str_get_html($content['result_html']);
    
    
    
   foreach($content->find('table') as $row){
        
        echo $row;
        
   }  


?>