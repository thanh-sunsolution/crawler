<?php 

    require_once('simple_html_dom.php'); 

    $id = $_GET['id'];
    $url = 'https://moveek.com/cinema/showtime/'.$id.'?date=&header=1';
    $content = file_get_html2($url);

    $date = date('Y-m-d'); //today date
    $weekOfdays = array();
    for($i =1; $i < 7; $i++){
        $date = date('Y-m-d', strtotime('1 day', strtotime($date)));
        $weekOfdays[] = date('l : Y-m-d', strtotime($date));
    }
    echo ($date);
?>


<div class="btn-group btn-block showtime-dates mb-3" id="dates">

    <a class="btn btn-light text-muted date active" data-date="2021-06-17">
    17/6
    <br><span class="small text-nowrap">Th 5</span>
    </a>
    
</div>
