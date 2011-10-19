<?php
/**
 * @author Adam@ozzyad.com
 * create day 2011-10-19 
 */
require_once 'config.php';
$url = "https://graph.renren.com/oauth/authorize?client_id=".$config['api_key']."&response_type=code&redirect_uri=".urlencode($config['callback_url']);
header('location:'.$url);
