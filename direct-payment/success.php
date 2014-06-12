<?php
require_once('./config.php');

/** Create SPiD client */
$client = new VGS_Client($spidClientConfig);
$client->auth();
/**/

/** Fetch order info */
$order = $client->api('/order/' . $_GET['order_id'] . '/status');
/**/

require 'receipt.php';
