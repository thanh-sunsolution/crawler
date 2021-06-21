<?php 
    require_once('simple_html_dom.php'); 

    $id = $_GET['id']; 
    $ngay = $_GET['ngay'];
    $url = 'https://moveek.com/cinema/showtime/'.$id.'?date='.$ngay.'&header=1';

    $content = file_get_html2($url);
    //echo $content;
    foreach($content->find('.showtimes .card-sm') as $list){
        echo $list;
    }    