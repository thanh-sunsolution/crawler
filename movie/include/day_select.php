<?php 

    require_once('simple_html_dom.php'); 

    $id = $_GET['id'];

    $mondateTimestamp = strtotime('mondate this week');
    $output = [];
    for ($date = 0; $date < 6; $date++) {
        $output[] = date('Y-m-d', strtotime(sprintf('+%d dates', $date), $mondateTimestamp));
    } 

    $url = 'https://moveek.com/cinema/showtime/126746?date='.date('Y-m-d').'&header=1';

    $content = file_get_html2($url);

    

    foreach($content->find('.showtimes .card-sm') as $list){
        //echo $list;
    }

?>
