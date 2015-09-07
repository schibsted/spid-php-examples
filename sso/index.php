<?php
require_once('./config.php');

session_start();

/** Build login URL */
$spidAuthorizeURL = $spidBaseURL . "/flow/auth" .
  "?client_id=" . $clientID .
  "&response_type=code" .
  "&redirect_uri=" . $ourBaseURL . "/createSession.php";
/**/

$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;

if ($user) {
  echo "Hello " . $user['displayName'] . "! <a href='/logout.php'>Log out</a>";
} else {
  echo "<a href='" . $spidAuthorizeURL . "'>Log in with SPiD</a>";
}

?>