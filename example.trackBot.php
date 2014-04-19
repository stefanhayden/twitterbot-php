<?php

require_once('vendor/autoload.php');

$apiKey = "";
$apiSecret = "";
$accessToken = "";
$accessTokenSecret = "";

$t = new trackBot("stefanhayden", $apiKey, $apiSecret, $accessToken, $accessTokenSecret);

// Set test most to true to stop actions from being posted to account
$t->testMode = true;

// Looks to see if current name is different from old name and if so tweets it
$t->trackName();


echo "Done!\r\n";


