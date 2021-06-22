<?php 
      require_once('simple_html_dom.php'); 

      $link = "https://moveek.com/lich-chieu/";
      $content = file_get_html2($link);

      echo '<select name="city">';
      foreach($content->find('select.btn-select-region option', 0) as $city){
         echo $city->innertext;
      }
      echo '</select>';

?>

<div id="cinema-display"></div>


<script>

$(document).ready(function(){
   loadData(); //call the function
});

$('select[name="city"]').on('change',loadData); 

function loadData(){
    var url='include/cinema.php?id='+$('select[name="city"] option:selected').val();
    $("#cinema-display").load(url,function(){
    });
}


</script>

