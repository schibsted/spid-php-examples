<?php
require_once('./config.php');

session_start();

/** Build login URL */
$spidAuthorizeURL = $spidBaseURL . "/oauth/authorize" .
  "?client_id=" . $clientID .
  "&response_type=code" .
  "&redirect_uri=" . $ourBaseURL . "/createSession.php";
/**/

$user = $_SESSION['user'];

if ($user) {
  require "./shop.php";
} else {
  echo "<a href='" . $spidAuthorizeURL . "'>Log in with SPiD</a>";
}
