<?php

header('Content-Type: text/plain');

//Init our app
include '../lib/CryptoPals/Bootstrap.php';

use CryptoPals\Bootstrap;

//Init Data
$target = '49276d206b696c6c696e6720796f757220627261696e206c696b65206120706f69736f6e6f7573206d757368726f6f6d';

$crypto = new Bootstrap();

$output = $crypto->convertCustomBase64($target);

echo 'Target:' . $target . "\r\n";

echo 'Base64:' . $output;