<?php

namespace CryptoPals;

class Bootstrap {

    function __constructor() {

    }

    public function convertToBase64($target) {
        return $this->convertCustomBase64($target);
    }

    public function convertCustomBase64($target) {
        return base64_encode(pack('H*', $target));
    }
}