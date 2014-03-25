<?php
require_once("../../sdk-php/src/Client.php");

$client = new VGS_Client(array(
    VGS_Client::CLIENT_ID          => $argv[1],
    VGS_Client::CLIENT_SECRET      => $argv[2],
    VGS_Client::CLIENT_SIGN_SECRET => $argv[3],
    VGS_Client::STAGING_DOMAIN     => "stage.payment.schibsted.no",
    VGS_Client::HTTPS              => true,
    VGS_Client::REDIRECT_URI       => "http://localhost:8181/explorer.php",
    VGS_Client::DOMAIN             => "localhost:8181",
    VGS_Client::COOKIE             => true,
    VGS_Client::API_VERSION        => 2,
    VGS_Client::PRODUCTION         => false
));

$client->auth();
echo var_dump($client->api("/endpoints"));
