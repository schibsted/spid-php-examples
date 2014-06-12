<?php
require_once('./config.php');

/** Log user out */
session_start();

$client = isset($_SESSION['client']) ? $_SESSION['client'] : false;

if ($client) {
  unset($_SESSION['client']);
  unset($_SESSION['user']);

  $spidLogoutURL = $spidBaseURL . "/logout" .
    "?redirect_uri=" . $ourBaseURL .
    "&oauth_token=" . $client->getAccessToken();

  header("Location: " . $spidLogoutURL);
}
/**/
?>