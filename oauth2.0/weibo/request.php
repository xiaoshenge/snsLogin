<?php
/**
 * @author Adam@ozzyad.com
 * create day 2011-10-18 
 */
require_once 'config.php';

$url = "https://api.weibo.com/oauth2/authorize?client_id=".$config['api_key']."&response_type=code&redirect_uri=".$config['callback_url'];
header('location:'.$url);