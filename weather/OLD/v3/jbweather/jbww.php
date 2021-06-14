<?php
/*
 * @version     2.0
 * @package     J.B.Weather Widget
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      J.B.MARKET <support@jbmarket.net>
 */

class JBWeather {
    protected $params;

    function __construct() {
        defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
    }
    
    function display() {
        require (dirname(__FILE__) . DS . "view" . DS . "tmpl.php");
        
        /*
         * Determine user location
         */
        if ($this->params['autoDetect'] == 1):
            $this->params['location'] = $this->detectLocation();
        endif;
        
        $this->_initScript();
    }
    
    function setParams($params) {
        $this->params = $params;
    }
    
    protected function _initScript() {
        
        foreach ($this->params as $opt => $value):
            $params[] = $opt . ':"' . $value . '"';
        endforeach;
        $params = implode(',', $params);
        
        echo "
            <script type='text/javascript'>
                (function($){
                    $(document).ready(function(){
                        var JBW = new JBWeather();
                        JBW.init({{$params}});
                    });
                })(jQuery);
            </script>
        ";
    }
    
    protected function getUserIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //check ip from share internet 
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        } return $ip;
    }
    
    protected function detectLocation() {
        if ($this->params['detectType'] == 0) {
            
            /* Autodetect using HOSTIP service */
            
            $xml      = simplexml_load_file('http://api.hostip.info/?ip=' . $this->getUserIP());
            $country  = $xml->xpath('//gml:featureMember//Hostip//countryName');
            $city     = $xml->xpath('//gml:featureMember//Hostip//gml:name');
            
            if ($country[0] != '(Private Address)' ) :
                
                if ($city[0] == '(Unknown city)') :
                    return ucwords($country[0]);
                else:
                    return ucwords($city[0]). ',' . ucwords($country[0]);
                endif;
                
            else :
                /* Unable to locate user location; return default */
                return $this->params['location'];
            endif;
            
        } else if ($this->params['detectType'] == 1) {
            
            /* Autodetect using geoip database */
            
            require_once dirname(__FILE__) . "/geoip/geoipcity.inc";
            require_once dirname(__FILE__) . "/geoip/geoipregionvars.php";
            
            $gi      = geoip_open(dirname(__FILE__) . "/geoip/GeoLiteCity.dat", GEOIP_STANDARD);
            $record  = geoip_record_by_addr($gi, $this->getUserIP());
            $country = $record->country_name;
            $city    = $record->city;
            
            if ($country) :
                return ucwords($city) . ', ' . ucwords($country);
            else :
                /* Unable to locate user location; return default */
                return $this->params['location'];
            endif;
            
            geoip_close($gi);
            
        } else {
            /* Wrong detection type; return default */
            return $this->params['location'];
        }
    }
}

?>