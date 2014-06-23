<?php
require_once('./config.php');

/** Handle callback from SPiD, make sure we've got the right user */
$client = new VGS_Client($spidClientConfig);
$session = $client->getSession(); // this fetches the 'code' from the request itself
$client->setAccessToken($session['access_token']);

$user = $client->api('/me');

session_start();
$_SESSION['client'] = $client;
$_SESSION['user'] = $user;

header("Location: /success.php?order_id=" . $_REQUEST['order_id']);
/**/
?>