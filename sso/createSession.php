<?php
require_once('../vendor/autoload.php');
require_once('../config/config.php');

/** Create user client */
$spidClientConfig[VGS_Client::REDIRECT_URI] = "http://{$_SERVER['HTTP_HOST']}/sso/createSession.php";
$client = new VGS_Client($spidClientConfig);

$session = $client->getSession(); // this rudely fetches the 'code' from the request itself
/**/

/** Fetch user information and add to session */
$user = $client->api('/me');

session_start();
$_SESSION['user'] = $user;

header("Location: /sso/");
/**/
?>