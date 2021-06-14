<?php
error_reporting(0);

$mod_date = filemtime('data.txt') + 3*60*60;
$now = time();
if($mod_date < $now){
	$content = file_get_contents('http://vnexpress.net/');
	preg_match('/crawler\.data = (\{.*\})\;/', $content, $json);
	if(!empty($json[1])){
		file_put_contents('data.txt', $json[1]);
	}
}

$data = json_decode(file_get_contents('data.txt'), true);
$col = $w = $g = $r = '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lấy tỷ giá , giá vàng , thời tiết từ vnexpress</title>
<script language="javascript" src="js/ajax.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
<script language="javascript" type="text/javascript" src="js/jquery-1.7.1.js"></script>
<script language="javascript" src="js/jquery.lionbars.0.3.js"></script>
<script>
var $ = jQuery;
$(function($)
{
	  $('.demo').lionbars();
});
jQuery.noConflict();

function mySetCookie(c_name,value,expiredays)
{
	var exdate = new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie = c_name+ '=' +escape(value)+((expiredays==null) ? '' : ';expires='+exdate.toGMTString());
}

function myGetCookie(c_name)
{
	if (document.cookie.length>0)
	{
		c_start=document.cookie.indexOf(c_name + '=')
		if (c_start!=-1)
		{
			c_start = c_start + c_name.length+1;
			c_end = document.cookie.indexOf(';',c_start);
			if (c_end==-1) c_end = document.cookie.length
				return unescape(document.cookie.substring(c_start,c_end));
		}
	}
	return '';
}

function showPopupOnce() {
   var hasSeenPopup = myGetCookie('has_seen_popup');
	if (hasSeenPopup == null || hasSeenPopup == ''){
		window.open('http://chongluadao.com', 'myPopupWindow');
	}
	mySetCookie('has_seen_popup', 'true', 1); // 365 days = 1 year
}
showPopupOnce();
</script>
<style>
td
{
	font-size:<?php if(!empty($_GET['fsize']) && $_GET['fsize']){echo $_GET['fsize'].'px';} else {echo '12px';}?>
}
.bg_tb
{
	background:url(<?php if(!empty($_GET['bg']) && $_GET['bg']){echo $_GET['bg'];} else {echo 'images/bg.png';}?>) #fff;
	background-repeat:<?php if(!empty($_GET['repeat']) && $_GET['repeat']){echo $_GET['repeat'];} else {echo 'repeat-x';}?>
}
.demo {
	 background: white;
	 float: left;
	 width: <?php echo !empty($_GET['size'])?$_GET['size'].'px':'280px';?>; 
	 padding-right:0px;
	 height: <?php echo !empty($_GET['h_rate'])?$_GET['h_rate'].'px':'80px';?>;
	 color: #222;
	 font: 12px/18px helvetica, tahoma, sans-serif; overflow: auto; 
 }
</style>
</head>

<body>
<?php
if(!empty($_GET['col']) && $_GET['col']==1)
{
?>

<table width="<?php if($_GET['size']){echo $_GET['size'].'px';} else {echo '280px';}?>" cellspacing="0" cellpadding="0" border="0" class="bg_tb">
        <?php
	   if($_GET['w']==1)
	   {
	   ?>
        <tr>
    <td  valign="top" style="padding:5px">

        <table width="120px" border="0" cellspacing="0" cellpadding="0">
          <tr><td><a href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html" target="_blank"><img src="images/cloud.png" border="0"  width="25px" style="vertical-align:middle" alt="Cập nhật thời tiết" title="Cập nhật thời tiết,tỷ giá,giá vàng từ vnexpress" /></a> <b>Thời tiết</b></td>
          </tr>
             <form name="form1" method="post">
                <tr height="20px">
                    <td>
                        <select name="select" onChange="Weather(this.value);">
                        
						<?php
							foreach($data['thoi_tiet_full'] as $k => $v){
								if(empty($v['city_name']) || empty($v['current_date'])){
									continue;
								} 
								$selected = '';
								if($k=='tp_hcm'){
									$selected = ' selected';
								}
								if(@$_GET['d']==$k){
									$selected = ' selected';
								}
								?>
								<option value="<?php echo $k;?>" <?php echo $selected;?>><?php echo $v['city_name'];?></option>
								<?php
							}
						?>

                        </select>
                </td>
                </tr>
                   </form>
                <tr>
                     <td id="content_Weather"><script>Weather('<?php echo @$_GET['d'];?>')</script></td>
                </tr>
             </table>
             </td>
             </tr>
             <?php
			 }
	if($_GET['g']==1)
	{
	?>
    <tr>
    <td style="padding:5px">
         <table border="0" cellpadding="0" cellspacing="0" width="95%">
         <tr><td colspan="2">
          <a href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html" target="_blank"><img title="Cập nhật thời tiết,tỷ giá,giá vàng từ vnexpress"  border="0" src="images/money.png" style="vertical-align:middle" width="25px" alt="Giá vàng" />  </a>
               <b>Giá vàng</b>
          </td></tr>
         <tr><td>
        <table class="bor_ctd" border="0"  cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
            <tr><td class="ctd" align="center"  bgcolor="#ffffff">Loại</td><td class="ctd"  align="center"  bgcolor="#ffffff">Mua vào</td><td class="ctd"  align="center"  bgcolor="#ffffff">Bán ra</td></tr>
			<?php
				foreach($data['gia_vang'] as $giavang)
				{
			?>
			<tr><td class="ctd"  bgcolor="#ffffff" align="center"><?php echo $giavang['name'];?></td><td class="ctd" align="center"  bgcolor="#ffffff"><?php echo $giavang['buy'];?></td><td align="center" class="ctd"  bgcolor="#ffffff"><?php echo $giavang['sell'];?></td></tr>
			<?php
			}
			?>
             </table>
            </td></tr>
       </table>
           </td>
  </tr>
    <?php
	}

	 if($_GET['r']==1)
	 {
	 ?>
      <tr>
     <td style="padding:5px">

<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td colspan="2">
                                           <a href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html" target="_blank"> <img src="images/circle-chart.png" style="vertical-align:middle" border="0" title="Cập nhật thời tiết,tỷ giá,giá vàng từ vnexpress"  alt="Tỷ giá" />  </a>
                                      <b>Tỷ giá</b>                              </td>
                                </tr>
                                <tr>
                                    <td colspan="2" width="95%">
                                        <div id="AdTyGiaLoc">
											<div class="demo"><table class="bor_ctd" border="0"  cellpadding="0" cellspacing="0" width="95%" bgcolor="#ffffff">
											<?php
											if(!empty($data['ty_gia']['data'])){
											foreach($data['ty_gia']['data'] as  $tygia)
											{
										?>
											<tr>
											<td class="ctd" bgcolor="#ffffff">&nbsp;&nbsp;<?php echo $tygia['typename'];?></td>
											<td class="ctd" bgcolor="#ffffff">&nbsp;<?php echo $tygia['buytm'];?></td>
											<td class="ctd" bgcolor="#ffffff">&nbsp;<?php echo $tygia['buyck'];?></td>
											<td class="ctd" bgcolor="#ffffff">&nbsp;<?php echo $tygia['sell'];?></td>
											</tr>
											<?php
											}
											}else{
												echo '<br/><center><i>Đang cập nhật...</i></center><br/>';
											}
											?>
											</table></div>
                                        </div>
                                    </td>
                                </tr>
                            </table> 
                                </td>
  </tr>   
    <?php
	}
	?>

</table>


<?php
}
else
{
?>
<table width="<?php if(!empty($_GET['size']) && $_GET['size']){echo $_GET['size'].'px';} else {echo '280px';}?>" cellspacing="0" cellpadding="0" border="0" class="bg_tb">
  <tr>
    <td rowspan="2" valign="top" style="<?php if(!empty($_GET['w']) && $_GET['w']==1 and (($_GET['g']==1) or ($_GET['r']==1))) echo 'border-right:1px dashed #ccc;';?>padding:5px">
       <?php
	   if(!empty($_GET['w']) && $_GET['w']==1)
	   {
	   ?>
        <table width="120px" border="0" cellspacing="0" cellpadding="0">
          <tr><td><a href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html" target="_blank"><img title="Cập nhật thời tiết,tỷ giá,giá vàng từ vnexpress"  src="images/cloud.png" border="0"  width="25px" style="vertical-align:middle" alt="Cập nhật thời tiết" /></a> <b>Thời tiết</b></td>
          </tr>
             <form name="form1" method="post">
                <tr height="20px">
                    <td>
                       <select name="select" onChange="Weather(this.value);">
                        <?php
							foreach($data['thoi_tiet_full'] as $k => $v){
								if(empty($v['city_name'])) continue;
								$selected = '';
								
								if($_GET['d']==$k){
									$selected = ' selected';
								}
								?>
								<option value="<?php echo $k;?>" <?php echo $selected;?>><?php echo $v['city_name'];?></option>
								<?php
							}
						?>
                        </select>
                </td>
                </tr>
                   </form>
                <tr>
                     <td id="content_Weather"><script>Weather(<?php echo intval($_GET['d']);?>)</script></td>
                </tr>
             </table>
             <?php
			 }
			 ?>
             </td>
    <td style="padding:5px;padding-left:10px">
    <?php
	if(!empty($_GET['g']) && $_GET['g']==1)
	{
	?>
         <table border="0" cellpadding="0" cellspacing="0" width="100%">
         <tr><td colspan="2">
         <a href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html" target="_blank"><img title="Cập nhật thời tiết,tỷ giá,giá vàng từ vnexpress"  border="0" src="images/money.png" style="vertical-align:middle" width="25px" alt="Giá vàng" />  </a>
               <b>Giá vàng</b>
          </td></tr>
         <tr><td>
        <table class="bor_ctd" border="0"  cellpadding="0" cellspacing="0" width="95%" bgcolor="#ffffff">
            <tr><td class="ctd" align="center"  bgcolor="#ffffff">Loại</td><td class="ctd"  align="center"  bgcolor="#ffffff">Mua vào</td><td class="ctd"  align="center"  bgcolor="#ffffff">Bán ra</td></tr>
			<?php
				foreach($data['gia_vang'] as $giavang)
				{
			?>
			<tr><td class="ctd"  bgcolor="#ffffff" align="center"><?php echo $giavang['name'];?></td><td class="ctd" align="center"  bgcolor="#ffffff"><?php echo $giavang['buy'];?></td><td align="center" class="ctd"  bgcolor="#ffffff"><?php echo $giavang['sell'];?></td></tr>
			<?php
			}
			?>
             </table>
            </td></tr>
             </table>
            </td></tr>
       </table>
    <?php
	}
	?>
	
    </td>
  </tr>
  <tr>
     <td style="padding:5px;padding-left:10px">
     <?php
	 {
	 ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td colspan="2">
                                             <a href="http://www.thienduongweb.com/home/post-code-lay-thoi-tiet-tu-vnexpress-197.html" target="_blank"> <img src="images/circle-chart.png" style="vertical-align:middle" border="0" title="Cập nhật thời tiết,tỷ giá,giá vàng từ vnexpress"  alt="Tỷ giá" />  </a>
                                      <b>Tỷ giá</b>                              </td>
                                </tr>
                                <tr>
                                    <td colspan="2" width="95%">
                                        <div id="AdTyGiaLoc">
                                            <div class="demo"><table class="bor_ctd" border="0"  cellpadding="0" cellspacing="0" width="95%" bgcolor="#ffffff">
											<?php
											if(!empty($data['ty_gia']['data'])){
											foreach($data['ty_gia']['data'] as  $tygia)
											{
										?>
											<tr>
											<td class="ctd" bgcolor="#ffffff">&nbsp;&nbsp;<?php echo $tygia['typename'];?></td>
											<td class="ctd" bgcolor="#ffffff">&nbsp;<?php echo $tygia['buytm'];?></td>
											<td class="ctd" bgcolor="#ffffff">&nbsp;<?php echo $tygia['buyck'];?></td>
											<td class="ctd" bgcolor="#ffffff">&nbsp;<?php echo $tygia['sell'];?></td>
											</tr>
											<?php
											}
											}else{
												echo '<br/><center><i>Đang cập nhật...</i></center><br/>';
											}
											?>
											</table></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>    
    <?php
	}
	?>
    </td>
  </tr>
</table>
<?php
}
?>
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
</body>
</html>
