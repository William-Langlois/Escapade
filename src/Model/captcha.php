<?php
namespace src\Model;


function secureRandom($length = 5) {
    $str = bin2hex(openssl_random_pseudo_bytes($length));
    return strtoupper(substr(base_convert($str, 16, 35), 0, $length));
}