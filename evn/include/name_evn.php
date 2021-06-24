<?php

    require_once('simple_html_dom.php'); 

    $value = $_GET['value'];

    $link = 'https://cskh.evnspc.vn/ThongTinKhachHang/GetDienLuc?macty='.$value.'';
    
    $content = file_get_html2($link);

    echo '<select name="name-evn" id="name-evn">'.'<option>Chọn điện lực</option>'.$content.'</select>';

    

?>
<div id="result-display"></div>


<script>

$(document).ready(function(){
   loadData(); //call the function
});

$('select[name="name-evn"]').on('change',loadData); 

function loadData(){
    var url='include/day_select.php?value='+$('select[name="name-evn"] option:selected').val();
    $("#result-display").load(url,function(){
    });
}


</script>