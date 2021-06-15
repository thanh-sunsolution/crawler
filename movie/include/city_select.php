<?php 
      require_once('simple_html_dom.php'); 

      $link = "https://moveek.com/lich-chieu/";
      $content = file_get_html2($link);

      
      
      foreach($content->find('select.btn-select-region',0) as $city){
         echo $city->innertext;
         
      }

?>




<script>

$(document).ready(function(){
   loadData(); //call the function
});

$('select[name="league"]').on('change',loadData); //assign the function to the change event

function loadData(){
    var url='include/'+$('select[name="league"] option:selected').val()+'.php';
    $("#league-display").load(url,function(){
       //Anything you want do after contents are loaded
    });
}


</script>
