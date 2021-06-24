<?php

    require_once('simple_html_dom.php'); 

    $value = $_GET['value'];

    $today = date('d-m-Y');


    $newdate = Date('d-m-Y', strtotime('+15 days'));
    


    $link = 'https://cskh.evnspc.vn/ThongTinKhachHang/LichNgungGiamCungCapDienSPC?madvi='.$value.'&tuNgay='.$today.'&denNgay='.$newdate.'';
    
    $content = file_get_html2($link);


    echo $content;
    
    

?>
