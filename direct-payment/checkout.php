<?php
require_once('./config.php');

/** Retrieving the user */
session_start();
$user = $_SESSION['user'];

if (!$user) {
    header('Location: /');
    die();
}
/**/

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

function getPaylinkData($params) {
    global $ourBaseURL;
    return array(
        'title' => 'Quality movies',
        'redirectUri' => $ourBaseURL . '/success.php',
        'cancelUri' => $ourBaseURL . '/cancel.php',
        'clientReference' => 'Order number ' . rand(),
        'items' => getPaylinkItems($params)
    );
}
/**/

/** Create data to POST to /user/{userId}/charge */
function getOrderItems($params) {
    return array_map(function ($productId, $quantity) {
        global $products;
        return array(
            'quantity' => $quantity,
            'name' => $products[$productId]['description'],
            'price' => $products[$productId]['price'],
            'vat' => $products[$productId]['vat']
        );
    }, array_keys($params), $params);
}

function getOrderData($client, $user, $params) {
    $params = array(
        'requestReference' => 'Order #' . rand(),
        'items' => getOrderItems($params)
    );

    return array_merge($params, array('hash' => $client->createHash($params)));
}
/**/

/** Attempting the direct payment, with a Paylink fallback */
try {
    $orderData = getOrderData($client, $user, $_POST);
    $order = $client->api('/user/' . $user['userId'] . '/charge', 'POST', $orderData);
    require 'receipt.php';
} catch (Exception $e) {
    $response = $client->api('/paylink', 'POST', getPaylinkData($_POST));
    header('Location: ' . $response['shortUrl']);
}
/**/
