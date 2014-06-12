<?php
require_once('./config.php');

/** Create user client */
$client = new VGS_Client($spidClientConfig);

$session = $client->getSession(); // this rudely fetches the 'code' from the request itself
$client->setAccessToken($session['access_token']); // have to help the client remember the access token
/**/

/** Fetch user information and add to session */
$user = $client->api('/me');

session_start();
$_SESSION['client'] = $client;
$_SESSION['user'] = $user;

header("Location: /");
/**/
?>