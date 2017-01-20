<?php
require_once('../vendor/autoload.php');
require_once('../config/config.php');

/** Log user out */
session_start();
unset($_SESSION['user']);

$spidClientConfig[VGS_Client::REDIRECT_URI] = "http://{$_SERVER['HTTP_HOST']}/sso/";
$client = new VGS_Client($spidClientConfig);

header("Location: " . $client->getLogoutURI());
?>