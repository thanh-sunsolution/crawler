<?php

    require_once('simple_html_dom.php'); 

    $id = $_GET['id'];

    $ngay = $_GET['ngay'];

    $url = 'https://moveek.com/cinema/showtime/'.$id.'?date='.$ngay.'&header=1';

    $content = file_get_html2($url);


    foreach($content->find('.showtimes .card-sm') as $list){
        
        $img = $list->find('.card-body img.img-fluid', 0);

        $title = $list->find('.card-body .card-title', 0);
        
        $trailer = $list->find('.card-body .card-text', 0);

        $type = $list->find('.mt-2 label', 0);

        $time = $list->find('.mt-2 span', 0);


            
        if (isset($img)) {
            echo
                "<tr>
                    <td>$img</td>
                    <td>
                        <table>
                            <tr><td>$title->plaintext</td></tr>
                            <tr><td>$trailer</td></tr>
                            <tr><td>$type</td></tr>
                            <tr><td>$time</td></tr>
                        </table>
                    </td>
                </tr>";
        } else {
            echo "Chưa có phim chiếu vào ngày này. Xin cảm ơn!";
        }
      

    } 

?>  

