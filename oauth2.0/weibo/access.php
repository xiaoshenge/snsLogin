<?php
/**
 * @author Adam@ozzyad.com
 * create day 2011-10-18 
 */
require_once 'curl.php';
require_once "curl_response.php";
require_once "config.php";

$code =$_GET['code'];

$curl = new Curl();
$url = "https://api.weibo.com/oauth2/access_token";

$postdata = array ('grant_type' => 'authorization_code',
                    'code' => $code, 'client_id' => $config ['api_key'], 
                    'client_secret' => $config ['api_key_secret'], 
                    'redirect_uri' => $config ['callback_url'],
                    'client_id' => $config['api_key'],
                     );



$curl->options['CURLOPT_SSL_VERIFYPEER'] = false;
$response = $curl->post($url,$postdata);

$response = json_decode($response->body,true);

$access_token = $response['access_token'];

$curl->headers['Authorization:'] = 'OAuth2 '.$access_token;
$url = "https://api.weibo.com/2/users/show.json?access_token=".$access_token."&uid=1751637031";

$response = $curl->get($url);
print_r($response);
