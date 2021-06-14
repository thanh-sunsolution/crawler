<?php
	error_reporting(0);
	$data = @file_get_contents('http://vnexpress.net/block/crawler?arrKeys%5B%5D=thoi_tiet_full');
	$data = json_decode($data,true);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lấy tỷ giá , giá vàng , thời tiết từ vnexpress</title>
<link rel="stylesheet" type="text/css" href="style.css?2014" />
<script language="javascript" type="text/javascript" src="js/jquery-1.7.1.js"></script>
<script language="javascript" src="js/jquery.lionbars.0.3.js"></script>
<script>
	var current = '<?php echo empty($_GET['tinh'])?'tp_hcm':$_GET['tinh']?>';
	function thoitiet(v){
		var data = <?php echo json_encode($data['thoi_tiet_full']);?>;
		if(!data[v])
			return;
			
		var result = data[v];
		
		if(!result['current_date']) 
			$('#block_info_temp').hide();
		else{
			$('#nhietdo').html(result['current_date']['temp']);
			$('#txt_humid').html(result['current_date']['humid']);
			$('#txt_weather').html(result['current_date']['weather']);
			$('#txt_wind').html(result['current_date']['wind']);
			$("#info_temp_img").removeClass().addClass("icon_thoitiet_big tt_big_"+result['current_date']['weather_code']);
			$('#block_info_temp').show();
		}
	}
	
</script>
</head>
<body>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tr class="title">
		<td>Thời tiết</td>
		<td>
			<select onchange="thoitiet(this.value)" id="box_tinh">
				<?php
					foreach($data['thoi_tiet_full'] as $tinh => $thongtin){
						echo '<option value="'.$tinh.'">'.$thongtin['city_name'].'</option>';
					}
				?>
			</select>
		</td>
	</tr>
	<tr id="block_info_temp">
		<td colspan="2" style="text-align:center">
			<img width="113" height="92" id="info_temp_img" src="images/img_blank.gif"/>
			<div class="txt_doc_big" id="nhietdo"></div>
		</td>
	</tr>
	<tr>
		<td valign="top" class="top10" colspan="2" style="padding:10px">
			<ul>
				<li id="txt_weather"></li>
				<li><span class="txt_666">Độ ẩm:</span> <span id="txt_humid"></span></li>
				<li><span class="txt_666">Hướng gió:</span> <span id="txt_wind"></span></li>
			</ul>
		</td>
	</tr>
	<tr style="background-color:#fff;">
		<td colspan="2" class="source"><i>Nguồn : VNExpress</i></td>
	</tr>
</table>
</body>
<script type="text/javascript">
	thoitiet(current);
	$('#box_tinh option[value='+current+']').attr('selected','selected');
   var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17352228-11']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>
