<?php

require_once('../vendor/autoload.php');
require_once('../config/config.php');

$spidClientConfig[VGS_Client::REDIRECT_URI] = "http://{$_SERVER['HTTP_HOST']}/api-explorer";
$spidClientConfig[VGS_Client::COOKIE] = true;
$client = new VGS_Client($spidClientConfig);

$skipKeys = array('method', 'httpMethod');
$params = array();

foreach ($_REQUEST as $key=>$value) {
    if (empty($value) || in_array($key, $skipKeys)) {
        continue;
    }
    $params[$key] = $value;
}
$path = $_REQUEST['method'];
$method = $_REQUEST['httpMethod'];

try {
    $response = $client->api($path, $method, $params);
} catch (VGS_Client_Exception $e) {
    header('Content-type: application/json');
    if ($container = json_decode($e->getRaw(), true)) {
        echo json_encode(array(
            'request' => $_REQUEST,
            'error' => $e->getMessage(),
            'result' => $e->getResult(),
            'container' => $container,
        ));
        exit;
    }
    echo json_encode(array(
        'request' => $_REQUEST,
        'error' => $e->getMessage(),
        'result' => $e->getResult(),
    ));
    exit;
}

header('Content-type: application/json');
if (EXPLORER_SHOW_CONTAINER)
    echo json_encode($client->container);
else
    echo json_encode($response);
?>