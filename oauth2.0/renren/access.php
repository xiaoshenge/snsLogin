<?php
/**
 * @author Adam@ozzyad.com
 * create day 2011-10-19 
 */
require_once 'curl.php';
require_once "curl_response.php";
require_once "config.php";

$code =$_GET['code'];

$curl = new Curl();
$url = "https://graph.renren.com/oauth/token";

$postdata = array ('grant_type' => 'authorization_code',
                    'code' => $code,
                    'client_id' => $config ['api_key'], 
                    'client_secret' => $config ['api_key_secret'], 
                    'redirect_uri' => $config ['callback_url'],
                    'client_id' => $config['api_key'],
                     );



$curl->options['CURLOPT_SSL_VERIFYPEER'] = false;
$response = $curl->post($url,$postdata);

print_r($response);
