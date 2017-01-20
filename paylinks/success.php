<?php
require_once('../vendor/autoload.php');
require_once('../config/config.php');

/** Order status codes */
$statuses = array(
   "-3" => "Expired",
   "-2" => "Cancelled",
   "-1" => "Failed",
   "0" => "Created",
   "1" => "Pending",
   "2" => "Complete",
   "3" => "Credited",
   "4" => "Authorized"
);
/**/

/** Create SPiD client */
$client = new VGS_Client($spidClientConfig);
$client->auth();
/**/

/** Fetch order info */
$order = $client->api('/order/' . $_GET['order_id'] . '/status');
/**/

function getOrderStatus($status) {
    global $statuses;
    return $statuses[$status];
}

session_start();

$user = $_SESSION['user'];

?><!DOCTYPE html>
<html>
  <head>
    <title>Success!</title>
  </head>
  <body>
    <h1>Welcome back, <?php echo $user['displayName'] ?>!</h1>
    <p>
      <?php echo $order['clientReference'] ?> is
      <strong><?php echo getOrderStatus($order['status']) ?></strong>
    </p>
  </body>
</html>
