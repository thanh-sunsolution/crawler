<?php  
require_once 'simple_html_dom.php';


$link = 'http://laban.vn/p/weather';
$content = get_web_page($link);
$content = $content['content'];
	
	if($content==''){
		$content = file_get_contents('log/weather.log');
	}else{
		file_put_contents('log/weather.log', $content);
	}
	
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
	if(!empty($_GET['d'])){
		if(empty($data[$_GET['d']])){
			$_GET['d'] = 0;
		}
	}
?>
<?php echo str_replace('<option rel="0" value="0">Xem tất cả</option>','', $content->find('.sel_weather', 0));?>