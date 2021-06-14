<?php
error_reporting(0);
$data = @file_get_contents('http://vnexpress.net/block/crawler?arrKeys[]=thoi_tiet_full');
$data = json_decode($data,true);


