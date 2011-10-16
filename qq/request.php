<?php
/**
  *@author:xiaoshengeer@gmail.com 2011-10-16
  */
require_once("OAuth.php");
require_once("config.php");

require_once("curl.php");
require_once("curl_response.php");

$curl = new Curl();

$consumer = new OAuthConsumer($config['api_key'],$config['api_key_secret']);// 创建一个 OAuthConsumer 对象。
$req_req = OAuthRequest::from_consumer_and_token($consumer, NULL, "GET", $config['request_token_url']);
$req_req->sign_request($config['sig_method'], $consumer, NULL);

$response = $curl->get($req_req->to_url(), $vars = array());

parse_str($response->body, $arr);
$param_str = 'oauth_token=' . $arr['oauth_token'];
session_start();
$_SESSION['request_token_secret'] = $arr['oauth_token_secret'];
$authorize_request_url = $config['authorize_url'] . "?" ."oauth_consumer_key=".$config['api_key']."&". $param_str . "&oauth_callback=" . $config['callback_url'];
//跳转到授权页面
header('location:'.$authorize_request_url);