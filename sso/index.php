<?php
require_once('../vendor/autoload.php');
require_once('../config/config.php');

session_start();

$spidClientConfig[VGS_Client::REDIRECT_URI] = "http://{$_SERVER['HTTP_HOST']}/sso/";
$client = new VGS_Client($spidClientConfig);

$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;

if ($user) {
  echo "Hello " . $user['displayName'] . "! <a href='/logout.php'>Log out</a>";
} else {
  echo "<a href='" . $client->getLoginURI() . "'>Log in with SPiD</a>";
}

?>