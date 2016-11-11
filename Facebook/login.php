<?php
require_once __DIR__ . '/vendor/autoload.php';
if(!session_id()) {
    session_start();
}
$fb = new Facebook\Facebook([
  'app_id' => '189062984870016', // Replace {app-id} with your app id
  'app_secret' => '46aa26be20511e7e76179da35790b2fe',
  'default_graph_version' => 'v2.8',
  ]);

$helper = $fb->getRedirectLoginHelper();

//$permissions = ['email', 'user_likes']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://cobafbega.000webhostapp.com/mass-request.php');

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

