<?php
/*
 * @version     2.0
 * @package     J.B.Weather Widget
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      J.B.MARKET <support@jbmarket.net>
*/
?>

<!-- STEP 1: INCLUDE STYLESHEET && JAVASCRIPT IN YOUR <HEAD> -->
<link rel="stylesheet" type="text/css" href="jbweather/css/blitzer/jquery-ui-1.8.23.custom.css" />
<link rel="stylesheet" type="text/css" href="jbweather/css/style.css" />
<script type="text/javascript" src="jbweather/js/jquery-1.8.1.js"></script>
<script type="text/javascript" src="jbweather/js/jquery-ui-1.8.23.custom.min.js"></script>
<script type="text/javascript" src="jbweather/js/jbweather.js"></script>






<!-- STEP 2: INCLUDE JBWEATHER PHP CLASS -->
<?php require_once ("jbweather/jbww.php"); ?>






<!-- STEP 3: ADJUST PARAMETERS -->
<?php 
// URL path to jbweather folder
$parameters['url'] = 'jbweather';

// Api Key
// Obtain API key from http://www.worldweatheronline.com/register.aspx
$parameters['apiKey'] = '';

// Default Location
// Display this location if autoDetect is OFF, or autoDetect fails to locate user location
$parameters['location'] = 'London, UK';

// Autodetect user location
// 0 - OFF
// 1 - ON
$parameters['autoDetect'] = '1';

// Autodetect type
// 0 - HOSTIP
// 1 - GEO DATABASE (higher accuracy)
$parameters['detectType'] = '1';

// Temperature units
// C - Celsius
// F - Fahrenheit
$parameters['degreesUnits'] = 'C';

// Wind Units
// M - Miles
// K - Kilometers 
$parameters['windUnits'] = 'K';

// cURL
// 0 - OFF
// 1 - ON
$parameters['curl'] = '1';

?>






<!-- STEP 4: DISPLAY THE WIDGET -->
<?php
$JBW = new JBWeather();
$JBW->setParams($parameters);
$JBW->display();
?>