<?php
require_once('./config.php');

$products = array(
    'sw4' => array('description' => 'Star Wars IV', 'price' => 9900, 'vat' => 2500),
    'sw5' => array('description' => 'Star Wars V', 'price' => 9900, 'vat' => 2500),
    'sw6' => array('description' => 'Star Wars VI', 'price' => 9900, 'vat' => 2500)
);

/** Create user client */
$client = new VGS_Client($spidClientConfig);
$client->auth();
/**/

function getPaylinkItems($params) {
    return array_map(function ($productId, $quantity) {
        global $products;
        return array_merge($products[$productId], array('quantity' => $quantity));
    }, array_keys($params), $params);
}

$paylinkData = array(
    'title' => 'Quality movies',
    'redirectUri' => 'http://localhost:8182/success.php',
    'cancelUri' => 'http://localhost:8182/cancel.php',
    'clientReference' => 'Order number ' . rand(),
    'items' => getPaylinkItems($_POST)
);

$response = $client->api('/paylink', 'POST', $paylinkData);
header('Location: ' . $response['shortUrl']);
