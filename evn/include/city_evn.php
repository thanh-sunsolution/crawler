<?php
  
    $link = "https://cskh.evnspc.vn/DichVuTTCSKH/DichVuTTCSKHSPC?index=7";
    
    $content = file_get_html2($link);

    
    echo '<select name="city-evn">';

    foreach($content->find('select#frmLichNgungGiamCungCapDien_CTyDienLuc option', 0) as $city){

         echo $city->innertext;

    }

    echo '</select>';
   
 
?>
<div id="name-evn"></div>


<script>

$(document).ready(function(){
   loadData(); //call the function
});

$('select[name="city-evn"]').on('change',loadData); 

function loadData(){
    var url='include/name_evn.php?value='+$('select[name="city-evn"] option:selected').val();
    $("#name-evn").load(url,function(){
    });
}


</script>