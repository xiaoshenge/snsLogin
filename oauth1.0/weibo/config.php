<?php
/**
  *@author:xiaoshengeer@gmail.com 2011-10-16
  */
$config['api_key'] = '2745009327';
$config['api_key_secret'] = '75dfd54454af3cfd22060bf2b9c3f270';
$config['request_token_url'] = 'http://api.t.sina.com.cn/oauth/request_token';// request token 获取地址
$config['authorize_url'] = 'http://api.t.sina.com.cn/oauth/authorize';// 用户授权页面
$config['access_token_url'] = 'http://api.t.sina.com.cn/oauth/access_token';// access token 获取地址
$config['sig_method'] = new OAuthSignatureMethod_HMAC_SHA1();
$config['callback_url'] = 'http://www.myoauth.com/snsLogin/weibo/access.php';