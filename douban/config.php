<?php
/**
  *@author:xiaoshengeer@gmail.com 2011-10-16
  */
$config['api_key'] = '070ccf4ffd4690af15266deff7d3b20d';
$config['api_key_secret'] = 'd3d4b62691ac18b5';
$config['request_token_url'] = 'http://www.douban.com/service/auth/request_token';// request token 获取地址
$config['authorize_url'] = 'http://www.douban.com/service/auth/authorize';// 用户授权页面
$config['access_token_url'] = 'http://www.douban.com/service/auth/access_token';// access token 获取地址
$config['sig_method'] = new OAuthSignatureMethod_HMAC_SHA1();
$config['callback_url'] = 'http://www.myoauth.com/snsLogin/douban/access.php';//授权成功返回页面