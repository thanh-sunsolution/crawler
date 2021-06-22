<?php

    require_once('simple_html_dom.php');

    $url = 'https://cskh.evnspc.vn/';
    $content = get_web_page($url);

    $content = json_encode($content);

    
    echo $content;

?>
