<?php
require_once('../vendor/autoload.php');
require_once('../config/config.php');

/** The entirety of our product catalog right here */
$products = array(
    'sw4' => array('description' => 'Star Wars IV', 'price' => 9900, 'vat' => 2500),
    'sw5' => array('description' => 'Star Wars V', 'price' => 9900, 'vat' => 2500),
    'sw6' => array('description' => 'Star Wars VI', 'price' => 9900, 'vat' => 2500)
);
/**/

/** Create SPiD client */
$client = new VGS_Client($spidClientConfig);
$client->auth();
/**/

/** Create data to POST to /paylink */
function getPaylinkItems($params) {
    return array_map(function ($productId, $quantity) {
        global $products;
        return array_merge($products[$productId], array('quantity' => $quantity));
    }, array_keys($params), $params);
}

$paylinkData = array(
    'title' => 'Quality movies',
    'redirectUri' => 'http://localhost:8181/callback.php',
    'cancelUri' => 'http://localhost:8181/cancel.php',
    'clientReference' => 'Order number ' . rand(),
    'items' => getPaylinkItems($_POST)
);
/**/

/** Create Paylink */
$response = $client->api('/paylink', 'POST', $paylinkData);
/**/

/** Redirect to SPiD */
header('Location: ' . $response['shortUrl']);
/**/