<?php
	$link = 'http://vietcombank.com.vn/ExchangeRates/ExrateXML.aspx';
	$content = get_web_page($link);
	$content = $content['content'];
	
	if($content==''){
		$content = file_get_contents('log/exrate.xml');
	}else{
		file_put_contents('log/exrate.xml', $content);
	}
	preg_match_all('/<Exrate CurrencyCode="(.*?)" CurrencyName=".*?" Buy="(.*?)" Transfer=".*?" Sell="(.*?)" \/>/', $content, $exrate);

	$data = array();
	for($i =0 ; $i < count($exrate[1]); $i++){
		$data[] = array(
			$exrate[1][$i],
			$exrate[2][$i],
			$exrate[3][$i],
		);
	}
?>
<table class="bor_ctd" border="0" cellpadding="0" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="ctd">&nbsp;</th>
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
			<td class="ctd"><?php echo $row[2];?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>