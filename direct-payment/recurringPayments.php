<?php
require_once('./config.php');

/** Create SPiD client */
$client = new VGS_Client($spidClientConfig);
$client->auth();
/**/

/** Create data to POST to /user/{userId}/charge */
function getOrderData($client, $user, $subscription) {
    $params = array(
        'requestReference' => 'Order #' . rand(),
        'items' => array($subscription)
    );

    return array_merge($params, array('hash' => $client->createHash($params)));
}
/**/

function chargeUserForSubscription($user, $subscription) {
    global $client;
    $orderData = getOrderData($client, $user, $subscription);
    return $client->api('/user/' . $user['userId'] . '/charge', 'POST', $orderData);
}

/** Payment identifier types */
$identifiers = array(
    "2" => "Credit card",
    "4" => "SMS",
    "8" => "PayEx Invoice",
    "16" => "Voucher",
    "32" => "Klarna Invoice"
);
/**/

function formatOrder($order) {
    global $identifiers;

    return sprintf(
        "User ID %s: Captured %s %.2f from %s",
        $order["userId"],
        $order["currency"],
        $order["capturedAmount"] / 100,
        $identifiers[$order["identifierType"]]
    );
}
