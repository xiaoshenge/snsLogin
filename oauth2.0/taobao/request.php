<?php
/**
 * @author Adam@ozzyad.com
 * create day 2011-10-19 
 */
require_once 'config.php';
$url = "https://oauth.taobao.com/authorize?response_type=code&client_id=".$config['api_key']."&redirect_uri=".$config['callback_url']."&state=1";
header('location:'.$url);
