<?php
/**
  *@author:xiaoshengeer@gmail.com 2011-10-16
  */
$config['api_key'] = '210868';
$config['api_key_secret'] = '2dfec8d39ad79559abdf8d18060950c7';
$config['request_token_url'] = 'http://openapi.qzone.qq.com/oauth/qzoneoauth_request_token';// request token 获取地址
$config['authorize_url'] = 'http://openapi.qzone.qq.com/oauth/qzoneoauth_authorize';// 用户授权页面
$config['access_token_url'] = 'http://openapi.qzone.qq.com/oauth/qzoneoauth_access_token';// access token 获取地址
$config['sig_method'] = new OAuthSignatureMethod_HMAC_SHA1();
$config['callback_url'] = 'http://www.eyebaodao.com/snsLogin/qq/access.php';