<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="style.css?201501" rel="stylesheet" type="text/css" media="screen,print" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<title>Code thời tiết, tỷ giá vàng</title>
	</head>
	<body>
		<table width="100%" cellspacing="0" cellpadding="0" border="0" class="bg">
			<?php
				if(!empty($_GET['w']) && $_GET['w']==1){
			?>
			<tr>
				<td>
					<a target="_blank" href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html"><h4 class="title"><img src="img/cloud.png"/> Thời tiết</h4></a>
					<?php include('include/weather_select.php');?>
				</td>
			</tr>
			<?php
				}
			?>
			<?php
				if(!empty($_GET['g']) && $_GET['g']==1){
			?>
			<tr>
				<td class="block">
					<a target="_blank" href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html"><h4 class="title"><img src="img/money.png"/> Giá vàng SJC</h4></a>
					<div class="clear">&nbsp;</div>
					<?php include('include/gold.php');?>
				</td>
			</tr>
			<?php
				}
			?>
			<?php
				if(!empty($_GET['r']) && $_GET['r']==1){
			?>
			<tr>
				<td class="block">
					<a target="_blank" href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html"><h4 class="title"><img src="img/circle-chart.png"/> Tỷ giá</h4></a>
					<div class="clear">&nbsp;</div>
					<?php include('include/chart.php');?>
				</td>
			</tr>
			<?php
				}
			?>
			</tr>
		</table>
		<span style="float:right; font-style:italic;">Nguồn: <a href="http://webgia.com" target="_blank" title="Web giá">webgia.com</a></span>
	</body>
	<script src="jquery.min.js"></script>
	<script src="script.js?20181"></script>
	<script type="text/javascript">
	   var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-17352228-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>

</html>