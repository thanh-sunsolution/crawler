<select name="league" id="sport_football_select" class="fr sl_football_league" style="width: 200px; margin-top: -8px;">

    <option value="engpremierleague">Premier League</option>

    <option value="spainlaliga">LA Liga</option>

    <option value="italyseriea">Serie A</option>

    <option value="germanybundesliga">Bundes Liga</option>

    <option value="franceleague1">Ligue 1</option>

    <option value="vietnamsuperleague">V-League</option>

    <option value="uefachampion">UEFA Champion League</option>

    <option value="uefaeuropa">UEFA Europa League</option>

    <option value="engfacup">FA Cup</option>
</select>

<div id="league-display">
    
</div>

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
