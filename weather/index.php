<?php
	error_reporting(0);
	ini_set('display_errors', 0);
	
	include('include/simple_html_dom.php');
	if(!empty($_GET['col']) && $_GET['col']==1){
		include('one_column.php');
	}else{
		include('two_column.php');
	}
?>