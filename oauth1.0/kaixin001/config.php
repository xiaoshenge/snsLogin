<?php
/**
  *@author:xiaoshengeer@gmail.com 2011-10-16
  */
$config['api_key'] = '33034835911913561ce9223bf53d2ad8';
$config['api_key_secret'] = '842a81031a1fcdf993991cf387199869';
$config['request_token_url'] = 'http://api.kaixin001.com/oauth/request_token';// request token 获取地址
$config['authorize_url'] = 'http://api.kaixin001.com/oauth/authorize';// 用户授权页面
$config['access_token_url'] = 'http://api.kaixin001.com/oauth/access_token';// access token 获取地址
$config['sig_method'] = new OAuthSignatureMethod_HMAC_SHA1();
$config['callback_url'] = 'http://www.myoauth.com/snsLogin/kaixin001/access.php';