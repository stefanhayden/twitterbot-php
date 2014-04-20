<?php

require_once('vendor/autoload.php');

// Email:	alt255+demobot@gmail.com
// Login:	demobot_3
// Password:	demobot@gmail.com

$apiKey = "Pald0HhX4pyA7HFZ94WSguT4N";
$apiSecret = "nrBe83orQ9sZ0kNTgJnY0CQrT6elNr8aOGmtWssze9AqSCqkv3";
$accessToken = "2455685168-r3Hy6Dk5zAvXXwlec9vRO9rbD6YIVJYzjVSHRIC";
$accessTokenSecret = "QGVmcaCPajniI6pzAVI1PHAtSLOpqVWzT1gEa1Wm5q2Lt";

$t = new trackBot("stefanhayden", $apiKey, $apiSecret, $accessToken, $accessTokenSecret);

// Set test most to true to stop actions from being posted to account
//$t->testMode = true;

// Looks to see if current name is different from old name and if so tweets it
$t->trackName();


echo "Done!\r\n";


