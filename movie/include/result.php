<?php 

    require_once('simple_html_dom.php'); 

    $id = $_GET['id'];

    $url = 'https://moveek.com/cinema/showtime/'.$id.'?date=&header=1';
    $content = file_get_html2($url);

    foreach($content->find('.showtimes .showtime-dates') as $day){
        echo $day;
    }

    foreach($content->find('.showtimes .card-sm') as $list){
        echo $list;
    }
    

?>
<div id="day-display"></div>

<script>
    $('[class="date"]').on('change',function(){
        var url='include/day_select.php'+this.value; //construct url and fetch only part of page
        $("#day-display").load(url,function(){
        //Anything you want do after contents are loaded
        });
    })
</script>