<?php
	$link = 'http://laban.vn/p/weather';
	$content = get_web_page($link);
	$content = $content['content'];
	
	// if($content==''){
	// 	$content = file_get_contents('log/laban.log');
	// }else{
	// 	file_put_contents('log/laban.log', $content);
	// }
	
	$content = json_decode($content, true);
	$content = str_get_html($content['html']);
	$data = array();
	
	foreach($content->find('#weather_result .info_weather') as $row){
		
		$column = $row->find('.info_weather_col', 0);
		$data[] = array(
			$column->find('img',0)->src,
			$column->find('h3',0)->plaintext,
			$column->find('.forecast',0)->plaintext,
		);
	}
	// if(!empty($_GET['d'])){
	// 	if(empty($data[$_GET['d']])){
	// 		$_GET['d'] = 0;
	// 	}
	// }
?>
<?php echo str_replace('<option rel="0" value="0">Xem tất cả</option>','', $content->find('.sel_weather', 0));?>
<div class="clear">&nbsp;</div>
<div class="temp_title">
	<img id="img_cloud"/>
	<span id="temp_text"></span>
</div>
<div class="clear">&nbsp;</div>
<div class="temp_desc" id="temp_desc"></div>
<script>
	var data = <?php echo json_encode($data);?>;
	function change(){
		var rel = $('.sel_weather').val();
		$('#img_cloud').attr('src', data[rel][0]);
		$('#temp_text').html(data[rel][1] + '<sup>o</sup>C');
		$('#temp_desc').html(data[rel][2]);
	}
	$('.sel_weather').change(function(){
		change()
	});
	<?php
		if(!empty($_GET['d'])){
			?>
				$('.sel_weather option[value='+<?php echo $_GET['d'];?>+']').attr('selected','selected');
			<?php
		}
	?>
	change();
</script>