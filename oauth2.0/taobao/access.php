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
$url = "https://oauth.taobao.com/token";

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

$url = "http://gw.api.taobao.com/router/rest";
$postdata = array('method'=>'taobao.user.get',
                'session'=>$access_token,
                'timestamp'=>date("Y-m-d H:i:s"),
                'format'=>'json',
                'app_key'=>$config['api_key'],
                'v'=>"2.0",
                'sign_method'=>'md5',
                'fields'=>'uid,nick,location'
                );
ksort($postdata);
foreach ($postdata as $k=>$v){
	$sigin .= $k.$v;
}
$postdata['sign'] = strtoupper(md5($config['api_key_secret'].$sigin.$config['api_key_secret']));



$response = $curl->post($url,$postdata);
print_r($response);
