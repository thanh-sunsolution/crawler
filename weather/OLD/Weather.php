<?php
error_reporting(0);
$data = json_decode(file_get_contents('data.txt'), true);

$id = !empty($_GET['id'])?$_GET['id']:'tp_hcm';
$data  = $data['thoi_tiet_full'][$id];
$temp = $data['current_date']['temp'];

?>
<table cellpadding="0" cellspacing="0">
<tr><td>
<img src="http://st.f2.vnecdn.net/i/v2/weather/<?php echo $data['current_date']['weather_code']; ?>.gif" align="left" />
<img src="images/<?php echo $temp[0]; ?>.gif" align="left" />
<img src="images/<?php echo $temp[1]; ?>.gif" align="left" />
<img src="images/c.gif" />
</td>
</tr>
<tr>
<td>
<?php echo $data['current_date']['weather'].'<br/>'.$data['current_date']['wind']; ?>
</td>
</tr>
</table>
