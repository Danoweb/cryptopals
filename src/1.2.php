<?php

header('Content-Type: text/plain');

//Init our app
include '../lib/CryptoPals/Bootstrap.php';

use CryptoPals\Bootstrap;

//Init Data
$targetA = '1c0111001f010100061a024b53535009181c';
$targetB = '686974207468652062756c6c277320657965';

$crypto = new Bootstrap();

$output = $crypto->xorBuffers($targetA, $targetB);

echo 'TargetA:' . $targetA . "\r\n";
echo 'TargetB:' . $targetB . "\r\n";

echo 'Output:' . bin2hex($output);