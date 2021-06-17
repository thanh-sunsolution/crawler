<?php 

    require_once('simple_html_dom.php'); 

    $id = $_GET['id'];
    //$url = 'https://moveek.com/cinema/showtime/'.$id.'?date=&header=1';
    $url = 'https://moveek.com/cinema/showtime/'.$id.'?date=2021-06-19&header=1';
    $content = file_get_html2($url);

    // foreach($content->find('.showtimes .showtime-dates') as $day){
    //     echo $day;
    // }

    foreach($content->find('.showtimes .card-sm') as $list){
        echo $list;
    }

?>
