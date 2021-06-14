<?php
	$link = 'http://www.sjc.com.vn/xml/tygiavang.xml';
	$content = get_web_page($link);
	$content = $content['content'];

	if($content==''){
		$content = file_get_contents('log/tygiavang.xml');
	}else{
		file_put_contents('log/tygiavang.xml', $content);
	}
	$xml = simplexml_load_string($content, "SimpleXMLElement", LIBXML_NOCDATA);
	$json = json_encode($xml);
	$array = json_decode($json,TRUE);

	$city = $array['ratelist']['city'][0]['item'];
	$data = array();
	
	foreach ($city as $element) {
		$data[] = array(
			$element['@attributes']['type'],
			$element['@attributes']['buy'],
			$element['@attributes']['sell']
		);
	}
?>
<table class="bor_ctd" border="0" cellpadding="0" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="ctd">Loại</th>
			<th class="ctd">Mua vào</th>
			<th class="ctd">Bán ra</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($data as $row){
		?>
		<tr>
			<td class="ctd"><?php echo $row[0];?></td>
			<td class="ctd"><?php echo $row[1];?></td>
			<td  class="ctd"><?php echo $row[2];?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>