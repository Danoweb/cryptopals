<?php

header('Content-Type: text/plain');
define('NEW_LINE', chr(10));

//Init our app
include '../lib/CryptoPals/Bootstrap.php';

use CryptoPals\Bootstrap;

//Init Data
$target = '1b37373331363f78151b7f2b783431333d78397828372d363c78373e783a393b3736';

$crypto = new Bootstrap();

$output = array();
$output2 = array();
$values = array();
$byteArray = unpack('C*', pack('H*', $target));
print_r($byteArray);

for($c=0;$c<=255;$c++) {
    
    for ($b=0;$b<count($byteArray);$b++) {
        print 'BA:' . $byteArray[$b] . '-' . chr(hexdec($byteArray[$b])) . NEW_LINE;
        print '|O:' . ord($byteArray[$b] ^ decbin($c)) . NEW_LINE;
        $valueBin = $byteArray[$b] ^ decbin($c);
        $value = chr( ord($byteArray[$b] ^ decbin($c)) );
        print '|C:' . $value . NEW_LINE;
        $values[$value] = $valueBin;
    }

}//END FOR C < 256

foreach($values as $value) {
    $check = array();
    for ($b=0;$b<count($byteArray);$b++) {
        $check[$b] = $value ^ $byteArray[$b];
    }
    $output[$value] = implode('', $check);
    
}

foreach($output as $checkValue) {
    array_push($output2, ($checkValue ^ $target));
}

//sort($output);

echo 'Output:' . print_r($output, true) . NEW_LINE;
echo 'Output2:' . print_r($output2, true) . NEW_LINE;
echo 'Target:' . $target . NEW_LINE;
