<?php
/**
  *@author:xiaoshengeer@gmail.com 2011-10-16
  */
require_once("OAuth.php");
require_once("config.php");

require_once("curl.php");
require_once("curl_response.php");

$curl = new Curl();
session_start();

$oauth_token = $_REQUEST['oauth_token'];
$oauth_token_secret = $_SESSION['request_token_secret'];
$parameters['oauth_verifier'] = $_REQUEST['oauth_verifier'];
// 创建一个 OAuthConsumer 对象。
$consumer = new OAuthConsumer($config['api_key'], $config['api_key_secret']);
// 创建一个 token 对象，参数是上一步获取到的 oauth_token 和 oauth_token_secret
$request_token = new OAuthConsumer($oauth_token, $oauth_token_secret);
$acc_req = OAuthRequest::from_consumer_and_token($consumer, $request_token, "GET", $config['access_token_url'],$parameters);
$acc_req->sign_request($config['sig_method'], $consumer, $request_token);

$response = $curl->get($acc_req->to_url(), $vars = array());

parse_str($response->body, $params);
$token = $params['oauth_token'];
$token_secret = $params['oauth_token_secret'];
$url = "http://api.kaixin001.com/users/me.json";
$acc_token = new OAuthConsumer($token, $token_secret);
$acc_req = OAuthRequest::from_consumer_and_token($consumer, $acc_token, "GET", $url);
$acc_req->sign_request($config['sig_method'], $consumer, $acc_token);
$header_oauth = $acc_req->to_header('');
$header_oauth = explode(": ",$header_oauth);

//$header = array('Content-Type: application/atom+xml', $acc_req->to_header('http://www.eyebaodao.com/'));

$curl->headers[$header_oauth[0]] = $header_oauth[1];
$response = $curl->get($url);
print_r(json_decode($response->body));
