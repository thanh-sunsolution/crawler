<?php 
      require_once('simple_html_dom.php'); 

      $link = "https://moveek.com/lich-chieu/";
      $content = file_get_html2($link);

      echo '<select name="city">';
      foreach($content->find('select.btn-select-region option',0) as $city){
         echo $city->innertext;
      }
      echo '</select>';

?>

<div id="league-display"></div>


<script>

$(document).ready(function(){
   loadData(); //call the function
});

$('select[name="city"]').on('change',loadData); //assign the function to the change event

function loadData(){
    var url='include/cinema/'+$('select[name="city"] option:selected').val()+'.php';
    $("#league-display").load(url,function(){
       //Anything you want do after contents are loaded
    });
}


</script>
